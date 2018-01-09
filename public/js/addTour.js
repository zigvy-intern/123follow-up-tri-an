$(function() {
  $('#modalAddTour').on('hidden.bs.modal', function (ele) {
    $('#modalAddTour #add_tour_image').val('');
    $('#modalAddTour #add_tour_name').val('');
    $('#modalAddTour #add_tour_price').val('');
    $('#modalAddTour #add_tour_from').val('');
    $('#modalAddTour #add_tour_to').val('');
    $('#modalAddTour #add_tour_start').val('');
    $('#modalAddTour #add_tour_end').val('');
    $('#modalAddTour #add_tour_limit').val('');
    $('#add-tour-modal-text').text('Add New Tour');
    $('#modalAddTour input[name=id]').val("");
    $('#addTour').text('Add');
  });

  $('#insert-tour-form').on('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    let url;
    if(!formData.get('id')){
      url = API.addtour.create;
    }else{
      url = API.addtour.edit;
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
          appendToAddTour(getData);
        else
          updateAddTourRecord(getData);
        $('#modalAddTour').modal('hide');
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
});

const submitAddTour = function(){
  $('#insert-tour-form').submit();
}

const appendToAddTour = function(join){
  let html =
 `<div class="tour-item col-sm-4" id="addtour-${join.id}" data-addtour-id="${join.id}" >
    <img class="tour-image" src="source/img/${join.tour_image}"style="width:100%" alt="Image">
    <div class="tour-content" style="height: 150px;">
      <h2 hidden>${join.id}</h2>
      <h2 class="tour-name" >${join.tour_name}</h2>
      <h3 class="tour-price" data-price="${join.tour_price}"  style="font-size: 20px;">Price: ${join.tour_price}</h3>
      <h2 class="tour-from" data-city-id="${join.tour_from_id}" hidden>${join.name}</h2>
      <h2 class="tour-to" data-city-id="${join.tour_to_id}" hidden>${join.name}</h2>
      <h2 class="tour-start" data-time="${join.tour_start_time}" hidden>${join.tour_start_time}</h2>
      <h2 class="tour-end" hidden>${join.tour_end_time}</h2>
      <h2 class="tour-limit" hidden>${join.tour_member}</h2>
      <a href="{{route('tourDetail',$join->id)}}" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
      <a class="btn btn-default" data-toggle="modal" data-target="#modalTourDetail"><i class="glyphicon glyphicon-plus"></i></a>
      @include('tour.tourdetail.tour-detail-modal')
      <a class="btn btn-default open_modal" onclick="editAddTour(this)" role="button"><i class="glyphicon glyphicon-pencil"></i></a>
      <a href="{{route('deleteTour',$join->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
  </div>`;
  $('#addTour-list').append(html);
}

const editAddTour = function(ele) {
  $('#modalAddTour').modal('show');
  const addTourId = $(ele).parents('.tour-item').data('addtour-id');
  const addTourImage = $(ele).parents('.tour-item').find('.tour-image').text().trim();
  const addTourName = $(ele).parents('.tour-item').find('.tour-name').text().trim();
  const addTourPrice = $(ele).parents('.tour-item').find('.tour-price').data('price');
  const addTourFrom = $(ele).parents('.tour-item').find('.tour-from').data('city-id');
  const addTourTo = $(ele).parents('.tour-item').find('.tour-to').data('city-id');
  const addTourStart = $(ele).parents('.tour-item').find('.tour-start').data('time');
  const addTourEnd = $(ele).parents('.tour-item').find('.tour-end').text().trim();
  const addTourMember = $(ele).parents('.tour-item').find('.tour-limit').text().trim();

  $('#modalAddTour input[name=id]').val(addTourId);
  $('#modalAddTour #add_tour_image').val(addTourImage);
  $('#modalAddTour #add_tour_name').val(addTourName);
  $('#modalAddTour #add_tour_price').val(addTourPrice);
  $('#modalAddTour #add_tour_from').val(addTourFrom);
  $('#modalAddTour #add_tour_to').val(addTourTo);
  $('#modalAddTour #add_start_time').val(addTourStart);
  $('#modalAddTour #add_end_time').val(addTourEnd);
  $('#modalAddTour #add_tour_limit').val(addTourMember);
  $('#add-tour-modal-text').text('Edit Tour');
  $('#addTour').text('Save');
}

const updateAddTourRecord = function(join){
  $(`#addtour-${join.id}`).find('.tour-image').text(join.tour_image);
  $(`#addtour-${join.id}`).find('.tour-name').text(join.tour_name);
  $(`#addtour-${join.id}`).find('.tour-price').text(join.tour_price);
  $(`#addtour-${join.id}`).find('.tour-from').text(join.tour_from_id);
  $(`#addtour-${join.id}`).find('.tour-to').text(join.tour_to_id);
  $(`#addtour-${join.id}`).find('.tour-start').text(join.tour_start_time);
  $(`#addtour-${join.id}`).find('.tour-end').text(join.tour_end_time);
  $(`#addtour-${join.id}`).find('.tour-limit').text(join.tour_limit_booking);
}

function validateTourForm(){
  var tourName=document.getElementById('add_tour_name').value;
  var tourFrom=document.getElementById('add_tour_from').value;
  var tourTo=document.getElementById('add_tour_to').value;
  var tourStart=document.getElementById('add_start_time').value;
  var tourEnd=document.getElementById('add_end_time').value;
  var tourMember=document.getElementById('add_tour_limit').value;
  var tourPrice=document.getElementById('add_tour_price').value;
  var tourImage=document.getElementById('add_tour_image').value;

  if (tourName==null || tourName==""){
    alert("Please fill out tour name");
    return false;
  };
  if(tourFrom==null || tourFrom==""){
    alert("Please fill out departure");
    return false;
  };
  if(tourTo==null || tourTo==""){
    alert("Please fill out destination");
    return false;
  };
  if(tourStart==null || tourStart==""){
    alert("Please fill out start time");
    return false;
  };
  if(tourEnd==null || tourEnd==""){
    alert("Please fill out end time");
    return false;
  };
  if(tourMember==null || tourMember==""){
    alert("Please fill out number member");
    return false;
  };
  if(tourPrice==null || tourPrice=="" ){
    alert("Please fill out tour price");
    return false;
  };
  if(tourPrice < 0){
    alert("Tour Price must be greater than or equal to 0");
    return false;
  };
  submitAddTour()
}

const onTourSearch = function(el){
  const tourSearch = el.value;
  $('#addTour-list div').each(function(index, row){
    $(row).hide();
    console.log(row);
    let content = '';
    $(row).find('h2').each(function(item, element){
      content += $(element).text().trim() + " ";
    })
    const patt = new RegExp(tourSearch, 'ig');
    if(patt.test(content.trim())){
      $(row).show();
    }
  })
}
// $(document).ready(function(){
//   function addRemoveClass(theRow){
//     theRow.removeClass('odd even');
//     theRow.filter(':odd').addClass('odd');
//     theRow.filter(':even').addClass('even');
//   }
//   var row = $('table#bookTour-list tr');
//   addRemoveClass(row);
//   $('#select-tour').on('change',function(){
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
