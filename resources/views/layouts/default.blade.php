
<!DOCTYPE html>


<html lang="en" dir="ltr">
    <!--begin::Head-->
    @include('layouts.partials.head')
    <!--end::Head-->
    <!--begin::Body-->
    <body class="app">
        <!---Global-loader-->
        <div id="global-loader" >
            <img src="/assets/images/svgs/loader.svg" alt="loader">
        </div>
        <div class="page">
            <div class="page-main">
                @include('layouts.partials.header')
                @include('layouts.partials.menu')

                <div class="app-content page-body">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layouts.partials.footer')
        </div>

        <!-- Back to top -->
        <a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>       
       
       <!--start::Page Scripts-->
        @include('layouts.partials.importjs')
        @yield('script')
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>