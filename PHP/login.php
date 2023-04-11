<?php

session_start();
include("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

 <link rel="stylesheet" href="../CSS/signup.css">
<link rel="stylesheet" href="../CSS/outHeader.css">
<body>
<div class="header">
  <a href="../HTML/index.html" class="logo">Weather Application</a>
  <div class="header-right">
    <a href="../PHP/login.php">Log In</a>
    <a href="#contact">Contact</a>
    <a class="active" href="../HTML/index.html">Home</a>
  </div>
</div>
<div class="content">
     <form name="form1" action="../PHP/login.php" method="post">
    <table>
    <tr>
    <th colspan= "2" class="classtd">Log In </th>
    </tr>
      <tr>
        <td><label for="email"><b>Email:</b></label></td>
        <td><input type="text" placeholder="Introdu email-ul" name="email" required></td></tr>

         <tr>
         <td><label for="password"><b>Password:</b></label></td>
          <td><input type="password" placeholder="Introdu parola" name="password" required ></td></tr>

         <tr>
         <td colspan="2" class="classtd"><button class="submit" type="submit" name="submit">Login</button>
         </td></tr>
         <tr>
         <td colspan="2" class="classtd"><button class="reset" type="reset">Delete</button>
         </td></tr>
         </table>
    </form>
</div>

</body>
<?php



if(isset($_POST["submit"]))
{
    global $conn;

    $email = $_POST["email"];
    $password = $_POST["password"];

    $check_user = $conn->prepare("select * from users where email=? AND parola=?");

    $check_user ->execute(array($email,$password));

    $rows_user = $check_user->rowCount();

    if($rows_user == 1){

        $result = $check_user->fetch();
        $_SESSION['id_user'] = $result['id_user'];

        $user_id = $result['id_user'];
        echo "<script>window.open('../PHP/main.php', '_self')</script>";
    }



    if($rows_user != 1)
    {
        echo "<script>alert('Wrong credentials');</script>";
    }


}

?>

