<?
  /**
   INOROUT - Social Discussion Platform.
   Copyright (C) 2010 EeChia <eechia@gmail.com>
 
   This program is free software: you can redistribute it and/or
   modify it under the terms of the GNU Affero General Public License
   as published by the Free Software Foundation, either version 3 of
   the License, or (at your option) any later version.
 
   This program is distributed in the hope that it will be useful, but
   WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
   Affero General Public License for more details.
   
   You should have received a copy of the GNU Affero General Public
   License along with this program.  If not, see
   <http://www.gnu.org/licenses/>.
  */

$this->set('documentData', array('xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array('title' => __("Most Recent Posts", true),
				'link' => $html->url('/', true),
				'description' => __("Most recent posts.", true),
				'language' => 'en-us'));

foreach ($posts as $post) {
  $postTime = strtotime($post['Post']['created']);
  
  $postLink = array(
		    'controller' => 'posts',
		    'action' => 'view',
		    $post['Post']['id']);

  // You should import Sanitize
  App::import('Sanitize');
  // This is the part where we clean the body text for output as the description 
  // of the rss item, this needs to have only text to make sure the feed validates
  $bodyText = preg_replace('=\(.*?\)=is', '', $post['Post']['teaser']);
  $bodyText = $text->stripLinks($bodyText);
  $bodyText = Sanitize::stripAll($bodyText);
  $bodyText = $text->truncate($bodyText, 400, '...', true, true);
  
  echo  $rss->item(array(), 
		   array('title' => $post['Post']['title'],
			 'link' => $postLink,
			 'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
			 'description' =>  $bodyText,
			 'dc:creator' => $post['User']['nama'],
			 'pubDate' => $post['Post']['created'])
		   );
}

?>