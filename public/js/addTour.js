$(function() {
  $('#modalAddTour').on('hidden.bs.modal', function (ele) {
    $('#modalAddTour #add_tour_image').val('');
    $('#modalAddTour #add_tour_name').val('');
    $('#modalAddTour #add_tour_price').val('');
    $('#modalAddTour #add_tour_from').val('');
    $('#modalAddTour #add_tour_to').val('');
    $('#modalAddTour #add_tour_start').val('');
    $('#modalAddTour #add_tour_end').val('');
    $('#modalAddTour #add_tour_member').val('');
    $('#add-tour-modal-text').text('Add New Tour');
    $('#modalAddTour input[name=add_tour_id]').val("");
    $('#addTour').text('Add');
  });
});

const submitAddTour = function(){
  let data = {};
  $.each($('#insert-tour-form').serializeArray(), function(index, row){
    data[row.name] = row.value;
  });
  console.log(data);
  let url = '';
  if(!data.id)
    url = API.addtour.create;
  else
    url = API.addtour.edit;

  $.post(url, data, function(response){
    if(!data.id)
      appendToAddTour(JSON.parse(response));
    else
      updateAddTourRecord(JSON.parse(response));
    $('#modalAddTour').modal('hide');
  });
  // setTimeout(function(){
  //   window.location.reload();
  // },500);
}

const appendToAddTour = function(join){
  let html =
 `<div class="col-sm-4" id="div-addTour-${to.id}" data-addTour-id="${join.id}" >
    <img src="source/img/${join.tour_image}" class="tour-image" style="width:100%" alt="Image">
    <div style="height: 150px;">
      <h2 hidden>${join.id}</h2>
      <h2 class="tour-name" >${join.tour_name}</h2>
      <h3 class="tour-price" style="font-size: 20px;">Price: ${join.tour_price}</h3>
      <h2 class="tour-from" hidden>${join.name}</h2>
      <h2 class="tour-to" hidden>${join.name}</h2>
      <h2 class="tour-start" hidden>${join.tour_start_time}</h2>
      <h2 class="tour-end" hidden>${join.tour_end_time}</h2>
      <h2 class="tour-member" hidden>${join.tour_member}</h2>
      <a href="{{route('tourDetail',$to->id)}}" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
      <a class="btn btn-default" data-toggle="modal" data-target="#modalTourDetail"><i class="glyphicon glyphicon-plus"></i></a>
      @include('tour.tourdetail.tour-detail-modal')
      <a class="btn btn-default open_modal" role="button"><i class="glyphicon glyphicon-pencil"></i></a>
      <a href="{{route('deleteTour',$to->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
    </div>
  </div>`;
  $('#addTour-list').append(html);
}

const editAddTour = function(ele) {
  $('#modalAddTour').modal('show');
  const addTourId = $(ele).parents('div').data('addTour-id');
  const addTourImage = $(ele).parents('div').find('.tour-image').text().trim();
  const addTourName = $(ele).parents('div').find('.tour-name').text().trim();
  const addTourPrice = $(ele).parents('div').find('.tour-price').text().trim();
  const addTourFrom = $(ele).parents('div').find('.tour-from').text().trim();
  const addTourTo = $(ele).parents('div').find('.tour-to').text().trim();
  const addTourStart = $(ele).parents('div').find('.tour-start').text().trim();
  const addTourEnd = $(ele).parents('div').find('.tour-end').text().trim();
  const addTourMember = $(ele).parents('div').find('.tour-member').text().trim();
  console.log(addTourTo);
  $('#modalAddTour input[name=add_tour_id]').val(addTourId);
  $('#modalAddTour #add_tour_image').val(addTourImage);
  $('#modalAddTour #add_tour_name').val(addTourName);
  $('#modalAddTour #add_tour_price').val(addTourPrice);
  $('#modalAddTour #add_tour_from').val(addTourFrom);
  $('#modalAddTour #add_tour_to').val(addTourTo);
  $('#modalAddTour #add_start_time').val(addTourStart);
  $('#modalAddTour #add_end_time').val(addTourEnd);
  $('#modalAddTour #add_tour_member').val(addTourMember);
  $('#add-tour-modal-text').text('Edit Tour');
  $('#addTour').text('Save');
}

const updateAddTourRecord = function(add){
  $(`#div-addTour-${to.id}`).find('.tour-image').text(add.add_tour_image);
  $(`#div-addTour-${to.id}`).find('.tour-name').text(add.add_tour_name);
  $(`#div-addTour-${to.id}`).find('.tour-price').text(add.add_tour_price);
  $(`#div-addTour-${to.id}`).find('.tour-from').text(add.add_tour_from);
  $(`#div-addTour-${to.id}`).find('.tour-to').text(add.add_tour_to);
  $(`#div-addTour-${to.id}`).find('.tour-start').text(add.add_start_time);
  $(`#div-addTour-${to.id}`).find('.tour-end').text(add.add_end_time);
  $(`#div-addTour-${to.id}`).find('.tour-member').text(add.add_tour_member);
}

// const onBookTourSearch = function(el){
//   const textSearch = el.value;
//   $('#bookTour-list tbody tr').each(function(index, row){
//     $(row).hide();
//     let content = '';
//     $(row).find('td').each(function(item, element){
//       content += $(element).text().trim() + " ";
//     })
//     const patt = new RegExp(textSearch, 'ig');
//     if(patt.test(content.trim())){
//       $(row).show();
//     }
//   })
// }
//
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
