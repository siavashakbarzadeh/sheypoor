$(document).ready(function(){
  $('.map').mouseenter(function(){
    var id =$(this).attr("id");
    $('.'+id).css({'color':'orange','font-size':'22px'});
    // console.log(id);
  });

  $('.map').mouseout(function(){
    var id =$(this).attr("id");
    $('.'+id).css({'color':'#0078c1','font-size':'17px'});
  });
});


$('#chevron_display').click(function(){

  if($(this).hasClass('fa fa-angle-up'))
  {
    $(".sub_cat").attr('style','display: none !important');
    $(this).removeClass('fa fa-angle-up');
    $(this).addClass('fa fa-angle-down');

  }else
  {
    $(".sub_cat").attr('style','display: block !important');
    $(this).removeClass('fa fa-angle-down');
    $(this).addClass('fa fa-angle-up');

  }

});
