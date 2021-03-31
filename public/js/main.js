// start dynamic form submission functionality
function submitFormDynamically(_form_id, _link_to_url, _success_action_message, _error_message = "", _method_type, _contentType = false, _processData = false, _cache = false, _data_type = 'json') {

    var return_information = '';
    // var formData = $('#' + _form_id).serialize();
    var form_info = $('#' + _form_id)[0]
    var formData = new FormData(form_info);
    $.ajax({
        url: _GLOBAL_URL + _link_to_url,
        contentType: _contentType,
        processData: _processData,
        cache: _cache,
        type: _method_type,
        dataType: _data_type,
        async: false,
        headers: { 'X-CSRF-TOKEN': _TOKEN, 'Csrf-Token':_TOKEN },
        data: formData,
        success: function(data) {
            toastr.success(_success_action_message);
            return_information = "success";
            // return data;
            $('#' + _form_id)[0].reset();
        },
        error: function(data) {
            return_information = "failed";
            a = JSON.parse(data["responseText"]);
            if(a.error)
            {
                toastr.error(a.error); 
            }else{
                toastr.error(_error_message); 
            }
            $.each(a, function(key, value) {
                $('#' + _form_id + ' #error_' + key).removeAttr('hidden');
                $('#' + _form_id + ' #error_' + key).text(value[0]);
                $('#' + _form_id + ' #error_' + key).siblings('input').addClass('error');
                $('#' + _form_id + ' #error_' + key).siblings('select').addClass('error');
            });
        }
    });
    return return_information;
}

// end dynamic submit

// to fetch records into table dynamically
function fetchRecordsDynamically(_field_id, _link_to_url, _perpage, _page_number = 0, _appened = 0, _success_action_message = 'Successfull')
{

		var page_number_string = "";
		if(_page_number !=0)
		{
			page_number_string = "?page="+_page_number;
		}

		var return_information = '';
		$.ajax({
			url: _GLOBAL_URL + _link_to_url+"/"+_perpage+"/"+_appened+page_number_string,
			success: function(data) {
				if(_appened === 0)
				{
					$('#' + _field_id ).html(data);

				}else{
					$('#' + _field_id ).append(data);
				}
				toastr.success(_success_action_message);
				return_information = "success";
				// return data;
			}
        });		
        
        return return_information;


}
// to fetch records into table dynamically
// to fetch a single records for form from every model dynamically
function getFormRecordDynamically(_form_id, _link_to_url, _record_id, _method_type, _button_id, _add_form_id, _update_form_id)
{
   
		
		var return_information = '';
		$.ajax({
			url: _GLOBAL_URL + _link_to_url+"/"+_record_id+"/edit",
			type: _method_type,
			headers: { 'X-CSRF-TOKEN': _TOKEN },
			success: function(result) {

				for(var key in result)
				{
					if(result.hasOwnProperty(key))
					{
						$('#'+_form_id+" #"+key).val(result[key]);
					}
				}

                $('#'+_form_id+" #"+_button_id).attr("onclick", "updateRecord("+_record_id+")");
				toastr.success("Record Found Successfully");
				return_information = "success";
				
                $('#'+_add_form_id).hide();
                $('#'+_update_form_id).show();
				
					
				
				
				// return data;
			},
            error: function(data) {
                return_information = "failed";
                toastr.error("Record Not Found"); 
                }
		});

		return return_information;

}
// to fetch records for every model dynamically

function cancelUpdateForm(_add_form_id, _update_form_id)
{
    $('#'+_add_form_id).show();
    $('#'+_update_form_id).hide();
    $('#' + _update_form_id)[0].reset();
}
