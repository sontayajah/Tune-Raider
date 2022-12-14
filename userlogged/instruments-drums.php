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
  <title>Drums | Tune Raider</title>
  <meta property="og:title" content="Drums | Tune Raider" />

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <div>
    <link href="../styles/instruments-drums.css" rel="stylesheet" />

    <div class="instruments-drums-container">
      <header data-role="Header" class="instruments-drums-header">
        <a href="index.php" class="instruments-drums-navlink">
          <div class="instruments-drums-container1">
            <img alt="image" src="../public/assets/image-ai1l-200w.png" class="instruments-drums-pasted-image" />
            <span class="instruments-drums-text">TUNE RAIDER</span>
          </div>
        </a>
        <div class="instruments-drums-nav">
          <nav class="instruments-drums-nav1">
            <a href="instruments-selection.php" class="instruments-drums-navlink1">
              Instruments
            </a>
            <a href="music-sheets.php" class="instruments-drums-navlink1">
              Music Sheets
            </a>
            <a href="learning.php" class="instruments-drums-link1">
              Learning
            </a>
            <a href="https://example.com" class="instruments-drums-link2">
              Tutorial
            </a>
            <a href="recording.php" class="instruments-drums-link3">
              Record
            </a>
          </nav>
        </div>
        <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" href="../login.php?logout='1'">
                    Hi, <?php echo $username ?>
        </a>
      </header>
      <div class="instruments-drums-hero">
        <div class="instruments-drums-container2">
          <img alt="image" src="../public/assets/image-s6xd-200h.png" class="instruments-drums-pasted-image1" />
          <h1 class="instruments-drums-text01">Drums</h1>
          <h1 class="instruments-drums-text02">
            Press the computer keyboard to play a sound.
          </h1>
        </div>
        <div class="instruments-drums-container3">
          <button class="instruments-drums-button button" onClick="metronomeShow()">
            <img alt="image" src="../public/assets/image-kbx-200h.png" class="instruments-drums-pasted-image2" />
            <span class="instruments-drums-text03">Metronome</span>
          </button>
        </div>

        <!-- Metronome Start -->
        <div class="instruments-containerMetronome">
          <section class="metronome-container">
            <!-- <div class="counter"></div> -->

            <div class="controls">
              <label>BPM: <span>
                  <i class="fa fa-minus bpm-minus"></i>
                  <input type="text" value="60" class="bpm-input" />
                  <i class="fa fa-plus bpm-plus"></i>
                </span>
              </label>
              <div style="margin-bottom: 15px;">
                <input type="checkbox" id="timer-check" />
                <label for="timer-check"></label>

                Timer: <input type="text" value="60" class="timer" />
              </div>

              <button class="play-btn">Play</button>
            </div>

          </section>
        </div>
        <!-- Metronome End -->

        <div class="instruments-drums-container4">
          <div class="instruments-drums-container5">
            <img alt="image" src="../public/assets/d62226ec-d390-4e45-ae2c-7ee4b731650c.webp" />
            <span class="instruments-drums-text04 shortcut-name">Y</span>
            <span class="instruments-drums-text05 shortcut-name">E</span>
            <span class="instruments-drums-text06 shortcut-name">R</span>
            <span class="instruments-drums-text07 shortcut-name">C</span>
            <span class="instruments-drums-text08 shortcut-name">S</span>
            <span class="instruments-drums-text09 shortcut-name">D</span>
            <span class="instruments-drums-text10 shortcut-name">G</span>
            <span class="instruments-drums-text11 shortcut-name">H</span>
            <span class="instruments-drums-text12 shortcut-name">X</span>
            <span class="instruments-drums-text13 shortcut-name">J</span>
            <span class="instruments-drums-text14 shortcut-name">U</span>
          </div>
          <span class="instruments-drums-text15">
            <span style="font-weight: bold; margin-left: 0">You can use the following shortcuts:</span>
            <span>
              <ul class="liste" style="margin-top:10px; margin-left: 50px;">
                <li>Crash cymbal: <span class="shortcut-code">y</span></li>
                <li>Ride cymbal: <span class="shortcut-code">u</span></li>
                <li>Hi-hat (closed): <span class="shortcut-code">r</span></li>
                <li>Hi-hat (open): <span class="shortcut-code">e</span></li>
                <li>Hi-hat (foot): <span class="shortcut-code">c</span></li>
                <li>High tom-tom: <span class="shortcut-code">g</span></li>
                <li>Low tom-tom: <span class="shortcut-code">h</span></li>
                <li>Floor tom: <span class="shortcut-code">j</span></li>
                <li>Snare drum: <span class="shortcut-code">s</span></li>
                <li>Snare drum (cross stick): <span class="shortcut-code">d</span></li>
                <li>Bass drum: <span class="shortcut-code">x</span></li>
              </ul>
            </span>
        </div>
      </div>
      <footer class="instruments-drums-footer">
        <span>Copyright ?? 2022 TUNE RAIDER All rights reserved.</span>
      </footer>
    </div>
  </div>
  <script src="../scripts/DrumsPlay.js"></script>
  <script src="../scripts/Metronome.js"></script>
</body>

</html>