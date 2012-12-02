	<!-- 
Author: Ashish Bidadi


 -->  
<script>
$(document).ready(function() {
	$('#foot_note').hide();
 	challenge();
	
 	// opens up the custom invite friends to challenge box
 	$('#btn_invite_friends').click(function() {

 		<?php 
	       $path = '?uid=' . SocialEngine::$user_id;  

	       if(isset($challenge['id']))
	       { 
	       		$path = $path .'&id=' . $challenge['id'] . '&ch=' . $challenge['name'];
	       } 
	    ?>

		window.open("<?php echo URL; ?>/invite.php<?php echo $path; ?>",'',"resizable=0,scrollbars=0,width=775,height=585");
	});	

 	// show different css attributes based on challenge type - FHM
 	if(<?php echo $challenge['challenge_detail']['challengetype_id']; ?> == 1)
 	{
 		$("#playerRight").hide();
 		$("#player2_pic").hide();
		$('#btn_cheerleft_ajax').hide();
 		$("#player1_pic").css('margin', '0px 0px 0px 43px');
 		$("#btn_cheerleft").css('margin', '-32px 0px 0px 443px');
 		$("#sc_challenge_name").css('margin', '7px 7px 0px 0px');
 		$("#cheer_1_count").css('left', '767px');
 		$("#player1_points").css('margin-left', '486px');
 		$("#invite").css('margin', '-45px 0px 0px 331px');
 		$("#bg_challenge").css('margin', '-225px 0px 34px 224px');
		$("#btn_create_challenge").css('margin','22px 0 0 208px');
		$('#player1_name').css('margin-top', '-290px');
		$('#foot_note').css('margin-top','22px');
		$('#btn_cheerleft_ajax').css('margin-left', '494px');
		$('#btn_cheerleft_ajax').css('margin-top', '19px');
		$('#foot_note').css('font-size','12px'); $('#foot_note').css('color','#4B4646'); $('#foot_note').css('width','310px'); $('#foot_note').css('margin','-300px 0 0 231px');
 	}
 	else if (<?php echo $challenge['challenge_detail']['challengetype_id']; ?> == 2)
 	{
 		$("#playerRight").show();
 		$("#player2_pic").show();
 		$("#bg_comment_view").css('margin-top', '10px');
 		$("#player1_pic").css('margin','0px 0px 0px 10px');
 		$("#btn_cheerleft").css('margin','-32px 0px 0px -3px');
 		$("#sc_challenge_name").css('margin-top','0px');
 		$("#cheer_1_count").css('left', '323px');
 		$("#player1_points").css('margin', '0px 0px 0px 42px');
 		$("#invite").css('margin', '-66px 0px 0px 208px');
 		$("#bg_challenge").css('margin', '-225px 0px 0px 40px');
 		$("#btn_create_challenge").css('margin','22px 0 0 208px');

 	}
 	
 	// init common variables - FHM
 	var id =  <?php echo $challenge['id'];  ?>;	
	var url = baseUrl() + '/viewchallenge/cheerupdate/d/' + id;

 	// init common challenger variables - FHM
 	var challenger_id = <?php echo $challenge['challenge_detail']['challenger']['id']; ?>;
 	var challenger_cheer = <?php echo $challenge['challenge_detail']['challenger_cheers']; ?>;
 	var challenger_bar = <?php echo "'" . $challenge['challenge_detail']['challenger_bar'] . "'"; ?>;
 	var has_cheered = <?php echo "'" . $challenge['has_cheered'] . "'"; ?>;


 	var challenger_bar_arr = challenger_bar.split(",");

 	var challengee_id = '';
	var challengee_cheer = ''; 
	var challengee_bar = '';
	var challengee_bar_arr = '';

 	<?php if($challenge['challenge_detail']['challengetype_id'] == 2)
     {?>
	 	// init common challengee variables - fh
	 	var challengee_id = <?php echo $challenge['challenge_detail']['challengee']['id']; ?>;
	 	var challengee_cheer = <?php echo $challenge['challenge_detail']['challengee_cheers']; ?>;
	 	var challengee_bar = <?php echo "'" . $challenge['challenge_detail']['challengee_bar'] . "'" ?>;
	 	var challengee_bar_arr = challengee_bar.split(",");
 	<?php } ?>
 	
  	// add a tags to each button on page load - FHM
 	$("#btn_cheerleft").wrap("<a href='javascript:void(0)'></a>");
 	$("#btn_cheerright").wrap("<a href='javascript:void(0)'></a>");

	// get cheer count for each side and insert into html - FHM
	$('#cheer_1_count').html(challenger_cheer);
	$('#cheer_2_count').html(challengee_cheer);

	// Next iteration - FHM
	// add bar height to each side - FHM
 	$('#player1_points').css('height','60px');
 	$('#player1_points').css('margin-top', '-30px');
 	$('#cheer_1_count').css('top', '294px');

 	$('#player2_points').css('height', '60px');
 	$('#player2_points').css('margin-top', '-30px');
 	$('#cheer_2_count').css('top', '294px');
 	

 	// internal because of php -- will need to fix this later

 	// to get cheer status in the start - left -FHM

 	if(has_cheered == 0)
 	{
		$('#btn_cheerleft').click(function() {

				url = baseUrl() + '/viewchallenge/addcheer/d/1/' + challenger_id + '/' + id;

				$('#btn_cheerleft').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheerloading_left.png' . "'" ?>);
				$('#btn_cheerleft_ajax').show();

				var is_nonfriend;

				$.getJSON(url, function(json) {
					$('#btn_cheerleft_ajax').hide();

					if(json.status == 'not friend')
					{
						alert('Sorry, it looks like you\'re not friends with this person. Friend them and then cheer them on!');
						window.location.reload();
					}
					else if(json.status == 'error')
					{
						alert(json.message);
						window.location = '/start';
					}
					else
					{
						document.getElementById('cheer_1_count').innerHTML = json.challenger_cheers;		
					}
					

					/*
					var height = $("#player1_points").css('height').substr(0,$("#player1_points").css('height').length - 2);
		   			
		   			// stop bar from going above 80px and not letting users cheer more than once - FHM
		   			if(height < 65 && json.status != 'no cheer')
					{
						$("#player1_points").animate({"height": "+=5", "margin-top": "-=5"}, 100);
						$("#cheer_1_count").animate({"top": "-=5"}, 100, function(){
							document.getElementById('cheer_1_count').innerHTML = json.challenger_cheers;
						});

				 	}
				 	// let users still cheer if they haven't done so - FHM
				 	else if(json.status != 'no cheer')
				 	{
				 		document.getElementById('cheer_1_count').innerHTML = json.challenger_cheers;
				 	}

				 	$('#btn_cheerleft').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
				 	
				 	*/
				 });

				
				$('#btn_cheerleft').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
				$('#btn_cheerleft').unbind('click');
				$('#btn_cheerleft').unbind('mousedown');
				$('#btn_cheerleft').unbind('mouseup');
				$('#btn_cheerright').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
				$('#btn_cheerright').unbind('click');
			 	$('#btn_cheerright').unbind('mousedown');
			 	$('#btn_cheerright').unbind('mouseup');

			 	// remove a tags from left button  - FHM
			 	$("#btn_cheerleft").unwrap();
			 	$("#btn_cheerright").unwrap();
		});
	}
	else
	{
		$('#btn_cheerleft').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
		$('#btn_cheerleft').unbind('click');
		$('#btn_cheerleft').unbind('mousedown');
		$('#btn_cheerleft').unbind('mouseup');
		$('#btn_cheerright').unbind('click');
	 	$('#btn_cheerright').unbind('mousedown');
	 	$('#btn_cheerright').unbind('mouseup');

	}

	// to get cheer status in the start - right -FHM
	if(has_cheered == 0)
 	{
		$('#btn_cheerright').click(function() {

				url = baseUrl() + '/viewchallenge/addcheer/d/2/' + challengee_id + '/' + id;

				$('#btn_cheerright').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheerloading_left.png' . "'" ?>);
				$('#btn_cheerright_ajax').show();

				$.getJSON(url, function(json) {

					$('#btn_cheerright_ajax').hide();

					if(json.status == 'not friend')
					{
						alert('Sorry, it looks like you\'re not friends with this person. Friend them and then cheer them on!');
						window.location.reload();
					}
					else
					{
				 		document.getElementById('cheer_2_count').innerHTML = json.challengee_cheers;
				 	}

					/*
					var height = $("#player2_points").css('height').substr(0,$("#player2_points").css('height').length - 2);
		   			
		   			// stop bar from going above 80px and not letting users cheer more than once - FHM
		   			if(height < 65 && json.status != 'no cheer')
					{
						$("#player2_points").animate({"height": "+=5", "margin-top": "-=5"}, 100);
						$("#cheer_2_count").animate({"top": "-=5"}, 100, function(){
							document.getElementById('cheer_2_count').innerHTML = json.challengee_cheers;							
						});
					}
					// let users still cheer if they haven't done so - FHM
					else if(json.status != 'no cheer')
				 	{
				 		document.getElementById('cheer_2_count').innerHTML = json.challengee_cheers
				 	}

				 	$('#btn_cheerright').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
				 	
				 	*/

				 });

				$('#btn_cheerleft').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
				$('#btn_cheerleft').unbind('click');
				$('#btn_cheerleft').unbind('mousedown');
				$('#btn_cheerleft').unbind('mouseup');
				$('#btn_cheerright').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
				$('#btn_cheerright').unbind('click');
			 	$('#btn_cheerright').unbind('mousedown');
			 	$('#btn_cheerright').unbind('mouseup');

		});
	}
	else
	{
		$('#btn_cheerleft').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
		$('#btn_cheerleft').unbind('click');
		$('#btn_cheerleft').unbind('mousedown');
		$('#btn_cheerleft').unbind('mouseup');
		$('#btn_cheerright').attr('src' , <?php echo "'" .  URL . '/public/img/6_challengepage/btn_cheeroff.png' . "'" ?>);
		$('#btn_cheerright').unbind('click');
	 	$('#btn_cheerright').unbind('mousedown');
	 	$('#btn_cheerright').unbind('mouseup');

		// remove a tags from right button  - FHM
		$("#btn_cheerright").unwrap();
		$("#btn_cheerleft").unwrap();
	}
});

</script>
<div id="game_view">
	<div id = "cp_container">
    <div id="bg_challengeview" style="font-size:15px; padding: 5px; clear:both;">
    <div id ="sc_challenge_members_other" style="text-align:center; text-transform:uppercase;">
		<?php 
		if (($challenge['challenge_detail']['challengetype_id']) == 1)	// single player
		{
			
			if (($challenge['challenge_detail']['challenger']['sex']) == 'male') {
				$name_arr = explode(' ', $challenge['challenge_detail']['challenger']['name']);
				echo $name_arr[0]." CHALLENGES HIMSELF TO: ";
			}
			else if (($challenge['challenge_detail']['challenger']['sex']) == 'female') {
				$name_arr = explode(' ', $challenge['challenge_detail']['challenger']['name']);
				echo $name_arr[0]." CHALLENGES HERSELF TO: ";
			}
			else if (($challenge['challenge_detail']['challenger']['sex']) == '') {
				$name_arr = explode(' ', $challenge['challenge_detail']['challenger']['name']);
				echo $name_arr[0]."'s CHALLENGES IS TO: ";
			}
		}
		else if (($challenge['challenge_detail']['challengetype_id']) == 2)	// two player
		{
			$challenger_name_arr = explode(' ', $challenge['challenge_detail']['challenger']['name']);
			$challengee_name_arr = explode(' ', $challenge['challenge_detail']['challengee']['name']);
			echo $challenger_name_arr[0]." CHALLENGES ". $challengee_name_arr[0] ." to: ";
		}
		?>
		<div id ="sc_challenge_name" style="text-align:center; text-transform:uppercase;">"<?php echo $challenge['name'];?>"</div>
		</div>
    </div>
		<div id="bg_showcase_view">
            
        
			<div id="player1_pic">
				<?php echo "<img class='pic' src='" . $challenge['challenge_detail']['challenger']['pic_big'] . "'/>";?>
			</div>
			<div id="player2_pic">
				<?php if($challenge['challenge_detail']['challengetype_id'] == 2){ echo "<img class='pic' src='" . $challenge['challenge_detail']['challengee']['pic_big'] . "'/>";}
				else{ echo "<img class='pic' src='" . $challenge['challenge_detail']['challenger']['pic_big'] . "'/>";} ?>
			</div>
			
			<div id="playerLeft">
				<span class="cheer_count" id="cheer_1_count"></span>
				<img id="player1_points" src= "<?php echo URL . '/public/img/6_challengepage/green_bar.png' ?>" />
				<img class='ajax_loader' id="btn_cheerleft_ajax" src= "<?php echo URL . '/public/img/6_challengepage/ajax-loader.gif' ?>"/>
				<img id="btn_cheerleft" alt="Cheer!" src= "<?php echo URL . '/public/img/6_challengepage/btn_cheerleft.png' ?>"/>
			</div>
			<div id="playerRight">
				<span class="cheer_count" id="cheer_2_count"></span>
				<img id="player2_points" src= "<?php echo URL . '/public/img/6_challengepage/green_bar.png' ?>" />
				<img class='ajax_loader' id="btn_cheerright_ajax" src= "<?php echo URL . '/public/img/6_challengepage/ajax-loader.gif' ?>"/>
				<img id="btn_cheerright" alt="Cheer!" src= "<?php echo URL . '/public/img/6_challengepage/btn_cheerright.png' ?>"/>
			</div>
			
			
		</div>
		<div id="bg_comment_view" style="text-transform:uppercase;">
			Support your friend to finish the challenge. Cheer for them!<br />
            <img style="margin:10px 0 10px 0;" src="<?php echo URL . '/public/img/6_challengepage/divider_2.png'?>" /><br />
            Invite all your friends. Get them to show their support! <br />
            <img style="margin:10px 0 10px 0;" src="<?php echo URL . '/public/img/6_challengepage/divider_2.png'?>" /><br />
            Start your own challenge, <b>Do more, Have fun, and Make a difference!</b>
            
		</div>
		<a href="<?php echo URL . '/start/in/challenge'; ?>"  target="_blank">
		<img id="btn_create_challenge" src= "<?php echo URL . '/public/img/6_challengepage/btn_create_2.png' ?>"/>
		</a>
		<a href="javascript:void(0)">
		<img id="btn_invite_friends" style="cursor:pointer;" src= "<?php echo URL . '/public/img/6_challengepage/btn_getcheers.png' ?>"/>
		</a>
        <?php 
		$name_arr_chal = explode(' ', $challenge['challenge_detail']['challenger']['name']);

		// add the challengee array only if in player mode 2 (multi) - FHM
		if($challenge['challenge_detail']['challengetype_id'] == 2)
		{
			$name_arr_chalee = explode(' ', $challenge['challenge_detail']['challengee']['name']);
		}
		
		?>
        <div id="player1_name" style="position:absolute; margin: -296px 0 0 56px; width:121px; font-size:10px; color:#424141;"><?php echo $name_arr_chal[0]; ?></div>
        <div style="position:absolute; margin: -296px 0 0 622px; width:121px; font-size:10px; color:#424141;"><?php /* only show if it is set -FHM */ if(isset($name_arr_chalee)){ echo $name_arr_chalee[0];} ?></div>
        <div id="foot_note" style="font-size:9px; color:#CCCCCC; width:310px; margin: 10px 0 0 450px;">*We notify you and your friends through public likes & wall posts</div>  
    </div>
</div>
