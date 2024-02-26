{{-- SIGN UP MODAL --}}
<div class="modal fade form-modal auth-as-worker" id="login_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog max-width-px-840 position-relative">
        <button type="button" class="circle-32 btn-reset bg-white pos-abs-tr mt-n6 mr-lg-n6 focus-reset shadow-10"
            data-dismiss="modal"><i class="fas fa-times"></i></button>
        <div class="login-modal-main bg-white rounded-8 overflow-hidden">
            <div class="row no-gutters">
                <div class="col-lg-5 col-md-6">
                    <div class="pt-10 pb-6 pl-11 pr-12 bg-black-2 h-100 d-flex flex-column dark-mode-texts">
                        <div class="pb-9">
                            <h3 class="font-size-8 text-white line-height-reset pb-4 line-height-1p4 show-if-worker">
                                Crea una cuenta gratuita como empleado
                            </h3>
                            <h3 class="font-size-8 text-white line-height-reset pb-4 line-height-1p4 show-if-company">
                                Crea una cuenta gratuita como empresa
                            </h3>
                            <p class="mb-0 font-size-4 text-white show-if-worker">Crear tu cuenta te permite aplicar a empleos.
                            </p>
                            <p class="mb-0 font-size-4 text-white show-if-company">Crear tu cuenta te permite
                                publicar oportunidades de trabajo.
                            </p>
                        </div>
                        {{-- <div class="border-top border-default-color-2 mt-auto">
                <div class="d-flex mx-n9 pt-6 flex-xs-row flex-column">
                  <div class="pt-5 px-9">
                    <h3 class="font-size-7 text-white">
                      295
                    </h3>
                    <p class="font-size-3 text-white gr-opacity-5 line-height-1p4">New jobs
                      posted today</p>
                  </div>
                  <div class="pt-5 px-9">
                    <h3 class="font-size-7 text-white">
                      14
                    </h3>
                    <p class="font-size-3 text-white gr-opacity-5 line-height-1p4">New companies
                      registered</p>
                  </div>
                </div>
              </div> --}}
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="bg-white-2 h-100 px-11 pt-11 pb-7">

                        {{-- REGISTER FORM --}}
                        <form action="{{ route('register') }}" method="POST" id="register_form" class="auth_form">
                            @csrf
                            <input type="hidden" name="role" value="worker">
                            <div class="form-group mb-0">
                                <label for="name"
                                    class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Nombre</label>
                                <input type="name" class="form-control" placeholder="Tu nombre" id="name" name="name" value="nombre">
                                <span class="font-size-2 text-red" id="error-feedback-register-name"></span>
                            </div>

                            <div class="form-group mb-0">
                                <label for="email2"
                                    class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Email</label>
                                <input type="email" class="form-control" placeholder="Tu email" id="email2" name="email" value="email@email.com">
                                <span class="font-size-2 text-red" id="error-feedback-register-email"></span>
                            </div>
                            <div class="form-group mb-0">
                                <label for="password2"
                                    class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Contraseña</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password2"
                                        placeholder="Ingrese su contraseña" name="password" value="12345678">
                                        <span class="font-size-2 text-red" id="error-feedback-register-password"></span>
                                    <a href="#" class="show-password pos-abs-cr fas mr-6 text-black-2"
                                        data-show-pass="password"></a>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label for="password_confirmation"
                                    class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Confirmar
                                    Contraseña</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Repita la contraseña" value="12345678">
                                        <span class="font-size-2 text-red" id="error-feedback-register-password_confirmation"></span>
                                    <a href="#" class="show-password pos-abs-cr fas mr-6 text-black-2"
                                        data-show-pass="password_confirmation"></a>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between mb-0">
                                <label for="terms" class="gr-check-input d-flex  mr-3">
                                    <input class="d-none" type="checkbox" id="terms">
                                    <span class="checkbox mr-5"></span>
                                    <span class="font-size-3 mb-0 line-height-reset d-block">Acepto los <a
                                            href="{{ route('terms') }}" class="text-primary">Términos y
                                            Condiciones</a></span>
                                </label>
                                <a   href="{{ route('password.request') }}" class="font-size-3 text-dodger line-height-reset">Olvidé mi
                                    contraseña</a>
                            </div>
                            <span class="font-size-2 text-red" id="error-feedback-register-terms"></span>
                            <div class="form-group mt-1 mb-8">
                                <button
                                    class="btn btn-primary btn-medium w-100 rounded-5 text-uppercase">Registrarse</button>
                            </div>

                            <p class="font-size-4 text-center heading-default-color">¿Ya tienes una cuenta? <a href="#" data-action="to-login" class="text-primary js_auth_form_toggle">Ingrese aquí</a></p>
                        </form>


                        {{-- LOGIN FORM --}}

                        <form action="{{ route('login.store') }}" method="POST" id="login_form" class="auth_form">
                            @csrf
                            <div class="form-group mb-0">
                                <label for="email"
                                    class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Email</label>
                                <input type="email" class="form-control" placeholder="Tu email" id="email" name="email" value="testincorrecto@email.com">
                                <span class="font-size-2 text-red" id="error-feedback-login-email"></span>
                            </div>
                            <div class="form-group mb-0">
                                <label for="password"
                                    class="font-size-4 text-black-2 font-weight-semibold line-height-reset">Contraseña</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Ingrese su contraseña" name="password" value="12345567">
                                    <a href="#" class="show-password pos-abs-cr fas mr-6 text-black-2"
                                        data-show-pass="password"></a>
                                </div>
                                <span class="font-size-2 text-red" id="error-feedback-login-password"></span>
                            </div>
                            <div class="form-group mb-8">
                                <button
                                    class="btn btn-primary btn-medium w-100 rounded-5 text-uppercase">Ingresar</button>
                            </div>
                            <p class="font-size-4 text-center heading-default-color">No tienes cuenta? <a href="#" data-action="to-register" class="text-primary js_auth_form_toggle">Regístrate aquí</a></p>
                            <p class="font-size-4 text-center heading-default-color">Olvidaste tu contrase? <a href="/forgot-password" data-action="to-register" class="text-primary js_auth_form_toggle">Restablecela  aquí</a></p>
                        
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <script>

    document.addEventListener('DOMContentLoaded', function () {

        $('#login_form').on('submit',function (e) {
            e.preventDefault();

            var token = $('#login_form input[name="_token"]').val();
            var email = $('#login_form #email').val();
            var password = $('#login_form #password').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ route('login.store') }}",
                data: {
                    email: email,
                    password: password,
                },
                success: function(response) {
                    window.location.href = "{{ route('dash') }}";
                },
                error: function(response) {
                    try {
                        var errors = response.responseJSON.errors;
                        if(errors.email){
                            $('#error-feedback-login-email').text(errors.email[0]);
                        }else if(errors.password){
                            $('#error-feedback-login-password').text(errors.password[0]);
                        }else{
                            $('#error-feedback-login-email').text("Error al autentificar");
                        }
                    } catch (error) {
                        $('#error-feedback-login-email').text("Error al autentificar");
                    }

                }
            });

            return false;
        });


        $('#register_form').on('submit',function (e) {
            e.preventDefault();

            var token = $('#login_form input[name="_token"]').val();
            var name = $('#register_form #name').val();
            var email = $('#register_form #email2').val();
            var password = $('#register_form #password2').val();
            var password_confirmation = $('#register_form #password_confirmation').val();
            var terms = $('#register_form #terms').is(':checked');
            var role = $('#register_form input[name="role"]').val();


            if(!terms){
                $('#error-feedback-register-terms').text("Debe aceptar los términos y condiciones");
                return false;
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ route('register.store') }}",
                data: {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                    terms: terms,
                    role: role

                },
                success: function(response) {
                    window.location.href = "{{ route('dash') }}";
                },
                error: function(response) {
                    try {
                        var errors = response.responseJSON.errors;
                        if(errors.email){
                            $('#error-feedback-register-email').text(errors.email[0]);
                        }else if(errors.password){
                            $('#error-feedback-register-password').text(errors.password[0]);
                        }else if(errors.name){
                            $('#error-feedback-register-name').text(errors.name[0]);
                        }else if(errors.password_confirmation){
                            $('#error-feedback-register-password_confirmation').text(errors.password_confirmation[0]);
                        }else if(errors.terms){
                            $('#error-feedback-register-terms').text(errors.terms[0]);
                        }else{
                            $('#error-feedback-register-email').text("Error al registrarse");
                        }
                    } catch (error) {
                        $('#error-feedback-register-email').text("Error al registrarse");
                    }

                }
            });

            return false;
        });





    });



</script>
