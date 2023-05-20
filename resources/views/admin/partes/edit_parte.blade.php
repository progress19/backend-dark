@php
  use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-10 col-sm-12 ">
        <div class="x_panel">

          <div class="x_title">
            <h2><i class="fa fa-file-powerpoint-o"></i> Parte Nº: {{ $parte }}</h2>

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
        ajax: '{!! route('dataParte', ['parte' => $parte]) !!}',
        columns: [

            {data: 'boleta_raw', className: 'dt-body-right'},
            {data: 'nombre_raw'},
            {data: 'fecha_raw', className: 'dt-body-right'},
            {data: 'etapa_codigo_raw', className: 'dt-body-right'},
            {data: 'etapa_nombre_raw'},
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

</script>

@stop



