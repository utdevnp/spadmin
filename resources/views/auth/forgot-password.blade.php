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
                        
                      </div>
                      <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                    
                    </div>
                    </div>
                    <div class="mt-3 mb-4 mt-md-4 mb-md-5">
                      <p class="mb-0 mt-4 mt-md-5 fs--1 font-weight-semi-bold text-white opacity-75">Have a login detail <a class="text-underline text-white" href="{{route('login')}}">go to login </a> </p>
                    </div>
                  </div>
                  <div class="col-md-7 d-flex flex-center">
                    <div class="p-4 p-md-5 flex-grow-1">
                      <div class="text-center text-md-left">
                        <h4 class="mb-0"> Forgot your password?</h4>
                        <p class="mb-4">Enter your email and we'll send you a reset link.</p>
                      </div>
                      <div class="row justify-content-center">
                        <div class="col-sm-8 col-md">
                          <form class="mb-3"method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group"><input class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email address" /></div>
                            <div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Send reset link</button></div>
                          </form>
                          
                        </div>
                      </div>
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

