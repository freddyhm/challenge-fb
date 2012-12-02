<!-- 
Author: Ashish Bidadi
 -->
<script>
$(document).ready(function() {
 	sendchallenge();
	$('#notify_message').hide();

$('#time_message').hide();	
	<?php
	if(($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challenger' ){ ?>
		$('#sc_btn_go').hide();
		$('#go_back_img_pf').hide();
	<?php } 
	else if (($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challengee' )	 {?>	
		$('#go_back_img_pf').hide();
	<?php } 
	else if (($challenge['challenge_detail']['status'] == 'decline' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challenger' )	 {?>	
		$('#go_back_img_pf').hide();
	<?php } ?>
 });
$(window).unload(function(){});
</script>

<div id="game_view">
	<div id = "sc_container">
		<div id = "sc_challenge_info">	
			<div id ="sc_challenge_members" style="text-align:center; text-transform:uppercase;">
				<?php 
					if (($challenge['challenge_detail']['challengetype_id']) == 1)	// single player
					{
						if (($challenge['challenge_detail']['challenger']['sex']) == 'male') {	// If its male show the following message

							echo $challenge['challenge_detail']['challenger']['name']." CHALLENGES HIMSELF TO: <br></div>";
						}
						else if (($challenge['challenge_detail']['challenger']['sex']) == 'female') { // If its female show the following message

							echo $challenge['challenge_detail']['challenger']['name']." CHALLENGES HERSELF TO: <br></div>";
						}
						else if (($challenge['challenge_detail']['challenger']['sex']) == '') {
							
							echo $challenge['challenge_detail']['challenger']['name']."'s CHALLENGES IS TO: <br></div>";
						}
					}
					else if (($challenge['challenge_detail']['challengetype_id']) == 2)	// two player
					{
						echo $challenge['challenge_detail']['challenger']['name']." CHALLENGES ". $challenge['challenge_detail']['challengee']['name'] ." to: <br></div>";
					}
				?>
			<div id ="sc_challenge_name" style="text-align:center; text-transform:uppercase;">"<?php echo $challenge['name'];?>"</div>
		</div>
		<div id = "sc_challenge">
			<div id="sc_challenge_banner">
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
		if(isset($time)) 
		{ 
		?>
			<div id="sc_current_time" style="text-transform:uppercase;">
            	YOUR CURRENT TIME: 
				<?php 
					echo $time['current_local_time']; 
				?>
                <img style="margin-top:5px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 
            </div>
			<div id="sc_time_period" style="text-transform:uppercase;">
            	WHEN WOULD YOU LIKE THE CHALLENGE TO END?
            </div>
            <table id="time_table">
                <tr style="height:60px;">
                	<td>
                		<div id="time_period_dd">                
						<?php 
							$time_arr = explode(' ', $time['current_local_time']);
							$current_sign = $time_arr[1];
							
							echo '<select id="time_select">';
							echo '<option value=""></option>';
						
							$sign = $current_sign;
							$is_twelve = 0;

							// treats the special case of 12 and 13
							if($time['1'][0] == 12 || $time['1'][0] == 13)
							{
								$is_special = 1;
							}

							foreach ($time['1'] as $time_left) {
								// this is default if cases aren't met
								$time_avail = $time_left;
								// if count has reached 13 or over, get single digit and AM or PM
								if($time_left >= 12)
								{
									// leave 12 unchanged 
									if($time_left != 12)
									{
										$time_avail = $time_left - 12;
									}
									// treats the special case of 12 and 13
									if($is_special == 0 || $time_left == 24 || $time_left == 12 )
									{
										// reversal for normal cases + if it's 24 (12+ case) or 12 
										if($current_sign == 'am')
											$sign = 'pm';
										else
											$sign = 'am';
									}
								}
							echo '<option value='.$time_left.$sign.'>'.$time_avail.':00 '. $sign .'</option>';
							}	
						echo '</select>';				
					?>
                    </div>
                    </td>
                	<td>
                		<div id="time_message">
                    	Good luck 
						<?php 
							$name_arr = explode(' ', $challenge['challenge_detail']['challenger']['name']);
							echo $name_arr[0];
						?>. 
                        You can do it! We hope you win :)</div>
					</td>
                </tr>
			</table>
			</div>
	<?php 
	}
	else { 
	?>
		<div id="sc_current_time" style="text-transform:uppercase; width: 600px;">
        <?php 
		// Case for when challenger views it		
		if (($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challenger'){?>
            YOUR CHALLENGE HAS BEEN SENT TO 
                <?php  
                    $name_arr_2 = explode(' ', $challenge['challenge_detail']['challengee']['name']);
                    echo $name_arr_2[0];
                ?>.
                YOU WILL BE NOTIFIED ONCE THEY ACCEPT OR DECLINE YOUR CHALLENGE.        
                <img style="margin-top:4px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 	
            </div>
            <div id="sc_time_period" style="text-transform:uppercase;">
                YOU WILL BE NOTIFIED WHEN THE CHALLENGE EXPIRES!            
                <img style="margin-top:4px; margin-bottom:4px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 		
                <br/>ITS TIME TO 
                <b>
                <?php 
                    echo $challenge['name'];
                ?> 
                </b>.            
                HAVE FUN! :) 
            </div>
         <?php
		}
		else if (($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challengee' ) { ?>
			LOOKS LIKE YOU HAVE A CHALLENGE ON YOUR HANDS 
                <?php  
                    $name_arr_2 = explode(' ', $challenge['challenge_detail']['challengee']['name']);
                    echo $name_arr_2[0];
                ?>.  
                <img style="margin-top:4px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 	
            </div>
            <div id="sc_time_period" style="text-transform:uppercase;">
                ACCEPT OR DECLINE THE CHALLENGE BY CHOOSING FROM ONE OF THE OPTIONS BELOW.         
                <img style="margin-top:4px; margin-bottom:4px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 		
                <br/>ITS TIME TO 
                <b>
                <?php 
                    echo $challenge['name'];
                ?> 
                </b>.            
                HAVE FUN! :) 
            </div>
		<?php 
		} 
		else if (($challenge['challenge_detail']['status'] == 'decline') && $challenge['challenge_detail']['message'] == 'is challenger' ) { ?>
			LOOKS LIKE YOUR CHALLENGE HAS BEEN DECLINED BY
                <?php  
                    $name_arr_2 = explode(' ', $challenge['challenge_detail']['challengee']['name']);
                    echo $name_arr_2[0];
                ?>.  
                <img style="margin-top:4px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 	
            </div>
            <div id="sc_time_period" style="text-transform:uppercase;">
                TRY AGAIN. CHALLENGE ANOTHER FRIEND.       
                <img style="margin-top:4px; margin-bottom:4px;" src="<?php echo URL . '/public/img/4_1_sendchallengerequest/divider.png'?>" /> 		
                <br/>We WANT YOU TO DO MORE, HAVE FUN and MAKE A DIFFERENCE :) </b> 
            </div>
      <?php } ?>
	<?php 
	} 
	?>
		<a href="javascript:history.go(-1)">
			<img id="go_back_img_pf" src="<?php echo URL . '/public/img/2_pickchallenge/btn_back.png' ?>"/>
		</a>
        
        
        <div id ="send_button" style="clear:both; height: 83px; width:83px; position:absolute;">
        <?php
			// When to display the Send button and when to dispaly the Accept/Decline buttons
			// When to change the href's of the links: SEND, ACCEPT, DECLINE
			$url_href = URL . '/sendchallenge';																			// Building the URL for the send/accept button
			
			if(isset($time) && $challenge['challenge_detail']['challengetype_id'] != 1)								// Has the time been set? Is this the time setting page and Is this a one player challenge? If it is:
			{
				$url_href = 'javascript:void(0)';																		// Javascript driven action
				echo '<a id="send_challenge_href" href=' . $url_href . '>';
			}
			if(isset($time) && $challenge['challenge_detail']['challengetype_id'] == 1)								// Has the time been set? Is this the time setting page and Is this a one player challenge? If it is:
			{
				$url_href = 'javascript:void(0)';																		// Javascript driven action
				echo '<a id="send_challenge_href" href=' . $url_href . '>';
			}
						
			// Building the image, to display the SEND/ACCEPT button
			$url_imgsrc = URL . '/public/img/4_1_sendchallengerequest/';						// Setting the url to a variable + location of the folder for the image
			
			if($challenge['challenge_detail']['status'] == 'created')					// Upon entering the send challenge page, the send button is shown. At this point the challenge has been created and it just needs to be sent
			{
				$url_imgsrc = $url_imgsrc . 'btn_send.png'; 											// Works
				// Setting the Image on the button: SEND button
				echo '<img id="sc_btn_go_send" src=' . $url_imgsrc . ' /></a>';
				echo '<div id="notify_message">*We notify you & your friends through public wallposts. Get them to challenge you!</div>';
			}			
			else if($challenge['challenge_detail']['status'] == 'accept')				// When the status of the challenge has been set to 'accept', that is after the Challengee accepts: The location of the page is directed to the challenge (cheer page for the challenge)
			{
				header('Location:'.URL.'/viewchallenge/show/' . $challenge['id']);
			}
			else if($challenge['challenge_detail']['status'] == 'decline')				// When the status of the challenge has been set to 'decline', that is after the Challengee declines the challenge:
			{
				if($challenge['challenge_detail']['message'] == 'is challengee')	// If its the challengee, then we redirect him to the start page
				{
					header('Location:'.URL.'/start');
				}
			}
		?>
        </div>
        <div id="accept_button">
        <?php
		$url_href = URL . '/sendchallenge';																			// Building the URL for the send/accept button
			
			if(isset($time) && $challenge['challenge_detail']['challengetype_id'] != 1)								// Has the time been set? Is this the time setting page and Is this a one player challenge? If it is:
			{
				$url_href = 'javascript:void(0)';																		// Javascript driven action
			}
			else if($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee')		// IF the challenge status is set to 'sent request' and its 'viewed' by the challengee
			{	
				if($challenge['challenge_detail']['message'] == 'is challengee')																			// If its the challengee viewing the page, we set the ACCEPT button with this URL
				{
					$url_href = $url_href . '/select/' . $challenge['id'] . '/accept';
					// Setting the URL on the button: SEND/ACCEPT button. the 'A TAG'
					echo '<a id="send_challenge_href" href=' . $url_href . '>';
				}
				else if($challenge['challenge_detail']['message'] == 'is challenger')																		// Its its the challenger viewing the page:
				{
					$url_href = 'javascript:void(0)';																											// Javascript driven action
				}
			}
			
			
			// Building the image, to display the SEND/ACCEPT button
			$url_imgsrc = URL . '/public/img/4_1_sendchallengerequest/';	
		
			if(($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challengee' )		// When the challengee has been sent a challenge/wall post, and he/she comes back and checks: We need to show them a accept AND decline button. Here we are just loading the Accept Button since we are in the src attribute of the image
			{	
				$url_imgsrc = $url_imgsrc . 'btn_accept.png';											// Same case is used for the Decline button, found ouside the scope of this PHP snippet of code				
				// Setting the Image on the button: ACCEPT button
				echo '<img id="sc_btn_go_accept" src=' . $url_imgsrc . ' /></a>';
			}
		?>
        </div>
        <div style="clear:both; height:83px; width:83px; position:absolute;">
            <a href="<?php echo URL . '/sendchallenge/select/'.  $challenge['id'] .'/decline' ?>">
            <?php		
            if(($challenge['challenge_detail']['status'] == 'sent request' || $challenge['challenge_detail']['status'] == 'viewed by challengee') && $challenge['challenge_detail']['message'] == 'is challengee' )		// When the challengee has been sent a challenge/wall post, and he/she comes back and checks: We need to show them a accept AND decline button. Here we are just loading the Accept Button since we are in the src attribute of the image
            {	
                //echo out decline button
                echo '<img id="sc_btn_go_decline" src=' . URL . '/public/img/4_1_sendchallengerequest/btn_decline.png />';
            }			
            ?>   
            </a>
        </div> 
	</div>
</div>
