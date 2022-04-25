$(function(){
  var dtToday = new Date();
  
  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();
  
  var maxDate = year + '-' + month + '-' + day;

  // or instead:
  // var maxDate = dtToday.toISOString().substr(0, 10);

  alert(maxDate);
  $('#txtDate').attr('min', maxDate);
});