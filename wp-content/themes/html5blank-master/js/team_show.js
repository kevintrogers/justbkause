   $(document).ready(function(){
      $( ".team_bio" ).hide();
  
      $("#bio_btn_1").click(function(){
        $("#team_bio_1").show("slow");
        $("#bio_btn_1").hide();
      });
       $("#bio_btn_2").click(function(){
        $("#team_bio_2").show("slow");
        $("#bio_btn_2").hide();
      });
       $("#bio_btn_3").click(function(){
        $("#team_bio_3").show("slow");
        $("#bio_btn_3").hide();
      });
    });
