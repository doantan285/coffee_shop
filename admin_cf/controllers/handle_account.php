<?php

// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $error = User::login($email, $password);
}

// Register
if (isset($_POST['register'])) {
    $name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    $error = User::register($name, $email, $password, $cpassword, $role);
}

// Delete user
if (isset($_GET['deleteiduser'])) {
    $id = $_GET['deleteiduser'];

    User::deleteUser($id);
}