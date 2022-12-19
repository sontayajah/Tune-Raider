window.AudioContext = window.AudioContext || window.webkitAudioContext;
var context = new AudioContext();
context.resume();
var timer, noteCount, counting, accentPitch = 380,
  offBeatPitch = 200;
var delta = 0;
var curTime = 0.0;

function schedule() {
  while (curTime < context.currentTime + 0.1) {
    playNote(curTime);
    updateTime();
  }
  timer = window.setTimeout(schedule, 0.1);
}

function updateTime() {
  curTime += 60.0 / parseInt($(".bpm-input").val(), 10);
  noteCount++;
}

/* Play note on a delayed interval of t */
function playNote(t) {
  var note = context.createOscillator();

  if (noteCount == parseInt($(".ts-top").val(), 10))
    noteCount = 0;

  if ($(".counter .dot").eq(noteCount).hasClass("active"))
    note.frequency.value = accentPitch;
  else
    note.frequency.value = offBeatPitch;

  note.connect(context.destination);

  note.start(t);
  note.stop(t + 0.05);

}

function countDown() {
  var t = $(".timer");

  if (parseInt(t.val(), 10) > 0 && counting === true) {
    t.val(parseInt(t.val(), 10) - 1);
    window.setTimeout(countDown, 1000);
  } else {
    $(".play-btn").click();
    t.val(60);
  }
}


/* Add or subtract bpm */
$(".bpm-minus, .bpm-plus").click(function () {
  if ($(this).hasClass("bpm-minus"))
    $(".bpm-input").val(parseInt($(".bpm-input").val(), 10) - 1);
  else
    $(".bpm-input").val(parseInt($(".bpm-input").val(), 10) + 1);
});


/* Play and stop button */
$(".play-btn").click(function () {
  if ($(this).data("what") === "pause") {
    // ====== Pause ====== //
    counting = false;
    window.clearInterval(timer);
    $(this).data("what", "play").attr("style", "").text("Play");
  } else {
    // ====== Play ====== //
    if ($("#timer-check").is(":checked")) {
      counting = true;
      countDown();
    }

    curTime = context.currentTime;
    noteCount = parseInt($(".ts-top").val(), 10);
    schedule();

    $(this).data("what", "pause").css({
      background: "#F75454",
      color: "#FFF"
    }).text("Stop");
  }
});

function metronomeShow() {
  var elms = document.getElementsByClassName("instruments-containerMetronome");
  Array.from(elms).forEach((x) => {
    if (x.style.display === "flex") {
      x.style.display = "none";
    } else {
      x.style.display = "flex";
    }
  })
};