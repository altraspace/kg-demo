
function countryChange()
{
    console.log('in countryChange');
    $("#state_id option").remove();
    $("#city_id option").remove();

    country_id = $('#country_id').val();
    let ajaxRequestData = {
        country_id: country_id
    };
    console.log(ajaxRequestData)
    $.ajax({
        url: '/states',
        // enctype: 'multipart/form-data',
        method: 'get',
        // processData: false,
        // contentType: false,
        // cache: false,
        dataType: 'json',
        data: ajaxRequestData,
        success: function(response) {
            console.log(response);
            console.log(response.succes);
            if (response.success) {
                console.log('success');
                states = response.data.states;
                console.log(states);

                $('#state_id').append($('<option>', {value:'', text:'Select State'}));
                $.each( states, function(k, v) {
                    // $('#state').append($('<option>', {value:k, text:v}));
                    console.log(v);
                    $('#state_id').append($('<option>', {value:v.id, text:v.name}));
                });

                // $('#city').append($('<option>', {value:'', text:'Select Second Team'}));
                // $.each( teams, function(k, v) {
                //     // $('#state').append($('<option>', {value:k, text:v}));
                //     console.log(v);
                //     $('#city').append($('<option>', {value:v.id, text:v.name}));
                // });
            } else {
                console.log('not success');
                // toastr.error("Something went wrong.");
            }
            
        },
        error: function(data) {
            console.log('error');
            console.log(data);
            let errors = $.parseJSON(data.responseText);
            // $.each(errors.errors, function(index, value) {
            //     formErrorMsg(index,value[0]);
            // });
        }
    });
}

function stateChange()
{
    console.log('stateChange');
    $("#city_id option").remove();

    let state_id = $('#state_id').val();

    let ajaxRequestData = {
        state_id: state_id,
    };
    console.log(ajaxRequestData)
    $.ajax({
        url: '/cities',
        // enctype: 'multipart/form-data',
        method: 'get',
        // processData: false,
        // contentType: false,
        // cache: false,
        dataType: 'json',
        data: ajaxRequestData,
        success: function(response) {
            console.log(response);
            console.log(response.succes);
            if (response.success) {
                console.log('success');
                cities = response.data.cities;
                console.log(cities);

                $('#city_id').append($('<option>', {value:'', text:'Select City'}));
                $.each( cities, function(k, v) {
                    // $('#state').append($('<option>', {value:k, text:v}));
                    console.log(v);
                    $('#city_id').append($('<option>', {value:v.id, text:v.name}));
                });
            } else {
                console.log('not success');
                // toastr.error("Something went wrong.");
            }
            
        },
        error: function(data) {
            console.log('error');
            console.log(data);
            let errors = $.parseJSON(data.responseText);
            // $.each(errors.errors, function(index, value) {
            //     formErrorMsg(index,value[0]);
            // });
        }
    });
}

// $(document).ready(function(){
// $("register-form").submit(function(){
    
function register() {
    console.log('in register');
    

    let formValidate = $('#register-form');
    formValidate.validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            contact_no: {
                required: true,
                // phoneIN: true,
            },
            address: {
                required: true,
                minlength: 5
                // maxlength: 30,
                // lettersonly: true
            },
            country_id: {
                required: true
            },
            state_id: {
                required: true
            },
            city_id: {
                required: true
            },
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

    var regexPattern=new RegExp(/^(0|91)?[6-9][0-9]{9}$/);   
    // var regex = '/^(0|91)?[6-9][0-9]{9}$/';
    if (regexPattern.test($("#contact_no").val())) {
        $("#lblError").css("visibility", "hidden");
    } else {
        $("#lblError").css("visibility", "visible");
        return;
    }

    let btn = $(this);
    btn.prop('disabled', true);

    let form = $('#register-form')[0];

    let data = new FormData(form);
    $.ajax({
        url:'/post-registration',
        enctype: 'multipart/form-data',
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        data:data,
        success: function(response) {
            btn.prop('disabled', false);
            if (response.success) {

                // sessionStorage.setItem("showmsg", "1");
                // sessionStorage.setItem("type", "success");
                // sessionStorage.setItem("heading", "Add");
                // sessionStorage.setItem("message", response.message);

                // window.location = '/login';
                $('#register-form')[0].reset();
                alert(response.message);
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
                toastr.error("Something went wrong.");
            }
            console.log(response);
        },
        error: function(data) {
            btn.prop('disabled', false);
            console.log(data);
            let errors = $.parseJSON(data.responseText);

            $.each(errors.errors, function(index, value) {
                console.log('a');
                // alert(value[0]);
                formErrorMsg(index,value[0]);

            });
        }
    });
}
// });
// });