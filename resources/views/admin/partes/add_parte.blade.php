@php
  use App\Fun;
  use Carbon\Carbon;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-10">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-file-powerpoint-o"></i> Partes /<small>Nuevo</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">


          <div id="conte-form">
            
            {{ Form::open([
              'id' => 'add_parte',
              'name' => 'add_parte',
              'url' => '/admin/add-parte/',
              'role' => 'form',
              'method' => 'post',
            ]) }}

              {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('desde', 'Desde') !!}
                  {!! Form::text('desde', Carbon::now()->format('d-m-Y'), array('class' => 'form-control datespicker','id' => 'desde')) !!}      
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('hasta', 'Hasta') !!}
                  {!! Form::text('hasta', Carbon::now()->format('d-m-Y'), array('class' => 'form-control datespicker','id' => 'hasta')) !!}      
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('idCircuns', 'Circunscripción') !!}
                  {!! Form::select('idCircuns', array('' => 'Seleccione...', 1 => 'Capital', 2 => 'San Rafael', 3 => 'Tunuyan', 4 => 'San Martín'), null, ['id' => 'idCircuns', 'class' => 'form-control select2']); !!}
                </div>
              </div> 

              <div class="clearfix"></div>
            
            </div>

            <div id="view_preParte"></div>
            <div id="divLoading_sm" class="displayNone"></div>
            
                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="btn-next" class="btn btn-success"> Previsualizar</button>
                <button id="btn-back" class="btn btn-success displayNone"> Atras</button>
                <button id="send" type="submit" class="btn btn-success pull-right displayNone"> Generar</button>
              </div>

            {!! Form::close() !!}
            
          </div>
        </div>
      </div>

@endsection

@section('page-js-script')

<script>
  $('.datespicker').datepicker({
    format: "dd-mm-yyyy",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true,
    //defaultViewDate: { year: 1977, month: 04, day: 25 }
});
</script>

<script>

  $('#idCircuns').change(function() {
    $('#btn-next').trigger('click');
  });

  $('#btn-back').click(function() {
     location.reload(true);
  });

  $('#send').click(function() {
    $('#add_parte')[0].submit();
    $('#btn-send').addClass('displayNone');
    $('#btn-back').addClass('displayNone');
  });

</script>

<script>
  
  $('#btn-next').click(function() {

    //$('#divLoading_sm').removeClass('displayNone'); 
    //$('#divLoading_sm').html('<div class="spinner_sm"></div>');

    var baseUrl = document.getElementById('baseUrl').value;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    })

    $.ajax({
      url: baseUrl+"/admin/pre-parte",
      method: "post",
      data: $('#add_parte').serialize(),
      success: function(response){

          //$('#divLoading_sm').addClass('displayNone');
  
          if (response.length > 114) {
            $('#send').removeClass('displayNone');
            $('#conte-form').addClass('displayNone');
            $('#btn-next').addClass('displayNone');
            $('#btn-back').removeClass('displayNone');
          }

          $('#view_preParte').html(response);    

      }
    });


  });
  
</script>

@stop

