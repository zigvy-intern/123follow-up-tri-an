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
  if(data.id.trim() === "" )
    url = API.user.create;
  else
    url = API.user.edit;

  $.post(url, data, function(response){
    if(data.id.trim() === "" )
      appendToUser(JSON.parse(response));
    else
      updateUserRecord(JSON.parse(response));
    $('#myUser').modal('hide');
  });
}

const appendToUser = function(user){
  let html = `<tr>
      <td>${ user.id }</td>
      <td>${ user.name }</td>
      <td>${ user.birthday }</td>
      <td>${ user.email } </td>
      <td>${ user.phone } </td>
      <td>${ user.address}</td>
      <td>${ user.title}</td>
      <td>${ user.role } </td>
      <td>${ user.created_at } </td>
      <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
          <button class="btn btn-default" id="delUser" type="button"><a href="{{route('deleteUser',$u->id)}}" class="glyphicon glyphicon-remove" ></a></button>
      </td>
    </tr>`;
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
  $('#role').on('change',function(){
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
