<?php
	require_once 'config/paths.php';
	?>
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
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.widget.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.position.js' ?>"></script>
	<script type='text/javascript' src= "<?php echo URL . '/public/js/jquery.ui.autocomplete.js' ?>"></script>
</head>
<script>
$(function() {

	var friend_list = new Array();
	var selected_friends = new Array();
	
	 // get user's friend list 
	 $.getJSON('<?php echo URL ?>/pickfriend/show/d/friend', function(data) {

	 	  $("#ajax_loader").hide();

		  $.each(data[0].fql_result_set, function(index, value) 
		  { 		
		  		friend_list.push({'label':value.pic_square, 'value':{0:value.name, 1:value.uid}, 'type': 'checkbox'});
		  		
		  });
		  // autoload with space so all friends are loaded right away! - FHM
		  $( "#pf_text_search_box" ).autocomplete( "search" , ' ' );
		  $(".ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all").css("display", "none");
	});



  
	//  position autocomplete menu box - FHM
	$( "#pf_text_search_box" ).autocomplete({ position: {
		my: "right top",
	    at: "left bottom",
	    offset: "430 40"
	 } });

	// set source for autocomplete - FHM
	$( "#pf_text_search_box" ).autocomplete({
		source: friend_list
	});

	// place menu inside friend's list div - FHM
	$( "#pf_text_search_box" ).autocomplete({ appendTo: "#pf_friends_list" });


	// checks to see how many friens have been selected, and then sends notices - FHM
	$("#pf_btn_go").click(function(){

		if(selected_friends.length == 0 )
		{
			alert('You forgot to select a friend  :-D');
		}
		else if(selected_friends.length > 10)
		{
			alert('You can only invite a maximum of 10 friends at once');
		}
		else
		{
			sendNotice(selected_friends);
		}
	});

	// adds selected friends to array - FHM
	$(".friend").live("click", function(){
  		
  		if($(this).is(':checked') == true)
  		{
  			selected_friends.push($(this).val());
  		}  		
  		else if($(this).is(':checked') == false)
  		{
  			var index = $.inArray($(this).val(), selected_friends);
  			if(index != -1)
  			{
  				selected_friends.splice(index, 1);
  			}
  		}		
	});
});

</script>
<div id="game_view">
	<div id = "pf_container_invite">
		<div id="pf_text_search">
		<input type="text" name="pf_search_box" placeholder="e.g. Shaquille O'Neal" id="pf_text_search_box" />
		</div>
		<div id="pf_friends_list">
			<img id='ajax_loader' style='margin:125px 0px 0px 300px;' src= "<?php echo URL . '/public/img/6_challengepage/ajax-loader.gif' ?>"/>
		</div>
		<div id="pf_btn_go">
			<a href="javascript:void(0)">
				<img id="s_btn_go_set" style="margin-top:51px;" src= "<?php echo URL . '/public/img/3_pickfriend/btn_go.png' ?>" />
			</a>
		</div>
	</div>
</div>
<script>
function sendNotice(friends)
{
	var x;
	var result = 'first';

	$.post('<?php URL ?>/start/sharecount/d/' + friends.length + '/' + <?php echo $_GET['uid']; ?>);
	
	<?php 
		$path = "";
		$msg = "";

		if(isset($_GET['id']))
		{
			$path  = URL . '/viewchallenge/show/'  . $_GET['id'];
			$msg = "Hey check out my '" . $_GET['ch'] . "' challenge on Growple! and cheer me on.";
			$name = "My awesome Growple! challenge";
		}
		else
		{
			$path  = URL . '/start/in/invite/';
			$msg = "Hey have you checked this out yet? It's an app that lets you challenge your friends to anything.";
			$name = "What's your challenge?";
		}
	?>

	for(x in friends)
	{

      FB.api(
        '/' + friends[x] + '/feed',
        'post',
        { 
		   message: "<?php echo $msg ?>",
		   name: "<?php echo $name; ?>",
		   description: (
		      'Growple! is a fun app that lets you challenge yourself and your friends to anything and everything! Start your own challenge today!'
		   ),
		   link: "<?php echo $path; ?>",
		   picture: '<?php echo URL; ?>/public/img/wallpost.png'
		},
        function(response) {

        	console.log(response);

           if (!response || response.error) {

           	if(result != 'in error')
         	{
           		alert("Oh Snap! Error: '" + response.error.toSource() + "' has occured. Help us fix it by texting 226-791-2634 or hello@growple.com");
        		result = 'in error';
        	}
           } else {
         	  if(result != 'in success')
         	  {
         	  	alert("Awesome! Your invites have been sent out. Thanks for spreading the word!");	
         	  	result = 'in success' 	
         	  }
           }
        });
     }
}

 </script>
 </head>
<body>
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '', // Insert App ID
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });
    };

    // Load the SDK Asynchronously
    (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = "//connect.facebook.net/en_US/all.js";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
  </script>