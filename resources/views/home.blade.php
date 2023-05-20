<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <title>Compras - VLL</title>

        <!-- Styles -->
        <style>

            @font-face {
                font-family: 'Poppins';
                src: url('fonts/Poppins/Poppins-Regular.ttf') format('truetype');
            }

            @font-face {
                font-family: 'Ubuntu';
                src: url('fonts/Ubuntu/Ubuntu-Regular.ttf') format('truetype');
            }

            html, body {
                background-color: #171923;
                color: white;
                font-family: 'Poppins', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .content {
                text-align: center;
                margin-top: 120px;
            }

            h1 { 
                font-family: 'Ubuntu', sans-serif;
                font-size: 52px !important;
                margin: 0;
                text-shadow: 1px 1px 2px black;
             }

            h2, h5 {margin: 0} 

            h4 {font-size: 10px}

            a {
                color: #636b6f;
                font-size: 10px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

#circle1 {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  height: 50px;
  width: 50px;
  margin: -25px 0 0 -25px;
  border: 4px rgba(0, 0, 0, 0.25) solid;
  border-top: 4px #ff2d20 solid;
  border-bottom: 4px black solid;
  border-radius: 50%;
  -webkit-animation: spin1 1s infinite linear;
          animation: spin1 1s infinite linear;
}

@-webkit-keyframes spin1 {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(359deg);
            transform: rotate(359deg);
  }
}
@keyframes spin1 {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(359deg);
            transform: rotate(359deg);
    -webkit-transform: rotate(359deg);
            transform: rotate(359deg);
  }
}

        </style>
    </head>
    <body>

        <div class="">
            <div class="content animate__animated animate__fadeIn"> 
                                                        
                <h1>COMPRAS</h1>
                <h5 style="color:#e7e8f2; margin-bottom:20px">Beta 1.0</h5>
                {{--<h3>Valle de Las Leñas S.A.</h3>--}}
                <img src="{{ asset('/images/logo.png') }}">    
                <h4 style="color:#e7e8f2">Desarrollado por: <a href="https://mauriciolavilla.ml">ML</a></h4>
                <img src="{{-- asset('/images/loading.gif') --}}">

                <div id="circle1"></div> 
               
            </div>
        </div>

    </body>
</html>


<script type="text/javascript">

    setTimeout(function () { window.location.href = "admin"; }, 2500); 

</script>