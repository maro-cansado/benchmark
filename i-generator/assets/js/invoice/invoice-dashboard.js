$(document).ready(function(){
    $('select').select2();
	$('.datepicker').datepicker({
      autoclose: true
    });

    $("#btn-add-entry").click(function(){
    	var date = $("#add-entry-date").val();
    	var description = $("#add-entry-description").val();
    	var debit = $("#add-entry-debit").val()==""? 0:$("#add-entry-debit").val();
        var credit = $("#add-entry-credit").val()==""? 0:$("#add-entry-credit").val();
    	var type = $("#add-entry-type").val();

    	var json = $("#invouce-entry-json").val();
    	console.log(json);
    	if(json != "")
    	{
    		json = $.parseJSON(json);

    		data = [date,description,debit,credit,type];

    		json.push(data);
    	}else
    	{
    		json = [];

    		data = [date,description,debit,credit,type];

    		json.push(data);


    	}

    	var data_tr = $('<tr></tr>');
    	var td_date = $('<td>'+date+'</td>');
    	var td_description = $('<td>'+description+'</td>');
    	var td_debit = $('<td>'+debit+'</td>');
        var td_credit = $('<td>'+credit+'</td>');
    	var td_type = $('<td>'+type+'</td>');
    	var td_btn = $('<td><button class="btn btn-danger" type="button" onclick="delete_entry(this)" >+</button></td>');

    	data_tr.append(td_date);
    	data_tr.append(td_description);
    	data_tr.append(td_debit);
        data_tr.append(td_credit);
    	data_tr.append(td_type);
    	data_tr.append(td_btn);

    	$("#tbody-entry").append(data_tr);

    	json = JSON.stringify(json);
    	$("#invouce-entry-json").val(json);

    });

    $(".btn-invoice-gen").find('.btn').click(function(){
        $(".btn-user-invoice").removeClass('active');
        $(".btn-user-invoice").find('.btn').removeClass('btn-primary').addClass('btn-default');
        $(".btn-invoice-gen").find('.btn').addClass('btn-primary').removeClass('btn-default');
        $(".hr-custom").addClass('active');
        $(".btn-invoice-gen").addClass('active');
        $(".user-invoice-body").removeClass('active-body');
        $(".pdf-invoice-body").addClass('active-body');
        var new_adviser_fname =  $("#add-adviser-fname").val();
        var new_adviser_mname =  $("#add-adviser-mname").val();
        var new_adviser_lname =  $("#add-adviser-lname").val();
        if($("#invoice-user-choose").val() == "new-adviser")
        {   if(new_adviser_fname != "" && new_adviser_mname != "" && new_adviser_lname != "")
            {
                $("#invoice-user-collect").append("<option value='new-adviser'>"+new_adviser_fname+' '+new_adviser_mname+' '+new_adviser_lname+"</option>");
            }
        }
    });

    $(".btn-user-invoice").find('.btn').click(function(){
        $(".hr-custom").removeClass('active');
        $(".btn-user-invoice").addClass('active');
        $(".btn-invoice-gen").removeClass('active');
        $(".user-invoice-body").addClass('active-body');
        $(".pdf-invoice-body").removeClass('active-body');
        $(".btn-user-invoice").find('.btn').addClass('btn-primary').removeClass('btn-default');
        $(".btn-invoice-gen").find('.btn').removeClass('btn-primary').addClass('btn-default');
    });

    $("#btn-generate-invoice").click(function(){
        var data = $('#form-adviser-profile').serialize();
        //$("#invoice-user-collect").val();
        
        //data.append('invoice-user-collect',$("#invoice-user-collect").val());
        $.ajax({
            'url':base_url+'index.php/invoice/save_invoice_view',
            'type':'POST',
            data:data,
            dataType:'json',
            success:function(data){
                $("#pdf-generate-list").html('');
                if(data.url)
                {
                    $("#pdf-generate-list").append('<li><a href="'+data.url+'" target="_blank" >'+data.name+'</a></li>');
                }
                $.each($("#invoice-user-collect").val(), function( index, value ) {
                    $.ajax({
                        'url':base_url+'index.php/invoice/view',
                        'type':'POST',
                        data:{'user_id':value},
                        dataType:'json',
                        success:function(data){
                            $("#pdf-generate-list").append('<li><a href="'+data.url+'" target="_blank" >'+data.name+'</a></li>');
                        }
                    });
                });
            }

        });
    });

    $("#btn-view-invoice").click(function(){
        
        if($('#invoice-user-collect').val() != null)
            $("#form-adviser-profile").submit();
        else
            alert('please choose adviser to generate invoice pdf');
    });

    $("#invoice-user-choose").change(function(){
        var id = $(this).val();

        if(id == "new-adviser")
        {
            $("#add-adviser-fname").val('');
            $("#add-adviser-mname").val('');
            $("#add-adviser-lname").val('');
            $("#add-adviser-street").val('');
            $("#add-adviser-street").val('');
            $("#add-adviser-city").val('');
            $("#add-adviser-country").val('');
            $("#add-adviser-date").val('');
            $("#add-adviser-email").val('');
            $("#add-adviser-number").val('');

            
        }else
        {
            $.ajax({
                url:base_url+'index.php/users/get_adviser_detail',
                data:{'user_id':id},
                type:'POST',
                dataType:'json',
                success:function(data){
                    
                    $("#add-adviser-fname").val(data[0].first_name);
                    $("#add-adviser-mname").val(data[0].middle_name);
                    $("#add-adviser-lname").val(data[0].last_name);
                    $("#add-adviser-street").val(data[0].street);
                    $("#add-adviser-street").val(data[0].street);
                    $("#add-adviser-city").val(data[0].city);
                    $("#add-adviser-country").val(data[0].country);
                    $("#add-adviser-date").val(data[0].date_of_birth);
                    $("#add-adviser-email").val(data[0].email);
                    $("#add-adviser-number").val(data[0].number);
                    $("#invoice-user-collect option[value='new-adviser']").remove();
                    
                }
            });
        }

    });


    $("#next-step-2").click(function(){
        $(".btn-invoice-gen").find('.btn').click();
    });

    $("#invoice-user-type-choose").change(function(){
        $.ajax({
            'url':base_url+'index.php/type/get_type',
            'type':'POST',
            data:{"id":$(this).val()},
            dataType:'json',
            success:function(data){
                $("#invoice-total-commission").val(data.total_commission);
                $("#invoice-adviser-total").val(data.adviser_total);
                $("#invoice-bonuses").val(data.bonuses);
                $("#invoice-cancellation").val(data.cancellation);
                $("#invoice-material-and-softwar").val(data.material_and_software);
            }

        });
    });
});

function delete_entry(btn)
{
    $(btn).parent().parent().remove();

    json = [];
    var count = $("#tbody-entry").find('tr').length;
    $("#tbody-entry").find('tr').each(function(index){
       if(index == 0)
       {
            $("#invouce-entry-json").val('');
       }else
       {
            var date = $( "#tbody-entry" ).find('tr:eq('+index+')').find('td:eq(0)').html();
            var description = $( "#tbody-entry" ).find('tr:eq('+index+')').find('td:eq(1)').html();
            var debit = $( "#tbody-entry" ).find('tr:eq('+index+')').find('td:eq(2)').html();
            var credit = $( "#tbody-entry" ).find('tr:eq('+index+')').find('td:eq(3)').html();
            var type = $( "#tbody-entry" ).find('tr:eq('+index+')').find('td:eq(4)').html();

            data = [date,description,debit,credit,type];

            json.push(data);
       }

       if(! --count)
       {
        json = JSON.stringify(json);
        $("#invouce-entry-json").val(json);
       }
    });
    
}