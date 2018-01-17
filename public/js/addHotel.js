$(function() {
  $('#modalAddHotel').on('hidden.bs.modal', function (ele) {
    $('#modalAddHotel #add_hotel_image').val('');
    $('#modalAddHotel #add_hotel_name').val('');
    $('#modalAddHotel #add_hotel_owner').val('');
    $('#modalAddHotel #add_hotel_ward').val('');
    $('#modalAddHotel #add_hotel_district').val('');
    $('#modalAddHotel #add_hotel_city').val('');
    $('#modalAddHotel #add_hotel_address').val('');
    $('#add-hotel-modal-text').text('Add New Hotel');
    $('#modalAddHotel input[name=id]').val("");
    $('#addHotel').text('Add');
  });

  $('#insert-hotel-form').on('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    let url;
    if(!formData.get('id')){
      url = API.addhotel.create;
    }else{
      url = API.addhotel.edit;
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
        if(!getData.id)
          appendToAddHotel(getData);
        else
          updateAddHotelRecord(getData);
        $('#modalAddHotel').modal('hide');
        setTimeout(function(){
          window.location.reload();
        },200);
      },
      error: function(data){
        alert('Error');
        console.log(data);
      }
    });
  })

  $('#add_hotel_city').on('change', function(){
    document.getElementById('add_hotel_district').options.length = 0;
    getDistrict(this.value)
  })
  $('#add_hotel_district').on('change', function(){
    document.getElementById('add_hotel_ward').options.length = 0;
    getWard(this.value)
  })
});

const submitAddHotel = function(){
  $('#insert-hotel-form').submit();
}
const appendToAddHotel = function(hotel){
  let html =
 `<div class="hotel-item col-sm-4" id="addhotel-${hotel.id}" data-addhotel-id="${hotel.id}">
   <img class="hotel-image" data-image="${hotel.hotel_image}" src="source/img/${hotel.hotel_image}" style="width:100%" alt="Image">
   <div class='hotel-content' style="height: 150px;">
     <h2 hidden>${hotel.id}</h2>
     <h2 class="hotel-name" data-hotel-id="${hotel.id}">${hotel.hotel_name}</h2>
     <h2 class="hotel-owner">${hotel.hotel_owner}</h2>
     <h2 class="hotel-city-id" data-city-id="${hotel.hotel_city_id}" hidden>${hotel.city_name}</h2>
     <h2 class="hotel-district-id" data-district-id="${hotel.hotel_district_id}" hidden>${hotel.district_name}</h2>
     <h2 class="hotel-ward-id" data-ward-id="${hotel.hotel_ward_id}" hidden>${hotel.ward_name}</h2>
     <h2 class="hotel-address" hidden>${hotel.hotel_address}</h2>
     <a href="#" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
     <a class="btn btn-default" data-toggle="modal" data-target="#modalTourInfo"><i class="glyphicon glyphicon-plus"></i></a>
     <a class="btn btn-default" onclick="#" role="button"><i class="glyphicon glyphicon-pencil"></i></a>
     <a href="{{route('deleteHotel',$hotel->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
   </div>
 </div>`;
  $('#addRoom-list').append(html);
}

const editAddHotel = function(ele) {
  const hotelId = $(ele).parents('.hotel-item').data('addhotel-id');
  const url = `${API.addhotel.getDetail}/${hotelId}`
  $.ajax({
    type:'GET',
    url: url,
    cache: false,
    contentType: false,
    processData: false,
    success:function(data){
      var getData = JSON.parse(data);
      $.each(getData.district_list, function(index, data){
        $('#add_hotel_district').append(`
          <option value="${data.maqh}" ${getData.hotel_district_id === data.maqh ? 'selected' : null}>${data.district_name}</option>
        `)
      })
      $.each(getData.ward_list, function(index, dataWard){
        $('#add_hotel_ward').append(`
          <option value="${dataWard.xaid}" ${getData.hotel_ward_id === dataWard.xaid ? 'selected' : null}>${dataWard.ward_name}</option>
        `)
      })
      $('#modalAddHotel input[name=id]').val(getData.id);
      $('#modalAddHotel #add_hotel_city').val(getData.hotel_city_id)
      $('#modalAddHotel #add_hotel_owner').val(getData.hotel_owner);
      $('#modalAddHotel #add_hotel_name').val(getData.hotel_name);
      $('#modalAddHotel #add_hotel_address').val(getData.hotel_address);
      $('#add-hotel-modal-text').text('Edit Hotel');
      $('#addHotel').text('Save');
    },
    error: function(data){
      alert('Error');
      console.log(data);
    }
  });
  $('#modalAddHotel').modal('show');

}

const updateAddHotelRecord = function(hotel){
  $(`#addhotel-${hotel.id}`).find('.hotel-image').text(hotel.hotel_image);
  $(`#addhotel-${hotel.id}`).find('.hotel-name').text(hotel.hotel_name);
  $(`#addhotel-${hotel.id}`).find('.hotel-owner').text(hotel.hotel_owner);
  $(`#addhotel-${hotel.id}`).find('.hotel-city-id').text(hotel.hotel_city_id);
  $(`#addhotel-${hotel.id}`).find('.hotel-district-id').text(hotel.hotel_district_id);
  $(`#addhotel-${hotel.id}`).find('.hotel-ward-id').text(hotel.hotel_ward_id);
  $(`#addhotel-${hotel.id}`).find('.hotel-address').text(hotel.hotel_address);
}

const getDistrict = function(cityCode) {
  $.get(API.location.district, {city_id: cityCode}).done(function(response){
    const districts = JSON.parse(response);
    if(districts.length > 0) {
      $('#add_hotel_district').append(`
        <option selected>Choose..</option>
      `)
      $.each(districts, function(index, data){
        $('#add_hotel_district').append(`
          <option value="${data.maqh}">${data.district_name}</option>
        `)
      })
    }
  });
}
const getWard = function(districtCode) {
  $.get(API.location.ward, {district_id: districtCode}).done(function(response){
    const wards = JSON.parse(response);
    if(wards.length > 0) {
      $('#add_hotel_ward').append(`
        <option selected>Choose..</option>
      `)
      $.each(wards, function(index, dataWard){
        $('#add_hotel_ward').append(`
          <option value="${dataWard.xaid}">${dataWard.ward_name}</option>
        `)
      })
    }
  });
}

function validateHotelForm(){
  var hotelName=document.getElementById('add_hotel_name').value;
  var hotelOwner=document.getElementById('add_hotel_owner').value;
  var hotelAddress=document.getElementById('add_hotel_address').value;
  var hotelCity=document.getElementById('add_hotel_city').value;
  var hotelDistrict=document.getElementById('add_hotel_district').value;
  var hotelWard=document.getElementById('add_hotel_ward').value;
  var hotelImage=document.getElementById('add_hotel_image').value;

  if (hotelName==null || hotelName==""){
    alert("Please fill out Hotel Name");
    return false;
  };
  if (hotelOwner==null || hotelOwner==""){
    alert("Please fill out Hotel Name");
    return false;
  };
  if(hotelAddress==null || hotelAddress==""){
    alert("Please fill out Address");
    return false;
  };
  if(hotelCity==null || hotelCity==""){
    alert("Please choose City");
    return false;
  };
  if(hotelDistrict==null || hotelDistrict==""){
    alert("Please choose District");
    return false;
  };
  if(hotelWard==null || hotelWard==""){
    alert("Please choose Ward");
    return false;
  };
  submitAddHotel()
}

const onHotelSearch = function(el){
  const hotelSearch = el.value;
  $('#addHotel-list div').each(function(index, row){
    $(row).hide();
    console.log(row);
    let content = '';
    $(row).find('h2').each(function(item, element){
      content += $(element).text().trim() + " ";
    })
    const patt = new RegExp(hotelSearch, 'ig');
    if(patt.test(content.trim())){
      $(row).show();
    }
  })
}
