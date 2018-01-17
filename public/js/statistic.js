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
      $('#modalTotalPriceHotel #total_price_hotel').val(hotels);
  });
}
