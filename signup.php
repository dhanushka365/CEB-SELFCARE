<?php


require_once("dbconfig.php");


$email=$_POST["email"];
$name=$_POST["name"];
$pass=$_POST["pass"];

//first of all check if account is already registered or not

$query ="SELECT * FROM login_flutter WHERE email LIKE '$email;";
$res=mysqli_query($con,$query);
$data=mysqli_fetch_array($res);


if($data[0]>=1)
{

//account exists
echo json_encode("account already exists");
}
else
{
//create account
$query ="INSERT INTO login_flutter(id,name,email,pass)VALUES (null,'$name','$email','$pass')";
$res=mysqli_query($con,$query);

if($res)
{
echo json_encode("true");
}
else
{

echo json_encode("false");

}
}

?>