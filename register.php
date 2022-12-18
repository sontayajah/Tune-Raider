<?php
session_start();
require('server.php');

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  //get "user_id"
  $sql_query = "SELECT user_id FROM user WHERE Username = '$username' ";
  $result = mysqli_query($conn, $sql_query);

  $row = mysqli_fetch_assoc($result);
  $user_id =  $row['user_id'];

  // $Mem_ID = $_SESSION['Mem_ID'];
  $query = "SELECT * FROM user WHERE user_id='$user_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tune Raider</title>
  <meta property="og:title" content="Tune Raider" />

  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }

    body {
      margin: 0;
    }

    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
    }

    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin: 0;
      padding: 0;
    }

    button {
      background-color: transparent;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }

    button,
    select {
      text-transform: none;
    }

    a {
      color: inherit;
      text-decoration: inherit;
    }

    img {
      display: block;
    }

    html {
      scroll-behavior: smooth
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Inter;
      font-size: 16px;
    }

    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: normal;
      line-height: 1.15;
      color: var(--dl-color-gray-black);
      background-color: var(--dl-color-gray-white);

    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font" />
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/login.css" />
  <link rel="icon" href="./public/assets/image-ai1l-200w.png">
</head>

<body>
  <div>
    <link href="./styles/home.css" rel="stylesheet" />

    <div class="home-container">
      <header data-role="Header" class="home-header">
        <a href="index.php" class="home-navlink">
          <div class="home-container1">
            <img alt="image" src="public/assets/image-ai1l-200w.png" class="home-pasted-image" />
            <span class="home-text">TUNE RAIDER</span>
          </div>
        </a>
        <div class="home-nav">
          <nav class="home-nav1">
            <a href="instruments-selection.html" class="home-navlink1">
              Instruments
            </a>
            <a href="music-sheets.html" class="home-navlink1">
              Music Sheets
            </a>
            <a href="learning.html" class="home-link1">
              Learning
            </a>
            <a href="https://example.com" class="home-link2">
              Tutorial
            </a>
            <a href="recording.html" class="home-link3">
              Record
            </a>
          </nav>
        </div>
        <div class="home-btn-group">
          <a href="login.php" class="home-link3"><button class="home-login button">Login</button></a>
          <a href="register.php" class="home-link3"><button class="home-register button">Register</button></a>
        </div>
      </header>
      <div class="home-hero">
        <div class="home-container2">
          <div class="form-container sign-in-container">
            <form method="post" action="login_db.php">
              <h1 style="margin-bottom: 50px;">Sign up</h1>
              <input type="username" placeholder="Username" style="margin-bottom: 25px; width:358px" name="username" />
              <?php if (isset($_SESSION['error'])) : ?>
                <?php
                // Loop all errors
                foreach ($_SESSION['error'] as $er) {
                  if ($er == "The username is required.") {
                    echo '<p style="color:red; font-size: 15px; margin-top: -15px; margin-left: -175px; margin-bottom: 10px;">' . $er . '</p>';
                  }
                }
                ?>
              <?php endif ?>
              <input type="password" placeholder="Password" style="margin-bottom: 25px;" name="password" />
              <?php if (isset($_SESSION['error'])) : ?>
                <?php
                // Loop all errors
                foreach ($_SESSION['error'] as $er) {
                  if ($er == "The password is required.") {
                    echo '<p style="color:red; font-size: 15px; margin-top: -15px; margin-left: -175px; margin-bottom: 10px;">' . $er . '</p>';
                  }
                }
                ?>
              <?php endif ?>
              <input type="password" placeholder="Confirm Password" style="margin-bottom: 25px;" name="confirmpassword" />
              <?php if (isset($_SESSION['error'])) : ?>
                <?php
                // Loop all errors
                foreach ($_SESSION['error'] as $er) {
                  if ($er == "The confirm password is required.") {
                    echo '<p style="color:red; font-size: 15px; margin-top: -15px; margin-left: -115px; margin-bottom: 10px;">' . $er . '</p>';
                  }
                }
                ?>
              <?php endif ?>
              <input type="text" placeholder="Full name" style="margin-bottom: 30px;" name="fullname" />
              <?php if (isset($_SESSION['error'])) : ?>
                <?php
                // Loop all errors
                foreach ($_SESSION['error'] as $er) {
                  if ($er == "The full name is required.") {
                    echo '<p style="color:red; font-size: 15px; margin-top: -15px; margin-left: -175px; margin-bottom: 10px;">' . $er . '</p>';
                  }
                }
                ?>
              <?php endif ?>
              <?php if (isset($_SESSION['error'])) : ?>
                <?php
                // Loop all errors
                foreach ($_SESSION['error'] as $er) {
                  if ($er == "Already have this username." || $er == "The password not match.") {
                    echo '<p style="color:red; font-size: 15px; margin-top: 30px; margin-left: -175px; margin-bottom: 10px;">' . $er . '</p>';
                  }
                }
                ?>
              <?php endif ?>
              <?php
              unset($_SESSION['error']);
              ?>
              <a class="home-link3"><button class="home-register button" style="margin-top: 30px; width: 120px;" name="register_user" type="submit">Register</button></a>
            </form>
          </div>
        </div>
      </div>
      <footer class="home-footer">
        <span>Copyright © 2022 TUNE RAIDER All rights reserved.</span>
      </footer>
    </div>
  </div>
</body>

</html>