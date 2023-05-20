@extends('layouts.adminLayout.admin_design')
@section('content')

<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">

    <div class="x_title">
      <h2><i class="fa fa-file-text"></i> Liquidaciones /<small>Exportar a excel</small></h2>

      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="row">
        <div class="col-sm-12">
          <div class="card-box" style="text-align: center;min-height: 300px;padding: 30px;">

            <div class="conte-export-msj">

              <p>ATENCION: Este proceso puede demorar varios minutos!</p>
              <a id="btn-export" href="{{ url('/admin/exportarLiquidaciones') }}">
                <button id="" type="button" class="btn btn-secondary btn-lg">Generar</button>
              </a>
            
                <p id="btn-continue" class="displayNone">No abandones esta pantalla hasta que finalice el proceso.</p>
  
              </div>
            <div id="divResult" class="displayNone"></div>
            <div id="divLoading" class="displayNone"></div>

          </div>
          
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

@endsection

@section('page-js-script')

 <script> 
  
  $('#btn-export').click(function() {

      $('#btn-export').addClass('displayNone'); 
      $('#btn-continue').removeClass('displayNone'); 
      
      toast('{!! 'Procesando el archivo...' !!}');

  });
  
  </script>

@stop

