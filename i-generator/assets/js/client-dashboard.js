$(function () {
  if($('#client-table').length > 0)
  {
    $('#client-table').DataTable();
  }
  
  if($('.datepicker').length > 0)
  {
     $('.datepicker').datepicker({
      autoclose: true
    });
  }
  
  $(".btn-close-delete-client").click(function(){
      $("#modal-delete-client").removeClass('show');
  });
});

function delete_client(id)
{
  $("#modal-delete-client").addClass('show');
  $("#delete-client-id").val(id);
}