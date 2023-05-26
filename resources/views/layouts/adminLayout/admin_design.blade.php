<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <title>Compras VLL | BackOffice </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- bootstrap-datepicker -->
    <link href="{{ asset('vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- Toast -->
    <link href="{{ asset('vendors/toast/jquery.toast.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/back_css/custom.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/back_css/hover-min.css') }}" rel="stylesheet">
    <!-- Animate -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

  </head>

  <body class="nav-md">

    <div class="container body">
      <div class="main_container">
        
        @include('layouts.adminLayout.admin_sidebar')
        @include('layouts.adminLayout.admin_header')
       
        <div class="right_col" role="main">

          <div class="back_logo"></div>    

         <div class="container">
            <div class="clearfix"></div>
              <div class="row">
                @yield('content')
              </div>
          </div>
        </div>

        @include('layouts.adminLayout.admin_footer')

      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    <!-- bootstrap-datepicker -->
    <script src="{{ asset('vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>    
    <script src="{{ asset('js/back_js/forms.js') }}"></script>
    <script src="{{ asset('vendors/toast/jquery.toast.js') }}"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/back_js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha256-2Pjr1OlpZMY6qesJM68t2v39t+lMLvxwpa8QlRjJroA=" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
	
  </body>

@yield('page-js-script')

</html>
