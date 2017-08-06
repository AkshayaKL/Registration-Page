<?php

$count=0;
$file = $_FILES['resume'];
$namefile= $file['name'];

$path="/var/www/html/uploads/" .basename($namefile);
if(move_uploaded_file($file['tmp_name'], $path))
	{
		echo"<div class='container'>
  <div class='jumbotron'><p style='color:blue' width='100%' >Resume update was successful</p></div></div>";
	}
else
	{
		echo "<div class='container'>
  <div class='jumbotron'><p style='color:red' width='100%''>Resume not submitted</p></div></div>";
		$count++;
	}
$conn=mysqli_connect("localhost","root","123","myDB");
$name=$_POST['name'];
$rollno=$_POST['rollno'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$dept=$_POST['dept'];
$year=$_POST['year'];
if ((!(empty($_POST["name"])))&&(!(empty($_POST["rollno"])))&&(!(empty($_POST["phone"])) )&&(!(empty($_POST["email"])))&&($count==0))

{
	$sql="INSERT INTO users(name,rollno,phone,email,dept,year,resume)VALUES('$name','$rollno','$phone','$email','$dept','$year','$path')";
$query=mysqli_query($conn,$sql);
echo "<div class='container'>
  <div class='jumbotron'><strong>Registered</strong></div></div>";
}
else
echo "<div class='container'>
  <div class='jumbotron'><strong>Register Again</strong></div></div>";

return false;

?>