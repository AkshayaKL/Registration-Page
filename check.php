<?php
$field=$_GET['field'];
$query=$_GET['query'];

if($field=="name")
{
	if(strlen($query)<5)
		echo"<span style='color:red'>Should be atleast 5 characters long</span>";
	else
		echo "<span style='color:green'>Valid</span>";
}

if($field=="rollno")
{
	if((strlen($query)==9)&&is_numeric($query))
		echo "<span style='color:green'>Valid</span>";
		else
			echo"<span style='color:red'>Invalid Rollnumber</span>";
}

if($field=="phone")
{
	if((strlen($query))==10&&is_numeric($query))
		echo "<span style='color:green'>Valid</span>";
		else
			echo"<span style='color:red'>Invalid Phone Number</span>";

}

if($field=="email")
{
	if (filter_var($query, FILTER_VALIDATE_EMAIL)) {
  echo"<span style='color:green'>valid</span>";
} else {
  echo"<span style='color:red'>$query is not a valid email address</span>";
}
}
?>
