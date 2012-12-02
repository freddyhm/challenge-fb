
<script>
$(document).ready(function() {
 	pickchallenge();

});

$(window).unload(function(){
	
});

</script>
<div id="game_view">
	<div id='pc_container'>
		<div id="pc_categories">
			<table>
				<tr>
					<td colspan="3">
					</td>
					<td></td>
					<td >
	
					</td>
				</tr>
				<tr>
					<td id="pickch_btn_1">
						<img id="pickch_btn_category1" src= "<?php echo URL . '/public/img/2_pickchallenge/btn_category1_hover.png' ?>" />
					</td>
					<td id="pickch_btn_2">
						<img id="pickch_btn_category2" src= "<?php echo URL . '/public/img/2_pickchallenge/activity_button_hover.png' ?>" />
					</td>
					<td id="pickch_btn_3">
						<img id="pickch_btn_category3" src= "<?php echo URL . '/public/img/2_pickchallenge/btn_category3_hover.png' ?>" />
					</td>
					<td style="width: 8px; padding:0 0 8px 12px; font-size:19px; color:white">
						or
					</td>
					<td id="pickch_searchbar">
                    	
						<input type="text" name="pickch_searchbar" id="pickch_text" placeholder="e.g: go for a run!" onfocus='create_challenge()'; maxlength="50"/>
                        
						<a href="javascript:void(0)"><img id="btn_go_green" src="<?php echo URL . '/public/img/2_pickchallenge/btn_go_green.png' ?>" /></a>
                        <div style="font-size:10px; color:#ffffff; margin:17px 0 0 38px;">max length: 50 char</div>
					</td>                    
				</tr>
			</table>
			<div id="pc_category_list" class="slide">
				<img id="inner" class="in" src= "<?php echo URL . '/public/img/2_pickchallenge/categorymenu/tooltip1.png' ?>" />
					<div id="inner_challenges" class="in">
						<?php
							foreach ($categories as $subarray){
								if( $subarray['challengecategory_id']==1) {
								 	//echo $subarray['name'];
								 	echo '<a href=' . URL . '/pickchallenge/setname/'.$subarray['id'].' style="text-decoration:none;"><div id="challenge_item" class="in">'.$subarray['name'].'</div></a>';								 	
								}
							}
						?>					
					</div>
				<img id="inner_2" class="in_2" src= "<?php echo URL . '/public/img/2_pickchallenge/categorymenu/tooltip2.png' ?>" />
					<div id="inner_2_challenges" class="in_2">
						<?php
							foreach ($categories as $subarray){
								if( $subarray['challengecategory_id']==2) {
								 	//echo $subarray['name'];
								 	echo '<a href=' . URL . '/pickchallenge/setname/'.$subarray['id'].' style="text-decoration:none;"><div id="challenge_item_21" class="in_2">'.$subarray['name'].'</div></a>';								 	
								}
							}
						?>	
					</div>
				<img id="inner_3" class="in_3" src= "<?php echo URL . '/public/img/2_pickchallenge/categorymenu/tooltip3.png' ?>" />
					<div id="inner_3_challenges" class="in_3">
						<?php
							foreach ($categories as $subarray){
								if( $subarray['challengecategory_id']==3) {
								 	//echo $subarray['name'];
								 	echo '<a href=' . URL . '/pickchallenge/setname/'.$subarray['id'].' style="text-decoration:none;"><div id="challenge_item_31" class="in_3" >'.$subarray['name'].'</div></a>';								 	
								}
							}
						?>	
					</div>
				<img id="inner_4" class="in_4" src= "<?php echo URL . '/public/img/2_pickchallenge/categorymenu/tooltip_create.png' ?>" />
                <div id="inner_4_challenges" class="in_4">
                    <div id="challenge_item_41" class="in_4" >Challenge a friend to 'A game of baseketball'</div>
                    <div id="challenge_item_41" class="in_4" >Challenge your arche enemy to 'A game of poker'</div>
                    <div id="challenge_item_41" class="in_4" >Try challenging yourself to 'Spend less than $5 on my next meal'</div>
                </div>
			</div>
		</div>
		<a href="javascript:history.go(-1)">
			<img id="go_back_img" src="<?php echo URL . '/public/img/2_pickchallenge/btn_back.png' ?>"/>
		</a>
	</div>
</div>