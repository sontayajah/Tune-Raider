document.addEventListener("keypress", test);

function test(e) {
    keyClick(e.key)
}

function keyClick(key) {
    switch (key) {
        case "y":
            var audio = new Audio("sounds/drums/Crash cymbal.mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "u":
            var audio = new Audio("sounds/drums/Ride cymbal.mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "r":
            var audio = new Audio("sounds/drums/Hi-hat (closed).mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "e":
            var audio = new Audio("sounds/drums/Hi-hat (open).mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "c":
            var audio = new Audio("sounds/drums/Hi-hat (foot).mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "g":
            var audio = new Audio("sounds/drums/High tom-tom.mp3")
            audio.volume = 0.1;
            audio.play();
        case "h":
            var audio = new Audio("sounds/drums/Low tom-tom.mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "j":
            var audio = new Audio("sounds/drums/Floor tom.mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "s":
            var audio = new Audio("sounds/drums/Snare drum.mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "d":
            var audio = new Audio("sounds/drums/Snare drum (cross stick).mp3")
            audio.volume = 0.1;
            audio.play();
            break;
        case "x":
            var audio = new Audio("sounds/drums/Bass drum.mp3")
            audio.volume = 0.1;
            audio.play();
            break;

        default:
            console.log("sound is not defind")

    }

}