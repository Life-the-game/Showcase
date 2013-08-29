<?php

session_start();
header('Content-Type: text/html; charset=UTF-8');
include_once('lang.inc');
$l = 'en';
if (isset($_SESSION['lang']))
  $l = $_SESSION['lang'];
if (empty($_GET))
  $_GET['home'] = true;

function	getpage() {
  $pages = array('home', 'test', 'team', 'lang_en', 'lang_fr', 'eip', 'blog');
  foreach ($pages as $page)
    if (isset($_GET[$page]))
      return $page;
  return 'error';
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>

<script>

	jQuery(document).ready(function()
	{
		$(".corner").hover(function(){
			$(this).animate({"height":"+=20px", "width":"+=20px"}, "fast");},
			function(){$(this).animate({"height":"-=20px","width":"-=20px"},"fast");
		});
		
	});

</script>

<html>
	<head>
		<title><?php echo $text['title'][$l]; ?></title>
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>
		<header>
			<img id="clickable" onclick="document.location.href='?home';" src="img/logo.svg" alt="<?= $text['title'][$l] ?>">
		</header>
		<div id="core">
		
		
			<div id="page">
			  <?php (getpage() == 'home' ? include_once('page/'.getpage().'.php') : "<h1> troll</h1>"); ?>
			</div>	

			<footer style='display:none;'>
			  2013 &copy; By <a href="http://life.paysdu42.fr/">Life's Team</a>
			</footer>
			
			<span class='corner' id='topleft' style='cursor:pointer' onclick="document.location.href='?team'">
				Team
			</span>
			
			<span class='corner' id='topright' style='cursor:pointer' onclick="document.location.href='?blog'">
				Blog
			</span>
			
			<span class='corner' id='botleft' style='cursor:pointer' onclick="document.location.href='https://github.com/Life-The-Game/'">
				Github
			</span>
			
			<span class='corner' id='botright'  style='cursor:pointer' onclick="document.location.href='?lang_<?php echo($l == 'en' ? 'fr' : 'en'); ?>'">
				<?php echo($l == 'en' ? 'FR' : 'EN'); ?>
			</span>
			
			<div id="page">
			  <?php include_once('page/'.getpage().'.php') ?>
			</div>	
			
		</div>
	</body>
</html>