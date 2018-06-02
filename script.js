var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var year = d.getFullYear();
    var today = year+"-"+month+"-"+day;
    $("#date").attr("min",today);

$(function(){



 	$("#createTask").hide();
 
 	$("#create").focus(function(){
        $("#createTask").show();
        $(".main2").addClass("disabled light");
         $(".main1").addClass("disabled");
          $(".nav").addClass("disabled");
          $(".tasks").addClass("disabled light");
  });


$("#search").blur(function(){
  $(".main2").addClass("enabled");
  $(".main1").addClass("enabled");
  $(".nav").addClass("enabled");
  $(this).val(" ");
});

/*$("#search").focus(function(){
  $(".main2").addClass("disabled light");
        $(".main1").addClass("disabled");
        $(".nav").addClass("disabled");
});
*/
  $("#search").keyup(function(){

        
        var str = $(this).val();
             
    $.get("search.php?str="+str, function(data, status){
    if(data!="")
      $(".main2").html(data);

    });
  });



   $(".cancel").click(function(){
    	$( "#createTask").hide();
    	$(".main1").addClass("enabled");
  		$(".main2").addClass("enabled");  
      $(".nav").addClass("enabled");  
    })




    $(".cancel").click(function(){
      /*$(".tasks").addClass("enabled");
      $(".main1").addClass("enabled");
      $(".main2").addClass("enabled");  
      $(".nav").addClass("enabled"); 
      $($(this).parent()).animate({
      
        left:'-=50px',
        top:'-=50px',
        fontSize: '16px',
        
       
      },"slow");*/
        // $(".main2").show();
      location.reload(true); 
    });
 

    $(".tasks").click(function(){
      //alert($(this).text());
      $(".main1").addClass("enabled");
      $(".main2").addClass("enabled");  
        $(".nav").addClass("enabled"); 
      $(".tasks").addClass("disabled");
      $($(this)).addClass("enabled");
      $($(this)).animate({
        
        fontSize: '30px',
        left:'+=30px',
        top:'+=30px'
      },"slow");
    });

    $(".edit").click(function(){
      $text = $(this).parent().text();
     //alert($text);
      document.location.href="edit.php?text="+$text;
    });

    /*$(".label").click(function(clicked){
        var url = "{clicked}.php";

    });*/

/*    $("#savechanges").submit(function(){

      $taskname = $('taskname').val();
      $desc = $('description').val();
      $status = $("#status option:selected").text();
      
      //$date = new Date($('#date').val());
      //alert($date);
      if($taskname=="" || $desc==""||$status=="Not Completed"){
        alert("No changes made!!");
        return false;
      }

    });*/


    $("#newlabel").click(function(){
        $("#new").slideDown("slow");
    });

    $("#done").click(function(){
        var nlabel = $("#input").val(); 
        window.location.href="newlabel.php?labelname="+nlabel; 
    });
  

    //alert(today);
   // alert($("#date").attr("min"));
 
});