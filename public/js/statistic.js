$( document ).ready(function() {
    console.log( "ready!" );

    $('#total_price_hotel_id').on('change', function(){
      getInfoHotel(this.value)
    })
});

const showInfoHotel = function(ele) {
  $('#modalTotalPriceHotel').modal('show');
}
const getInfoHotel = function(hotelCode) {
  $.get(API.get.hotelname, {hotel_id: hotelCode}).done(function(response){
    const hotels = JSON.parse(response);
    if(hotels.length > 0) {
      $.each(hotels, function(index, data){
        const a = [data.hotel_total_price];
        const sum = a.reduce(function(a, b) { return a + b; }, 0);
        $('#modalTotalPriceHotel #total_price_hotel').val(sum);
      })
    }
  });
}
