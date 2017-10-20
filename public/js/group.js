$(function() {
  console.log( "ready!" );
});

const submitCreateGroup = function(){
  let data = {};
  $.each($('#insert_form').serializeArray(), function(index, row){
    data[row.name] = row.value;
  });
  $.post(API.group.create, data, function(response){
    appendToGroup(JSON.parse(response));
    $('#addgroup').modal('hide');
  });

}

const appendToGroup = function(group){
  let html = `<tr>
    <td>${group.id}</td>
    <td>${group.group_name }</td>
    <td>${group.leader_name }</td>
    <td>${group.members }</td>
    <td>${group.job_name }</td>
    <td>${group.create_day }</td>
    <td>${group.deadline }</td>
    <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button> 
        <button class="btn btn-default" id="delete" type="button"><i class="glyphicon glyphicon-remove"></i></button> </td>
    </tr>`;
  $('#group-list').append(html);
}

const onHandleSearch = function(el){
  const textSearch = el.value;
  $('#group-list tbody tr').each(function(index, row){
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

const GroupClass = function() {

}
