
<?php 

$counter = 0;

$files = scandir('imgs/pics/');

?>

<div class="row-fluid">

<?php 
foreach($files as $file)
{
	if ($file != '.' && $file != '..')
	{
		
		?>
		
			<div class="col-md-3">
			<img src='imgs/pics/<?php echo($file); ?>' id="homepics" /><br />
		<?php
			echo($content[$file]);
		?>
			</div>
		<?php
		$counter += 1;
		
		if ($counter % 4 == 0)
		{
			?></div><div class='row-fluid'><div class='row-fluid'><?php
			$counter = 0;
		}
	}
}

?>

</div>