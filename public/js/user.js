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
    $('#addUser').text('Add');
  });

  $('#insert-user-form').on('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    let url;
    if(!formData.get('id')){
      url = API.user.create;
    }else{
      url = API.user.edit;
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
          appendToUser(getData);
        else
          updateUserRecord(getData);
        $('#myUser').modal('hide');
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

const submitUser = function(){
  $('#insert-user-form').submit();
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
    <td class="user-role" data-role-id=${ jo.role_id}>${ jo.role_name } </td>
    <td class="user-password" hidden>${ jo.password } </td>
    <td class="user-image" data-image=${ jo.image }>${ jo.image } </td>
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
  const userRole = $(el).parents('tr').find('.user-role').data('role-id');

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
  $('#addUser').text('Edit');
}

const updateUserRecord = function(user){
  $(`#tr-user-${user.id}`).find('.user-name').text(user.name);
  $(`#tr-user-${user.id}`).find('.user-birthday').text(user.birthday);
  $(`#tr-user-${user.id}`).find('.user-email').text(user.email);
  $(`#tr-user-${user.id}`).find('.user-phone').text(user.phone);
  $(`#tr-user-${user.id}`).find('.user-address').text(user.address);
  $(`#tr-user-${user.id}`).find('.user-title').text(user.title);
  $(`#tr-user-${user.id}`).find('.user-role').text(user.role_id);
  $(`#tr-user-${user.id}`).find('.user-image').text(user.image);
}

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

function validateUserForm(){
  var userFillName=document.getElementById('name').value;
  var userFillBirthday=document.getElementById('birthday').value;
  var userFillEmail=document.getElementById('email').value;
  var userFillPhone=document.getElementById('phone').value;
  var userFillAddress=document.getElementById('address').value;
  var userFillPassword=document.getElementById('password').value;
  var userFillRole=document.getElementById('role').value;
  var userFillTitle=document.getElementById('title').value;

  var atposition=userFillEmail.indexOf("@");
  var dotposition=userFillEmail.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=userFillEmail.length){
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);
  return false;
  }
  if (userFillName==null || userFillName==""){
    alert("Please fill out User Name");
    return false;
  };
  if(userFillBirthday==null || userFillBirthday==""){
    alert("Please fill out Birthday");
    return false;
  };
  if(userFillEmail==null || userFillEmail==""){
    alert("Please fill out Email");
    return false;
  };
  if(userFillPhone==null || userFillPhone==""){
    alert("Please fill out Number Phone");
    return false;
  };
  if(!/^[0-9]+$/.test(userFillPhone)){
    alert("Please only enter numeric for Number Phone! (Allowed input:0-9)")
    return false;
  };
  if(userFillAddress==null || userFillAddress==""){
    alert("Please fill out Address");
    return false;
  };
  if(userFillRole==null || userFillRole==""){
    alert("Please choose Role");
    return false;
  };
  if(userFillPassword.length >6){
    alert("Password must be at least 6 characters long");
    return false;
  };
  submitUser()
}
