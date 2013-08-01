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
<html>
  <head>
    <title><?php echo $text['title'][$l]; ?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
  </head>
  <body>
    <div id="wrapper">
      <header>
	<img src="img/logo.png" alt="<?= $text['title'][$l] ?>9">
      </header>
      <div id="main">
	<nav class="navbar">
	  <div class="navbar-inner">
	    <ul class="nav">
	      <?php foreach ($text['menu'] as $section_data) { ?>
	      <?php if (isset($section_data['title'])) { ?><li class="nav-header"> <?= $section_data['title'][$l] ?></li><?php } ?>
	      <?php if (isset($section_data['dropdown'])) { ?>
	      <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <?php if (isset($section_data['dropdown']['icon'])) { ?><i class="icon-<?= $section_data['dropdown']['icon'] ?>"></i><?php } ?>
		  <?= $section_data['dropdown'][$l] ?><b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <?php } ?>
		  <?php foreach ($section_data['section'] as $key => $value) { ?>
		  <li<?php if (isset($_GET[$key])) { ?> class="active"<?php } ?>>
		    <a href="<?php if (isset($value['link'])) { ?><?= $value['link'] ?><?php } else { ?><?= $value['link_'.$l] ?><?php } ?>">
		      <?php if (isset($value['icon'])) { ?><i class="icon-<?= $value['icon'] ?>"></i><?php } ?>
		      <?= $value[$l] ?>
		    </a>
		  </li>
		  <?php } ?>
		  <?php } ?>
		  <?php if (isset($section_data['dropdown'])) { ?>
		</ul>
              </li>
	      <?php } ?>
	    </ul> <!-- .nav -->
	  </div> <!-- .navbar-inner -->
	</nav> <!-- .navbar -->

	<div id="page">
	  <?php include_once('page/'.getpage().'.php') ?>
	</div> <!-- page -->

	<hr>

	<footer>
	  2013 &copy; By <a href="http://db0.fr/">db0</a>
	</footer>
      </div> <!-- main -->
    </div> <!-- wrapper -->
    
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>


  </body>
</html>

