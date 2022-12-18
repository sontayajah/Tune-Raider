<?php
session_start();
require('../server.php');

if (!isset($_SESSION['username'])) {
    header('location: ../login.php');
}

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
    unset($_SESSION['username']);
    session_destroy();
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Instruments Selection | Tune Raider</title>
  <meta property="og:title" content="Instruments Selection | Tune Raider" />

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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    data-tag="font" />
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="icon" href="../public/assets/image-ai1l-200w.png">
</head>

<body>
  <div>
    <link href="../styles/instruments-selection.css" rel="stylesheet" />

    <div class="instruments-selection-container">
      <header data-role="Header" class="instruments-selection-header">
        <a href="index.php" class="instruments-selection-navlink">
          <div class="instruments-selection-container01">
            <img alt="image" src="../public/assets/image-ai1l-200w.png" class="instruments-selection-pasted-image" />
            <span class="instruments-selection-text">TUNE RAIDER</span>
          </div>
        </a>
        <div class="instruments-selection-nav">
          <nav class="instruments-selection-nav1">
            <a href="instruments-selection.php" class="instruments-selection-navlink1">
              Instruments
            </a>
            <a href="music-sheets.php" class="instruments-selection-navlink1">
              Music Sheets
            </a>
            <a href="learning.php" class="instruments-selection-link1">
              Learning
            </a>
            <a href="https://example.com" class="instruments-selection-link2">
              Tutorial
            </a>
            <a href="recording.php" class="instruments-selection-link8">
              Record
            </a>
          </nav>
        </div>
        <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" href="../login.php?logout='1'">
                    Hi, <?php echo $username ?>
        </a>
      </header>
      <div class="instruments-selection-hero">
        <div class="instruments-selection-container02">
          <img alt="image" src="../public/assets/image-3r-200h.png" class="instruments-selection-pasted-image1" />
          <h1 class="instruments-selection-text01">Instruments</h1>
          <h1 class="instruments-selection-text02">
            Choose the instrument you want to play.
          </h1>
        </div>
        <div class="instruments-selection-hero1">
          <div class="instruments-selection-container03">
            <div class="instruments-selection-container04">
              <a href="instruments-drums.php" class="instruments-selection-navlink2">
                <img alt="image" src="../public/assets/image-s6xd-400h.png" class="instruments-selection-pasted-image2" />
              </a>
            </div>
            <div class="instruments-selection-container05">
              <a href="instruments-classical-grand-piano.php" class="instruments-selection-navlink3">
                <img alt="image" src="../public/assets/image-w47-400h.png" class="instruments-selection-pasted-image3" />
              </a>
            </div>
            <div class="instruments-selection-container06">
              <a href="instruments-bass-guitar.php" class="instruments-selection-navlink3">
                <img alt="image" src="../public/assets/image-g7gk-300h.png" class="instruments-selection-pasted-image4" />
              </a>
            </div>
          </div>
          <div class="instruments-selection-container07">
            <a href="instruments-drums.php" class="instruments-selection-link3">
              Drums
            </a>
            <a href="instruments-classical-grand-piano.php" class="instruments-selection-link4">
              Classical Grand Piano
            </a>
            <a href="instruments-bass-guitar.php" class="instruments-selection-link5">
              Base Guitar
            </a>
          </div>
          <div class="instruments-selection-container08">
            <div class="instruments-selection-container09">
              <img alt="image" src="public/assets/image-ijyj-300h.png" class="instruments-selection-pasted-image5" />
              <span class="instruments-selection-text04">
                <span>COMING</span>
                <br />
                <span>SOON</span>
              </span>
            </div>
            <div class="instruments-selection-container10">
              <img alt="image" src="public/assets/image-jrt7-300h.png" class="instruments-selection-pasted-image6" />
              <span class="instruments-selection-text08">
                <span>COMING</span>
                <br />
                <span>SOON</span>
              </span>
            </div>
          </div>
          <div class="instruments-selection-container11">
            <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="instruments-selection-link6">
              Clarinet
            </a>
            <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="instruments-selection-link7">
              Flute
            </a>
          </div>
        </div>
      </div>
      <footer class="instruments-selection-footer">
        <span>Copyright © 2022 TUNE RAIDER All rights reserved.</span>
      </footer>
    </div>
  </div>
</body>

</html>