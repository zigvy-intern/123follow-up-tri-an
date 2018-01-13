$(function() {
  $('#modalHotelRoom').on('hidden.bs.modal', function (e) {
    $('#modalHotelRoom #hotel_room_name').val('none');
    $('#modalHotelRoom #hotel_room_type').val('');
    $('#modalHotelRoom #hotel_room_room').val('');
    $('#modalHotelRoom #hotel_room_numbers').val('');
    $('#modalHotelRoom #hotel_room_status').val('');
    $('#hotel-room-modal-text').text('Add room');
    $('#modalHotelRoom input[name=id]').val("");
    $('#addRoom').text('Add')
  });

  $('#hotel_room_name').on('change', function(){
    document.getElementById('hotel_room_type').options.length = 0;
    getHotelRoom(this.value)
  })

});

const getHotelRoom = function(typeRoomId) {
  $.get(API.get.hotelroom, {type_room_id: typeRoomId}).done(function(response){
    const typeRooms = JSON.parse(response);
    console.log(typeRooms)
    if(typeRooms.length > 0) {
      $.each(typeRooms, function(index, data){
        $('#hotel_room_type').append(`
          <option value="${data.id_type}">${data.type_room}</option>
        `)
      })
    }
  });
}

const submitRoom = function(){
  let data = {};
  $.each($('#insert-hotel-room-form').serializeArray(), function(index, row){
    data[row.name] = row.value;
  });

  let url = '';
  if(data.id.trim() === "" )
    url = API.room.create;
  else
    url = API.room.edit;

  $.post(url, data, function(response){
    if(data.id.trim() === "" )
      appendToRoom(JSON.parse(response));
    else
      updateRoomRecord(JSON.parse(response));
    $('#modalHotelRoom').modal('hide');
    setTimeout(function(){
      window.location.reload();
    },200);
  });
}

const appendToRoom = function(room){
  let html = `
  <div class='room-content' id="addroom-${room.id}" data-addroom-id="${room.id}">
    <h2 hidden>${room.id}</h2>
    <h2 class="room-hotel-id" data-hotel="${room.hotel_name}" hidden>${room.hotel_id}</h2>
    <h2 class="room-type" data-type="${room.type_room_id}" hidden>${room.type_room_id}</h2>
    <h2 class="room-price" hidden>${room.room_price}</h2>
    <h2 class="room-numbers" hidden>${room.room_numbers}</h2>
    <h2 class="room-status" data-status="${room.room_status}" hidden>${room.room_status}</h2>
    <a class="btn btn-default" onclick="editRoom(this)" role="button" title="Edit Room"><i class="fa fa-pencil-square-o" style="font-size:20px;"></i></a>
  </div>`;
  $('#addHotel-list').append(html);
}

const editRoom = function(e) {
  document.getElementById('hotel_room_type').options.length = 0;
  const roomId = $(e).parents('.hotel-content').data('addroom-id');
  const url = `${API.room.getroom}/${roomId}`
  $.ajax({
    type:'GET',
    url: url,
    cache: false,
    contentType: false,
    processData: false,
    success:function(data){
      var getData = JSON.parse(data);
      $.each(getData.get_hotel_list, function(index, data){
        $('#hotel_room_type').append(`
          <option value="${data.type_room_id}" data-price="${data.room_price}" data-numbers="${data.room_numbers}" data-status="${data.room_status}" ${getData.type_room_id === data.type_room_id ? 'selected' : null}>${data.type_room}</option>
        `)
      })
      $('#modalHotelRoom input[name=id]').val(getData.id);
      $('#modalHotelRoom #hotel_room_name').val(getData.hotel_id);
      $('#modalHotelRoom #hotel_room_price').val(getData.room_price);
      $('#modalHotelRoom #hotel_room_numbers').val(getData.room_numbers);
      $('#modalHotelRoom #hotel_room_status').val(getData.room_status);
      $('#hotel-room-modal-text').text('Edit Room');
      $('#addRoom').text('Save');
    },
    error: function(data){
      alert('Error');
      console.log(data);
    }
  });
  $('#modalHotelRoom').modal('show');

  $(document).ready(function(){
    $('#hotel_room_type').on('change', function(){
      $('#hotel_room_price').val(($(this).find(':selected').data('price')));
      $('#hotel_room_numbers').val(($(this).find(':selected').data('numbers')));
      $('#hotel_room_status').val(($(this).find(':selected').data('status')));
    })
  })
  $(document).ready(function(){
    $('#hotel_room_name').on('change', function(){
      $('#hotel_room_type').val(($(this).find(':selected').data('type')));
      $('#hotel_room_price').val(($(this).find(':selected').data('price')));
      $('#hotel_room_numbers').val(($(this).find(':selected').data('numbers')));
      $('#hotel_room_status').val(($(this).find(':selected').data('status')));
    })
  })
}

const updateRoomRecord = function(room){
  $(`#addhotel-${room.id}`).find('.room-hotel-id').text(room.hotel_id);
  $(`#addhotel-${room.id}`).find('.room-type').text(room.type_room_id);
  $(`#addhotel-${room.id}`).find('.room-price').text(room.room_price);
  $(`#addhotel-${room.id}`).find('.room-numbers').text(room.room_numbers);
  $(`#addhotel-${room.id}`).find('.room-status').text(room.room_status);
}

function validateRoomForm(){
  var roomName=document.getElementById('hotel_room_name').value;
  var roomType=document.getElementById('hotel_room_type').value;
  var roomPrice=document.getElementById('hotel_room_price').value;
  var roomNumbers=document.getElementById('hotel_room_numbers').value;

  if (roomName==null || roomName==""){
    alert("Please choose Hotel Name");
    return false;
  };
  if (roomType==null || roomType==""){
    alert("Please choose Type Room");
    return false;
  };

  if(roomPrice==null || roomPrice==""){
    alert("Please fill out Room Price");
    return false;
  };
  if(roomPrice < 0){
      alert("Price must be greater than or equal to 0");
      return false;
  };
  if(roomNumbers==null || roomNumbers==""){
    alert("Please fill out Numbers");
    return false;
  };
}
