<!DOCTYPE html>
<html>
<head>
	<title>

		Sample Form

	</title>
</head>
<body>

<form action="<?php echo url('/insert') ?>" method="POST">
<?php echo csrf_field()?>
<table border="5">

<tr><td>       Member ID:<input type="text" name="id" placeholder="MemberID"><br></td></tr>
<tr><td>Member Firstname:<input type="text" name="fname" placeholder="FirstName"><br></td></tr>
<tr><td> Member Lastname:<input type="text" name="lname" placeholder="LastName"><br></td></tr>
<tr><td><button type="submit" name="submit" >Submit</button><br></td></tr>

</form>
</table>
</body>
</html>