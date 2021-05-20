<nav class="navbar navbar-vertical navbar-expand-xl navbar-light" style="display:none;">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle) {
              document.querySelector('.navbar-vertical').className += ' navbar-' + navbarStyle;
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">
              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip" data-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            </div><a class="navbar-brand" href="{{route("dashboard")}}">
              <div class="d-flex align-items-center py-3">
                <!-- <img class="mr-2" src="assets/img/illustrations/falcon.png" alt="" width="40" /> -->
                <span class="text-sans-serif">{{config("spnconfig.site_config.name")}}</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar">
              <ul class="navbar-nav flex-column">

              <li class="nav-item"><a class="nav-link" href="{{route("dashboard")}}">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                          <span class="fas fa-desktop"></span>
                        </span>
                        <span class="nav-link-text"> Dashboard</span>
                      </div>
                    </a>
                  </li>

               
              @foreach(config('spnconfig.navs') as $navkey => $value)

                @if(in_array($value['route_name'], getPermission()))
                @if($value['child'])

                    <li class="nav-item">
                      <a class="nav-link dropdown-indicator" href="#{{$value['route_name']}}" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="home">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                          <span class="{{$value['icon']}}"></span>
                        </span>
                        <span class="nav-link-text">{{$value['name']}}</span>
                      </div>
                    </a>

                    <ul class="nav collapse " id="{{$value['route_name']}}" data-parent="#navbarVerticalCollapse">
                      @foreach($value['childNav'] as $childKey => $childValue)
                        @if(in_array($childValue['route_name'], getPermission()))
                          <li class="nav-item ">
                            <a class="nav-link" href="{{route($childValue['link'])}}">{{$childValue['name']}}</a>
                          </li>
                        @endif
                      @endforeach
                    </ul>
                  </li>
                @else 

                  <li class="nav-item"><a class="nav-link" href="{{route($value['link'])}}">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                          <span class="{{$value['icon']}}"></span>
                        </span>
                        <span class="nav-link-text"> {{$value['name']}}</span>
                      </div>
                    </a>
                  </li>

                @endif
              @endif
              @endforeach


            </div>
          </div>
        </nav>
