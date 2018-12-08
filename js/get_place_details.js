// Copyright (C) 2018, @mr_dreamerskies

function get_place_details(place) {

var searchUrl = 'php_includes/place_query.php?data=' + place;

if (place == "") {
        document.getElementById("theinput").innerHTML = "";
return;
}
  
$.ajax({
              url : 'php_includes/place_query.php',
              type: "POST",
              dataType: 'json',
              data: {args: place},
              success:function(response) {

              }
		});

}