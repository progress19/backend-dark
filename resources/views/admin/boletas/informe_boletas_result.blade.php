@php
  use App\Fun;
  use App\Oficial;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">

    <div class="x_title">
      <h2><i class="fa fa-file-text"></i> Boletas /<small>Lista</small></h2>

      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="row">
        <div class="col-sm-12">
          <div class="card-box">

            <p><b>Desde:</b> {{ $data['desde'] }} <b>Hasta:</b> {{ $data['hasta'] }}</p>
            <p><b>Circunscripción:</b> {{ Fun::getCircunscripcion( $data['idCircuns'] ) }}.</p>
            <p><b>Of. de Justicia:</b> {{ $oficial }}.</p>
            <p><b>Monto:</b> de ${{ $data['monto_desde'] }} a ${{ $data['monto_hasta'] }}</p>
            <hr>
            <table class="hover table table-striped table-bordered dt-responsive nowrap" id="table" style="width:100%">
              <thead>
                <tr>
                  <th>Boleta</th>
                  <th>Fecha</th>
                  <th>Nombre</th>
                  <th>Circunscripción</th>
                  <th>Of. de Justicia</th>
                  <th>Monto</th>
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
        //serverSide: true,
        ajax: '{!! route('dataBoletasInforme', ['data' => $data]) !!}',
        columns: [
            {data: 'numero_raw', title: 'Boleta n°', className: 'dt-body-right'},
            {data: 'fecha_raw', title: 'Fecha', className: 'dt-body-right'},
            {data: 'nombre'},
            {data: 'circuns_raw', title: 'Circunscripción', className: 'dt-body-right'},
            {data: 'oficial_raw', className: 'dt-body-right'},
            {data: 'monto_raw', className: 'dt-body-right'},
            {data: 'acciones', orderable: false, searchable: false, className: 'dt-body-center'},
            {data: 'numero', name: 'numero', searchable: true, visible: false},
        ],

        language: { "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" },
        initComplete: function () { $('#table_filter label input').focus(); }
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



