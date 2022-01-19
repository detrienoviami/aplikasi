$('.all_gain').each(function(){
  var waktu_gain = $('.waktu_gain').text();
  var akurat_gain = $('.akurat_gain').text();
  var fokus_gain = $('.fokus_gain').text();
  var kepuasan_gain = $('.kepuasan_gain').text();

  var count = parseFloat(waktu_gain) + parseFloat(akurat_gain) + parseFloat(fokus_gain) + parseFloat(kepuasan_gain)
  $('#all_gain').val(count);
  $('.all_gain').text(count);
});


$('.all_kesimpulan').each(function(){
  var value = parseFloat($('.all_gain').text());  
  var gain =  $('.all_gain').text(value.toFixed(2));
  var gain_float = $('.all_gain').text();
  
  var kesimpulan = $('.all_kesimpulan').text();

  if (gain_float > 0.0 && gain_float <= 0.60) {
      var kesimpulan = $('.all_kesimpulan').text('Sangat Tidak Baik');
  }else if (gain_float > 0.61 && gain_float <= 0.70) {
      var kesimpulan = $('.all_kesimpulan').text('Tidak Baik');
  }else if (gain_float > 0.71 && gain_float <= 0.80) {
      var kesimpulan = $('.all_kesimpulan').text('Cukup Baik');
  }else if (gain_float > 0.81 && gain_float <= 0.90) {
      var kesimpulan = $('.all_kesimpulan').text('Baik');
  }else if (gain_float > 0.90) {
    var kesimpulan = $('.all_kesimpulan').text('Sangat Baik');
  }
  
  
})
