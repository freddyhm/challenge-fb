<html>
<head>
	<title>Growple! - Facebook App</title>
	<meta http-equiv="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL . '/public/css/growplefb.css' ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo URL . '/public/css/jquery.ui.all.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL . '/public/css/demos.css' ?>">
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?ver=3.3.1'></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/growplefb.js' ?>" ></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.core.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.url.packed.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.core.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.widget.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.position.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.autocomplete.js' ?>"></script>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-32544388-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<script type='text/javascript'>

		$(document).ready(function() {

			$('#h_btn_startchallenge').click(function(){

				window.open("<?php echo URL; ?>");
			});

			$('#h_btn_invite').click(function(){

				<?php 
			       $path = '?uid=' . SocialEngine::$user_id;  

			       if(isset($challenge['id']))
			       { 
			       		$path = $path .'&id=' . $challenge['id'] . '&ch=' . $challenge['name'];
			       } 
			    ?>

				window.open("<?php echo URL; ?>/invite.php<?php echo $path; ?>",'',"resizable=0,scrollbars=0,width=775,height=585");
			});

			$('#h_btn_visit').click(function(){

				window.open("http://growple.com/");
			});
	});
	</script>
</head>
<body>
	<div id="wrapper">
	<div id="header">
		<a href="http://www.growple.com/" target="_blank"/>
			<img class="display_center_img" id="logo" src="<?php echo URL . '/public/img/logo.png' ?>" />
		</a>
		<img class="display_center_img" id="h_tool_tip" src="<?php echo URL . '/public/img/bg_headertooltip.png' ?>" />
        <img class="display_center_img" id="h_btn_startchallenge" style = "cursor:pointer;" src="<?php echo URL . '/public/img/btn_startchallenge.png' ?>"/>
		<img class="display_center_img" id="h_btn_invite" style = "cursor:pointer;" src="<?php echo URL . '/public/img/btb_invite.png' ?>" />
		<img class="display_center_img" id="h_btn_visit" style = "cursor:pointer;" src="<?php echo URL . '/public/img/btn_visit.png' ?>" />
        <iframe class="display_center_img" id="mediaFbLike" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fgrowple&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=424319237587777" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
        <div id="mediaTwitter" class="display_center_img"><a href="https://twitter.com/Growple" class="twitter-follow-button" data-show-count="false">Follow @Growple</a></div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	<div id="main">