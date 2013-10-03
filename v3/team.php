<?php

$url = 'https://docs.google.com/spreadsheet/pub?key=0Ag8n0yHMUHF-dDJPS1RuLUdYUlc1WFYwMUlRaGJ0X0E&single=true&gid=0&output=csv';

if (!($handle = fopen($url, "r")))
  return ;
$users = array();
while ($a = fgetcsv($handle, 1000, ","))
  if ($a[0] !== '_' && $a[0] !== 'Nickname')
    $users[] = $a;
fclose($handle);

?>

<?php makeGrid(1, $users); ?>

<?php
function printUser($user, $counter) {
?>

  <div class="row-fluid" style="<?php echo ($counter % 2 != 0 ? 'margin-left:30%;' : 'margin-right:20%;' ) ?>" >
    <?php if ($counter % 2 == 0) {?>
    <div class="col-md-4">
      <img id="round" src="http://gravatar.com/avatar/<?php echo md5($user[6]) ?>?d=mm&s=200">
    </div>
	<?php } ?>
    <div class="col-md-8">
      <h3 style=""><?php echo $user[1]; ?> <?php echo $user[2]; ?> (<?php echo $user[0]; ?>)</h3>
      <h5><url><?php
$jobs = str_getcsv($user[3], ',');
foreach ($jobs as $job) {
  ?><li><?php echo $job ?></li><?php
} ?></url></h5>
      <p>From <?php echo $user[5]; ?>, <?php echo $user[4]; ?>
<?php if (!empty($user[10])) { ?>
      <br /><span class="btnlife" id="clickable" onclick="document.location.href='<?php echo $user[10]; ?>';" >Website</span>
<?php } ?>
<?php if (!empty($user[14])) { if (empty($user[10])) { ?><br /><?php }?> 
      <span class="btnlife" id="clickable" onclick="document.location.href='<?php echo $user[14]; ?>';" >Resume</span>
<?php } ?></p>
    </div>
	<?php if ($counter % 2 != 0) {?>
    <div class="col-md-4">
      <img id="round" src="http://gravatar.com/avatar/<?php echo md5($user[6]) ?>?d=mm&s=200">
    </div>
	<?php } ?>
  </div>
  <br /><br /><br />
<?php
  if (isset($_GET['more'])) {
?>
   <div class="well"><ul>
     <li><strong>Email:</strong> <?php echo $user[6]; ?></li>
     <li><strong>Alternative Email:</strong> <?php echo $user[7]; ?></li>
     <li><strong>Phone:</strong> <?php echo $user[8]; ?></li>
     <li><strong>Alternative Phone:</strong> <?php echo $user[9]; ?></li>
     <li><strong>Google+:</strong> <a href="<?php echo $user[11]; ?>">Link</a></li>
   </ul></div>
<?php }
}

function makeGrid($per_line, $elements) {
  $row_nb = 0;
?>

  <div class="row-fluid row<?php echo $row_nb ?>">
     <?php $i = 1;
	 $counter = 0;
  foreach ($elements as $e) { 
	?>
	<div class="users" >
		<div class="col-md-<?php echo 12 / $per_line ?>">
			<?php printUser($e, $counter); ?>
		</div> <!-- span -->
	</div> <!-- users -->
      <?php if ($i == $per_line) { $row_nb++; ?>
  </div> <!-- row -->
  <div class="row-fluid row<?php echo $row_nb ?>">
  <?php $i = 0;
    }
    $i++;
	$counter += 1;
  } ?>
  </div> <!-- row -->
<?php
}
