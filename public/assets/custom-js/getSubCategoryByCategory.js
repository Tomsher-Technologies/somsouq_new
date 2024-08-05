function getSubCategoryByCategory(category_id, sub_category_id, url, old_data){
    if (typeof old_data === 'undefined') {
        old_data = 0;
    }

    if(category_id != "" ){
        $.ajax({
            url: url,
            type: 'get',
            data: {
                category_id:category_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                var option = '<option value="">-' + select + '-</option>';
                if (response.status) {
                    $.each(response.data, function (id, value) {
                        if (value.id == old_data) {
                            option += '<option value="' + value.id + '" selected>' + value.name + '</option>';
                        } else {
                            option += '<option value="' + value.id + '">' + value.name + '</option>';
                        }
                    });
                }

                $("#" + sub_category_id).html(option);

                if (old_data) {
                    $("#" + sub_category_id).trigger('change');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error)
            }
        });
    }
}
