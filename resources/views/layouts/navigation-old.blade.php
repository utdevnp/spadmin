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
            </div><a class="navbar-brand" href="index.html">
              <div class="d-flex align-items-center py-3">
                <!-- <img class="mr-2" src="assets/img/illustrations/falcon.png" alt="" width="40" /> -->
                <span class="text-sans-serif">SPN Admin</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar">
              <ul class="navbar-nav flex-column">

              <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-desktop"></span></span><span class="nav-link-text"> Dashboard</span></div>
                  </a>
                </li>

                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#home" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="home">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-clipboard-list"></span></span><span class="nav-link-text">Master Setup</span></div>
                  </a>
                  <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item active"><a class="nav-link" href="{{route("projectsetup.index")}}">Project</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('leavetype.index')}}">Leave Type</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('designation.index')}}">Designation </a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Role and permission </a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{route('namechart.index')}}">Name Chart </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('category.index')}}">Category  </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('itemsetup.index')}}">Item Description </a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Condition </a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Suppliers </a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Assets Location  </a></li> -->

                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{route('staff.index')}}">
                    <div class="d-flex align-items-center">
                      <span class="nav-link-icon">
                        <span class="fas fa-user-friends"></span>
                    </span>
                    <span class="nav-link-text"> Staff Information</span></div>
                  </a>
                </li>
                 
                <li class="nav-item"><a class="nav-link" href="{{route('leave.index')}}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fab fa-buffer"></span></span><span class="nav-link-text"> Leave </span></div>
                  </a>
                </li>
                

                <li class="nav-item"><a class="nav-link" href="{{route('fixasset.index')}}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fas fa-tasks"></span></span><span class="nav-link-text"> Fixed Assets </span></div>
                  </a>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{route('goodreceipt.index')}}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fas fa-vote-yea"></span></span><span class="nav-link-text"> Goods Receipt Note </span></div>
                  </a>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{route('goodstoreout.index')}}">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fas fa-warehouse"></span></span><span class="nav-link-text">Goods Store Out </span></div>
                  </a>
                </li>



               
               
                
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>
              <ul class="navbar-nav flex-column">

                <li class="nav-item"><a class="nav-link" href="#">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-poll"></span></span><span class="nav-link-text"> Widgets</span></div>
                  </a></li>


              
               
            
              </ul>
              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>
              
            
            </div>
          </div>
        </nav>
