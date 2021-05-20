@include("layouts.stylelinks")

<main class="main" id="top">
      <div class="container-fluid">
        <div class="row min-vh-100 flex-center no-gutters">
          <div class="col-lg-8 col-xxl-5 py-3"><img class="bg-auth-circle-shape" src="../../assets/img/illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="../../assets/img/illustrations/shape-1.png" alt="" width="150">
            <div class="card overflow-hidden z-index-1">
              <div class="card-body p-0">
                <div class="row no-gutters h-100">
                  <div class="col-md-5 text-white text-center bg-card-gradient">
                    <div class="position-relative p-4 pt-md-5 pb-md-7">
                      <div class="bg-holder bg-auth-card-shape" style="background-image:url(../../assets/img/illustrations/half-circle.png);"></div>
                      <!--/.bg-holder-->
                      <div class="z-index-1 position-relative"><a class="text-white mb-4 text-sans-serif font-weight-extra-bold fs-4 d-inline-block" href="#">Samriddha Pahad</a>
                        <p class="text-white opacity-75">Samriddha Pahad is a company not distributing profit registered in 2015 with the Office of Company Registrar under the clause 166 of the Company Act 2063 of Nepal. </p>
                      </div>
                    </div>
                    <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                      <p>Do you want to go activity?<br><a target="_blank" class="text-white text-underline" href="http://webapp.spnepal.org/login">Let's go !</a></p> 
                    </div>
                  </div>
                  <div class="col-md-7 d-flex flex-center">
                      
                    <div class="p-4 p-md-5 flex-grow-1">
                      <h3> Login </h3>
                      <form method="POST" action="{{ route('login') }}">

                      @csrf
                   
                        @if(count($errors)>0)
                            <div  class="form-group alert alert-danger">
                                <x-auth-validation-errors :errors="$errors" />
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="card-email">Email address</label>
                            <input class="form-control" id="card-email" type="email" name="email" :value="old('email')" required autofocus /></div>
                        <div class="form-group">
                            @if (Route::has('password.request'))
                                <div class="d-flex justify-content-between">
                                <label for="card-password">Password</label>
                                <a class="fs--1" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            @endif
                            <input class="form-control" id="card-password" type="password"
                                name="password"
                                required autocomplete="current-password" />
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="card-checkbox" checked="checked" /><label class="custom-control-label" for="card-checkbox">Remember me</label></div>
                        <div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Log in</button></div>

                        <br>
                        <span class="text-warning">(Beta version) </span> <br>
                        <span><small class="text-default">A version of a piece of software that is made available for testing, typically by a limited number of users outside the company that is developing it, before its general release.</small>
                      </span>
                      </form>
                      <!-- <div class="w-100 position-relative mt-4">
                        <hr class="text-300" />
                        <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or log in with</div>
                      </div>
                      <div class="form-group mb-0">
                        <div class="row no-gutters">
                          <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="login.html#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                          <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="login.html#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <script>
      var isFluid = JSON.parse(localStorage.getItem('isFluid'));
      if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
      }
    </script>


@include("layouts.script_links")