<?php
/*
 INOROUT - Social Discussion Platform
 Copyright (C) 2010 Shawn Tan <shawn.tan@sybreon.com>
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as
 published by the Free Software Foundation, either version 3 of the
 License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 Affero General Public License for more details.
   
 You should have received a copy of the GNU Affero General Public
 License along with this program.  If not, see
 <http://www.gnu.org/licenses/>.
*/
?>
<style>
dl#faq dt { font-weight:bold;background:#e12;color:#fff;padding:4px 8px;margin-bottom:4px; }
dl#faq dt a { color:#fff; }
dl#faq dd { background:none;color:#333;padding:4px 8px; }
</style>
<?php echo $javascript->link('prototype'); ?> 
<br>
<dl id="faq">
    <dt><?=$html->link('Why do I need to register?','#',array('onclick' => 'Element.toggle("faq01");'));?></dt>
<dd id="faq01" style="display:none">
<p>
To secure your right to vote in an election and exercise your right as a citizen. Malaysia does not automatically register voters, so you'll need to register to place yourself in the electoral roll. To be fair, many democracy-based countries do not automatically register voters, although others such as Finland, Switzerland and Mexico do.
</p>
</dd>
    
	
<dt><?=$html->link('Who is a qualified elector?','#',array('onclick' => 'Element.toggle("faq02");'));?></dt>
<dd id="faq02" style="display:none"><p>
<ul>
<li>A Malaysian citizen
</li>
<li>
Has attained 21 years of age
</li>
<li>
Is residing in any Election Constituency in Malaysia; and
</li>
<li>
Has not been disqualified
</li>
</ul>
</dd>
    <dt><?=$html->link('How do I register?','#',array('onclick' => 'Element.toggle("faq03");'));?></dt>
<dd id="faq03" style="display:none">
<ul>
<li>Go personally to the Registration Centre;
</li>
<li>Take along your Identity Card;
</li>
<li>Ensure Form A is correctly filled by the staff before signing the form; and
</li>
<li> Keep one copy of the form as proof of your registration. </li>
</ul>

</dd>
    <dt><?=$html->link('Where can I register ?','#',array('onclick' => 'Element.toggle("faq04");'));?></dt>
<dd id="faq04" style="display:none">

<ul>

<li> Check out the various voter registration drive <?=$html->link('HERE','/pages/news',array('escape'=>false));?> <br> </li>

<li> 
At the Election Commission of Malaysia Headquarters <br>
The EC Headquarters <br>
Ground Floor, Block C7, Complex C, <br>
The Federal Government Administrative Centre, <br>
62690 Putrajaya <br>
Tel. No.: 03-88856686 <br>
</li>

<li> 
The State Election Offices <br>
Find out where they are <?=$html->link('HERE','http://www.spr.gov.my/eng/index_files/hubungi_kamiVBI/hubungiVBI.asp',array('escape'=>false));?>

</li>

<li> 
All Post Offices with computer facilities in the country; <br>
Find where they are at the  
<?=$html->link('HERE','http://www.pos.com.my/WebsiteBM/MAIN2.ASP?c=/V1/Ournetworks/map.htm',array('escape'=>false));?>

</li>

<li> 
Commission's mobile teams;  AND Other places specified by the Election Commission as Registration Centres.
</li>

</ul>



</dd>
    <dt><?=$html->link('How can I check whether I am on the electoral roll?','#',array('onclick' => 'Element.toggle("faq05");'));?></dt>
<dd id="faq05" style="display:none;">
<p>
You can check online at <?=$html->link('HERE','http://daftarj.spr.gov.my/daftarj/daftarbi.aspx',array('escape'=>false));?> <br>
Just key in your IC No. and your details should appear. <br>
If they don't, call the Election Commission office for more information. 

</p>
</dd>
    
</dl>