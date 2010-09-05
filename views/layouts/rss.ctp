<?php
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

header('Content-Type: application/rss+xml; charset=utf-8');

echo ($rss->header());
if (!isset($documentData)) {
    $documentData = array();
}
if (!isset($channelData)) {
    $channelData = array();
}
if (!isset($channelData['title'])) {
    $channelData['title'] = $title_for_layout;
} 

$channel = $rss->channel(array(), $channelData, $content_for_layout);
echo $rss->document($documentData,$channel);

?>