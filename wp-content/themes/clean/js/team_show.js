   $(document).ready(function(){
       $('.carousel').carousel();
       $('#ch1').popover();
       $('#ch2').popover();
       $('#ch3').popover();
       $('#ch4').popover();
       $('#ch5').popover();
       $('#ch6').popover();
       $('#ch7').popover();
       $('#ch8').popover();
      $( ".team_bio" ).hide();
  
      $("#bio_btn_1").click(function(){
        $("#team_bio_1").show("slow");
        $("#bio_btn_1").hide();
        $("#team_bio_2").hide();
        $("#bio_btn_2").show();
        $("#team_bio_3").hide();
        $("#bio_btn_3").show();
      });
       $("#bio_btn_2").click(function(){
        $("#team_bio_2").show("slow");
        $("#bio_btn_2").hide();
        $("#team_bio_1").hide();
        $("#bio_btn_1").show();
        $("#team_bio_3").hide();
        $("#bio_btn_3").show();
      });
       $("#bio_btn_3").click(function(){
        $("#team_bio_3").show("slow");
        $("#bio_btn_3").hide();
        $("#team_bio_1").hide();
        $("#bio_btn_1").show();
        $("#team_bio_2").hide();
        $("#bio_btn_2").show();
      });
    });