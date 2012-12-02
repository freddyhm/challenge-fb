<!-- 
Author: Ashish Bidadi
 -->
 <?php 
// rearrange data to fit jquery autocomplete function - FHM

$friend_name = array();
$friend_info = array();

foreach($friends[0]['fql_result_set'] as $friend)
{
	 $friend_data['label'] =  $friend['pic_square'];
	 $friend_data['value'] =  array($friend['name'], $friend['uid']);
	 $friend_info[] = $friend_data;
}

$friend_list = json_encode($friend_info);

 ?>
<script>

$(document).ready(function() {
 	pickfriend();

 	
});

$(window).unload(function(){
	
});


$(function() {

	// make sure all radio buttons fire event now and in the future (dynamic)
	// add id to end of URL - FHM
	 $("input:radio").live("click", function() { 
	 	var id = $('input:radio[name=friend]:checked').val();
	 	$("#pf_btn_go a").attr('href', baseUrl() + '/sendchallenge/show/' + id);
	})

	//  position autocomplete menu box - FHM
	$( "#pf_text_search_box" ).autocomplete({ position: {
		my: "right top",
	    at: "left bottom",
	    offset: "430 40"
	 } });

	// set source for autocomplete - FHM
	$( "#pf_text_search_box" ).autocomplete({
		source: <?php echo $friend_list; ?>
	});

	// place menu inside friend's list div - FHM
	$( "#pf_text_search_box" ).autocomplete({ appendTo: "#pf_friends_list" });

	// autoload with space so all friends are loaded right away! - FHM
	$( "#pf_text_search_box" ).autocomplete( "search" , ' ' ); 

});

</script>
<div id="game_view">
	<div id = "pf_container">
		<div id="pf_text_search">
		<input type="text" name="pf_search_box" placeholder="e.g. Shaquille O'Neal" id="pf_text_search_box" />
		</div>
		<div id="pf_friends_list">
		</div>
		<a href="javascript:history.go(-1)">
			<img id="go_back_img_pf" src="<?php echo URL . '/public/img/2_pickchallenge/btn_back.png' ?>"/>
		</a>
		<div id="pf_btn_go">
			<a href="javascript:void(0)">
				<img id="s_btn_go_set" src= "<?php echo URL . '/public/img/3_pickfriend/btn_go.png' ?>" />
			</a>
		</div>
	</div>
</div>
