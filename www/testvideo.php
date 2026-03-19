<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <TITLE> HTML5 Test </TITLE>
    <SCRIPT LANGUAGE="JavaScript">

        function funcTest() {

            var waitingCount = 0;

            var video = document.getElementById("myVideo");
            var statu = document.getElementById("statu");
            var time = document.getElementById("time");
            var canplay = document.getElementById("canplay");
            var waiting = document.getElementById("waiting");

            var load = document.getElementById("load");

            video.addEventListener("timeupdate", function(){
                time.innerHTML = Math.floor(video.currentTime) + "/" + Math.floor(video.duration) + " (초)"
            }, false);

            video.addEventListener("play", function(){
                statu.innerHTML = "재생진입";
            }, false);

            video.addEventListener("playing", function(){
                statu.innerHTML = "재생시작";
            }, false);

            video.addEventListener("ended", function(){
                statu.innerHTML = "재생종료";
            }, false);

            video.addEventListener("canplay", function(){
                canplay.innerHTML = "재생가능";
            }, false);

            video.addEventListener("waiting", function(){
                waiting.innerHTML = waitingCount++;
            }, false);

            video.addEventListener("load", function(){
                load.innerHTML = "데이터 다운로드완료";
            }, false);

        }
        //-->
    </SCRIPT>
</HEAD>
<BODY onLoad="funcTest()">
<video
    id="myVideo"
    width="400"
    height="300"
    poster="http://desmond.yfrog.com/Himg29/scaled.php?tn=0&server=29&filename=r16t.jpg&xsize=640&ysize=640"
    autoplay
    controls
>

    <source src="/video/ex_sub3_2.mp4">
</video>

<br/>

<hr />재생관련<hr />
<span>재생시간 : </span><span id="time"></span>
<br/><br/>
<span>현재상태 : </span><span id="statu"></span>
<br/><br/>
<span>canplay : </span><span id="canplay"></span>
<br/><br/>
<span>waiting : </span><span id="waiting"></span>

<hr />데이터 로드관련<hr />
<span>load : </span><span id="load"></span>
<br/><br/>

</BODY>
</HTML>
