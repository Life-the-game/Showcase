<?php
if (isset($_GET['more'])) { ?>
<html>
  <head>
    <title><?php echo $text['title'][$l]; ?></title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
  </head>
<?php
}

$url = 'https://docs.google.com/spreadsheet/pub?key=0Ag8n0yHMUHF-dDJPS1RuLUdYUlc1WFYwMUlRaGJ0X0E&single=true&gid=0&output=csv';

if (!($handle = fopen($url, "r")))
  return ;
$users = array();
while ($a = fgetcsv($handle, 1000, ","))
  if ($a[0] !== 'Nickname')
    $users[] = $a;
fclose($handle);
?>

<?php makeGrid(2, $users, printUser); ?>

<?php
function printUser($user) {
?>
<div class="user" style="padding: 10px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 10px;">
  <div class="row-fluid">
    <div class="span4">
      <img src="http://gravatar.com/avatar/<?= md5($user[6]) ?>?d=mm&s=200">
    </div>
    <div class="span8">
      <h3 style=""><?= $user[1] ?> <?= $user[2] ?> <small>(<?= $user[0] ?>)</small></h3>
      <h5><url><?php
$jobs = str_getcsv($user[3], ',');
foreach ($jobs as $job) {
  ?><li><?= $job ?></li><?php
} ?></url></h5>
      <p>From <?= $user[5] ?>, <?= $user[4] ?></p>
<?php if (!empty($user[10])) { ?>
      <a href="<?= $user[10] ?>" target="_blank"><button class="btn btn-success">Visit website</button></a>
<?php } ?>
    </div>
  </div>
  <br>
<?php
  if (isset($_GET['more'])) {
?>
   <div class="well"><ul>
     <li><strong>Email:</strong> <?= $user[6] ?></li>
     <li><strong>Alternative Email:</strong> <?= $user[7] ?></li>
     <li><strong>Phone:</strong> <?= $user[8] ?></li>
     <li><strong>Alternative Phone:</strong> <?= $user[9] ?></li>
     <li><strong>Google+:</strong> <a href="<?= $user[11] ?>">Link</a></li>
   </ul></div>
<?php } ?>
</div>
<?php
}

function makeGrid($per_line, $elements, $displayer) {
  $row_nb = 0;
?>
  <div class="row-fluid row<?= $row_nb ?>">
     <?php $i = 1;
  foreach ($elements as $e) { ?>
    <div class="span<?= 12 / $per_line ?>">
      <?php $displayer($e) ?>
    </div> <!-- span -->
      <?php if ($i == $per_line) { $row_nb++; ?>
  </div> <!-- row -->
  <div class="row-fluid row<?= $row_nb ?>">
  <?php $i = 0;
    }
    $i++;
  } ?>
  </div> <!-- row -->
<?php
}
