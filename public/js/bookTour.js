$(function() {
  $('#modalBookTour').on('hidden.bs.modal', function (ele) {
    $('#modalBookTour #book_choose_tour').val('');
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
    data[row.name] = row.value;
  });
  console.log(data);
  let url = '';
  if(data.id.trim() === "")
    url = API.booktour.create;
  else
    url = API.booktour.edit;

  $.post(url, data, function(response){
    if(data.id.trim() === "")
      appendToBookTour(JSON.parse(response));
    else
      updateBookTourRecord(JSON.parse(response));
    $('#modalBookTour').modal('hide');
  });

}

const appendToBookTour = function(bt){
  let html = `<tr position="#" id="tr-customer-{{$bt->id}}" data-customer-id="{{$bt->id}}" >
    <td>{{ $bt-> id }}</td>
    <td class='book-tour-id'>${ bt.tour_name } </td>
    <td class='book-cus-id'>${ bt.book_cus_name } </td>
    <td class='book-email'>${ bt.book_email } </td>
    <td class='book-phone'>${ bt.book_phone } </td>
    <td class='book-member'>${ bt.book_member } </td>
    <td class='book-address'>${ bt.book_address } </td>
    <td class='book-time'>${ bt.book_time } </td>
    <td class='book-price'>${ bt.book_price} </td>
    <td class='book-totalPrice'>${ bt.book_total_price } </td>
    <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
        <button class="btn btn-default" id="delTour" type="button"><a href="#" class="glyphicon glyphicon-remove" ></a></button>
    </td>
  </tr>`;
  $('#bookTour-list').append(html);
}

const editBookTour = function(ele) {
  $('#modalBookTour').modal('show');
  const bookTourId = $(ele).parents('tr').data('bookTour-id');
  const bookTourName = $(ele).parents('tr').find('.book-tour-id').text().trim();
  const bookTourCus = $(ele).parents('tr').find('.book-cus-id').text().trim();
  const bookTourEmail = $(ele).parents('tr').find('.book-email').text().trim();
  const bookTourPhone = $(ele).parents('tr').find('.book-phone').text().trim();
  const bookTourAddress = $(ele).parents('tr').find('.book-address').text().trim();
  const bookTourMember = $(ele).parents('tr').find('.book-member').text().trim();
  const bookTourTime = $(ele).parents('tr').find('.book-time').text().trim();
  const bookTourPrice = $(ele).parents('tr').find('.book-price').text().trim();
  const bookTourTotalPrice = $(ele).parents('tr').find('.book-totalPrice').text().trim();

  $('#modalBookTour input[name=book_tour_id]').val(bookTourId);
  $('#modalBookTour #book_choose_tour').val(bookTourName);
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
  $(`#tr-bookTour-${book.id}`).find('.book-choose-id').text(book.book_choose_tour);
  $(`#tr-bookTour-${book.id}`).find('.book-cus-id').text(book.book_cus_name);
  $(`#tr-bookTour-${book.id}`).find('.book-email').text(book.book_tour_email);
  $(`#tr-bookTour-${book.id}`).find('.book-phone').text(book.book_tour_phone);
  $(`#tr-bookTour-${book.id}`).find('.book-address').text(book.book_tour_address);
  $(`#tr-bookTour-${book.id}`).find('.book-member').text(book.book_tour_member);
  $(`#tr-bookTour-${book.id}`).find('.book-time').text(book.book_tour_time);
  $(`#tr-bookTour-${book.id}`).find('.book-price').text(book.book_tour_price);
  $(`#tr-bookTour-${book.id}`).find('.book-totalPrice').text(book.book_tour_totalPrice);
}
//
// const onHandleSearch = function(el){
//   const textSearch = el.value;
//   $('#title-list tbody tr').each(function(index, row){
//     $(row).hide();
//     let content = '';
//     $(row).find('td').each(function(item, element){
//       content += $(element).text().trim() + " ";
//     })
//     const patt = new RegExp(textSearch, 'ig');
//     if(patt.test(content.trim())){
//       $(row).show();
//     }
//   })
// }
//
// $(document).ready(function(){
//   function addRemoveClass(theRow){
//     theRow.removeClass('odd even');
//     theRow.filter(':odd').addClass('odd');
//     theRow.filter(':even').addClass('even');
//   }
//   var row = $('table#title-list tr');
//   addRemoveClass(row);
//   $('#select-sta').on('change',function(){
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
