<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="" >
		<input type=""  name="valor">
<input type="submit" name="submit" value="submit">
		
	</form>

</body>
</html>

<?php
if($_POST){

	$cifrado=$_POST["valor"];

	print(hash("crc32",$cifrado));

}



 ?>