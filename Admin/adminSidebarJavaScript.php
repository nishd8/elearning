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
    function show(id,id2)
    {
      var div=document.getElementById(id);
      var click=document.getElementById(id2);

      if(div.style.display==="none")
      {
       div.style.display="block";
       click.style.color="#ffcc00"
      }
      else
      {
        div.style.display="none";

      }   
      if(id==='faculty')
      {
        document.getElementById('student').style.display="none";

        document.getElementById('stu').style.color="black";

      }
      else if(id==='student')
      {
        document.getElementById('faculty').style.display="none";

        document.getElementById('fac').style.color="black";
      }
    }

    $(document).ready(function(){
   $('#vidshow').bind('contextmenu',function() { return false; });
   $('#tg').click();
   document.getElementById('faculty').style.display="block";
        
});
  </script>