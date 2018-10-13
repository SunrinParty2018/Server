<html>
	<head>
		<title>Connecting DB...</title>
	</head>
	<body>
		<?php
			$hostname = 'localhost';
			$dbid = 'srsv';
			$dbpwd = 'qwer1234';
			$dbname = 'srdb';
			
			$mysqli = new mysqli($host,$dbid,$dbpwd,$dbname);
			
			if($mysqli)
			{
				?><script>alert('Access Success');</script><?php
			}
			else
			{
				?><script>alert('Access Denied');</script><?php
			}
		?>
	</body>
</html>