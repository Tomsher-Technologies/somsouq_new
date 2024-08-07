function getCityByStateId(state_id, city_id, url, old_data){
    if (typeof old_data === 'undefined') {
        old_data = 0;
    }

    if(state_id != "" ){
        $.ajax({
            url: url,
            type: 'get',
            data: {
                state_id:state_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                var option = '<option value="">-' + select + '-</option>';

                if (response.status) {
                    $.each(response.data, function (id, value) {
                        let data = JSON.parse(value);

                        if (id == old_data) {
                            option += '<option value="' + id + '" selected>' + data[setLocalLang] + '</option>';
                        } else {
                            option += '<option value="' + id + '">' + data[setLocalLang] + '</option>';
                        }

                    });
                }

                $("#" + city_id).html(option);




            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error)
            }
        });
    }
}

