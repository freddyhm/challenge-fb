<script>
$(document).ready(function() {
 	result();

 	// init common variables - FHM
 	var id =  <?php echo $challenge['id'];  ?>;	
	var url = '/result/response/' + id + '/';

 	$('#left_link').attr('href', url + 'won' + '/' + 1);
 	$('#middle_link').attr('href', url + 'tied' + '/' + 2);
 	$('#right_link').attr('href', url + 'won' + '/' + 2);
	
	$('#win_link').attr('href', url + 'won' + '/' + 1);
 	$('#lose_link').attr('href', url + 'loss' + '/' + 1);
});
</script>
<div id="game_view">
	<div id = "r_container">
    <?php
	if ($challenge['challenge_detail']['challengetype_id'] == 2 && $challenge['challenge_detail']['message'] == 'is challenger') {?>
		<img id="l_winner_tag" class="winner_tag" src= "<?php echo URL . '/public/img/7_result/btn_winner.png' ?>" />
		<img id="r_winner_tag" class="winner_tag" src= "<?php echo URL . '/public/img/7_result/btn_winner.png' ?>" />
    <?php } 
	else if ($challenge['challenge_detail']['challengetype_id'] == 1 && $challenge['challenge_detail']['message'] == 'is challenger') {?>
    	
        <img id="l_win_tag" class="outcome_tag" src= "<?php echo URL . '/public/img/7_result/btn_winner.png' ?>" />
        <img id="l_lose_tag" class="outcome_tag" src= "<?php echo URL . '/public/img/7_result/btn_sad.png' ?>" />
    <?php } ?>
		<div id = "r_challenge_info">
			<span class='title'>who won this challenge?</span>
			<br />
			<span class='message'>"I challenged <?php
			 if(isset($challenge['challenge_detail']['challengee']))
			 {
			 	echo $challenge['challenge_detail']['challengee']['name']; 	
			 }
			 else
			 {
			 	echo ' myself';
			 }
			 ?> to <?php echo $challenge['name'] ?>"</span>
			</br>
		</div>
		<div id = "r_challenge">
			<div id="r_challenge_banner">
				<table style="width:654px;">
					<tr>
						<td style="margin-left:auto; margin-right:auto;">
							<?php 
							echo '<div id="sc_player_1_picture_sc"><img style="width:106px; height:106px;" src="'.$challenge['challenge_detail']['challenger']['pic_big'].'"/></div>'; 
							?>
						</td>
						<td style="width:267px;"></td>
						<td style="margin-left:auto; margin-right:auto;">
							<?php 
								if (($challenge['challenge_detail']['challengetype_id']) == 1)	// single player
								{
									echo '<div id="sc_player_2_picture_sc"><img style="width:106px; height:106px;" src="'.$challenge['challenge_detail']['challenger']['pic_big'].'"/></div>';
								}
								else if (($challenge['challenge_detail']['challengetype_id']) == 2)	// two player
								{
									echo '<div id="sc_player_2_picture_sc"><img style="width:106px; height:106px;" src="'.$challenge['challenge_detail']['challengee']['pic_big'].'"/></div>';
								}
							?>
						</td>
					</tr>
                </table>
				<table style="width:654px;">
					<tr style="text-align:center;">
						<td style="margin-left:auto; margin-right:auto;">
							<div id="sc_player_1_name_sc" style="text-transform:uppercase;"><?php echo $challenge['challenge_detail']['challenger']['name'];?></div>
						</td>
						<td style="width:162px;"></td>
						<td style="margin-left:auto; margin-right:auto;">
							<div id="sc_player_2_name_sc" style="text-transform:uppercase;">
							<?php 
								if (($challenge['challenge_detail']['challengetype_id']) == 1)	// single player
								{
									echo $challenge['challenge_detail']['challenger']['name'];
								}
								else if (($challenge['challenge_detail']['challengetype_id']) == 2)	// two player
								{
									echo $challenge['challenge_detail']['challengee']['name'];
								}
							?>
							</div>
						</td>
					</tr>
				</table>
			</div>
            <?php
			if ($challenge['challenge_detail']['challengetype_id'] == 1 && $challenge['challenge_detail']['message'] == 'is challenger') {?>
			 <div id="r_controls">
				<a id="win_link" href="" style="text-decoration: none;">
					<img id="r_win_select" src= "<?php echo URL . '/public/img/7_result/btn_win_off.png' ?>" />
				</a>
				<a id="lose_link" href="" style="text-decoration: none;">
					<img id="r_lose_select" src= "<?php echo URL . '/public/img/7_result/btn_sad_off.png' ?>" />
				</a>
			</div>
            <?php } 
			else if ($challenge['challenge_detail']['challengetype_id'] == 2 && $challenge['challenge_detail']['message'] == 'is challenger') {?>
            <div id="r_controls">
				<a id="left_link" href="" style="text-decoration: none;">
					<img id="r_left_select" src= "<?php echo URL . '/public/img/7_result/btn_leftwinner_off.png' ?>" />
				</a>
				<a id="middle_link" href="" style="text-decoration: none;">
					<img id="r_draw" src= "<?php echo URL . '/public/img/7_result/btn_draw_off.png' ?>" />
				</a>
				<a id="right_link" href="" style="text-decoration: none;">
					<img id="r_right_select" src= "<?php echo URL . '/public/img/7_result/btn_rightwinner_off.png' ?>" />
				</a>
			</div>
            <?php } ?>
		</div>
	</div>
</div>