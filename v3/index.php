
<?php

	include_once("content.php");
	$homepage = "/showcaseNew";
?>

<!DOCTYPE html>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script> -->

<script src="libs/jquery.js" ></script>
<script src="libs/bootstrap.js" ></script>

<script>
	
	jQuery(document).ready(function()
	{
		
	});
	
</script>

<?php

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 5.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
	<head> 
		<title>Life. Showcase website</title>
		
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<meta name="description" content="Life - The game showcase website" />
		<meta name="keywords" content="life the game showcase website JW" />
		<meta name="author" content="JW" />
		<meta name="category" content="Website" />
		<meta http-equiv="Content-Language" content="en-US" />
		
		<link rel="stylesheet" type="text/css" title="style" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" title="style" href="css/fonts.css" />
		<link rel="stylesheet" type="text/css" title="style" href="css/style.css" />

	</head>
	
	<body>
	
	<div id="core">
		<?php if (isset($_GET["team"]))include_once("team.php"); else include_once("indexcontent.php"); ?>
	</div>

	<div class="corner" id="topleft" >
		<img src='imgs/fb.png' id="clickable" onclick="window.open(
       'https://www.facebook.com/lifeplaythegame', '_blank');"/>
		<img src='imgs/tt.png' id="clickable" onclick="window.open(
       'https://twitter.com/lifeplaythegame', '_blank');"/>
	</div>
	
	<div class="corner" id="topright" >
		<span id="clickable" onclick="window.location.href = '<?php echo $homepage; ?>/?team';">Team</span>
	</div>
	
	<div class="corner" id="botleft" >
		
		<span id="clickable" onclick="window.location.href = '<?php echo $homepage; ?>/';">Life<img height=167 width=133 src='imgs/badge.png'/></span>
	</div>
	
	<div class="corner" id="botright" >
		the game
	</div>
	
	</body>
</html>