
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="style.css">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

$count=0;
$file = $_FILES['resume'];
$namefile= $file['name'];

$path="/var/www/html/uploads/" .basename($namefile);
if(move_uploaded_file($file['tmp_name'], $path))
	{
		
	}
else
	{
		echo "<div class='container'>
  <div class='jumbotron'><p style='color:red' width='100%''>Resume not submitted</p></div></div>";
		$count++;
	}
$conn=mysqli_connect("localhost","root","123","myDB");
$name=mysqli_real_escape_string($conn,$_POST['name']);

$rollno=mysqli_real_escape_string($conn,$_POST['rollno']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$dept=$_POST['dept'];
$year=$_POST['year'];
if(strlen($name)<5)
	$count++;
if(!((strlen($rollno)==9)&&is_numeric($rollno)))
    $count++;
if(!((strlen($phone))==10&&is_numeric($phone)))
	{
		$count++;
		
	}
if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) 
	$count++;

if ((!(empty($_POST["name"])))&&(!(empty($_POST["rollno"])))&&(!(empty($_POST["phone"])) )&&(!(empty($_POST["email"])))&&($count==0))

{
	$sql="INSERT INTO users(name,rollno,phone,email,dept,resume,year)VALUES(?,?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
    	echo "<div class='container'>
  <div class='jumbotron'><strong><p>Failed sql</p></strong></div></div>";

    }
else
{
	mysqli_stmt_bind_param($stmt,"sssssss",$name,$rollno,$phone,$email,$dept,$path,$year);
	mysqli_stmt_execute($stmt);

}

echo "<div class='container'>
  <div class='jumbotron'><strong><p>Registered</p></strong></div></div>";
}
else
{
echo "<div class='container'>
  <div class='jumbotron' style='color:red'><strong><p>Go Back and register Again,not a valid form</p></strong></div></div>";

return false;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
