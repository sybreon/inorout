<?
class RssesController extends AppController {

//var $name = 'Rss';
var $components = array('RequestHandler');
var $helpers = array ('Rss','Text');

function index() {

  //Configure::write('debug', 0); // dont want debug in ajax returned html
	$this->loadModel('Post');
	//if( $this->RequestHandler->isRss() ){
        $posts = $this->Post->find('all', array('limit' => 20, 'order' => 'Post.created DESC'));
        //$this->set(compact('posts'));
		$this->set(compact('posts'));
		$this->layout = 'rss';
		
	//}else{
	//	echo 'not RSS!';
	//}

}

}
?>