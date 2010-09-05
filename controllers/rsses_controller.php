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

class RssesController extends AppController {

  var $name = 'Rsses';
  var $components = array('RequestHandler');
  var $helpers = array ('Rss','Text');
  
  function index() {
    
    Configure::write('debug', 0); // dont want debug in ajax returned html
    $this->loadModel('Post'); 
    $posts = $this->Post->find('all', array('limit' => 20, 'order' => 'Post.created DESC'));

    $this->set(compact('posts'));
    $this->layout = 'rss';
    
  }
  
}

?>