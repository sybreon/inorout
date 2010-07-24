<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
   google.load('friendconnect', '0.8');
</script>
<script type="text/javascript">
   google.friendconnect.container.loadOpenSocialApi({
     site: '08325558776111279705',
	 onload: function(securityToken) {
	 if (!window.timesloaded) {
	   window.timesloaded = 1;
	   google.friendconnect.requestSignOut();
	 } else {
	   window.timesloaded++;
	 }
	 if (window.timesloaded > 1) {
	   window.top.location.href = "<?php echo $html->url(array('controller' => 'users', 'action' => 'login')); ?>";
	 }
       }
     });
</script>