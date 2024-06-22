function getCityByStateId(state_id, city_id, url){
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
                var option = '<option value="">-Select-</option>';

                if (response.status) {
                    $.each(response.data, function (id, value) {
                        option += '<option value="' + id + '">' + value + '</option>';
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
