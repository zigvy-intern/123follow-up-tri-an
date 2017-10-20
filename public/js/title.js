$(function() {
  $('#myTitle').on('hidden.bs.modal', function (e) {
    $('#myTitle #title-name').val('');
    $('#myTitle #title-status').val('none');
    $('#title-modal-text').text('Add new Title');
    $('#myTitle input[name=id]').val("");
  });
});

const submitCreateTitle = function(){
  let data = {};
  $.each($('#insert_form').serializeArray(), function(index, row){
    data[row.name] = row.value;
  });
  $.post(API.title.create, data, function(response){
    appendToTitle(JSON.parse(response));
    $('#myTitle').modal('hide');
  });

}

const appendToTitle = function(title){
  let html = `<tr>
    <td>${title.id}</td>
    <td>${title.title_name }</td>
    <td>${title.status } </td>
    <td>${title.created_at } </td>
    <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-default" id="delete" type="button"><i class="glyphicon glyphicon-remove"></i></button> </th>
    </tr>`;
  $('#title-list').append(html);
}

const onHandleSearch = function(el){
  const textSearch = el.value;
  $('#title-list tbody tr').each(function(index, row){
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
    $('button').click(function (event) {
      event.preventDefault()
  });
}

// $(document).ready(function(){
//   function addRemoveClass(theRow){
//     theRow.romoveClass("odd even");
//     theRow.filter(":odd").addClass("odd");
//     theRow.filter(":even").addClass("even");
//   }
//   var row = $('#title-list tr:not(:first)');
// });


const editTitle = function(e) {
  $('#myTitle').modal('show');
  const titleName = $(e).parents('tr').find('.title-name').text().trim();
  const titleStatus = $(e).parents('tr').find('.title-status').text().trim();
  const titleId = $(e).parents('tr').data('title-id');
  $('#myTitle #title-name').val(titleName);
  $('#myTitle #title-status').val(titleStatus);
  $('#title-modal-text').text('Edit Title');
  $('#myTitle input[name=id]').val(titleId);
}

const submitEditTitle = function(){
  
}

const TitleClass = function() {

}
