$(document).ready(function(){

	$('.datepicker').datepicker({
      autoclose: true
    });
    
	 $("#edit-adviser-material-fee").change(function(){

	  var cho= $(this).val();

	  if(cho == "1")
	  {
	    $('#edit-adviser-material-fee-amount').prop("disabled", false);
	    $('#edit-adviser-material-fee-amount').prop("required", true);
	  }else
	  {
	    $('#edit-adviser-material-fee-amount').prop("disabled", true);
	    $('#edit-adviser-material-fee-amount').prop("required", false);
	  }
	});

	$("#edit-adviser-gst").change(function(){
	 	
	  var cho= $(this).val();

	  if(cho == "1")
	  {
	    $('#edit-adviser-gst-age').prop("disabled", false);
	    $('#edit-adviser-gst-age').prop("required", true);
	  }else
	  {
	    $('#edit-adviser-gst-age').prop("disabled", true);
	    $('#edit-adviser-gst-age').prop("required", false);
	  }
	});

	 
});