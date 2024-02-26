$('.js_auth_form_toggle').click(function(e){
    e.preventDefault();
    // var data_action = $(this).data('action');

    // if(data_action == 'to-login'){
    //     localStorage.setItem('is_login_form', true);
    //     localStorage.setItem('login_form_time', Date.now());
    // }else{
    //     localStorage.setItem('is_login_form', false);
    //     localStorage.setItem('login_form_time', Date.now());
    // }

    $('.auth_form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

$(document).ready(function(){

    // NO NECESARIO, ES AJAX
    // if($('.js_auth_form_toggle').length > 0){

    //     var form = localStorage.getItem('is_login_form');
    //     var time = localStorage.getItem('login_form_time');

    //     // if el tiempo existe y es menos de 1 minuto
    //     if(time && (Date.now() - time) < 60000){
    //         if(form == 'false'){
    //             $('#register_form .invalid-feedback').hide();
    //         }else{
    //             $('#login_form .invalid-feedback').hide();
    //             $('.auth_form').animate({height: "toggle", opacity: "toggle"}, "slow");
    //         }
    //     }
    // }


    function showCompanyAuthForms()
    {
        $('#register_form input[name="role"]').val('company');
        $('#login_modal').removeClass('auth-as-worker');
        $('#login_modal').addClass('auth-as-company');
    }

    function showWorkerAuthForms()
    {
        $('#register_form input[name="role"]').val('worker');
        $('#login_modal').removeClass('auth-as-company');
        $('#login_modal').addClass('auth-as-worker');
    }

    function showLoginForm()
    {
        $('#register_form').css('display', 'none');
        $('#login_form').css('display', 'block');
    }


    // on click a with data-is-login-form="true"
    $('a[data-is-worker-form="true"]').click(function(e){
        showLoginForm();
        showWorkerAuthForms();
    } );

    $('a[data-is-company-form="true"]').click(function(e){
        showLoginForm();
        showCompanyAuthForms();
    } );





    // sidebar-dropdown-button
    // sidebar-dropdown-submenu

    $('.sidebar-dropdown-button').click(function(e){
        e.preventDefault();
        $(this).next('.sidebar-dropdown-submenu').slideToggle();
        $(this).parent().toggleClass('active');
    });



    // places select2

    $('.places2-select').select2({
        ajax: {
            url: window.PLACES_API_URL,
            dataType: 'json',
            delay: 350,
            processResults: function (data) {
                // console.log(data)
                // changes each data['name'] to data['text']
                data = $.map(data, (obj) => ({ 'id' : obj.id, 'text' : obj.name }) );
                console.log(data)
                return {
                    results: data
                };
            }
        }
    });

    // console.log($('.places2-select'))

});


