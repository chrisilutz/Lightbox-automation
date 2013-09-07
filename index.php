<!doctype html>
<html lang="en">
<head>
  	<meta charset="utf-8"/>
	<title>lightbox automation</title>
	<link rel="stylesheet" href="css/colorbox.css" type="text/css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="lib/jquery.colorbox-min.js"></script>
	</head>
<body>
	<?php include 'includes/lightbox.php'; ?>
</body>
	<script type="text/javascript">$(document).ready(function() {
		$('a.gallery').colorbox({rel:'gal', width:'500px'});
	});
	</script>
</html>
