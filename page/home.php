<div id="home">

<?php
if (isset($_POST['email'])) {
  $file = fopen('ZnGH9lnU_emails', 'a+');
  fputs($file, @date("F j, Y, g:i a").' '.$_SERVER['REMOTE_ADDR'].' '.$_POST['email']."\n");
  fclose($file); ?>
    <div class="alert alert-success"><?= $text['confirm_email'][$l] ?></div>
<? }
?>

  <h2><?= $text['50m'][$l] ?></h2>
  <!--<p class="desc pull-right">
	 <a class="btn btn-primary btn-large">
	   <?= $text['details'][$l] ?>
	 </a>
  </p>-->
  
  <hr>
  
  <div class="row-fluid">
    <div class="span4">
      <img src="img/star.png" alt="Game points">
      <h2><?= $text['head1'][$l] ?></h2>
      <p><?= $text['content1'][$l] ?></p>
      <!-- <p><a class="btn" href="#"><?= $text['details'][$l] ?></a></p> -->
    </div><!-- .span -->
    <div class="span4">
      <img src="img/badge_s.png" alt="Badge">
      <h2><?= $text['head2'][$l] ?></h2>
      <p><?= $text['content2'][$l] ?></p>
      <!-- <p><a class="btn" href="#"><?= $text['details'][$l] ?></a></p> -->
    </div><!-- .span -->
    <div class="span4">
      <img src="img/share_s.png" alt="Share social network">
      <h2><?= $text['head3'][$l] ?></h2>
      <p><?= $text['content3'][$l] ?></p>
      <!-- <p><a class="btn" href="#"><?= $text['details'][$l] ?></a></p> -->
    </div><!-- .span -->
  </div><!-- .row-fluid -->
  
  <hr>
  
  <h3><?= $text['participate_title'][$l] ?></h3>
  <p><?= $text['participate'][$l] ?></p>
  <br>
  <form class="input-append" method="post" action="http://je.peux.pas.venir.ce.week.end.jai.poney.me/eipmail.php">
    <input type="hidden" name="l" value="<?= $l ?>">
    <input class="span3 inputlo" id="appendedInputButton" type="email" name="email">
    <input class="btn" type="submit" value="Go!">
  </form> <!-- .input-append -->

</div> <!-- home -->
