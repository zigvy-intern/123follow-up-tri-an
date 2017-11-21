$( document ).ready(function() {
   console.log( "ready" );
});

const submitTour = function(){
  let data = {};
  $.each($('#insert-tour-info-form').serializeArray(), function(index, row){
    data[row.name] = row.value;
    console.log(data);
  });
  let url = '';
  if(!data.id)
    url = API.tour.create;
  else
    url = API.tour.edit;
  $.post(url, data, function(response){
    if(!data.id)
      appendToTour(JSON.parse(response));
    else
      updateTourRecord(JSON.parse(response));
    $('#modalTour').modal('hide');
  });

}

// const appendToTour = function(tour){
//   let html = `<tr>
//     <td>${title.id}</td>
//     <td>${title.title_name }</td>
//     <td>${title.status } </td>
//     <td>${title.created_at } </td>
//     <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
//         <button class="btn btn-default" id="delete" type="button"><i class="glyphicon glyphicon-remove"></i></button> </td>
//     </tr>`;
//   $('#title-list').append(html);
// }
//
// const onHandleSearch = function(el){
//   const textSearch = el.value;
//   $('#title-list tbody tr').each(function(index, row){
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
//   var row = $('table#title-list tr');
//   addRemoveClass(row);
//   $('#select-sta').on('change',function(){
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
//
// const editTitle = function(e) {
//   $('#myTitle').modal('show');
//   const titleName = $(e).parents('tr').find('.title-name').text().trim();
//   const titleStatus = $(e).parents('tr').find('.title-status').text().trim();
//   const titleId = $(e).parents('tr').data('title-id');
//   $('#myTitle #title-name').val(titleName);
//   $('#myTitle #title-status').val(titleStatus);
//   $('#title-modal-text').text('Edit Title');
//   $('#myTitle input[name=id]').val(titleId);
//   $('#insert').text('Edit');
// }
//
// const updateTitleRecord = function(title){
//   $(`#tr-title-${title.id}`).find('.title-name').text(title.title_name);
//   $(`#tr-title-${title.id}`).find('.title-status').text(title.status);
// }
//
// const TitleClass = function() {
//
// }