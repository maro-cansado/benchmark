$(function () {
  if($('#agency-table').length > 0)
  {
    $('#agency-table').DataTable();
  }
  
  if($('.datepicker').length > 0)
  {
     $('.datepicker').datepicker({
      autoclose: true
    });
  }
  
  $(".btn-close-delete-adviser").click(function(){
      $("#modal-delete-adviser").removeClass('show');
  });

});

function delete_adviser(id)
{
  $("#modal-delete-adviser").addClass('show');
  $("#delete-adviser-id").val(id);
}

function invoice_view(id)
{
  
}