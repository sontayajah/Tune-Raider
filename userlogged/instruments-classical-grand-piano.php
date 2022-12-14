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
  <title>Classical Grand Piano | Tune Raider</title>
  <meta property="og:title" content="Classical Grand Piano | Tune Raider" />

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
    <link href="../styles/instruments-classical-grand-piano.css" rel="stylesheet" />

    <div class="instruments-classical-grand-piano-container">
      <header data-role="Header" class="instruments-classical-grand-piano-header">
        <a href="index.php" class="instruments-classical-grand-piano-navlink">
          <div class="instruments-classical-grand-piano-container1">
            <img alt="image" src="../public/assets/image-ai1l-200w.png"
              class="instruments-classical-grand-piano-pasted-image" />
            <span class="instruments-classical-grand-piano-text">
              TUNE RAIDER
            </span>
          </div>
        </a>
        <div class="instruments-classical-grand-piano-nav">
          <nav class="instruments-classical-grand-piano-nav1">
            <a href="instruments-selection.php" class="instruments-classical-grand-piano-navlink1">
              Instruments
            </a>
            <a href="music-sheets.php" class="instruments-classical-grand-piano-navlink1">
              Music Sheets
            </a>
            <a href="learning.php" class="instruments-classical-grand-piano-link1">
              Learning
            </a>
            <a href="https://example.com" class="instruments-classical-grand-piano-link2">
              Tutorial
            </a>
            <a href="recording.php" class="instruments-classical-grand-piano-link3">
              Record
            </a>
          </nav>
        </div>
        <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" href="../login.php?logout='1'">
                    Hi, <?php echo $username ?>
        </a>
      </header>
      <div class="instruments-classical-grand-piano-hero">
        <div class="instruments-classical-grand-piano-container2">
          <img alt="image" src="../public/assets/image-w47-200h.png"
            class="instruments-classical-grand-piano-pasted-image1" />
          <h1 class="instruments-classical-grand-piano-text1">
            Classical Grand Piano
          </h1>
          <h1 class="instruments-classical-grand-piano-text2">
            Press the computer keyboard to play a sound.
          </h1>
        </div>
        <div class="instruments-classical-grand-piano-container3">
          <button class="instruments-classical-grand-piano-button button" onClick="metronomeShow()">
            <img alt="image" src="../public/assets/image-kbx-200h.png"
              class="instruments-classical-grand-piano-pasted-image2" />
            <span class="instruments-classical-grand-piano-text3">
              Metronome
            </span>
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
        <div class="instruments-classical-grand-piano-container4">
          <img alt="image" src="../public/assets/514887%20%5B1%5D-1300w.png"
            class="instruments-classical-grand-piano-image" />
        </div>
      </div>
      <footer class="instruments-classical-grand-piano-footer">
        <span>Copyright ?? 2022 TUNE RAIDER All rights reserved.</span>
      </footer>
    </div>
  </div>
  <script src="../scripts/ClassicalGrandPianoPlay.js"></script>
  <script src="../scripts/Metronome.js"></script>
</body>

</html>