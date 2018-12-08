 $(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {

      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

      //console.log("A new date selection was made: " + picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
      
      var trip_info = get_trip_duration(picker.startDate.format('YYYY-MM-DD'), picker.endDate.format('YYYY-MM-DD'));

      //console.log("got back", trip_info.duration, " ", trip_info.season);

      if (trip_info.duration >= 6)
        alert("sorry, only trips up to 5 days are available");

      user_profile[1] = trip_info;

  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
 