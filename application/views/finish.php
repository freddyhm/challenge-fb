<script>
$(document).ready(function() {
 	finish();

 	$("button").live("click",function(){
  $("p").slideToggle();
});


 	$('#f_invite').click(function(){
 		
 		<?php 
	       $path = '?uid=' . SocialEngine::$user_id;  

	       if(isset($challenge['id']))
	       { 
	       		$path = $path .'&id=' . $challenge['id'] . '&ch=' . $challenge['name'];
	       } 
	    ?>

		window.open("<?php echo URL; ?>/invite.php<?php echo $path; ?>",'',"resizable=0,scrollbars=0,width=775,height=585");
 	});

 	var challengee_pic = undefined;
 	var challengee_id = undefined;

 	<?php if($challenge['challenge_detail']['challengetype_id'] == 2)
     {?>
	 	challengee_pic = <?php echo "'" . $challenge['challenge_detail']['challengee']['pic_big'] . "'";?>;
	 	challengee_id = <?php echo "'" . $challenge['challenge_detail']['challengee']['id'] . "'"; ?>;
 	<?php } ?>
 	

	var challenger_pic = <?php echo "'" . $challenge['challenge_detail']['challenger']['pic_big'] . "'"; ?>;
 	var challenger_id = <?php echo "'" . $challenge['challenge_detail']['challenger']['id'] . "'"; ?>;
 	var loser_tag = <?php echo "'" . URL . '/public/img/8_finish/btn_lose.png'. "'" ?>;
	var tie_tag = <?php echo "'" . URL . '/public/img/8_finish/btn_draw.png'. "'" ?>;
	
 	var winner_id = <?php echo "'" . $challenge['challenge_detail']['winner_id'] . "'"; ?>;
 	var challengertype_id = <?php echo "'" . $challenge['challenge_detail']['challengetype_id'] . "'"; ?>;
 	var loser_id = <?php echo "'" . $challenge['challenge_detail']['loser_id'] . "'"; ?>;
	var is_tie = <?php echo "'" . $challenge['challenge_detail']['is_tie'] . "'"; ?>;
	
	if(winner_id == challenger_id)
    {
  		$('#f_player_1_picture img').attr('src', challenger_pic);

  		if(challengertype_id == 1)
  		{
			$('#f_player_2_picture img').attr('src', challenger_pic);
			$('#f_player_2_picture img').hide();
			$('#f_player_2_picture').hide();
  		}
  		else
  		{
  			$('#f_player_2_picture img').attr('src', challengee_pic);
  		}
  	}
	else if(loser_id == challenger_id && challengertype_id == 1)
    {
  		$('#f_player_1_picture img').attr('src', challenger_pic);
		$('#f_player_2_picture img').hide();
		$('#f_player_2_picture').hide();
		$('#f_winner_tag').attr('src', loser_tag);
  	}
  	else if(winner_id == challengee_id)
  	{
  		$('#f_player_1_picture img').attr('src', challengee_pic);
  		$('#f_player_2_picture img').attr('src', challenger_pic);	
  	}
	else if(is_tie == 1 && challengertype_id == 2)
    {
  		$('#f_player_1_picture img').attr('src', challenger_pic);
		$('#f_player_2_picture img').attr('src', challengee_pic);
		
		$('#f_player_1_picture').css('height', '150px'); $('#f_player_1_picture').css('width', '150px');
		$('#playa_1').css('height', '150px'); $('#playa_1').css('width', '150px');
		
		$('#f_player_2_picture').css('height', '150px'); $('#f_player_2_picture').css('width', '150px'); $('#f_player_2_picture').css('margin-left', '135px');
		$('#playa_2').css('height', '150px'); $('#playa_2').css('width', '150px');
		
		$('#f_winner_tag').attr('src', tie_tag);
  	}
});

$(window).unload(function(){
	grobo.inStep('finish');
});
</script>

<div id="game_view">
	<div id = "f_container">
		<img id="f_winner_tag" src= "<?php echo URL . '/public/img/8_finish/btn_winner.png' ?>" />
		<div id = "f_challenge_info">
			<span class='title'>who won this challenge?</span>
			<br />
			<span class='message'>"<?php 

			// display challengee name only if challenge type is 2
			if($challenge['challenge_detail']['challengetype_id'] == 2)
			{ 
				echo $challenge['challenge_detail']['challengee']['name']; 
			} 
			?> to <?php echo $challenge['name'] ?>"</span>
			</br>
		</div>

		<div id = "f_challenge">
			<div id="f_share">
				<span id="f_share_msg">Share the result!</span>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url=<?php echo "'" . URL . '/finish/show/' . $challenge['id'] . "'"; ?> data-text="I just finished my <?php echo strtolower($challenge['name']); ?> challenge! Check it out on Growple!" data-via="Growple" data-size="large" data-hashtags="challenge">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<br />
				<!-- <img id="f_fb_share" src= "<?php echo URL . '/public/img/8_finish/btn_facebook.png' ?>" />
				<img id="f_t_share" style="margin-left: 10px;" src= "<?php echo URL . '/public/img/8_finish/btn_twitter.png' ?>" /> -->
			</div>
			<div id="f_showcase">
				<div id="f_player_1_picture"><img id="playa_1" style="width:240px; height:240px;" src=""/></div>
				<div id="f_player_2_picture"><img id="playa_2" style="width:75px; height:75px;" src=""/></div>
			</div>
		</div>
		<div id="f_controls">
			<a href="<?php echo URL ?>" target="_blank">
				<img id="f_create" src= "<?php echo URL . '/public/img/8_finish/btn_create.png' ?>" />
			</a>
			<a href="http://www.growple.com">
				<img id="f_fbpage" src= "<?php echo URL . '/public/img/8_finish/btn_fb.png' ?>" />
			</a>
			<a href="javascript:void(0)">
				<img id="f_invite" src= "<?php echo URL . '/public/img/8_finish/btn_invite.png' ?>" />
			</a>
		</div>
	</div>
</div>