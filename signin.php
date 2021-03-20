<?php


require_once("dbconfig.php");


$email=$_POST["email"];
$pass=$_POST["pass"];

//first of all check is account exists if not request to create an account 

$query ="SELECT *FROM login_flutter WHERE email LIKE '$email'";
$res=mysqli_query($con,$query);
$data=mysqli_fetch_array($res);

// data[0]=id,data[1]=name,data[2]=email.data[3]=pass

if($data[2]>=1)
{
   //account exists
   $query ="SELECT *FROM login_flutter WHERE pass LIKE '$pass'";
   $res=mysqli_query($con,$query);
   $data=mysqli_fetch_array($res);

   if($data[3]==$pass)
   {
     //password matched
     echo json_encode("true");

     $resarr=array();
     array_push($resarr,array("name"=>$data['1'],"email"=>$data['2'],"pass"=>$data['3'],));
     json_encode(array("result"=>$resarr));

   }
   else
   {
     //incorect password
     echo json_encode("false");
   }

}

else
{
//account not exists,create a new account
echo json_encode("dont have an account");
}

?>
