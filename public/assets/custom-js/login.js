/**
 * User Login from here
 */

$("#loginForm").submit(function(e) {
    //prevent Default functionality
    e.preventDefault();

    //get the action-url of the form
    var actionurl = e.currentTarget.action;

    //do your own request an handle the results
    $.ajax({
        url: actionurl,
        type: 'post',
        data: $("#loginForm").serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data.is_login){
                $("#loginForm").get(0).reset();
                window.location.href = "{{ route('home') }}";
            }

            if(!data.success && data.error){
                if(data.error.email && data.error.username) {
                    $('#emailError').html("Please enter your email or username");
                } else {
                    if(data.error.email) {
                        $('#emailError').html(data.error.email);
                    } else {
                        $('#emailError').html("");
                    }

                    if(data.error.username) {
                        $('#usernameErrorLogin').html(data.error.username);
                    } else {
                        $('#usernameErrorLogin').html("");
                    }
                }

                if(data.error.password) {
                    $('#passwordError').html(data.error.password);
                } else {
                    $('#passwordError').html("");
                }

            } else {
                $('#emailError').html("");
                $('#passwordError').html("");
                $('#usernameErrorLogin').html("");
            }

            if(!data.is_login){
                $('#isLoginError').html(data.error);
            }else {
                $('#isLoginError').html("");
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr, status, error)
        }
    });
});

/**
 * Register new user
 */

$("#registrationForm").submit(function(e) {
    //prevent Default functionality
    e.preventDefault();

    //get the action-url of the form
    var actionurl = e.currentTarget.action;

    //do your own request an handle the results
    $.ajax({
        url: actionurl,
        type: 'post',
        data: $("#registrationForm").serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {

            if(!data.success && data.errors){
                if(data.errors.username) {
                    $('#usernameError').html(data.errors.username);
                } else {
                    $('#usernameError').html("");
                }

                if(data.errors.password) {
                    $('#passwordErrorReg').html(data.errors.password);
                } else {
                    $('#passwordErrorReg').html("");
                }

                if(data.errors.email) {
                    $('#emailErrorReg').html(data.errors.email);
                } else {
                    $('#emailErrorReg').html("");
                }
            } else {
                $('#usernameError').html("");
                $('#passwordErrorReg').html("");
                $('#emailErrorReg').html("");
            }

            if(data.success){
                $("#registrationForm").get(0).reset();
                $('#signInModal').modal('show');
                $('#signUpModal').modal('hide');
            }

        },
        error: function(xhr, status, error) {
            console.log(xhr, status, error)
        }
    });
});
