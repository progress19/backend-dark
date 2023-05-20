@extends('layouts.adminLayout.admin_design')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

<div class="col-md-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> Proceso de archivo Boletas Liquidadas ATM<small></small></h2>
      <ul class="nav navbar-right panel_toolbox"></ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      {{ Form::open([
        'id' => 'dropzone',
        'name' => 'dropzone',
        'class' => 'dropzone',
        'url' => route('fileReadBoletas') ,
        'role' => 'form',
        'method' => 'post',
        'files' => true
        ]) 
      }}

      @csrf

        <div class="clearfix"></div>

        {!! Form::close() !!} 

        <br>

        <div id="divResult" class="displayNone"></div>
        <div id="divLoading" class="displayNone"></div>

      <br>

      <a href="#" class="btn btn-success pull-right" style="display:none;" id="cargar"><i class="far fa-images"></i> PASO 1/2 (Cargar)</a>
      <a href="#" class="btn btn-success pull-right" style="display:none;" id="submit"><i class="far fa-images"></i> PASO 2/2 (Procesar)</a>

    </div>
  </div>
</div>

@endsection

@section('page-js-script')

<script type="text/javascript">

  /* FILE READ */
    Dropzone.options.dropzone = {
      addRemoveLinks: true,
      url: '{{ route('fileReadBoletas') }}',
      paramName: "file",
      maxFilesize: 2,
      maxFiles: 1,
      dictDefaultMessage: "Arrastra y suelta un archivo aquí o haz clic para subir",
      acceptedFiles: ".pdf",
      autoProcessQueue: true, // Carga y procesamiento automático

      processing: function(file) {
        $('#divResult').addClass('displayNone');
        $('#divLoading').removeClass('displayNone'); 
        $('#divLoading').html('<div class="spinnerB"></div>');  
      },
          
      init: function() {
          // Agregar un evento success para mostrar los resultados
          this.on('success', function(file, response) {
            $('#divLoading').addClass('displayNone'); 
            $('#divResult').removeClass('displayNone'); 
            $('#divResult').html(response);
          });
          this.on("removedfile", function(file) {
            $('#divResult').addClass('displayNone'); 
          });
      }
  };

  function procesar() {

    var miDropzone = Dropzone.forElement("#dropzone");
    miDropzone.removeAllFiles();

    console.log(miDropzone);

    $('#divResult').addClass('displayNone');
    $('#divLoading').removeClass('displayNone'); 

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: 'POST',
        url: '{!! route('processArrayBoleta') !!}',
        success: function (data) {
          $('#divLoading').addClass('displayNone'); 
          $('#divResult').html(data);
          $('#divResult').removeClass('displayNone'); 
        },
          error: function(e) {console.log(e);}
        }
      );
  }

</script>

@stop

<style>
  /* Asegúrate de que el botón de eliminación sea visible */
  .dropzone .dz-remove {
    visibility: visible;
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
    font-size: 0;
  }

  /* Estilo para el botón de eliminación */
  .dropzone .dz-remove:hover {
    text-decoration: none;
    opacity: 0.8;
  }

  /* Estilo para el icono de eliminación */
  .dropzone .dz-remove:before {
    content: "\f00d";
    font-family: FontAwesome;
    font-size: 18px;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
  }

  /* Ajusta la posición del botón de eliminación */
  .dropzone .dz-preview .dz-remove {
    top: 5px;
    right: 5px;
    width: 20px;
    height: 20px;
    line-height: 20px;
    border-radius: 20px;
    background-color: rgba(0, 0, 0, 0.3);
    cursor: pointer;
    position: absolute;
    z-index: 9999;
    font-size: 0 !important;
  }
</style>

@section('page-js-script')

@stop