
         


          <div class="modal fade modal-fixed-right modal-theme overflow-hidden" id="settings-modal" tabindex="-1" role="dialog" aria-labelledby="settings-modal-label" aria-hidden="true" data-options='{"autoShow":true,"autoShowDelay":3000,"showOnce":true}'>
            <div class="modal-dialog modal-dialog-vertical" role="document">
              <div class="modal-content border-0 vh-100 scrollbar perfect-scrollbar">
                <div class="modal-header modal-header-settings">
                  <div class="z-index-1 py-1 flex-grow-1">
                    <h5 class="text-white" id="settings-modal-label"> <span class="fas fa-palette mr-2 fs-0"></span>Settings</h5>
                    <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
                  </div><button class="close z-index-1" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body px-card">
                  <h5 class="fs-0">Color Scheme</h5>
                  <p class="fs--1">Choose the perfect color mode for your app. </p>
                  <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                    <div class="btn btn-theme-default custom-control custom-radio custom-radio-success active"><label class="cursor-pointer hover-overlay" for="theme-mode-default"><img class="w-100" src="{{url("assets/img/generic/falcon-mode-default.jpg")}}" alt="" /></label><label class="cursor-pointer mb-0 d-flex justify-content-center pl-3" for="theme-mode-default"><input class="custom-control-input" id="theme-mode-default" type="radio" name="colorScheme" data-mode="DEFAULT" checked="checked" value="theme-mode-default" data-page-url="index.html" /><span class="custom-control-label">Light</span></label></div>
                    <div class="btn btn-theme-dark custom-control custom-radio custom-radio-success"><label class="cursor-pointer hover-overlay" for="theme-mode-dark"><img class="w-100" src="{{url("assets/img/generic/falcon-mode-dark.jpg")}}" alt="" /></label><label class="cursor-pointer mb-0 d-flex justify-content-center pl-3" for="theme-mode-dark"><input class="custom-control-input" id="theme-mode-dark" type="radio" name="colorScheme" data-mode="DEFAULT" value="theme-mode-dark" data-page-url="documentation/dark-mode.html" /><span class="custom-control-label">Dark</span></label></div>
                  </div>
                  <hr />
                 
                  <div class="d-flex justify-content-between">
                    <div class="media flex-grow-1"><img class="mr-2" src="{{url("asset/img/icons/arrows-h.svg")}}" width="20" alt="" />
                      <div class="media-body">
                        <h5 class="fs-0">Fluid Layout</h5>
                        <p class="fs--1 mb-0">Toggle container layout system </p>
                      </div>
                    </div>
                    <div class="custom-control custom-switch"><input class="custom-control-input" id="mode-fluid" type="checkbox" /><label class="custom-control-label" for="mode-fluid"> </label></div>
                  </div>
                  <hr />
                  <div class="media"><img class="mr-2" src="{{url("assets/img/icons/paragraph.svg")}}" width="20" alt="" />
                    <div class="media-body">
                      <h5 class="fs-0 d-flex align-items-center">Navigation Position <span class="badge badge-pill badge-soft-success fs--2 ml-2">Updated</span></h5>
                      <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
                      <div class="custom-control custom-radio custom-control-inline"><input class="custom-control-input" id="option-navbar-vertical" type="radio" name="navbar" value="vertical" checked="checked" /><label class="custom-control-label" for="option-navbar-vertical">Vertical</label></div>
                      <div class="custom-control custom-radio custom-control-inline"><input class="custom-control-input" id="option-navbar-top" type="radio" name="navbar" value="top" /><label class="custom-control-label" for="option-navbar-top">Top</label></div>
                      
                    </div>
                  </div>
                  <hr />
                  <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
                  <p class="fs--1">Switch between styles for your vertical navbar </p>
                  <div class="btn-group-toggle btn-block btn-group-navbar-style" data-toggle="buttons">
                    <div class="btn-group btn-block">
                      <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2"><label class="cursor-pointer w-100" for="navbar-style-transparent"><img class="w-100" src="{{url("assets/img/generic/default.png")}}" alt="" /></label><label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-transparent"><input class="custom-control-input" id="navbar-style-transparent" type="radio" name="navbarVertical" value="transparent" /><span class="custom-control-label"> Transparent</span></label></div>
                      <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2"><label class="cursor-pointer w-100" for="navbar-style-inverted"><img class="w-100" src="{{url("assets/img/generic/inverted.png")}}" alt="" /></label><label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-inverted"><input class="custom-control-input" id="navbar-style-inverted" type="radio" name="navbarVertical" value="inverted" /><span class="custom-control-label"> Inverted</span></label></div>
                    </div>
                    <div class="btn-group btn-block mt-3">
                      <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2"><label class="cursor-pointer w-100" for="navbar-style-card"><img class="w-100" src="{{url("assets/img/generic/card.png")}}" alt="" /></label><label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-card"><input class="custom-control-input" id="navbar-style-card" type="radio" name="navbarVertical" value="card" /><span class="custom-control-label"> Card</span></label></div>
                      <div class="btn p-0 text-left custom-control custom-radio custom-radio-success mr-2"><label class="cursor-pointer w-100" for="navbar-style-vibrant"><img class="w-100" src="{{url("assets/img/generic/vibrant.png")}}" alt="" /></label><label class="cursor-pointer d-flex mb-0 pl-3 ml-2" for="navbar-style-vibrant"><input class="custom-control-input" id="navbar-style-vibrant" type="radio" name="navbarVertical" value="vibrant" /><span class="custom-control-label"> Vibrant</span></label></div>
                    </div>
                  </div>
                  <hr />
                
                </div>
              </div>
            </div>
          </div>
          
          <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
            <div class="modal-dialog mt-6" role="document">
              <div class="modal-content border-0">
                <div class="modal-header px-5 text-white position-relative modal-shape-header">
                  <div class="position-relative z-index-1">
                    <div>
                      <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                      <p class="fs--1 mb-0">Please create your free Falcon account</p>
                    </div>
                  </div><button class="close text-white position-absolute t-0 r-0 mt-1 mr-1" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body py-4 px-5">
                  <form>
                    <div class="form-group"><label for="modal-auth-name">Name</label><input class="form-control" type="text" id="modal-auth-name" /></div>
                    <div class="form-group"><label for="modal-auth-email">Email address</label><input class="form-control" type="email" id="modal-auth-email" /></div>
                    <div class="form-row">
                      <div class="form-group col-6"><label for="modal-auth-password">Password</label><input class="form-control" type="password" id="modal-auth-password" /></div>
                      <div class="form-group col-6"><label for="modal-auth-confirm-password">Confirm Password</label><input class="form-control" type="password" id="modal-auth-confirm-password" /></div>
                    </div>
                    <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" id="modal-auth-register-checkbox" /><label class="custom-control-label" for="modal-auth-register-checkbox">I accept the <a href="index.html#!">terms </a>and <a href="index.html#!">privacy policy</a></label></div>
                    <div class="form-group"><button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Register</button></div>
                  </form>
                  <div class="w-100 position-relative mt-5">
                    <hr class="text-300" />
                    <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">or register with</div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="row no-gutters">
                      <div class="col-sm-6 pr-sm-1"><a class="btn btn-outline-google-plus btn-sm btn-block mt-2" href="index.html#"><span class="fab fa-google-plus-g mr-2" data-fa-transform="grow-8"></span> google</a></div>
                      <div class="col-sm-6 pl-sm-1"><a class="btn btn-outline-facebook btn-sm btn-block mt-2" href="index.html#"><span class="fab fa-facebook-square mr-2" data-fa-transform="grow-8"></span> facebook</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>