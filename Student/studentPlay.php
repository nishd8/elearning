<script>
function play(path,views)
  	{
  		  path=path.toString()
  	    var video=document.getElementById('vidshow');
  	    var title=document.getElementById('title');
        document.getElementById('viddiv').style.display="block";

        document.getElementById('lkbtn').style.display="inline-block";
  	    var source=document.getElementById('srcvid');
        //document.getElementById('trimvid').value=path;
        var res = path.replace("videos/", "");
        res = res.replace(".mp4", "");

  	    title.innerHTML=res;
         document.getElementById('views').innerHTML=views;
        source.setAttribute('src', path);
        video.load();
   	}



  </script>