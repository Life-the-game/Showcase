
<?php

	include_once("infos.php");
	$homepage = ".";
	
?>

<!DOCTYPE html>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script> -->

<script src="libs/jquery.js" ></script>
<script src="libs/bootstrap.js" ></script>

<script>
	
	var clickable = true;
	var sentmail = false;
	
	function validateEmail(email)
	{ 
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	
	function checkmail()
	{
		if (validateEmail(document.getElementById("roundbox").value))
			document.getElementById("roundbox").style.color = '#26b671';
		else
			document.getElementById("roundbox").style.color = '#FF0000';
	}
	
	jQuery(document).ready(function()
	{
		var rmvbotform = function (text)
		{
			$("#botdiv").animate({"bottom":"-=10px"}, 500);
			$("#betabox").animate({"opacity":"-=1"}, 500);
			
			$("#betaform").animate({"opacity":"-=1"}, 600, function()
			{
				document.getElementById("betaform").innerHTML = text;
				$("#betaform").animate({"opacity":"+=1"}, 500);
				document.getElementById("betabox").style.display = "none";
				document.getElementById("roundbox").value = "";
			});
		}
		
		$("#stripe1").animate({"width":"+=320px"}, 1000, function()
		{
			$("#stripe2").animate({"width":"+=100%"}, 3500, function()
			{
				$("#betaform").animate({"opacity":"+=1"}, 2000);
			});
		});
		
		$("#betaform").click(function()
		{
			if (!sentmail)
			{
				if (clickable)
				{
					$("#betaform").animate({"opacity":"-=1"}, 600, function()
					{
						$("#botdiv").animate({"bottom":"+=10px"}, 500);
						document.getElementById("betabox").style.display = "block";
						document.getElementById("betaform").innerHTML = "Write down your email :";
						$("#betaform").animate({"opacity":"+=1"}, 500);
						$("#betabox").animate({"opacity":"+=1"}, 500);
					});
				}
				else
					rmvbotform("Want to become a beta-tester ?");

				clickable = !clickable;
			}
		});
		
		$("#startplaying").click(function()
		{
			if (validateEmail(document.getElementById("roundbox").value))
			{
				jQuery.post("sendbetamail.php",
				{
					mail:document.getElementById("roundbox").value
				},
				function(data, status)
				{
					if (status = "success")
						rmvbotform("You now are a beta-tester ! Thanks for your support !");
					else
						rmvbotform("Something is not working well, please try again later !");

					sentmail = true;
				});
			}
		});
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

	<div class="corner" id="stripe3">
	</div>
	
	<div class="corner" id="topleft" >
		<div class="row-fluid"><div class="md-col-6">
		<img src='imgs/fb.png' id="clickable" onclick="window.open(
       'https://www.facebook.com/lifeplaythegame', '_blank');"/></div>
		<div class="md-col-6"><img src='imgs/tt.png' id="clickable" onclick="window.open(
       'https://twitter.com/lifeplaythegame', '_blank');"/></div></div>
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
	
	<div class="corner" id="botdiv" <?php echo(isset($_GET["team"])?'style="display:none;"':'') ?> >
		<span class="btnlife" id="betaform" >Want to play the game?</span>
		<span style="display:none; opacity:0;" id="betabox" >
		<input type='text' id='roundbox' size=15 name="mail" onkeyup='checkmail()' />
		<br/><span class='btnlife' id='startplaying' >Join us!</span> </span>
	</div>
	
	<span class="corner" id="stripe1">
	</span>
	
	<span class="corner" id="stripe2">
	</span>
	
	
	</body>
</html>