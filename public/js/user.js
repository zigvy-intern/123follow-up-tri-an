$(function() {
  $('#myUser').on('hidden.bs.modal', function (e) {
    $('#myUser #name').val('');
    $('#myUser #birthday').val('');
    $('#myUser #email').val('');
    $('#myUser #phone').val('');
    $('#myUser #address').val('');
    $('#myUser #title').val('none');
    $('#myUser #role').val('none');
    $('#user-modal-text').text('Add new user');
    $('#myUser input[name=id]').val("");
    $('#add').text('Add');
  });
});

const onUserSearch = function(el){
  const textSearch = el.value;
  $('#user-list tbody tr').each(function(index, row){
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

const submitUser = function(){
  let data = {};
  $.each($('#insert-user-form').serializeArray(), function(index, row){
    if(row.value.trim() !== "")
      data[row.name] = row.value;
  });
  let url = '';
  if(!data.id)
    url = API.user.create;
  else
    url = API.user.edit;

  $.post(url, data, function(response){
    if(!data.id)
      appendToUser(JSON.parse(response));
    else
      updateUserRecord(JSON.parse(response));
    $('#myUser').modal('hide');
  });
  setTimeout(function(){
    window.location.reload();
  },500);
}

const appendToUser = function(jo){
  let html = `<tr position="${jo.role_id}" id="tr-user-${jo.id}" data-user-id="${jo.id}" >
    <td>{{ $jo-> id }}</td>
    <td class="user-name">${ jo.name }</td>
    <td class="user-birthday">${ jo.birthday }</td>
    <td class="user-email">${ jo.email } </td>
    <td class="user-phone">${ jo.phone } </td>
    <td class="user-address">${ jo.address } </td>
    <td class="user-title">${ jo.title } </td>
    <td class="user-role">${ jo.role_name } </td>
    <td class="user-password" hidden>${ jo.password } </td>
    <td>${ jo.created_at } </td>
    <td><button class="btn btn-default" onclick="editUser(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-default" id="delUser" type="button"><a href="{{route('deleteUser',$jo->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
    </td>`;
  $('#user-list').append(html);
}

const editUser = function(el) {
  $('#myUser').modal('show');
  const userId = $(el).parents('tr').data('user-id');
  const userName = $(el).parents('tr').find('.user-name').text().trim();
  const userBirthday = $(el).parents('tr').find('.user-birthday').text().trim();
  const userEmail = $(el).parents('tr').find('.user-email').text().trim();
  const userPhone = $(el).parents('tr').find('.user-phone').text().trim();
  const userAddress = $(el).parents('tr').find('.user-address').text().trim();
  const userTitle = $(el).parents('tr').find('.user-title').text().trim();
  const userRole = $(el).parents('tr').find('.user-role').text().trim();
  $('#myUser #password').parent().hide();
  $('#myUser input[name=id]').val(userId);
  $('#myUser #name').val(userName);
  $('#myUser #birthday').val(userBirthday);
  $('#myUser #email').val(userEmail);
  $('#myUser #phone').val(userPhone);
  $('#myUser #address').val(userAddress);
  $('#myUser #title').val(userTitle);
  $('#myUser #role').val(userRole);
  $('#user-modal-text').text('Edit User');
  $('#add').text('Edit');
}

const updateUserRecord = function(user){
  $(`#tr-user-${user.id}`).find('.user-name').text(user.name);
  $(`#tr-user-${user.id}`).find('.user-birthday').text(user.birthday);
  $(`#tr-user-${user.id}`).find('.user-email').text(user.email);
  $(`#tr-user-${user.id}`).find('.user-phone').text(user.phone);
  $(`#tr-user-${user.id}`).find('.user-address').text(user.address);
  $(`#tr-user-${user.id}`).find('.user-title').text(user.title);
  $(`#tr-user-${user.id}`).find('.user-role').text(user.role);
}



$(document).ready(function(){
  function addRemoveClass(theRow){
    theRow.removeClass('odd even');
    theRow.filter(':odd').addClass('odd');
    theRow.filter(':even').addClass('even');
  }
  var row = $('table#user-list tr');
  addRemoveClass(row);
  $('#select-role').on('change',function(){
    var select = this.value;
    if(select !='All'){
      row.filter('[position='+select+']').show();
      row.not('[position='+select+']').hide();
      var visibldeRow = row.filter('[position='+select+']');
      addRemoveClass(visibldeRow);
    }else{
      row.show();
      addRemoveClass(row);
    }
  });
});
