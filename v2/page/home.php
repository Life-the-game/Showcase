<div id="home">

<?php
if (isset($_POST['email'])) {
  $file = fopen('ZnGH9lnU_emails', 'a+');
  fputs($file, @date("F j, Y, g:i a").' '.$_SERVER['REMOTE_ADDR'].' '.$_POST['email']."\n");
  fclose($file); ?>
    <div class="alert alert-success"><?= $text['confirm_email'][$l] ?></div>
<?php } ?>

  <h2><?php echo $text['50m'][$l] ; ?></h2>
  <!--<p class="desc pull-right">
	 <a class="btn btn-primary btn-large">
	   <?php echo $text['details'][$l] ; ?>
	 </a>
  </p>-->
  
  <hr />
  
  <div style="display:block; background-color:#FF0000; margin-bottom:100px;">
    <span class="span4">
      <img src="img/star.png" alt="Game points">
      <h2><?php echo $text['head1'][$l] ; ?></h2>
      <p><?php echo $text['content1'][$l] ; ?></p>
      <!-- <p><a class="btn" href="#"><?php echo $text['details'][$l] ; ?></a></p> -->
    </span><!-- .span -->
    <span class="span4">
      <img src="img/badge_s.png" alt="Badge">
      <h2><?php echo $text['head2'][$l] ; ?></h2>
      <p><?php echo $text['content2'][$l] ; ?></p>
      <!-- <p><a class="btn" href="#"><?php echo $text['details'][$l] ; ?></a></p> -->
    </span><!-- .span -->
    <span class="span4">
      <img src="img/share_s.png" alt="Share social network">
      <h2><?php echo $text['head3'][$l] ; ?></h2>
      <p><?php echo $text['content3'][$l] ; ?></p>
      <!-- <p><a class="btn" href="#"><?php echo $text['details'][$l] ; ?></a></p> -->
    </span><!-- .span -->
  </div>
  
  <div class="bottomp">
  <hr /><br />
  
  <h3><?php echo $text['participate_title'][$l] ; ?></h3>
  <p><?php echo $text['participate'][$l] ; ?></p>
  <br>
  <form class="input-append" method="post" action="http://je.peux.pas.venir.ce.week.end.jai.poney.me/eipmail.php">
    <input type="hidden" name="l" value="<?php echo $l ; ?>">
    <input class="span3 inputlo" id="appendedInputButton" type="email" name="email">
    <input class="btn" type="submit" value="Go!">
  </form> <!-- .input-append -->
  </div>
</div> <!-- home -->
