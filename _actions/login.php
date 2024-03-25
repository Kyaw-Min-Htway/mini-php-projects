<?php


session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if ($email === "kyawminhtway.@gmail.com" and $password === 'admin123') {
    $_SESSION['user'] = ['username' => 'Kyaw Min Htway'];
    header('location: ../profile.php');
}else {
    header('location: ../index.php?incorrect=1');
}