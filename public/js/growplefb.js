function baseUrl() {
    // Root Url for domain name
    base = "http://www.growple.com/challenge/fb";
    return base;
}

/* main javascript file functions are called by their respective views - FHM */

//Overlay images + go button in different 1P/2P challenges when mouseover - FHM
function start(){

	$('#s_player1box').mouseover(function() {
	  	$('#s_player1').attr('src', baseUrl()+'/public/img/1_start/bg_player1hover.png');
	  	$('#s_btn_go_left').show();
	  	$('#s_btn_left_caption').show();
	});
	$('#s_player1box').mouseout(function() {
	  	$('#s_player1').attr('src', baseUrl()+'/public/img/1_start/player1.png');
	  	$('#s_btn_go_left').hide();
	  	$('#s_btn_left_caption').hide();
	});

	$("#s_player2box").mouseover(function(){
		$('#s_player2').attr('src', baseUrl()+'/public/img/1_start/bg_player2hover.png');
		$('#s_btn_go_right').show();
		$('#s_btn_right_caption').show();
	});
	$("#s_player2box").mouseout(function(){
		$('#s_player2').attr('src', baseUrl()+'/public/img/1_start/player2.png');
		$('#s_btn_go_right').hide();
		$('#s_btn_right_caption').hide();
	});
}

// making the buttons clickable - FHM
function pickchallenge()
{
	// show first cat on load
	$('.in').slideDown();

	// Fitness Button
	$('#pickch_btn_1').mouseover(function() {
		$('#pickch_btn_category1').attr('src', baseUrl()+'/public/img/2_pickchallenge/btn_category1.png');
	  	$('#pickch_btn_category1').show();
	  	$('.in_2').hide();
	  	$('.in_3').hide();
	  	$('.in_4').hide();
	  	$('.in').slideDown();
	});

	$('#pickch_btn_1').mouseout(function() {
		$('#pickch_btn_category1').attr('src', baseUrl()+'/public/img/2_pickchallenge/btn_category1_hover.png');
	  	$('#pickch_btn_category1').show();
	});
	//********************************************************************

	// // Games Button
	$('#pickch_btn_2').mouseover(function() {
		$('#pickch_btn_category2').attr('src', baseUrl()+'/public/img/2_pickchallenge/activity_button.png');
	  	$('#pickch_btn_category2').show();
	  	$('.in').hide();
	  	$('.in_3').hide();
	  	$('.in_4').hide();
	  	$('.in_2').slideDown();
	});

	$('#pickch_btn_2').mouseout(function() {
		$('#pickch_btn_category2').attr('src', baseUrl()+'/public/img/2_pickchallenge/activity_button_hover.png');
	  	$('#pickch_btn_category2').show();
	
	});
	//********************************************************************

	// // Random/Mystery Button
	$('#pickch_btn_3').mouseover(function() {
		$('#pickch_btn_category3').attr('src', baseUrl()+'/public/img/2_pickchallenge/btn_category3.png');
	  	$('#pickch_btn_category3').show();	  	
	  	$('.in').hide();
	  	$('.in_2').hide();
	  	$('.in_4').hide();
	  	$('.in_3').slideDown();
	});

	$('#pickch_btn_3').mouseout(function() {
		$('#pickch_btn_category3').attr('src', baseUrl()+'/public/img/2_pickchallenge/btn_category3_hover.png');
	  	$('#pickch_btn_category3').show();
	});


	$('#pickch_text').mouseover(function() {
		$('.in').hide();
		$('.in_2').hide();
	  	$('.in_3').hide(); 
		$('.in_4').slideDown();
	});

	$('#pickch_text').keydown(function() {

		document.getElementById('btn_go_green').style.visibility = "visible"; 
	});

	$('#btn_go_green').live('click', function() {

		var result = $('#pickch_text').serialize();
		var challenge = result.substring(17);
		$('#pickch_searchbar a').attr('href', baseUrl() + '/pickchallenge/setname/' + challenge);
	});
}

function create_challenge(){

	document.getElementById('pickch_text').value = "";
	$('.in').hide();
	$('.in_2').hide();
  	$('.in_3').hide(); 
}

function pickfriend()
{
	
}

function sendchallenge(){

 $('#send_button').mouseover(function () {
	$('#notify_message').fadeIn(250);
 });
 
  $('#send_button').mouseout(function () {
	$('#notify_message').hide();
 });

	$('#sc_btn_go_send').click(function(){

		if($('#sc_send').css('display') != 'none' || $('#sc_link').css('display') != 'none')
		{
			$('#sc_send').hide();		
			$('#send_challenge_href').attr('href', baseUrl() + '/sendchallenge/save/' + time_value);	
			$('#s_btn_go_set').hide();

		}
	});

	// gets time value when select changes and appends to URL - FHM
	$('#time_select').change(function(){
		time_value = $('#time_select').val();  
		//$('#sc_link').hide();
		$('#time_message').fadeIn(750);	
		
		
	});

}

function gettingstarted(){

	$('#gs_step1_icon').mouseover(function() {
	  	$('#gs_tip1').attr('src', baseUrl()+'/public/img/5_gettingstarted/btn_hover1.png');
	  	$('#gs_tip1_like').show();
	});

	$('#gs_step1_icon').mouseout(function() {
	  $('#gs_tip1').attr('src', baseUrl()+'/public/img/5_gettingstarted/btn_1.png');	
	  $('#gs_tip1_like').hide();
	});


	$('#gs_step2_icon').mouseover(function() {
	  	$('#gs_tip2').attr('src', baseUrl()+'/public/img/5_gettingstarted/btn_hover2.png');
	  	$('#gs_tip2_like').show();
	});

	$('#gs_step2_icon').mouseout(function() {
	  $('#gs_tip2').attr('src', baseUrl()+'/public/img/5_gettingstarted/btn_2.png');	
	  $('#gs_tip2_like').hide();
	});

	$('#gs_step3_icon').mouseover(function() {
	  	$('#gs_tip3').attr('src', baseUrl()+'/public/img/5_gettingstarted/btn_hover3.png');
	  	$('#gs_tip3_like').show();
	});

	$('#gs_step3_icon').mouseout(function() {
	  $('#gs_tip3').attr('src', baseUrl()+'/public/img/5_gettingstarted/btn_3.png');	
	  $('#gs_tip3_like').hide();
	});
}

function challenge() {

	$('#btn_cheerleft').mouseover(function() {
		$('#foot_note').fadeIn(250);
	});
	
	$('#btn_cheerleft').mouseout(function() {
		$('#foot_note').hide();
	});
	
	$('#btn_cheerleft').mousedown(function() {

		$('#btn_cheerleft').attr('src', baseUrl()+'/public/img/6_challengepage/btn_cheeronclick_player1.png');
	});
	$('#btn_cheerleft').mouseup(function() {

		$('#btn_cheerleft').attr('src', baseUrl()+'/public/img/6_challengepage/btn_cheerleft.png');
	});

	$('#btn_cheerright').mousedown(function() {

		$('#btn_cheerright').attr('src', baseUrl()+'/public/img/6_challengepage/btn_cheeronclick_player2.png');
	});

	$('#btn_cheerright').mouseup(function() {

		$('#btn_cheerright').attr('src', baseUrl()+'/public/img/6_challengepage/btn_cheerright.png');
	});

	$('#btn_cheerright').mouseup(function() {

		$('#btn_cheerright').attr('src', baseUrl()+'/public/img/6_challengepage/btn_cheerright.png');
	});

}

function result() {

	/* Single Player */
	/* Win */
	$('#r_win_select').mouseover(function() {
	  	$('#r_win_select').attr('src', baseUrl()+'/public/img/7_result/btn_win_on.png');
	  	$('#r_win_select').show();
		
	  	$('#l_win_tag').show();
	  	$('#l_lose_tag').hide();
	});
	$('#r_win_select').mouseout(function() {
	  	$('#r_win_select').attr('src', baseUrl()+'/public/img/7_result/btn_win_off.png');	// needs to be changed to the off button
	  	$('#r_win_select').show();
		
	  	$('.outcome_tag').hide();
	});
	
	/* Lose */
	$('#r_lose_select').mouseover(function() {
	  	$('#r_lose_select').attr('src', baseUrl()+'/public/img/7_result/btn_lose_on.png');
	  	$('#r_lose_select').show();
		
	  	$('#l_win_tag').hide();
	  	$('#l_lose_tag').show();
	});
	$('#r_lose_select').mouseout(function() {
	  	$('#r_lose_select').attr('src', baseUrl()+'/public/img/7_result/btn_sad_off.png');	// needs to be changed to the off button
	  	$('#r_lose_select').show();
		
	  	$('.outcome_tag').hide();
	});


	/* Left Button */
	$('#r_left_select').mouseover(function() {
	  	$('#r_left_select').attr('src', baseUrl()+'/public/img/7_result/btn_leftwinner_on.png');
	  	$('#r_left_select').show();
	  	$('#r_winner_tag').hide();
	  	$('#l_winner_tag').show();
	});
	$('#r_left_select').mouseout(function() {
	  	$('#r_left_select').attr('src', baseUrl()+'/public/img/7_result/btn_leftwinner_off.png');
	  	$('#r_left_select').show();
	  	$('.winner_tag').hide();
	});

	/* Right Button */
	$('#r_right_select').mouseover(function() {
	  	$('#r_right_select').attr('src', baseUrl()+'/public/img/7_result/btn_rightwinner_on.png');
	  	$('#r_right_select').show();
	  	$('#l_winner_tag').hide();
	  	$('#r_winner_tag').show();
	});
	$('#r_right_select').mouseout(function() {
	  	$('#r_right_select').attr('src', baseUrl()+'/public/img/7_result/btn_rightwinner_off.png');
	  	$('#r_right_select').show();
	  	$('.winner_tag').hide();
	});

	/* Draw */
	$('#r_draw').mouseover(function() {
	  	$('#r_draw').attr('src', baseUrl()+'/public/img/7_result/btn_draw_on.png');
	  	$('#r_draw').show();
	  	$('#l_winner_tag').show();
	  	$('#r_winner_tag').show();
	});
	$('#r_draw').mouseout(function() {
	  	$('#r_draw').attr('src', baseUrl()+'/public/img/7_result/btn_draw_off.png');
	  	$('#r_draw').show();
	  	$('#l_winner_tag').hide();
	  	$('#r_winner_tag').hide();
	});
}

function finish() {

}
