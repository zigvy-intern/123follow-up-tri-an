$(function() {
  console.log( "ready!" );
});

const onUserSearch = function(ele){
  const userSearch = ele.value;
  $('#user-list tbody tr').each(function(index, row){
    $(row).hide();
    let content = '';
    $(row).find('td').each(function(item, element){
      content += $(element).text().trim() + " ";
    })
    const patt = new RegExp(userSearch, 'ig');
    if(patt.test(content.trim())){
      $(row).show();
    }
    $('div input').click(function(event){
      event.preventDefault();
    });
  })
}
