@php
  use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-9 col-sm-12 ">
        <div class="x_panel">

          <div class="x_title">
            <h2><i class="fa fa-file-powerpoint-o"></i> Enviar parte Nº: {{ $parte }}</h2>

            <input id="parte_num" type="hidden" value="{{ $parte }}">

            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <div class="row">
              <div class="col-sm-12">
                <div class="card-box">

                  <table class="hover table table-striped table-bordered dt-responsive nowrap" id="table" style="width:100%">
                    <thead>
                      <tr>
                        <th>Boleta</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Código de etapa</th>
                        <th>Nombre de etapa</th>
                      </tr>
                    </thead>
                  </table>

                  <hr>

                  <div id="msg"><div id="divLoading_sm"></div></div>
                  <button id="btn-send" class="btn btn-success pull-right"> Enviar a Rentas</button>

                   {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}

                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

@endsection

@section('page-js-script')
  @if (session('flash_message'))
    <script>toast('{!! session('flash_message') !!}');</script>
  @endif

<script>

  $('#btn-send').click(function() {
     $('#btn-send').addClass('displayNone')
     $('#divLoading_sm').html('<div class="spinner_sm"></div>');

        var baseUrl = document.getElementById('baseUrl').value;
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        })

        $.ajax({
          url: baseUrl+"/send-email-parte",
          method: "post",
          data: "parte="+$('#parte_num').val(),
            success: function(response) {

              $('#msg').html(response);
          
          }
        });
  });

$(function() {
    $('#table').DataTable({
        processing: true,
        pageLength: 50,
        serverSide: true,
        ajax: '{!! route('dataParte', ['parte' => $parte]) !!}',
        columns: [

            {data: 'boleta_raw', className: 'dt-body-right'},
            {data: 'nombre_raw'},
            {data: 'fecha_raw', className: 'dt-body-right'},
            {data: 'etapa_codigo_raw', className: 'dt-body-right'},
            {data: 'etapa_nombre_raw'},

        ],

        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
         },
    });
});


</script>

@stop



