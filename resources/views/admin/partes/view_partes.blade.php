@php
  use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">

          <div class="x_title">
            <h2><i class="fa fa-file-powerpoint-o"></i> Partes /<small>Lista</small></h2>

            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <div class="row">
              <div class="col-sm-12">
                <div class="card-box">

                  <table class="hover table table-striped table-bordered dt-responsive nowrap" id="table" style="width:100%">
                    <thead>
                      <tr>
                        <th>Nº</th>
                        <th>Fecha</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Circunscripción</th>
                        <th>Generado por</th>
                        <th>Fecha envio</th>
                        <th>Estado</th>
                        <th></th>
                      </tr>
                    </thead>
                  </table>

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

$(function() {
    $('#table').DataTable({
        processing: true,
        pageLength: 50,
        serverSide: true,
        ajax: '{!! route('dataPartes') !!}',
        columns: [

            {data: 'id' , className: 'dt-body-right'},
            {data: 'fecha_raw', className: 'dt-body-right'},
            {data: 'desde_raw'},
            {data: 'hasta_raw'},
            {data: 'circuns_raw', className: 'dt-body-left'},
            {data: 'creado'},
            {data: 'enviado_fecha_raw'},
            {data: 'estado', orderable: false, searchable: false, className: 'dt-body-center'},
            {data: 'acciones',title: '', orderable: false, searchable: false, className: 'dt-body-center'},

        ],

        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
         },
    });
});


$(document).ready(function() {
    $('#table tbody').on( 'click', '.delReg', function () {
    if (confirm('Está seguro de eliminar el registro ?')) {
        return true;
    }
    return false;
    });
});


$('.send_parte').click(function() {



/*
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
  
          if (response.length > 114) {
            $('#send').removeClass('displayNone');
            $('#conte-form').addClass('displayNone');
            $('#btn-next').addClass('displayNone');
            $('#btn-back').removeClass('displayNone');
          }

          $('#view_preParte').html(response);    

      }
    });
*/

  });

</script>

@stop

<style>.badge { font-size: 14px !important; padding: 5px 20px !important; font-weight: 500 !important; margin: 3px 0; }</style>

