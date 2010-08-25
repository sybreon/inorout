<div id="stat">

<div class="hr">
<p class="title">posted by</p>
<?=$this->element('userpad',array('uid'=>$post['User']['id'],
				  'nama'=>$post['User']['nama'],
				  'mail'=>$post['User']['mail'],
				  'stamp'=>$post['Post']['created'],
				  ));?>
</div>

<div class="hr">
   <div><?=$html->image('vote.png',array('class'=>'img'));?><span class="total">total</span><p class="numb"><?=$post['Post']['ins'] + $post['Post']['outs'];?></p></div>
</div>

<div class="hr">
   <div><?=$html->image('comment.png',array('class'=>'img'));?><span class="total">total</span><p class="numb"><?=$post['Post']['comments'];?></p></div>
</div>

<div class="hr">
   <div><?=$html->image('view.png',array('class'=>'img'));?><span class="total">total</span><p class="numb"><?=$post['Post']['views']?></p></div>
</div>

</div>
