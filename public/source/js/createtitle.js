$(function() {
  console.log( "ready!" );
});

const submitCreateTitle = function(){
  let data = {};
  $.each($('#insert_form').serializeArray(), function(index, row){
    data[row.name] = row.value;
  });
  $.post(API.title.create, data, function(response){
    appendToTitle(JSON.parse(response));
    $('#myModal').modal('hide');
  });

}

const appendToTitle = function(title){
  let html = `<tr>
    <th>${title.id}</th>
    <th>${title.title_name }</th>
    <th>${title.status } </th>
    <th>${title.created_at } </th>
    <th><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-default" id="delete" type="button"><i class="glyphicon glyphicon-remove"></i></button> </th>
    </tr>`;
  $('#title-list').append(html);
}

const TitleClass = function() {

}
