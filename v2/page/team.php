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
  if ($a[0] !== '_' && $a[0] !== 'Nickname')
    $users[] = $a;
fclose($handle);

?>

<?php makeGrid(2, $users); ?>

<?php
function printUser($user) {
?>
<div class="user" >
  <div class="row-fluid">
    <div class="span4">
      <img src="http://gravatar.com/avatar/<?php echo md5($user[6]) ?>?d=mm&s=200">
    </div>
    <div class="span8">
      <h3 style=""><?php echo $user[1]; ?> <?php echo $user[2]; ?> <small>(<?php echo $user[0]; ?>)</small></h3>
      <h5><url><?php
$jobs = str_getcsv($user[3], ',');
foreach ($jobs as $job) {
  ?><li><?php echo $job ?></li><?php
} ?></url></h5>
      <p>From <?php echo $user[5]; ?>, <?php echo $user[4]; ?></p>
<?php if (!empty($user[10])) { ?>
      <span class="btnlife" id="clickable" onclick="document.location.href='<?php echo $user[10]; ?>';" >Visit website</span>
<?php } ?>
<?php if (!empty($user[14])) { ?>
      <span class="btnlife" id="clickable" onclick="document.location.href='<?php echo $user[14]; ?>';" >Résumé</span>
<?php } ?>
    </div>
  </div>
  <br>
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
<?php } ?>
</div>
<?php
}

function makeGrid($per_line, $elements) {
  $row_nb = 0;
?>

<div class="users">
  <div class="row-fluid row<?php echo $row_nb ?>">
     <?php $i = 1;
  foreach ($elements as $e) { ?>
    <div class="span<?php echo 12 / $per_line ?>">
      <?php printUser($e) ?>
    </div> <!-- span -->
      <?php if ($i == $per_line) { $row_nb++; ?>
  </div> <!-- row -->
  <div class="row-fluid row<?php echo $row_nb ?>">
  <?php $i = 0;
    }
    $i++;
  } ?>
  </div> <!-- row -->
</div>
<?php
}
