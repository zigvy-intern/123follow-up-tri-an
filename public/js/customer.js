$(function() {
  $('#modalCustomer').on('hidden.bs.modal', function (e) {
    $('#modalCustomer #cus_name').val('');
    $('#modalCustomer #cus_email').val('');
    $('#modalCustomer #cus_password').val('');
    $('#modalCustomer #cus_birthday').val('');
    $('#modalCustomer #cus_address').val('');
    $('#modalCustomer #cus_phone').val('');
    $('#customer-modal-text').text('Register');
    $('#modalCustomer input[name=id]').val('');
    $('#register').text('Register');
  });
});

const onCustomerSearch = function(ele){
  const textCusSearch = ele.value;
  $('#customer-list tbody tr').each(function(index, row){
    $(row).hide();
    let content = '';
    $(row).find('td').each(function(item, element){
      content += $(element).text().trim() + " ";
    })
    const patt = new RegExp(textCusSearch, 'ig');
    if(patt.test(content.trim())){
      $(row).show();
    }
  })
}

const submitCustomer = function(){
  let data = {};
  $.each($('#insert-customer-form').serializeArray(), function(index, row){
    if(row.value.trim() !== "")
      data[row.name] = row.value;
  });
  let url = '';
  if(data.id.trim() === "")
    url = API.customer.create;
  else
    url = API.customer.edit;

  $.post(url, data, function(response){
    if(data.id.trim() === "")
      appendToCustomer(JSON.parse(response));
    else
      updateCustomerRecord(JSON.parse(response));
  });

}

const appendToCustomer = function(customer){
  let html = `<tr>
      <td>${ customer.id }</td>
      <td>${ customer.cus_name }</td>
      <td>${ customer.cus_email } </td>
      <td>${ customer.cus_birthday} </td>
      <td>${ customer.cus_address} </td>
      <td>${ customer.cus_phone } </td>
      <td hidden>${ customer.cus_password } </td>
      <td>${ customer.created_at } </td>
      <td><button class="btn btn-default" onclick="#" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
          <button class="btn btn-default" id="delete" type="button"><a class="glyphicon glyphicon-remove" href="#"></a></button>
      </td>
    </tr>`;
  $('#customer-list').append(html);
}

const editCustomer = function(ele) {
  $('#modalCustomer').modal('show');
  const customerId = $(ele).parents('tr').data('customer-id');
  const customerName = $(ele).parents('tr').find('.customer-name').text().trim();
  const customerEmail = $(ele).parents('tr').find('.customer-email').text().trim();
  const customerPassword = $(ele).parents('tr').find('.customer-password').text().trim();
  const customerBirthday= $(ele).parents('tr').find('.customer-birthday').text().trim();
  const customerAddress = $(ele).parents('tr').find('.customer-address').text().trim();
  const customerPhone = $(ele).parents('tr').find('.customer-phone').text().trim();

  $('#modalCustomer input[name=id]').val(customerId);
  $('#modalCustomer #cus_name').val(customerName);
  $('#modalCustomer #cus_email').val(customerEmail);
  $('#modalCustomer #cus_password').val(customerPassword);
  $('#modalCustomer #cus_birthday').val(customerBirthday);
  $('#modalCustomer #cus_address').val(customerAddress);
  $('#modalCustomer #cus_phone').val(customerPhone);
  $('#customer-modal-text').text('Edit Customer');
  $('#register').text('Edit');
}

const updateCustomerRecord = function(customer){
  $(`#tr-customer-${customer.id}`).find('.customer-name').text(customer.cus_name);
  $(`#tr-customer-${customer.id}`).find('.customer-email').text(customer.cus_name);
  $(`#tr-customer-${customer.id}`).find('.customer-password').text(customer.cus_password);
  $(`#tr-customer-${customer.id}`).find('.customer-birthday').text(customer.cus_birthday);
  $(`#tr-customer-${customer.id}`).find('.customer-address').text(customer.cus_address);
  $(`#tr-customer-${customer.id}`).find('.customer-phone').text(customer.cus_phone);

}

function validateCustomerForm(){
  var cusFillName=document.getElementById('cus_name').value;
  var cusFillBirthday=document.getElementById('cus_birthday').value;
  var cusFillEmail=document.getElementById('cus_email').value;
  var cusFillPhone=document.getElementById('cus_phone').value;
  var cusFillAddress=document.getElementById('cus_address').value;
  var cusFillPassword=document.getElementById('cus_password').value;


  var atposition=cusFillEmail.indexOf("@");
  var dotposition=cusFillEmail.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=cusFillEmail.length){
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);
  return false;
  }
  if (cusFillName==null || cusFillName==""){
    alert("Please fill out Customer Name");
    return false;
  };
  if(cusFillBirthday==null || cusFillBirthday==""){
    alert("Please fill out Customer Birthday");
    return false;
  };
  if(cusFillEmail==null || cusFillEmail==""){
    alert("Please fill out @gmail.com");
    return false;
  };
  if(!/^[0-9]+$/.test(cusFillPhone)){
    alert("Please only enter numeric for Number Phone! (Allowed input:0-9)")
    return false;
  };
  if(cusFillAddress==null || cusFillAddress==""){
    alert("Please fill out Customer Address");
    return false;
  };
  if(cusFillPassword.length >6){
    alert("Password must be at least 6 characters long");
    return false;
  };
  submitCustomer()
}
