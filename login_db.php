<?php
session_start();
include('server.php');

$error = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username || empty($password))) {
        array_push($error, "The username and password is required.");
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($results);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['login_success'] = "You are now logged in";
            header('location: ./userlogged/index.php');
        } else {
            array_push($error, "Username or password is incorrect.");
            $_SESSION['error'] = $error;
            header('location: login.php');
        }
    } else {
        $_SESSION['error'] = $error;
        header('location: login.php');
    }
} else if (isset($_POST['register_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

    if (empty($username)) {
        array_push($error, "The username is required.");
    }

    if (empty($password)) {
        array_push($error, "The password is required.");
    }

    if (empty($confirmpassword)) {
        array_push($error, "The confirm password is required.");
    }

    if (empty($fullname)) {
        array_push($error, "The full name is required.");
    }

    $query = "SELECT * FROM user WHERE username='$username'";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
    if (mysqli_num_rows($results) > 0) {
        array_push($error, "Already have this username.");
    }

    if ($password != $confirmpassword) {
        array_push($error, "The password not match.");
        $_SESSION['error'] = $error;
        header('location: register.php');
    }

    if (count($error) == 0) {
        $sql = "INSERT INTO user (username, password, fullname) VALUES ('$username', '$password', '$fullname')";
        mysqli_query($conn, $sql);
        $_SESSION['success'] = "Register Successfully.";
        header('location: login.php');
    } else {
        $_SESSION['error'] = $error;
        header('location: register.php');
    }
}
