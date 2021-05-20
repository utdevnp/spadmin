@include("layouts.stylelinks")
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">

            @include("layouts.navigation")
            @include("layouts.navigation-two")

            <div class="content">
        
                @include("layouts.top-nav")

                @yield('content')

                @include("layouts.footer")
            </div>

            @include("layouts.accessibility")
        </div>
    </main>
    
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    @include("layouts.script_links")


    @if(session()->has('success'))
        <script> 
            toastr.success("Success","{{session('success')}}",
            {
                "timeOut": 5000,
                "closeButton": true,
                "progressBar": true,
                "newestOnTop": true,
            });
        </script>
       
    @endif



    @if(session()->has('danger'))
        <script> 
            toastr.error("Error","{{session('danger')}}",
            {
                "timeOut": 3000,
                "closeButton": true,
                "progressBar": true,
                "newestOnTop": true,
            });
        </script>
      
    @endif


 

@include("layouts.deletemodel")

    