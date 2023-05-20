@php
  use App\Fun;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">

    <div class="x_title">
      <h2><i class="fa fa-file-text"></i> Liquidaciones /<small>Lista</small></h2>

      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">

            <table class="hover table table-striped table-bordered dt-responsive nowrap" id="table" style="width:100%">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Boleta</th>
                  <th>Nombre</th>
                  <th>Oficial</th>
                  <th>Circunscripción</th>
                  <th>Cuota</th>
                  <th>Total</th>
                  <th>Banco</th>
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
        ajax: '{!! route('dataDepo') !!}',
        columns: [

            {data: 'fecha_raw', className: 'dt-body-right'},
            {data: 'numero_raw', className: 'dt-body-right'},
            {data: 'nombre_raw', className: 'dt-body-left'},
            {data: 'oficial_raw', className: 'dt-body-left'},
            {data: 'circuns_raw', className: 'dt-body-left'},
            {data: 'cuota_raw', className: 'dt-body-right'},
            {data: 'total', className: 'dt-body-right'},
            {data: 'banco_raw', className: 'dt-body-left'},
            
            {data: 'boleta', name: 'boleta', searchable: true, visible: false},
        ],

        language: {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    });
});

$('.dataTables_processing').css("visibility","visible");

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



