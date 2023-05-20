@extends('layouts.adminLayout.admin_design')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<div class="col-md-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> Proceso de archivo de pagos - <b>BANCO SUPERVIELLE</b><small></small></h2>
      <ul class="nav navbar-right panel_toolbox"></ul>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      {{ Form::open([
        'id' => 'dropzone',
        'name' => 'dropzone',
        'class' => 'dropzone',
        'url' => url('file/process') ,
        'role' => 'form',
        'method' => 'post',
        'files' => true
        ]) 
      }}
        @csrf 

        <!--
        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('idBanco', 'Banco') !!}
            {!! Form::select('idBanco', array(
              0 => 'Seleccione...',
              1 => 'Superville',
              2 => 'Nación',
            ), null, ['id' => 'idBanco', 'class' => 'form-control select2']); !!}
          </div>
        </div> 
      -->

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

  $('#cargar').click(function() { 

    $('#cargar').hide();
    $('#dropzone').hide(); 
    $('#divLoading').removeClass('displayNone'); 
    $('#divLoading').html('<div class="spinnerB"></div>');
     
    $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            type: 'POST',
            url: '{!! route('getDataTableFiles') !!}',
            success: function (data) {
              $('#divLoading').hide();
              $('#divResult').removeClass('displayNone'); 
              $('#divResult').html(data);
              $('#submit').removeAttr('style');
            },
              error: function(e) {console.log(e);}
            }
      );

  });

  $('#submit').click(function() { // PROCESAR
      $('#submit').fadeOut();

      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        type: 'POST',
        url: '{!! route('processFile') !!}',
        data: {idBanco: 5},
        success: function (data){
          $('#divResult').html('<i class="fa fa-check" style="font-size: 50px"></i><h4 style="padding-bottom: 30px;">PROCESO TERMINADO!</h4>'+data);
        },
        error: function(e) {console.log(e);}}
      );

      /*var myDropzone = Dropzone.forElement(".dropzone");
      myDropzone.processQueue();
      */
  });
  
    Dropzone.options.dropzone = {
    maxFilesize: 12,
    autoProcessQueue: false,

    accept: function(file, done) {

      var reader = new FileReader();
      reader.addEventListener("loadend", 
        
         function(event) {

          $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                type: 'POST',
                url: '{!! route('fileRead') !!}',
                data: {string: event.target.result},
                success: function (data){
                    //$('#divResult').html(data);
                    console.log("File has been successfully ...!!");
                },
                  error: function(e) {console.log(e);}}
                );
          } 

      );
        
      reader.readAsText(file);

      $('#divLoading').removeClass('displayNone'); 
      $('#divLoading').html('<div class="spinnerB"></div>');
      
      setTimeout( function() { 
        $('#cargar').removeAttr('style'); 
        $('#divLoading').addClass('displayNone'); 
       },7000)

    },

    acceptedFiles: ".txt",
    addRemoveLinks: false,
    timeout: 50000,

    init: function() {
      this.on("processing", file => {console.log("Procesado...");});
      this.on("addedfile", file => {});
    },

    dictDefaultMessage: "Clic o arrastre los archivos aquí...",
    dictFallbackMessage: "Su navegador no admite la carga de archivos de arrastrar y soltar.",
    dictInvalidFileType: "No puedes subir archivos de este tipo.",
    dictCancelUpload: "Cancelar carga",
    dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar esta carga?",
    dictRemoveFile: "Remover archivo",
    dictMaxFilesExceeded: "No puedes subir más archivos.",

    success: function(file, response) {console.log(response);},
    error: function(file, response) {return false;}
  };

</script>

@stop

