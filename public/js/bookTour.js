$(function() {
  $('#modalBookTour').on('hidden.bs.modal', function (ele) {
    $('#modalBookTour #book_choose_tour').val('');
    $('#modalBookTour #book_user_id').val('');
    $('#modalBookTour #book_cus_name').val('');
    $('#modalBookTour #book_tour_email').val('');
    $('#modalBookTour #book_tour_phone').val('');
    $('#modalBookTour #book_tour_address').val('');
    $('#modalBookTour #book_tour_member').val('');
    $('#modalBookTour #book_tour_time').val('');
    $('#modalBookTour #book_tour_price').val('');
    $('#modalBookTour #book_tour_totalPrice').val('');
    $('#book-tour-modal-text').text('Add new user');
    $('#modalBookTour input[name=book_tour_id]').val("");
    $('#bookTour').text('Confirm');
  });
});

$(document).ready(function(){
  $('#book_choose_tour').on('change', function(){
    $('#book_tour_price').val(($(this).find(':selected').data('price')));
  })
})

$(document).ready(function(){
  $('#book_tour_member').on('change', function(){
    var price = document.getElementById('book_tour_price').value;
    $('#book_tour_totalPrice').val(($(this).find(':selected').data('number'))*Number(price));
  })
})

const submitBookTour = function(){
  let data = {};
  $.each($('#insert-book-tour-form').serializeArray(), function(index, row){
    if(row.value.trim() !== "")
      data[row.name] = row.value;
  });
  let url = '';
  if(!data.id)
    url = API.booktour.create;
  else
    url = API.booktour.edit;

  $.post(url, data, function(response){
    var getData = JSON.parse(response);
    if(getData.error){
      alert(getData.error);
      return false;
    }
    if(!getData.id)
      appendToBookTour(getData);
    else
      updateBookTourRecord(getData);
    $('#modalBookTour').modal('hide');
  });
}

const appendToBookTour = function(join){
  let html = `<tr position="#" id="tr-booktour-${join.id}" data-booktour-id="${join.id}" >
    <td>${join.id}</td>
    <td class='book-choose-id'>${ join.tour_name } </td>
    <td class='book-user-id'>${ join.name } </td>
    <td class='book-cus-id'>${ join.book_cus_name } </td>
    <td class='book-email'>${ join.book_email } </td>
    <td class='book-phone'>${ join.book_phone } </td>
    <td class='book-member'>${ join.book_member } </td>
    <td class='book-address'>${ join.book_address } </td>
    <td class='book-time' data-time="${join.book_time}">${ join.book_time } </td>
    <td class='book-price' data-book-price="${join.book_price}">${ join.book_price} </td>
    <td class='book-totalPrice' data-totalprice="${join.book_total_price}">${ join.book_total_price } </td>
    <td><button class="btn btn-default" onclick="editBookTour(this)"  type="button"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-default" id="delTour" type="button"><a href="#" class="glyphicon glyphicon-remove" ></a></button>
    </td>
  </tr>`;
  $('#bookTour-list').append(html);
}

const editBookTour = function(ele) {
  $('#modalBookTour').modal('show');
  const bookTourId = $(ele).parents('.book-content').data('booktour-id');
  const bookTourNameId = $(ele).parents('tr').find('.book-choose-id').data('tourname-id');
  const bookTourUser = $(ele).parents('tr').find('.book-user-id').data('user-id');
  const bookTourCus = $(ele).parents('tr').find('.book-cus-id').text().trim();
  const bookTourEmail = $(ele).parents('tr').find('.book-email').text().trim();
  const bookTourPhone = $(ele).parents('tr').find('.book-phone').text().trim();
  const bookTourAddress = $(ele).parents('tr').find('.book-address').text().trim();
  const bookTourMember = $(ele).parents('tr').find('.book-member').text().trim();
  const bookTourTime = $(ele).parents('tr').find('.book-time').data('time');
  const bookTourPrice = $(ele).parents('tr').find('.book-price').data('book-price');
  const bookTourTotalPrice = $(ele).parents('tr').find('.book-totalPrice').data('totalprice');

  $('#modalBookTour input[name=id]').val(bookTourId);
  $('#modalBookTour #book_choose_tour').val(bookTourNameId);
  $('#modalBookTour #book_user_id').val(bookTourUser);
  $('#modalBookTour #book_cus_name').val(bookTourCus);
  $('#modalBookTour #book_tour_email').val(bookTourEmail);
  $('#modalBookTour #book_tour_phone').val(bookTourPhone);
  $('#modalBookTour #book_tour_address').val(bookTourAddress);
  $('#modalBookTour #book_tour_member').val(bookTourMember);
  $('#modalBookTour #book_tour_time').val(bookTourTime);
  $('#modalBookTour #book_tour_price').val(bookTourPrice);
  $('#modalBookTour #book_tour_totalPrice').val(bookTourTotalPrice);
  $('#book-tour-modal-text').text('Edit Book Tour');
  $('#bookTour').text('Save');
}

const updateBookTourRecord = function(book){
  $(`#tr-booktour-${book.id}`).find('.book-choose-id').text(book.book_tour_id);
  $(`#tr-booktour-${book.id}`).find('.book-user-id').text(book.book_user_id);
  $(`#tr-booktour-${book.id}`).find('.book-cus-id').text(book.book_cus_name);
  $(`#tr-booktour-${book.id}`).find('.book-email').text(book.book_email);
  $(`#tr-booktour-${book.id}`).find('.book-phone').text(book.book_phone);
  $(`#tr-booktour-${book.id}`).find('.book-address').text(book.book_address);
  $(`#tr-booktour-${book.id}`).find('.book-member').text(book.book_member);
  $(`#tr-booktour-${book.id}`).find('.book-time').text(book.book_time);
  $(`#tr-booktour-${book.id}`).find('.book-price').text(book.book_price);
  $(`#tr-booktour-${book.id}`).find('.book-totalPrice').text(book.book_total_rice);
}

const onBookTourSearch = function(el){
  const textSearch = el.value;
  $('#bookTour-list tbody tr').each(function(index, row){
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

function validateform(){
  var bookCus=document.getElementById('book_cus_name').value;
  var bookUser=document.getElementById('book_user_id').value;
  var bookTour=document.getElementById('book_choose_tour').value;
  var bookEmail=document.getElementById('book_tour_email').value;
  var bookPhone=document.getElementById('book_tour_phone').value;
  var bookAddress=document.getElementById('book_tour_address').value;
  var bookTime=document.getElementById('book_tour_time').value;
  var bookMember=document.getElementById('book_tour_member').value;

  var atposition=bookEmail.indexOf("@");
  var dotposition=bookEmail.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=bookEmail.length){
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);
  return false;
  }

  if (bookCus==null || bookCus==""){
    alert("Please fill out Customer name !");
    return false;
  };
  if (bookUser==null || bookUser==""){
    alert("Please choose Manager !");
    return false;
  };
  if(bookTour==null || bookTour==""){
    alert("Please choose Tours !");
    return false;
  };
  if(bookEmail==null || bookEmail==""){
    alert("Please fill out Customer email !");
    return false;
  };
  if(bookPhone==null || bookPhone==""){
    alert("Please fill out Number phone !");
    return false;
  };
  if(!/^[0-9]+$/.test(bookPhone)){
    alert("Please only enter numeric for Number Phone! (Allowed input:0-9)")
    return false;
  };
  if(bookAddress==null || bookAddress==""){
    alert("Please fill out Customer address !");
    return false;
  };
  if(bookTime==null || bookTime==""){
    alert("Please fill out Day order !");
    return false;
  };
  if(bookMember==null || bookMember==""){
    alert("Please fill out Number member !");
    return false;
  };
  submitBookTour()
}
// $(document).ready(function(){
//   function addRemoveClass(theRow){
//     theRow.removeClass('odd even');
//     theRow.filter(':odd').addClass('odd');
//     theRow.filter(':even').addClass('even');
//   }
//   var row = $('table#bookTour-list tr');
//   addRemoveClass(row);
//   $('#select-tour').on('change',function(){
//     var select = this.value;
//     if(select !='All'){
//       row.filter('[position='+select+']').show();
//       row.not('[position='+select+']').hide();
//       var visibldeRow = row.filter('[position='+select+']');
//       addRemoveClass(visibldeRow);
//     }else{
//       row.show();
//       addRemoveClass(row);
//     }
//   });
// });
