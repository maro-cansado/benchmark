$(document).ready(function(){
	$(".btn-close-delete-type").click(function(){
      	$("#modal-delete-type").removeClass('show');
	});
});

function delete_type(id)
{
  $("#modal-delete-type").addClass('show');
  $("#delete-type-id").val(id);
}