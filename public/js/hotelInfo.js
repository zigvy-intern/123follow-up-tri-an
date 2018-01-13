$(function() {
  $('#modalHotelInfo').on('hidden.bs.modal', function (ele) {
    $('#modalHotelInfo #hotel_info_image').val('');
    $('#modalHotelInfo #hotel_info_journey').val('');
    $('#hotel-info-text').text('INFORMATION OF hotel');
    $('#modalHotelInfo input[name=id]').val("");
    $('#addHotelInfo').text('Add');
  });

  $('#insert-hotel-info-form').on('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('hotel_info_content', CKEDITOR.instances.hotel_info.getData())

    let url = '';
    if(formData.get('id')){
      url = API.hotelinfo.edit;
    } else {
      alert('Something wrong with your page');
      return false;
    }
    $.ajax({
      type:'POST',
      url: url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success:function(data){
        var getData = JSON.parse(data);
        if(getData.id)
          updateHotelInfoRecord(getData);
        $('#modalHotelInfo').modal('hide');
        setTimeout(function(){
          window.location.reload();
        },500);
      },
      error: function(data){
        alert('Error');
        console.log(data);
      }
    });
  })
});

$(document).ready(function(){
  $('#room_status').on('change', function(){
    $('#room_number').val(($(this).find(':selected').data('room')));
    $('#room_booked').val(($(this).find(':selected').data('booked')));
  })
})

const submitHotelInfo = function(){
  $('#insert-hotel-info-form').submit();
}

const editHotelInfo = function(ele) {
  $('#modalHotelInfo').modal('show');
  const hotelInfoId = $(ele).parents('.container').data('info-id');
  const hotelInfoHotelName = $(ele).parents('.container').find('.hotel-name').data('hotel-name');
  const hotelInfoImage = $(ele).parents('.container').find('.hotel-image').text().trim();
  const hotelInfoDes = $(ele).parents('.hotel-content').find('.hotel-description').data('description');
  CKEDITOR.instances['hotel_info'].setData(hotelInfoDes);

  $('#modalHotelInfo input[name=id]').val(hotelInfoId);
  $('#modalHotelInfo #hotel_info_name').val(hotelInfoHotelName);
  $('#modalHotelInfo #hotel_info_image').val(hotelInfoImage);
  $('#modalHotelInfo #hotel_info').val(hotelInfoDes);
  $('#hotel-info-text').text('EDIT INFORMATION HOTEL');
  $('#addHotelInfo').text('Save');
}

const updateHotelInfoRecord = function(hotel){
  $(`#hotel-info-${hotel.id}`).find('.hotel-image').text(hotel.hotel_slide);
  $(`#hotel-info-${hotel.id}`).find('.hotel-description').text(hotel.hotel_description);
}

// function validateform(){
//   var hotelName=document.getElementById('add_hotel_name').value;
//   var hotelFrom=document.getElementById('add_hotel_from').value;
//   var hotelTo=document.getElementById('add_hotel_to').value;
//   var hotelStart=document.getElementById('add_start_time').value;
//   var hotelEnd=document.getElementById('add_end_time').value;
//   var hotelMember=document.getElementById('add_hotel_member').value;
//   var hotelPrice=document.getElementById('add_hotel_price').value;
//   var hotelImage=document.getElementById('add_hotel_image').value;
//
//   if (hotelName==null || hotelName==""){
//     alert("Please fill out hotel name");
//     return false;
//   };
//   if(hotelFrom==null || hotelFrom==""){
//     alert("Please fill out departure");
//     return false;
//   };
//   if(hotelTo==null || hotelTo==""){
//     alert("Please fill out destination");
//     return false;
//   };
//   if(hotelStart==null || hotelStart==""){
//     alert("Please fill out start time");
//     return false;
//   };
//   if(hotelEnd==null || hotelEnd==""){
//     alert("Please fill out end time");
//     return false;
//   };
//   if(hotelMember==null || hotelMember==""){
//     alert("Please fill out number member");
//     return false;
//   };
//   if(hotelPrice==null || hotelPrice==""){
//     alert("Please fill out hotel price");
//     return false;
//   };
// }
