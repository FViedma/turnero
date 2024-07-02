var video = document.getElementById("videoPlayer");
var videos = document.getElementById("listaVideos");
var sources = [];
for (let i = 0; i < videos.options.length; i++) {
    const option = videos.options[i];
    sources.push(option.value);
}
var currentSource = 0;
video.addEventListener("ended", function () {
    currentSource++;
    if (currentSource == sources.length) {
        currentSource = 0;
    }
    video.src = "videos/" + sources[currentSource];
    video.volume=0.5;
    video.load();
    video.play();
});