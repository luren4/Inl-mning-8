<?php 
$host="localhost";
$user="root";
$password="";




mysqli_connect($host,$user,$password);
// mysql_select_db();

if(isset($_POST['username']))
{
    $uname=$_POST['username'];
    $password=$_POST['password'];


    if ($uname == "lucas" and $password == "lucas") 
    {
        header("Location: LaddaUppFiler.html");

        session_start();
        $_SESSION["username"] = $uname;


        die();
    }
    else
    {
        echo "You have entered the incorrect password";
    }

}
    // $sql="select * from loginform where user='".$uname."' AND Pass='".$password."' 
    // limit 1";

    // $result=msqli_query($sql);

    // if(mysqli_num_rows($result)==1){
    //     echo " You have succesfully Logged in";
    //     exit();
    // }
    // else{
    //     echo " You have Entered Incorrect Password";
    // }


?>