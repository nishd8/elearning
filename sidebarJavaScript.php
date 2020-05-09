<script type="text/javascript">
  	$(function()
    {
     $("#tg").click(function()
     {
     	 var cl = $(this).attr("class");
         if(cl==='fas fa-arrow-alt-circle-right')
         {
     	 $("#tg").removeClass('fas fa-arrow-alt-circle-right');
         $("#tg").addClass('fas fa-arrow-alt-circle-left');
         }
         else
         {
          $("#tg").removeClass('fas fa-arrow-alt-circle-left');
          $("#tg").addClass('fas fa-arrow-alt-circle-right');
         	
         }
         $("#sb").animate({width: 'toggle'});
         return false;
     }); 
   });

  	function tgllist(id)
  	{
  		//var list=document.getElementById(id);
  		id="#"+id;
  		$(id).slideToggle();
  		
  	}
  	function playvid(path,status)
  	{
  		path=path.toString()
  	    var video=document.getElementById('vidshow');
  	    
        document.getElementById('viddiv').style.display="block";
  	    var source=document.getElementById('srcvid');
        source.setAttribute('src', path);
        video.load();
        if(status===0)
        {
          var temp=path.replace('videos/','');
          document.getElementById("publish").style.display="block";
          document.getElementById("vidpub").value=temp;
        }
        else
        {
         document.getElementById("publish").style.display="none";
          document.getElementById("vidpub").value=""; 
        }
  	    //srcvid.src=path;
  	}

    $(document).ready(function(){
   $('#vidshow').bind('contextmenu',function() { return false; });
   $('#tg').click();
   document.getElementById('viddiv').style.display="block";
        
});
  </script>