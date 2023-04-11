
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
    <title>Sign Up</title>
</head>
<body>

<div class="header">
  <a href="../HTML/index.html" class="logo">Weather Application</a>
  <div class="header-right">
    <a href="../PHP/login.php">Log In</a>
    <a class="active" href="../HTML/index.html">Home</a>
  </div>
</div>

  <form name="form1" action="../PHP/signup.php" method="post">
    <table>
    <tr>
    <th colspan= "2" class="classtd">Sign Up Now </th>
    </tr>
      <tr>
        <td>
          <label for="first-name">Name:</label>
        </td>
        <td>
          <input type="text" id="first-name" name="first-name" required>
        </td>
      </tr>

      <tr>
        <td>
          <label for="last-name">Last name: </label>
        </td>
        <td>
          <input type="text" id="last-name" name="last-name" required>
        </td>
      </tr>

      <tr>
        <td>
          <label for="email">Email:</label>
        </td>
        <td>
          <input type="text" id="email" name="email" required>
        </td>
      </tr>

      <tr>
        <td>
          <label for="password1">Password:</label>
        </td>
        <td>
          <input type="password" class="inputText" id="password1" name="password1" required>
        </td>
      </tr>

      <tr>
        <td>
          <label for="password2">Re-enter the password:</label>
        </td>
        <td>
          <input type="password" id="password2" name="password2" required>
        </td>
      </tr>

      <tr>
        <td>
          <label for="country">Country:</label>
        </td>
        <td>
          <input type="text" id="country" name="country" required>
        </td>
      </tr>

      <tr>
        <td>
          <label for="city">Town:</label>
        </td>
        <td>
          <input type="text" id="city" name="city" required>
        </td>
      </tr>

      <tr>
        <td colspan="2" class="classtd">
          <button type="submit" onclick="return validari(document.form1.email)" name="submit" style = "font-size : 20px">Sign In</button>
        </td>
      </tr>
    </table>
  </form>

</body>

<script>

        function validari(inputText)
        {
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var pass1 = document.form1.password1.value;
            var pass2 = document.form1.password2.value;

            if(inputText.value.match(mailformat) && pass1.toString() === pass2.toString())
            {
                return true;
            }
            else
            {
                if(!inputText.value.match(mailformat))
                {
                    alert("The email format is not accepted!");
                    document.form1.email.focus();
                }

                if(pass1.toString() !== pass2.toString())
                {
                    alert("The passwords are not the same!");
                    document.form1.password1.focus();
                }

                return false;
            }


        }

</script>


<?php

if(isset($_POST["submit"]))
{
    global $conn;
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $password = $_POST["password1"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $theme = " ";


    $check_email = $conn->prepare("select * from users where email=?");

    $check_email->execute(array($email));



    $rows = $check_email->rowCount();



    if($rows == 1){
        die("<script>alert('Ne pare rau, email-ul este deja folosit!')</script>");
    }

    $check_id = $conn->prepare("select * from users");
    $check_id->execute();


    $maxim_id = -1;
    while($res = $check_id->fetch()){
        if((int)$res["id_user"] > $maxim_id)
        {
            $maxim_id = (int)$res["id_user"];
        }
    }




    if($maxim_id == -1)
    {
        $user_id = "1";
    }
    else{
        $user_id = $maxim_id + 1;
        $user_id = (string)$user_id;
    }
    $insert_user = $conn->prepare("insert into users values(?,?,?,?,?,?,?,?)");

    $res = $insert_user->execute(array($user_id,$last_name,$first_name,$email,$password,$country,$city,$theme));


    if($res)
        echo "<script>alert('Ati fost introdus in baza de date!')</script>";
    else
        echo "<script>alert('Ne pare rau, inregistrarea a esuat, va rugam sa reveniti mai tarziu!')</script>";

}

?>

</html>