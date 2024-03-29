<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Base</title>
         <link href="{{ asset ('css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset ('/vendor/fontawesome-free-5.13.1-web/js/all.min.js') }}" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body class="bg-dark ">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form  id="formlogin" method="POST" action="{{ route('login') }}">
                        					{{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4"  name="email" id="email" type="email" placeholder="Enter email address"  required/>
                                                   @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter password" required />
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>




                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Lembrar senha</label>
                                                </div>
                                            </div>
                                            Este site usa cookies para garantir que você obtenha a melhor experiência.
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="{{ route('password.request') }}">Esqueceu a senha?</a>

                                                 <button type="submit"
                                                 	class="btn btn-primary g-recaptcha"
                                                 	 data-sitekey="6LdzR8wcAAAAAAQyud_Kl-ze-e2unwiCHk6H4A-c"
                                                    data-callback='onSubmit'
                                                    data-action='submit'>
                                                    Login
                                                </button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer" >
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid" style="padding-right: 100px">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Oswaldo Paulo</div>
                            <div>
                               <a href="{{ url('privacy') }}" target="new">Privacy Policy</a>
                                &middot;
                                <a href="{{ url('condicoes') }}" target="new">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


         <script src="{{ asset ('js/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset ('vendor/bootstrap-4.5.0-dist/js/bootstrap.bundle.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset ('js/scripts.js') }}"></script>
         <script>
               function onSubmit(token) {

                 document.getElementById("formlogin").submit();
               }
             </script>

    </body>
</html>
