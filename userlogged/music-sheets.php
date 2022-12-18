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
  <title>Music Sheets | Tune Raider</title>
  <meta property="og:title" content="Music Sheets | Tune Raider" />

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
    h6,
    figure,
    blockquote,
    figcaption {
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

    input {
      padding: 2px 4px;
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
  </style>
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="icon" href="../public/assets/image-ai1l-200w.png">
</head>

<body>
  <div>
    <link href="../styles/music-sheets.css" rel="stylesheet" />

    <div class="music-sheets-container">
      <header data-role="Header" class="music-sheets-header">
        <a href="index.php" class="music-sheets-navlink">
          <div class="music-sheets-container01">
            <img alt="pastedImage" src="../public/assets/image-ph02u-200w.png" class="music-sheets-pasted-image" />
            <span class="music-sheets-text">TUNE RAIDER</span>
          </div>
        </a>
        <div class="music-sheets-nav">
          <nav class="music-sheets-nav1">
            <a href="instruments-selection.php" class="music-sheets-navlink1">
              Instruments
            </a>
            <a href="music-sheets.php" class="music-sheets-navlink1">
              Music Sheets
            </a>
            <a href="learning.php" class="music-sheets-link1">
              Learning
            </a>
            <a href="https://example.com" class="music-sheets-link2">
              Tutorial
            </a>
            <a href="recording.php" class="home-link3">
              Record
            </a>
          </nav>
        </div>
        <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" href="../login.php?logout='1'">
                    Hi, <?php echo $username ?>
        </a>
      </header>
      <div class="music-sheets-hero">
        <div class="music-sheets-ti-tle-body">
          <img alt="pastedImage" src="../public/assets/c466529b-e8e0-4b12-a310-6d759a841b91.webp"
            class="music-sheets-pasted-image01" />
          <h1 class="music-sheets-text01">Music Sheets</h1>
          <h1 class="music-sheets-text02">
            Choose the song you want to play.
          </h1>
        </div>
        <div class="music-sheets-note-body">
          <div class="music-sheets-container02">
            <div class="music-sheets-container03">
              <a href="./musicsheets/music-sheets-boy-with-luv.php" class="music-sheets-navlink1">
                <img alt="pastedImage" src="../public/assets/a0ac2371-b2fa-489c-81a3-082c60a95e5b.webp"
                  class="music-sheets-pasted-image02" />
              </a>
              <a href="./musicsheets/music-sheets-boy-with-luv.php"
                style="text-align:center; margin-top: var(--dl-space-space-halfunit);">
                <span class="music-sheets-text03">
                  <span class="music-sheets-text04">Boy with Luv</span>
                  <br />
                  <span>BTS ft.</span>
                  <span>Halsey</span>
                  <br />
                </span>
              </a>
            </div>
            <div class="music-sheets-container04">
              <a href="./musicsheets/music-sheets-roar.php" class="music-sheets-navlink1"><img alt="pastedImage"
                  src="../public/assets/5308d5b0-6eac-466b-9b41-a5487261515b.webp"
                  class="music-sheets-pasted-image02" /></a>
              <a href="./musicsheets/music-sheets-roar.php"
                style="text-align:center; margin-top: var(--dl-space-space-halfunit);">
                <span class="music-sheets-text09">
                  <span class="music-sheets-text10">Roar</span>
                  <br />
                  <span>Katy Perry</span>
                  <br />
                </span>
              </a>
            </div>
            <div class="music-sheets-container05">
              <a href="./musicsheets/music-sheets-blank-space.php" class="music-sheets-navlink1"><img alt="pastedImage"
                src="../public/assets/pastedimage-v9z-800h.png"
                class="music-sheets-pasted-image02" /></a>
                <a href="./musicsheets/music-sheets-blank-space.php"
                style="text-align:center; margin-top: var(--dl-space-space-halfunit);">
                <span class="music-sheets-text09">
                  <span class="music-sheets-text10">Blank Space</span>
                  <br />
                  <span>Taylor Swift</span>
                  <br />
                </span>
              </a>
            </div>
            <div class="music-sheets-container06">
              <img alt="pastedImage" src="../public/assets/7ac4d2da-fa5a-43ac-8676-b8c0cbdc2a6e.webp" style="opacity: 0.3; filter: grayscale(100%);"/>
              <span class="music-sheets-text19" style="opacity: 0.3;">
                <span class="music-sheets-text20">Chanderlier</span>
                <br />
                <span>Sia</span>
                <br />
              </span>
            </div>
          </div>
          <div class="music-sheets-container07">
            <div class="music-sheets-container08">
              <img alt="pastedImage" src="../public/assets/f7b7d091-b09a-4e9c-90f1-788176cc6b6d.webp" style="opacity: 0.3; filter: grayscale(100%);"/>
              <span class="music-sheets-text24" style="opacity: 0.3;">
                <span class="music-sheets-text25">Sorry</span>
                <br />
                <span>Justin Bieber</span>
                <br />
              </span>
            </div>
            <div class="music-sheets-container09">
              <img alt="pastedImage" src="../public/assets/2b171632-e2ca-425a-aec7-19824cf4664f.webp" style="opacity: 0.3; filter: grayscale(100%);"/>
              <span class="music-sheets-text29" style="opacity: 0.3;">
                <span class="music-sheets-text30">Ice Cream</span>
                <br />
                <span>BLACKPINK and</span>
                <br />
                <span>Selena Gomez</span>
                <br />
              </span>
            </div>
            <div class="music-sheets-container10">
              <img alt="pastedImage" src="../public/assets/64325a75-93be-41db-a480-33a9babd1892.webp" style="opacity: 0.3; filter: grayscale(100%);"/>
              <span class="music-sheets-text36" style="opacity: 0.3;">
                <span class="music-sheets-text37">Thank U, Next</span>
                <br />
                <span>Ariana Grande</span>
                <br />
              </span>
            </div>
            <div class="music-sheets-container11">
              <img alt="pastedImage" src="../public/assets/237ed96c-8351-4483-872a-fc213e472b6d.webp" style="opacity: 0.3; filter: grayscale(100%);"/>
              <span class="music-sheets-text41" style="opacity: 0.3;">
                <span class="music-sheets-text42">Rain on Me</span>
                <br />
                <span>Lady Gaga and</span>
                <br />
                <span>Ariana Grande</span>
                <br />
              </span>
            </div>
          </div>
        </div>
      </div>
      <footer class="music-sheets-footer">
        <span>Copyright © 2022 TUNE RAIDER All rights reserved.</span>
      </footer>
    </div>
  </div>
</body>

</html>