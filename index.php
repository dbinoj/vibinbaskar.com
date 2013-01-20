<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Vibin Baskar</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="./css/sc-player-artwork.css" rel="stylesheet" type="text/css">
<meta name="Buy me coffee" href="http://goo.gl/9IRII" />
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.history.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
</head>
<body id="top">
<header>
   <div class="small_container">
      <!--start menu-->
      <nav>
      <ul>
      <li><a href="#contact" id="ajax_nav" rel=ajax >Contact</a></li>
      <!--<li><a href="#blog" id="ajax_nav" rel=ajax >Blog</a></li>-->
      <li><a href="#videos" id="ajax_nav" rel=ajax >Videos</a></li>
      <li><a href="#music" id="ajax_nav" rel=ajax >Music</a></li>
      <li><a href="#biography" id="ajax_nav" rel=ajax >Biography</a></li>
	  <li><a href="#home" id="ajax_nav" rel=ajax >Home</a></li>
      </ul>
      </nav>
   </div>
   <div class="bottom"> </div>
   <!--end menu-->
   <!--end header-->
</header>
<div id="container">
      <div id="ajax_loading"></div>
	  <div id="ajax_content"></div>
</div>
<footer>

<div class="small_container">
<br/><br/><br/><center><h5>
<?php 
function getTwitterStatus($userid){
$url = "https://api.twitter.com/1/statuses/user_timeline/$userid.xml?count=1&include_rts=0";

$xml = simplexml_load_file($url) or die("could not connect");

       foreach($xml->status as $status){
       $text = $status->text;
       }
       echo "<a href='//twitter.com/vibinbaskar'>@vibinbaskar</a>: " . $text;
 }

getTwitterStatus("vibinbaskar");
?></h5></center>
<br/><br/>     <p style="text-align:right;">&copy; 2013 Vibin Baskar </p> <br/><br/>
</div>
</footer>
<script type="text/javascript">
$(document).ready(function () {
	getPage();
	$.history.init(pageload);	
	$('a[href=' + document.location.hash + ']').addClass('selected');
	$('a[rel=ajax]').click(function () {
		var hash = this.href;
		hash = hash.replace(/^.*#/, '');
	 	$.history.load(hash);	
	 	$('a[rel=ajax]').removeClass('selected');
	 	$(this).addClass('selected');
	 	$('#ajax_content').hide();
	 	$('#ajax_loading').show();
		getPage();
		return false;
	});	
});
	

function pageload(hash) {
	if (hash) getPage();    
}
		
function getPage() {
	if (document.location.hash=='') var data = 'page=' + encodeURIComponent('#home');
	else var data = 'page=' + encodeURIComponent(document.location.hash);
	
	
	$.ajax({
		url: "includes/page.php",	
		type: "POST",		
		data: data,		
		cache: false,
		success: function (html) {	
			$('#ajax_loading').hide();	
			$('#ajax_content').html(html);
			$('#ajax_content').fadeIn(1000);		
		}		
	});
}
	</script>
	<script type="text/javascript" src="http://stratus.sc/stratus.js"></script>
	<script type="text/javascript">
  $(document).ready(function(){
    $.stratus({
      links: 'https://soundcloud.com/vibinbaskar',
	  theme: 'http://stratus.sc/themes/dark.css',
	  download: false,
	  auto_play: false
    });
  });
</script>
<script src="js/jquery.mousewheel.min.js"></script>
</body>
</html>