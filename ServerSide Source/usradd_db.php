<html>
	<head>
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
			
			$id = _GET['id'];
			$pw = _GET['pw'];
			$nick = _GET['nick'];
			
			$sql = "INSERT INTO 'sr_u' VALUES ('NULL',"."".$id."".", "."".$pw."".", "."".$nick."".", 'NULL', 'NULL')";
			mysql_query($sql);
		?>
	</body>
</html>