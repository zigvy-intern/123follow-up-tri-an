$(function() {
  $('#modalRole').on('hidden.bs.modal', function (e) {
    $('#modalRole #add_role_name').val('');
    $('#role-modal-text').text('Add New Level');
    $('#modalRole input[name=id').val("");
    $('#addRole').text('Add');
  });

  $('#insert-role-form').on('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    let url;
    if(!formData.get('id')){
      url = API.role.create;
    }else{
      url = API.role.edit;
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
          appendToRole(getData);
        else
          updateRoleRecord(getData);
        $('#modalRole').modal('hide');
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

const submitRole = function(){
  $('#insert-role-form').submit();
}

const appendToRole = function(role){
  let html =
 `<tr>
    <td>${role.id}</td>
    <td>${role.role_name }</td>
    <td><button class="btn btn-default" onclick="editRole(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-default" id="delRole" type="button"><a href="${route('deleteRole',role.id)}" class="glyphicon glyphicon-remove"></a></button>
    </td>
  </tr>`;
  $('#role-list').append(html);
}
const editRole = function(e) {
  $('#modalRole').modal('show');
  const roleId = $(e).parents('tr').data('role-id');
  const roleName = $(e).parents('tr').find('.role-name').text().trim();

  $('#modalRole input[name=id]').val(roleId);
  $('#modalRole #add_role_name').val(roleName);
  $('#role-modal-text').text('Edit Role');
  $('#addRole').text('Edit');
}

const updateRoleRecord = function(role){
  $(`#tr-role-${role.id}`).find('.role-name').text(role.role_name);
}

const onRoleSearch = function(el){
  const roleSearch = el.value;
  $('#role-list tbody tr').each(function(index, row){
    $(row).hide();
    let content = '';
    $(row).find('td').each(function(item, element){
      content += $(element).text().trim() + " ";
    })
    const pattt = new RegExp(roleSearch, 'ig');
    if(pattt.test(content.trim())){
      $(row).show();
    }
  })
}

function validateRoleForm(){
  var roleFillName=document.getElementById('add_role_name').value;

  if (roleFillName==null || roleFillName==""){
    alert("Please fill out Role Name");
    return false;
  };
}
