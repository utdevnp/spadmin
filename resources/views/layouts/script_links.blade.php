<script>
      var isFluid = JSON.parse(localStorage.getItem('isFluid'));
      if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
      }
    </script>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lib/_fortawesome/all.min.js')}}"></script>
    <script src="{{asset('lib/stickyfilljs/stickyfill.min.js')}}"></script>
    <script src="{{asset('lib/sticky-kit/sticky-kit.min.js')}}"></script>
    <script src="{{asset('lib/is_js/is.min.js')}}"></script>
    <script src="{{asset('lib/lodash/lodash.min.js')}}"></script>
    <script src="{{asset('lib/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <script src="{{asset('lib/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('lib/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('lib/datatables-bs4/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('lib/datatables.net-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('lib/datatables.net-responsive-bs4/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('lib/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('lib/leaflet.markercluster/leaflet.markercluster.js')}}"></script>
    <script src="{{asset('lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js')}}"></script>
    <script src="{{asset('lib/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('lib/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('lib/select2/select2.min.js')}}"></script>
    <script src="{{asset('js/theme.min.js')}}"></script>
   
  
    @livewireScripts
    
  </body>

</html>