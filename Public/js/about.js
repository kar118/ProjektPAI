$(document).ready(function(){
    $(".btn-about").click(function(){
      $(".about-content").fadeToggle("slow");
      $(".about-content").load("about.txt");  

    });
  });

  $(document).ready(function(){
    $("#box1").click(function(){
      $("#box-content-1").fadeToggle("slow");
      $("#box-content-1").load("about.txt");  

    });
  });