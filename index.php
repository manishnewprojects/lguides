<!-- Copyright (C) 2018, LanternGuides.com -->

<!DOCTYPE html>

<html lang="en">
 
<head>

<?php include 'php_includes/header.php'; ?> 

<script type="text/javascript">
$(function () {
      $('#theinput').autocomplete({
        minLength: 1,
        source: "php_includes/search.php"
      });
    });
	

var user_score=0;

var user_profile = [];

</script>
 
</head>

<!-- Primary Page Layout -->

 
 <body>

<?php include 'php_includes/navbar.php'; ?> 
     

<div>

<!-- Destination -->    
<label>Where are you going?</label>
<input id="theinput" name="textinput" placeholder="bucketlist_place">

<script>

	
    $(document).on("keypress", "input", function(e){
    if(e.which == 13){

    	params = { 'args': $(this).val()};

      user_profile[2]=params;

    }
});
</script>



<p>
<!-- Dates -->

<label>When?</label>
<input type="text" name="datefilter" value="Click to select dates" />
</p>

<p>
<!-- Type -->

<label> Help us understand you better (use the slider - go ahead, try it - </label>


<div><img class="mv_icon" id="left_emo"  style="margin-left: 10%;  float: left;"></div>
<div><img class="mv_icon" id="right_emo" style="margin-right: 10%; float: right;" ></div>

 <div id="slider"> </div> <!-- end of slider -->

<div id="swappers">

<div id="swapper-first"> 

   <img class="mv_image" src="images/selection_group1.png">
   <button class="next" frame_data="1">Next</button>

</div>
 
<div id="swapper-second" style="display:none;">

   <img class="mv_image" src="images/selection_group2.png">
   <button class="back">Back</button>
   <button class="next" frame_data="2">Next</button>


</div>

<div id="swapper-third" style="display:none;">
 
  <img class="mv_image" src="images/selection_group3.png">
   <button class="back">Back</button>
   <button class="done">Done</button>

</div>


</div>

<script> console.log( user_profile ) 

$.ajax({
            url: 'php_includes/place_query.php',
            type: 'GET',
            data: { 'args': user_profile[2]},
          cache: false,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
            success: function(data){
                var info=JSON.stringify(data);
                user_profile[3] = info;
                //console.log(info);
          }
        });

</script>


<?php include 'php_includes/footer.php'; ?>

<?php include 'php_includes/end_js.php'; ?>


</body>
</html>