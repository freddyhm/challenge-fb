	<script>
$(document).ready(function() {
 	start(); 	
});

</script>
<div id="startview">
	<img class="display_center_img" id="s_bg_getstarted" src= "<?php echo URL . '/public/img/1_start/bg_getstarted.png' ?> " />
	<div id="s_player1box">
		<img id="s_player1" src= "<?php echo URL . '/public/img/1_start/player1.png' ?>" />
        		<a href="<?php echo URL . '/pickchallenge/add/1'?>" >
			<img class="s_btn_go" id="s_btn_go_left" src= "<?php echo URL . '/public/img/1_start/btn_go.png' ?>" />
		</a>
		
		<div id = "s_btn_left_caption">
			"You just can't beat the 
			<br />
			 person who never gives
			 <br />
			 up."
			 <br />
			 <br />
			- Babe Ruth
			<br />
		</div>
	</div>
	<div id="s_player2box">
		<img id="s_player2" src= "<?php echo URL . '/public/img/1_start/player2.png' ?>" />
		<a href="<?php echo URL . '/pickchallenge/add/2'?>" >
			<img class="s_btn_go" id="s_btn_go_right" src= "<?php echo URL . '/public/img/1_start/btn_go.png' ?>" />
		</a>
		<div id = "s_btn_right_caption">
			"You insulted my honour! 
			<br />
			 I  challenge you to 
			 <br />
			 a duel!"
			 <br />
			 <br />
			  - Homer Simpson
			 <br />
		</div>
	</div>
</div>
