<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="ro">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../CSS/weather.css">



<body class="logged">
<div class="row">
    <div class="col-sm-12">
        <div class="well">

            <nav>
                <ul>
                    <li class="menu"><a href="../php/mainUser.php"><img style="width: 30px;" alt="Meniu" src="/Adoptia-Salveaza-Vieti/imagini/menu.png"/></a>
                        <ul class="ani-menu">
                            <li><a href="../php/mainUser.php"><p>Home</p></a></li>
                            <li><a href="../php/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="center">
                <a href="../php/mainUser.php"></a>
            </div>

            <ul>
                <li><a href="#home" class="btn2">Home</a></li>   </ul>
            <ul> <li><a href="#news" class="btn2">News</a></li>   </ul>
            <ul> <li><a href="#contact" class="btn2">Contact</a></li>   </ul>
            <ul > <li><a href="/Adoptia-Salveaza-Vieti/php/logout.php" class="btn">LogOut</a></li>
            </ul>
        </div>
    </div>
</div>

