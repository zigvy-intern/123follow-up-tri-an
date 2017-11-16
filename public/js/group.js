$(function() {
  $('#modalgroup').on('hidden.bs.modal', function (e) {
    $('#modalgroup #groupname').val('');
    $('#modalgroup #leader').val('');
    $('#modalgroup #members').val('none');
    $('#modalgroup #job').val('');
    $('#group-modal-text').text('Add new Group');
    $('#modalgroup input[name=id]').val("");
    $('#insertgroup').text('Add');

  });
});

const submitGroup = function(){
  let data = {};
  // get data form from create group
  $.each($('#insert_form').serializeArray(), function(index, row){
    if(row.value.trim() !== "")
    data[row.name] = row.value;
  });
  // get member of of
  let members = [];
  $('.users-selected #members').each(function(index, row){
   members.push($(row).data('user-id'));
  });
  data['members'] = members.join(',');

 let url = '';
  if(!data.id)
    url = API.group.create;
  else
    url = API.group.edit;
  $.post(url, data, function(response){
    if(!data.id)
      appendToGroup(JSON.parse(response));
    else
      updateGroupRecord(JSON.parse(response));
    $('#modalgroup').modal('hide');
  });
}

const appendToGroup = function(group){
  let html = `<tr>
    <td>${group.id}</td>
    <td>${group.group_name }</td>
    <td>${group.leader_name }</td>
    <td>${group.members }</td>
    <td>${group.job_name }</td>
    <td><button class="btn btn-default" onclick="editGroup(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button></td>
    <td><button class="btn btn-default" id="delGroup" type="button"><a href="{{route('deleteGroup',$g->id)}}" class="glyphicon glyphicon-remove" ></a></button></td>
    </tr>`
  $('#group-list').append(html);
}

const onHandleSearchGroup = function(el){
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

const editGroup = function(el){
  $('#modalgroup').modal('show');
  const groupId = $(el).parents('tr').data('group-id');
  const groupName = $(el).parents('tr').find('.group-name').text().trim();
  const leaderName = $(el).parents('tr').find('.group-leader').text().trim();
  const members = $(el).parents('tr').find('.group-members');
  const jobName = $(el).parents('tr').find('.group-job').text().trim();
    $('#modalgroup input[name=id]').val(groupId);
    $('#modalgroup #groupname').val(groupName);
    $('#modalgroup #leader').val(leaderName);
    $('#modalgroup #members').val(members);
    $('#modalgroup #job').val(jobName);
    $('#group-modal-text').text('Edit Groups');
    $('#insertgroup').text('Edit');
}

const handleSelectUser = function(element){
  const userId = $(element).data('user-id');
  const userName = $(element).parent().text().trim();
  if (element.checked) {
    const html = `<a data-user-id=${userId} class="list-group-item" id="members">
      ${userName}
      </a>`
    $('#modalgroup .users-selected').append(html);
  } else {
    $(`#modalgroup a[data-user-id=${userId}]`).remove()
  }
  var userSelected = [];
  $('a.list-group-item').each(function(){
    userSelected.push($(this).data('user-id'));
})

}
const updateGroupRecord = function(group){
  $(`#tr-group-${group.id}`).find('.group-name').text(group.group_name);
  $(`#tr-group-${group.id}`).find('.group-leader').text(group.leader_name);
  $(`#tr-group-${group.id}`).find('.group-members').text(group.members);
  $(`#tr-group-${group.id}`).find('.group-job').text(group.job_name);

}

const GroupClass = function() {

}
