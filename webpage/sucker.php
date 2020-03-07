<?php $issets = (empty($_POST["studentName"]) || empty($_POST["sectionNumber"]) || empty($_POST["creditNumber"]) || empty($_POST["cc"])); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php if (!$issets) { ?>
		<h1>Thanks, sucker!</h1>
		<br />
		<p>Your information has been recorded.</p>

			<?php $file = 'suckers.txt'; ?>
		<form action="buyagrade.php">
		<dl>
			<dt>Name</dt>
			<dd>
				<?= $_POST["studentName"] ?>
			</dd>
			
			<dt>Section</dt>
			<dd>
				<?= $_POST["sectionNumber"] ?>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<?= $_POST["creditNumber"] . " (" . $_POST["cc"] . ")" ?>
			</dd>

			<?php
			$current = $_POST["studentName"].";" . $_POST["sectionNumber"] . ";" . $_POST["creditNumber"] . ";" .  $_POST["cc"] . "\n";
			file_put_contents($file, $current, FILE_APPEND);
			$content = file_get_contents($file); ?>			

		</dl>
		</form>
		<p>Here are all the suckers who have submitted here:</p>
			<pre> <?= $content ?> </pre>

		<?php } else { ?>
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
	<?php } ?>
	</body>
</html>