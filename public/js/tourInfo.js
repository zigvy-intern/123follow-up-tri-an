$(function() {
  $('#modalTourInfo').on('hidden.bs.modal', function (ele) {
    $('#modalTourInfo #tour_info_image').val('');
    $('#modalTourInfo #tour_info_journey').val('');
    $('#tour-info-text').text('INFORMATION OF TOUR');
    $('#modalTourInfo input[name=id]').val("");
    $('#addTourInfo').text('Add');
  });

  $('#insert-tour-info-form').on('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('tour_info_journey_content', CKEDITOR.instances.tour_info_journey.getData())

    let url = '';
    if(formData.get('id')){
      url = API.tourinfo.edit;
    } else {
      alert('Something wrong with your page');
      return false;
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
        if(getData.id)
          updateTourInfoRecord(getData);
        $('#modalTourInfo').modal('hide');
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

const submitTourInfo = function(){
  $('#insert-tour-info-form').submit();
}

const editTourInfo = function(ele) {
  $('#modalTourInfo').modal('show');
  const tourInfoId = $(ele).parents('.container').data('info-id');
  const tourInfoTourName = $(ele).parents('.container').find('.info-tour').data('tour-name');
  const tourInfoImage = $(ele).parents('.container').find('.info-image').text().trim();
  const tourInfoDes = $(ele).parents('.info-content').find('.info-journey').data('journey');
  CKEDITOR.instances['tour_info_journey'].setData(tourInfoDes);

  $('#modalTourInfo input[name=id]').val(tourInfoId);
  $('#modalTourInfo #tour_info_name').val(tourInfoTourName);
  $('#modalTourInfo #tour_info_image').val(tourInfoImage);
  $('#modalTourInfo #tour_info_journey').val(tourInfoDes);
  $('#tour-info-text').text('EDIT INFORMATION TOUR');
  $('#addTourInfo').text('Save');
}

const updateTourInfoRecord = function(tour){
  $(`#tour-info-${tour.id}`).find('.info-image').text(tour.tour_image_detail);
  $(`#collapse-journey`).find('.info-journey').text(tour.tour_description_detail);
}

// function validateform(){
//   var tourName=document.getElementById('add_tour_name').value;
//   var tourFrom=document.getElementById('add_tour_from').value;
//   var tourTo=document.getElementById('add_tour_to').value;
//   var tourStart=document.getElementById('add_start_time').value;
//   var tourEnd=document.getElementById('add_end_time').value;
//   var tourMember=document.getElementById('add_tour_member').value;
//   var tourPrice=document.getElementById('add_tour_price').value;
//   var tourImage=document.getElementById('add_tour_image').value;
//
//   if (tourName==null || tourName==""){
//     alert("Please fill out tour name");
//     return false;
//   };
//   if(tourFrom==null || tourFrom==""){
//     alert("Please fill out departure");
//     return false;
//   };
//   if(tourTo==null || tourTo==""){
//     alert("Please fill out destination");
//     return false;
//   };
//   if(tourStart==null || tourStart==""){
//     alert("Please fill out start time");
//     return false;
//   };
//   if(tourEnd==null || tourEnd==""){
//     alert("Please fill out end time");
//     return false;
//   };
//   if(tourMember==null || tourMember==""){
//     alert("Please fill out number member");
//     return false;
//   };
//   if(tourPrice==null || tourPrice==""){
//     alert("Please fill out tour price");
//     return false;
//   };
// }
