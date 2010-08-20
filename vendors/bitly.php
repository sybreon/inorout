<?php
/*
Author: Ruslanas Balčiūnas
http://bitly.googlecode.com

Usage:
$bitly = new Bitly($login, $apiKey);
$short = $bitly->shortenSingle('http://bitly.googlecode.com');
$long = $bitly->expandSingle($short);
print_r( $bitly->getStatsArray($short));
print_r( $bitly->getInfoArray($long));

*/

class Bitly {

    protected $api = 'http://api.bit.ly/';
    private $format = 'json';
    private $version = '2.0.1';
    private $validActions = array(
        'shorten',
        'stats',
        'info',
        'expand'
        );

    public function Bitly($login, $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
        $this->statusCode = 'OK';
        $this->errorMessage = '';
        $this->errorCode = '';
    	return true;
    }

    private function setError($message, $code = 101)
    {
    	$this->errorCode = $code;
        $this->errorMessage = $message;
        $this->statusCode = 'ERROR';
    }
    
    public function validAction($action)
    {
        if( in_array($action, $this->validActions)) {
            return true;
        }
        $this->setError("Undefined method $action", 202);
    	return false;
    }

    public function error()
    {
        $ret = array(
            "errorCode" => $this->errorCode,
            "errorMessage" => $this->errorMessage,
            "statusCode" => $this->statusCode
            );

        // Function used for passing empty result sometimes.
        if( $this->statusCode == 'OK') {
            $ret['results'] = array();
        }
        if( $this->format == 'json') {
            return json_encode($ret);
        } else {
            throw new Exception('Unsupported format');
        }
    }

    public function shorten($message)
    {

        $postFields = '';
        preg_match_all("/http(s?):\/\/[^( |$|\]|,|\\\)]+/i", $message, $matches);
        
        for($i=0;$i<sizeof( $matches[0]);$i++) {
            $curr = $matches[0][$i];
            // ignore bitly urls
            if( !strstr($curr, 'http://bit.ly')) {
                $postFields .= '&longUrl=' . urlencode( $curr);
            }
        }

        // nothing to shorten, return empty result
        if( !strlen($postFields)) {
            return $this->error();
        }
        return $this->process('shorten', $postFields);
    }

    public function expand($message)
    {
        $postFields = '&hash=' . $this->getHash($message);
    	return $this->process('expand', $postFields);
    }

    public function info($bitlyUrl)
    {
        $hash = $this->getHash($bitlyUrl);
        $postFields = '&hash=' . $hash;
        return $this->process('info', $postFields);
    }

    public function stats($bitlyUrl)
    {
        // Take only first hash or url. Ignore others.
        $a = split(',', $bitlyUrl);
        $postFields = '&hash=' . $this->getHash($a[0]);
        return $this->process('stats', $postFields);
    }
    
    protected function process($action, $postFields) {
        $ch = curl_init( $this->api . $action); 
        
        $postFields = 'version=' . $this->version . $postFields;
        $postFields .= '&format=' . $this->format;
        $postFields .= '&history=1';

        curl_setopt($ch, CURLOPT_USERPWD, $this->login . ':' . $this->apiKey);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch); 
         
        curl_close($ch); 
        
        return $response;
    }

    public function setReturnFormat($format)
    {
        // needed for restoration
        $this->oldFormat = $this->format;
    	$this->format = $format;
        return $this->format;
    }

    private function restoreFormat()
    {
        if( !empty( $this->oldFormat)) {
            $this->format = $this->oldFormat;
        }
        return $this->format;
    }

    // expect url, shortened url or hash
    public function getHash($message)
    {
        // if url and not bit.ly get shortened first
        if( strstr($message, 'http://') && !strstr($message, 'http://bit.ly')) {
            $message = $this->shortenSingle($message);
        }
        $hash = str_replace('http://bit.ly/', '', $message);
        return $hash;
    }
    
    public function shortenSingle($message)
    {
        $this->setReturnFormat('json');
    	$data = json_decode( $this->shorten($message), true);
        // return to previous state.
        $this->restoreFormat();
        
        // replace every long url with short one
        foreach($data['results'] as $url => $d) {
            $message = str_replace($url, $d['shortUrl'], $message);
        }
        return $message;
    }

    public function expandSingle($shortUrl)
    {
        $this->setReturnFormat('json');
    	$data = json_decode( $this->expand($shortUrl), true);
        $this->restoreFormat();
        return $data['results'][ $this->getHash($shortUrl)]['longUrl'];
    }

    public function getInfoArray($url)
    {
        $this->setReturnFormat('json');
    	$json = $this->info($url);
        $this->restoreFormat();
        $data = json_decode($json, true);

        $this->infoArray = array_pop( $data['results']);
        return $this->infoArray;
    }

    public function getStatsArray($url)
    {
        $this->setReturnFormat('json');
    	$json = $this->stats($url);
        $this->restoreFormat();
        $data = json_decode($json, true);
        $this->statsArray = $data['results'];
        return $this->statsArray;
    }
    
    public function getClicks()
    {
    	return $this->statsArray['clicks'];
    }
    // get thumbnail (small, middle, large)
    public function getThumbnail($size = 'small')
    {
        if( !in_array($size, array('small', 'medium', 'large'))) {
            throw new Exception('Invalid size value');
        }
        if( empty( $this->infoArray)) {
            throw new Exception('Info not loaded');
        }
    	return $this->infoArray['thumbnail'][$size];
    }
    
    public function getTitle()
    {
    	return $this->infoArray['htmlTitle'];
    }
}
?>
