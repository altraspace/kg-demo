
function login() {
    console.log('in login');

    let formValidate = $('#login-form');
    formValidate.validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            },
        }

    });

    if (!formValidate.valid()) {
        return;
    }

    let form = $('#login-form')[0];
    let data = new FormData(form);
    $.ajax({
        url:'/post-login',
        enctype: 'multipart/form-data',
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data:data,
        success: function(response) {
            if (response.success) {

                sessionStorage.setItem("showmsg", "1");
                sessionStorage.setItem("type", "success");
                sessionStorage.setItem("heading", "Add");
                sessionStorage.setItem("message", response.message);

                window.location = '/dashboard';

                //--- previous - when multiple save option available (save button drop down) ---//
                // toastr.success(response.message);
                // switch (exitType){
                //     case 0: $('#match-fixture-create').resetForm();
                        
                //         break;
                //     case 2: window.location = window.ADMINPATH + '/match-fixture/'+response.data.matchFixtureId+'/edit';break;
                //     case 1: window.location = window.ADMINPATH + '/match-fixture';break;
                //     default :break;
                // }
            } else {
                // toastr.error("Something went wrong.");
                console.log('aaa');
            }
            console.log(response);
        },
        error: function(data) {
            console.log('error');
            console.log(data);
            formErrorMsg('username',data.responseJSON.message);
            console.log(data.responseJSON.message);
            // let errors = $.parseJSON(data.responseText);

            // $.each(errors.errors, function(index, value) {
            //     console.log('a');
            //     // alert(value[0]);
            //     formErrorMsg(index,value[0]);

            // });
        }
    });
}