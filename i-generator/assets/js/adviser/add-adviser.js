$(document).ready(function(){

	$('.datepicker').datepicker({
      autoclose: true
    });

	 $("#add-adviser-material-fee").change(function(){

	  var cho= $(this).val();

	  if(cho == "1")
	  {
	    $('#add-adviser-material-fee-amount').prop("disabled", false);
	    $('#add-adviser-material-fee-amount').prop("required", true);
	  }else
	  {
	    $('#add-adviser-material-fee-amount').prop("disabled", true);
	    $('#add-adviser-material-fee-amount').prop("required", false);
	  }
	});

	$("#add-adviser-gst").change(function(){
	 	
	  var cho= $(this).val();

	  if(cho == "1")
	  {
	    $('#add-adviser-gst-age').prop("disabled", false);
	    $('#add-adviser-gst-age').prop("required", true);
	  }else
	  {
	    $('#add-adviser-gst-age').prop("disabled", true);
	    $('#add-adviser-gst-age').prop("required", false);
	  }
	});

	 
});