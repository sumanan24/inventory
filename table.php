<?php include_once('config.php');

$sql="CREATE TABLE inventory
(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Image VARCHAR(200),
Inventory_ID VARCHAR (30) UNIQUE,
Name VARCHAR (50),
Description VARCHAR (100),
Quantity INT (6),
Date date)
";

if(mysqli_query($con,$sql))
{
    echo "Inventory Table inserted successfully";
}
else
{
    echo "Error".mysqli_error($con);
}
?>
<br>
<?php

$sql="CREATE TABLE department
(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Department_Code VARCHAR (30) UNIQUE,
Image BLOB,
Department_Name VARCHAR (100),
Head_Of_Department VARCHAR (50))";

if (mysqli_query($con,$sql))
{
    echo " Department Table inserted successfully";
}
else
{
    echo "Error".mysqli_error($con);
}



?>
<br>
<?php
$sql="CREATE TABLE dispose
(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Inventory_ID VARCHAR(10) UNIQUE,
Image VARCHAR(200),
Name VARCHAR(100),
Description VARCHAR(100),
Quantity VARCHAR(100),
Date date)";

if (mysqli_query($con,$sql))
{
    echo " Disposed Inventory Table inserted successfully";
}
else
{
    echo "Error".mysqli_error($con);
}
?>

<br>
<?php
$sql="CREATE TABLE transfer
(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Transfer_ID VARCHAR(10) UNIQUE  ,
Staff_Name VARCHAR(50),
Inventory_Name VARCHAR(50),
Sender_D_Code VARCHAR(10),
Receiver_D_Code VARCHAR(10),
Date date)";

if (mysqli_query($con,$sql))
{
    echo " transfer Table inserted successfully";
}
else
{
    echo "Error".mysqli_error($con);
}
?>

<br>
<?php
$sql="CREATE TABLE staff
(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Staff_ID VARCHAR(10) UNIQUE ,
Full_Name VARCHAR(50),
E_mail VARCHAR(50),
Department_Name VARCHAR(50),
Gender VARCHAR(10),
Ph_No VARCHAR(10),
Username VARCHAR(20),
Password VARCHAR(20))";

if (mysqli_query($con,$sql))
{
    echo " Staff Table inserted successfully";
}
else
{
    echo "Error".mysqli_error($con);
}
?>

<br>
<?php
$sql="CREATE TABLE admin
(ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Admin_ID VARCHAR(10) UNIQUE ,
Full_Name VARCHAR(50),
E_mail VARCHAR(50) UNIQUE,
Department_Name VARCHAR(50),
Gender VARCHAR(10),
Ph_No VARCHAR(10),
Username VARCHAR(20),
Password VARCHAR(20))";

if (mysqli_query($con,$sql))
{
    echo " Admin Table inserted successfully";
}
else
{
    echo "Error".mysqli_error($con);
}
?>