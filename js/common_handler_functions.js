
// Copyright (C) 2018, @mr_dreamerskies

 
function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request.responseText, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
 }

 function parseXml(str) {
    if (window.ActiveXObject) {
      var doc = new ActiveXObject('Microsoft.XMLDOM');
      doc.loadXML(str);
      return doc;
    } else if (window.DOMParser) {
      return (new DOMParser).parseFromString(str, 'text/xml');
    }
 }
 

 function doNothing() {}

 function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}


function GetURLParameter(sParam) {

  var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }

}

function get_trip_duration(fday, lday) {

var month = fday.substring(
    fday.lastIndexOf("-") - 2, 
    fday.lastIndexOf("-")
);


  var season = 1

  if ((month > 4) &&(month < 8))
  
    season=2;

  else if ((month > 7) &&(month < 10))

    season=3;

  else if ((month >= 10) || (month <= 2))

    season=4;


  var moment_lday = moment(lday);
  var moment_fday = moment(fday);


  var duration = moment_lday.diff(moment_fday, 'days') + 1;

  return {
    season:season,
    duration:duration 
  };
}

