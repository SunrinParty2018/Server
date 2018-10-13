<!DOCTYPE html>
<?php
			$hostname = 'localhost';
			$dbname = 'srdb';
			$dbid = 'srsv';
			$dbpw = 'qwer1234';
			$mysqli = new mysqli($hostname,$dbid,$dbpw,$dbname);
			$sql = 'SELECT id FROM quotes WHERE id = (SELECT Max(id) FROM quotes)';
			$result=mysqli_query($mysqli,$sql);
			while($row=$result->fetch_assoc())
			{
				$mx = (int)$row['id'];
			}
			$num = rand(1,$mx);
			$sql = 'SELECT * FROM quotes WHERE id = '.''.$num;
			$result=mysqli_query($mysqli,$sql);
		?>
<html>
	<head>
	</head>
	<body>
		<div class = "num"><?php echo $num;?></div>
		<?php
			while($row=$result->fetch_assoc())
			{
		?>
		<div class = "body"><?php echo $row['body'];?></div>
		<div class = "auth"><?php echo $row['auth'];?></div>
		<?php
			}
		?>
	</body>
</html>