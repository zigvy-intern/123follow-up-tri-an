$(function() {
  $('#modalBookHotel').on('hidden.bs.modal', function (ele) {
    $('#modalBookHotel #book_hotel_city').val('');
    $('#modalBookHotel #book_hotel_district').val('');
    $('#modalBookHotel #book_hotel_ward').val('');
    $('#modalBookHotel #book_hotel_name').val('');
    $('#modalBookHotel #book_hotel_address').val('');
    $('#modalBookHotel #book_hotel_type').val('');
    $('#modalBookHotel #book_check_in').val('');
    $('#modalBookHotel #book_check_out').val('');
    $('#modalBookHotel #book_hotel_price').val('');
    $('#modalBookHotel #book_hotel_night').val('');
    $('#modalBookHotel #book_hotel_totalPrice').val('');
    $('#modalBookHotel #book_hotel_cus').val('');
    $('#modalBookHotel #book_hotel_card').val('');
    $('#modalBookHotel #book_hotel_phone').val('');
    $('#book-hotel-modal-text').text('New Book Hotel');
    $('#modalBookHotel input[name=id]').val('');
    $('#bookHotel').text('Confirm');
  });

   $('#book_hotel_city').on('change', function(){
    document.getElementById('book_hotel_district').options.length = 0;
    document.getElementById('book_hotel_ward').options.length = 0;
    document.getElementById('book_hotel_name').options.length = 0;
    document.getElementById('book_hotel_type').options.length = 0;
    $('#modalBookHotel #book_hotel_address').val('');
    $('#modalBookHotel #book_check_in').val('');
    $('#modalBookHotel #book_check_out').val('');
    $('#modalBookHotel #book_hotel_price').val('');
    $('#modalBookHotel #book_hotel_night').val('');
    $('#modalBookHotel #book_hotel_totalPrice').val('');
    $('#modalBookHotel #book_hotel_cus').val('');
    $('#modalBookHotel #book_hotel_card').val('');
    $('#modalBookHotel #book_hotel_phone').val('');
    getBookDistrict(this.value)
  })
  $('#book_hotel_district').on('change', function(){
    document.getElementById('book_hotel_ward').options.length = 0;
    document.getElementById('book_hotel_name').options.length = 0;
    document.getElementById('book_hotel_type').options.length = 0;
    $('#modalBookHotel #book_hotel_address').val('');
    $('#modalBookHotel #book_check_in').val('');
    $('#modalBookHotel #book_check_out').val('');
    $('#modalBookHotel #book_hotel_price').val('');
    $('#modalBookHotel #book_hotel_night').val('');
    $('#modalBookHotel #book_hotel_totalPrice').val('');
    $('#modalBookHotel #book_hotel_cus').val('');
    $('#modalBookHotel #book_hotel_card').val('');
    $('#modalBookHotel #book_hotel_phone').val('');
    getBookWard(this.value)
  })
  $('#book_hotel_ward').on('change', function(){
    document.getElementById('book_hotel_name').options.length = 0;
    document.getElementById('book_hotel_type').options.length = 0;
    $('#modalBookHotel #book_hotel_address').val('');
    $('#modalBookHotel #book_check_in').val('');
    $('#modalBookHotel #book_check_out').val('');
    $('#modalBookHotel #book_hotel_price').val('');
    $('#modalBookHotel #book_hotel_night').val('');
    $('#modalBookHotel #book_hotel_totalPrice').val('');
    $('#modalBookHotel #book_hotel_cus').val('');
    $('#modalBookHotel #book_hotel_card').val('');
    $('#modalBookHotel #book_hotel_phone').val('');
    getBookHotel(this.value)
  })
  $('#book_hotel_name').on('change',function(){
    document.getElementById('book_hotel_type').options.length = 0;
    $('#modalBookHotel #book_hotel_price').val('');
    $('#modalBookHotel #book_hotel_totalPrice').val('');
    getBookTypeRoom(this.value)
  })

});
$(document).ready(function(){
  $('#book_hotel_name').on('change', function(){
    $('#book_hotel_address').val(($(this).find(':selected').data('hotel-address')));
  })
})
$(document).ready(function(){
  $('#book_hotel_type').on('change', function(){
    const valueIn = document.getElementById('book_check_in').value;
    const valueOut = document.getElementById('book_check_out').value;
    if( valueIn === '' && valueOut === ''){
      $('#book_hotel_price').val(($(this).find(':selected').data('price')));
      $('#book_hotel_night').val('$0');
      $('#book_hotel_totalPrice').val('$0');
    }else{
      $('#book_hotel_price').val(($(this).find(':selected').data('price')));
      const checkIn = document.getElementById('book_check_in').value;
      const checkOut = document.getElementById('book_check_out').value;
      const price = document.getElementById('book_hotel_price').value;
      const valueCheckIn = moment(checkIn);
      const valueCheckOut = moment(checkOut);
      const valueDay = valueCheckOut.diff(valueCheckIn, 'days');
      const numberDay = valueDay*Number(price);
      $('#book_hotel_night').val(valueDay);
      $('#book_hotel_totalPrice').val(numberDay);
    }});
  });
$(document).ready(function(){
  $('#book_check_out').on('change', function(){
    const checkIn = document.getElementById('book_check_in').value;
    const checkOut = document.getElementById('book_check_out').value;
    const price = document.getElementById('book_hotel_price').value;
    const valueCheckIn = moment(checkIn);
    const valueCheckOut = moment(checkOut);
    const valueDay = valueCheckOut.diff(valueCheckIn, 'days');
    const numberDay = valueDay*Number(price);
    $('#book_hotel_night').val(valueDay);
    $('#book_hotel_totalPrice').val(numberDay);
  })
})

const submitBookHotel = function(){
  let data = {};
  $.each($('#insert-book-hotel-form').serializeArray(), function(index, row){
    if(row.value.trim() !== "")
      data[row.name] = row.value;
  });
  let url = '';
  if(!data.id)
    url = API.bookhotel.create;
  else
    url = API.bookhotel.edit;

  $.post(url, data, function(response){
    var getData = JSON.parse(response);
    if(getData.error){
      alert(getData.error);
      return false;
    }
    if(!getData.id)
      appendToBookHotel(getData);
    else
      updateBookHotelRecord(getData);
    $('#modalBookHotel').modal('hide');
  });
}

const appendToBookHotel = function(join){
  let html = `<tr class="hotel-content" id="tr-bookhotel-${join.id}}" data-bookhotel-id="${join.id}" >
      <td>${join.id}</td>
      <td class='hotel-hotel-id' data-hotel-id="${join.id_hotel}">${join.hotel_name}</td>
      <td class='hotel-city-id'>${join.city_name} </td>
      <td class='hotel-district-id'>${join.district_name}</td>
      <td class='hotel-ward-id'>${join.ward_name} </td>
      <td class='hotel-address'>${join.hotel_address} </td>
      <td class='hotel-customer'>${join.hotel_customer}</td>
      <td class='hotel-card'>${join.hotel_identity_card} </td>
      <td class='hotel-phone'>${join.hotel_cus_phone} </td>
      <td class='hotel-type-room'>${join.type_room}</td>
      <td class='hotel-check-in'>${join.hotel_check_in}</td>
      <td class='hotel-check-out'>${join.hotel_check_out}</td>
      <td class='hotel-night'>${join.hotel_number_day} </td>
      <td class='hotel-price' hidden>${join.hotel_price} </td>
      <td class='hotel-totalPrice'>${join.hotel_total_price } </td>
      <td><button class="btn btn-default" onclick="#" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
          <button class="btn btn-default" id="delTour" type="button"><a href="{{route('deleteBookHotel',$join->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
      </td>
    </tr>`;
  $('#bookHotel-list').append(html);
}

const editBookHotel = function(ele) {
  const bookHotelId = $(ele).parents('tr').data('bookhotel-id');
  const url = `${API.bookhotel.getdetail}/${bookHotelId}`
  $.ajax({
    type:'GET',
    url: url,
    cache: false,
    contentType: false,
    processData: false,
    success:function(data){
      var getData = JSON.parse(data);
      $.each(getData.cityList, function(index, data){
        $('#book_hotel_city').append(`
          <option value="${data.matp}" ${getData.city_id === data.matp ? 'selected' : null}>${data.city_name}</option>
        `)
      })
      $.each(getData.districtList, function(index, data){
        $('#book_hotel_district').append(`
          <option value="${data.maqh}" ${getData.district_id === data.maqh ? 'selected' : null}>${data.district_name}</option>
        `)
      })
      $.each(getData.wardList, function(index, data){
        $('#book_hotel_ward').append(`
          <option value="${data.xaid}" ${getData.ward_id === data.xaid ? 'selected' : null}>${data.ward_name}</option>
        `)
      })
      $.each(getData.hotelList, function(index, data){
        $('#book_hotel_name').append(`
          <option value="${data.id}" ${getData.id_hotel === data.id ? 'selected' : null}>${data.hotel_name}</option>
        `)
      })
      $.each(getData.getHotelRoom, function(index, data){
        $('#book_hotel_type').append(`
          <option value="${data.id_type}" ${getData.hotel_type_room === data.id ? 'selected' : null}>${data.type_room}</option>
        `)
      })
      $('#modalBookHotel input[name=id]').val(getData.id);
      $('#modalBookHotel #book_hotel_address').val(getData.hotel_address_id);
      $('#modalBookHotel #book_check_in').val(getData.hotel_check_in);
      $('#modalBookHotel #book_check_out').val(getData.hotel_check_out);
      $('#modalBookHotel #book_hotel_price').val(getData.hotel_price);
      $('#modalBookHotel #book_hotel_night').val(getData.hotel_number_day);
      $('#modalBookHotel #book_hotel_totalPrice').val(getData.hotel_total_price);
      $('#modalBookHotel #book_hotel_cus').val(getData.hotel_customer);
      $('#modalBookHotel #book_hotel_card').val(getData.hotel_identity_card);
      $('#modalBookHotel #book_hotel_phone').val(getData.hotel_cus_phone);
      $('#book-hotel-modal-text').text('Edit Book Hotel');
      $('#bookHotel').text('Save');
    },
    error: function(data){
      alert('Error');
      console.log(data);
    }
  });
  $('#modalBookHotel').modal('show');
}

const updateBookHotelRecord = function(book){
  $(`#tr-bookHotel-${book.id}`).find('.hotel-hotel-id').text(book.id_hotel);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-city-id').text(book.city_id);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-district-id').text(book.district_id);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-ward-id').text(book.ward_id);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-customer').text(book.hotel_customer);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-card').text(book.hotel_identity_card);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-phone').text(book.hotel_cus_phone);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-address').text(book.hotel_address_id);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-type-room').text(book.type_room_id);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-check-in').text(book.hotel_check_in);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-check-out').text(book.hotel_check_out);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-night').text(book.hotel_number_day);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-price').text(book.hotel_price);
  $(`#tr-bookHotel-${book.id}`).find('.hotel-totalPrice').text(book.hotel_total_price);
}

const onBookHotelSearch = function(el){
  const textSearch = el.value;
  $('#bookHotel-list tbody tr').each(function(index, row){
    $(row).hide();
    let content = '';
    $(row).find('td').each(function(item, element){
      content += $(element).text().trim() + " ";
    })
    const patt = new RegExp(textSearch, 'ig');
    if(patt.test(content.trim())){
      $(row).show();
    }
  })
}

function validateFormBookHotel(){
  var HotelId=document.getElementById('book_hotel_city').value;
  var CityId=document.getElementById('book_hotel_district').value;
  var DistrictId=document.getElementById('book_hotel_ward').value;
  var WardId=document.getElementById('book_hotel_name').value;
  var Address=document.getElementById('book_hotel_address').value;
  var TypeId=document.getElementById('book_hotel_type').value;
  var Checkin=document.getElementById('book_check_in').value;
  var Checkout=document.getElementById('book_check_out').value;
  var Price=document.getElementById('book_hotel_price').value;
  var NumberDay=document.getElementById('book_hotel_night').value;
  var TotalPrice=document.getElementById('book_hotel_totalPrice').value;
  var Customer=document.getElementById('book_hotel_cus').value;
  var IdentityCard=document.getElementById('book_hotel_card').value;
  var NumberPhone=document.getElementById('book_hotel_phone').value;

  if (Customer==null || Customer==""){
    alert("Please choose City Name !");
    return false;
  };
  if(IdentityCard==null || IdentityCard==""){
    alert("Please choose District Name !");
    return false;
  };
  if(NumberPhone==null || NumberPhone==""){
    alert("Please choose Ward Name !");
    return false;
  };
  if (HotelId==null || HotelId==""){
    alert("Please choose City Name !");
    return false;
  };
  if(DistrictId==null || DistrictId==""){
    alert("Please choose District Name !");
    return false;
  };
  if(WardId==null || WardId==""){
    alert("Please choose Ward Name !");
    return false;
  };
  if(CityId==null || CityId==""){
    alert("Please fill out City Name !");
    return false;
  };
  if(Address==null || Address==""){
    alert("Please fill out Address !");
    return false;
  };
  if(TypeId==null || TypeId==""){
    alert("Please choose Type Room !");
    return false;
  };
  if(Checkin==null || Checkin==""){
    alert("Please choose Time Check In !");
    return false;
  };
  if(Checkout==null || Checkout==""){
    alert("Please choose Time Check Out !");
    return false;
  };
  if(Price==null || Price==""){
    alert("Please fill out Hotel Price !");
    return false;
  };
  if(Price <0 ){
    alert("Tour Price must be greater than or equal to 0");
    return false;
  }
  if(NumberDay==null || NumberDay==""){
    alert("Please fill out Number Night !");
    return false;
  };
  if(TotalPrice==null || TotalPrice==""){
    alert("Please fill out Total Price !");
    return false;
  };
  if(!/^[0-9]+$/.test(NumberPhone)){
    alert("Please only enter numeric for Number Phone! (Allowed input:0-9)")
    return false;
  };
  submitBookHotel()
}

const getBookDistrict = function(cityCode) {
  $.get(API.location.district, {city_id: cityCode}).done(function(response){
    const bookDistricts = JSON.parse(response);
    if(bookDistricts.length > 0) {
      $('#book_hotel_district').append(`
         <option selected">Choose..</option>
      `)
      $.each(bookDistricts, function(index, district){
        $('#book_hotel_district').append(`
          <option value="${district.maqh}">${district.district_name}</option>
        `)
      })
    }
  });
}
const getBookWard = function(districtCode) {
  $.get(API.location.ward, {district_id: districtCode}).done(function(response){
    const bookWards = JSON.parse(response);
    if(bookWards.length > 0) {
      $('#book_hotel_ward').append(`
        <option selected">Choose..</option>
      `)
      $.each(bookWards, function(index, ward){
        $('#book_hotel_ward').append(`
          <option value="${ward.xaid}">${ward.ward_name}</option>
        `)
      })
    }
  });
}
const getBookHotel = function(hotelId) {
  $.get(API.get.hotel, {hotel_id: hotelId}).done(function(response){
    const getHotels = JSON.parse(response);
    console.log(getHotels)
    if(getHotels.length > 0) {
      $('#book_hotel_name').append(`
            <option selected">Choose..</option>
        `)
      $.each(getHotels, function(index, hotel){
        $('#book_hotel_name').append(`
          <option value="${hotel.id}" data-hotel-address="${hotel.hotel_address}">${hotel.hotel_name}</option>
        `)
      })
    }
  });
}
const getBookTypeRoom = function(typeRoomId) {
  $.get(API.get.typeRoom, {type_room_id: typeRoomId}).done(function(response){
    const getTypeRooms = JSON.parse(response);
    if(getTypeRooms.length > 0) {
      $('#book_hotel_type').append(`
            <option selected">Choose..</option>
        `)
      $.each(getTypeRooms, function(index, type){
        $('#book_hotel_type').append(`
          <option data-price="${type.room_price}" value="${type.id}" ${getTypeRooms.type_room_id === type.type_room_id ? 'selected' : null}>${type.type_room}</option>
        `)
      })
    }
  });
}
// $(document).ready(function(){
//   function addRemoveClass(theRow){
//     theRow.removeClass('odd even');
//     theRow.filter(':odd').addClass('odd');
//     theRow.filter(':even').addClass('even');
//   }
//   var row = $('table#bookHotel-list tr');
//   addRemoveClass(row);
//   $('#select-Hotel').on('change',function(){
//     var select = this.value;
//     if(select !='All'){
//       row.filter('[position='+select+']').show();
//       row.not('[position='+select+']').hide();
//       var visibldeRow = row.filter('[position='+select+']');
//       addRemoveClass(visibldeRow);
//     }else{
//       row.show();
//       addRemoveClass(row);
//     }
//   });
// });
