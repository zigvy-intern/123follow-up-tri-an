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
}

const TitleClass = function() {

}
