@php
    use App\Fun;
    use Carbon\Carbon;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }
    </style>

    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-file-text"></i> BOLETAS<small>/ Editar</small></h2>
                <h4 class="nro-boleta">{{ $boleta->numero }} | {{ $boleta->nombre }}</h4>
                <ul class="nav navbar-right panel_toolbox"></ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="datos-tab" data-toggle="tab" href="#datos" role="tab"
                            aria-controls="datos" aria-selected="true"><i class="fa fa-user"></i> DATOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="etapas-tab" data-toggle="tab" href="#etapas" role="tab"
                            aria-controls="etapas" aria-selected="false"><i class="fa fa-bars"></i> ETAPAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="importes-tab" data-toggle="tab" href="#importes" role="tab"
                            aria-controls="importes" aria-selected="false"><i class="fa fa-usd" aria-hidden="true"></i>
                            IMPORTES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="planes-tab" data-toggle="tab" href="#planes" role="tab"
                            aria-controls="planes" aria-selected="false"><i class="fa fa-calendar"></i> PLANES DE PAGO</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">

                        {{ Form::open([
                            'id' => 'edit_boleta',
                            'name' => 'edit_boleta',
                            'url' => '/admin/edit-boleta/' . $boleta->id,
                            'role' => 'form',
                            'method' => 'post',
                            'files' => true,
                        ]) }}

                        <button id="send" type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>

                        <!-- LEFT -->
                        <div class="col-md-6">

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('fecha', 'Fecha') !!}
                                    {!! Form::text('fecha', Fun::getFormatDateInv($boleta->fecha), [
                                        'class' => 'form-control datespicker',
                                        'id' => 'fecha',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('nombre', 'Demandado') !!}
                                    {!! Form::text('nombre', $boleta->nombre, ['id' => 'nombre', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('idTipoDoc', 'Tipo Documento') !!}
                                    {!! Form::select(
                                        'idTipoDoc',
                                        [
                                            0 => 'Seleccione...',
                                            1 => 'DNI',
                                            2 => 'CUIT',
                                            3 => 'CI',
                                            4 => 'LC',
                                            5 => 'LE',
                                            6 => 'PAS',
                                            7 => 'S/D',
                                        ],
                                        $boleta->idTipoDoc,
                                        ['id' => 'idTipoDoc', 'class' => 'form-control select2'],
                                    ) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('nro_doc', 'N° doc.') !!}
                                    {!! Form::text('nro_doc', $boleta->nro_doc, ['id' => 'nro_doc', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('caudir', 'Dirección') !!}
                                    {!! Form::text('caudir', $boleta->caudir, ['id' => 'caudir', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('cauloc', 'Localidad') !!}
                                    {!! Form::text('cauloc', $boleta->cauloc, ['id' => 'cauloc', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('caucpo', 'C.Postal') !!}
                                    {!! Form::text('caucpo', $boleta->caucpo, ['id' => 'caucpo', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('caupci', 'Provincia') !!}
                                    {!! Form::text('caupci', $boleta->caupci, ['id' => 'caupci', 'class' => 'form-control']) !!}
                                </div>
                            </div>



                        </div>

                        <!-- RIGHT -->
                        <div class="col-md-6" style="margin-top: 19px;">

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('caucon', 'Demandante') !!}
                                    {!! Form::text('caucon', $boleta->caucon, ['id' => 'caucon', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Juzgado', 'Juzgado') !!}
                                    {!! Form::select('idJuzgado', $juzgados, $boleta->idJuzgado, [
                                        'id' => 'idJuzgado',
                                        'placeholder' => 'Seleccione juzgado...',
                                        'class' => 'form-control select2',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Of. de Justicia', 'Of. de Justicia') !!}
                                    {!! Form::select('idOficial', $oficiales, $boleta->idOficial, [
                                        'id' => 'idOficial',
                                        'placeholder' => 'Seleccione Oficial...',
                                        'class' => 'form-control select2',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('cauexa', 'Expediente Adm.') !!}
                                    {!! Form::text('cauexa', $boleta->cauexa, ['id' => 'cauexa', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('cauexj', 'Juzgado Autos') !!}
                                    {!! Form::text('cauexj', $boleta->cauexj, ['id' => 'cauexj', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('cauoim', 'Obj. Imponible') !!}
                                    {!! Form::text('cauoim', $boleta->cauoim, ['id' => 'cauoim', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('circunscripción', 'Circunscripción') !!}
                                    {!! Form::select(
                                        'idCircuns',
                                        ['' => 'Seleccione...', 1 => 'Capital', 2 => 'San Rafael', 3 => 'Tunuyan', 4 => 'San Martín'],
                                        $boleta->idCircuns,
                                        ['id' => 'idCircuns', 'class' => 'form-control select2'],
                                    ) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('impuesto', 'Impuesto') !!}
                                    {!! Form::select('idImpuesto', $impuestos, $boleta->idImpuesto, [
                                        'id' => 'idImpuesto',
                                        'placeholder' => 'Seleccione impuesto...',
                                        'class' => 'form-control select2',
                                    ]) !!}
                                </div>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('obs', 'Observaciones') !!}
                                    {!! Form::textarea('obs', $boleta->obs, ['id' => 'obs', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('secuencia', 'N° de secuencia') !!}
                                {!! Form::text('secuencia', $boleta->secuencia, ['id' => 'secuencia', 'class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="ln_solid"></div>
                            <button id="send" type="submit" class="btn btn-lg btn-success pull-right"><i
                                    class="fa fa-save"></i> Guardar</button>
                        </div>

                        {!! Form::close() !!}

                    </div>

                    <!-- ################################################################### ETAPAS  ##########################################

    ###########################################################################################################################-->

                    <div class="tab-pane fade" id="etapas" role="tabpanel" aria-labelledby="etapas-tab">

                        <div class="col-8">

                            <button type="button" id="botonAddEtapa" class="btn btn-primary float-right"
                                data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Nueva
                                etapa</button>
                            <div class="clearfix"></div>

                            <table class="hover table table-striped table-bordered dt-responsive nowrap"
                                id="etapas_dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>N° de parte</th>
                                        <th>Archivo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>

                        </div>

                        @include('admin.boletas._addEtapaBoleta')

                    </div>

                    <!-- ################################################################### IMPORTES  ##########################################

    ###########################################################################################################################-->


                    <div class="tab-pane fade" id="importes" role="tabpanel" aria-labelledby="importes-tab">

                        {{ Form::open(['id' => 'edit_importesBoleta', 'role' => 'form']) }}

                        {{ Form::hidden('id', $importe->id) }}

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('Monto', 'Monto') !!}
                                {!! Form::number('monto', $importe->monto, ['id' => 'monto', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <button type="button" onclick="calcular()" style="margin-top: 25px;margin-left: 60px;"
                            class="btn btn-primary">
                            <i class="fa fa-calculator"></i> Calcular</button>

                        <div class="clearfix"></div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('imppp1', '% suma presupuestada (1)') !!}
                                {!! Form::number('imppp1', $importe->imppp1, ['id' => 'imppp1', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('', '=') !!}
                                {!! Form::number('impip1', $importe->impip1, ['id' => 'impip1', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('imppp2', '% suma presupuestada (2)') !!}
                                {!! Form::number('imppp2', $importe->imppp2, ['id' => 'imppp2', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('', '=') !!}
                                {!! Form::number('impip2', $importe->impip2, ['id' => 'impip2', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('imphma', '% Honorarios mandatario') !!}
                                {!! Form::number('imphma', $importe->imphma, ['id' => 'imphma', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('', '=') !!}
                                {!! Form::number('impima', $importe->impima, ['id' => 'impima', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('imphpa', '% Honorarios patrocinante') !!}
                                {!! Form::number('imphpa', $importe->imphpa, ['id' => 'imphpa', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('', '=') !!}
                                {!! Form::number('impipa', $importe->impipa, ['id' => 'impipa', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('imphof', '% Honorarios Of. de Justicia') !!}
                                {!! Form::number('imphof', $importe->imphof, ['id' => 'imphof', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('', '=') !!}
                                {!! Form::number('impiof', $importe->impiof, ['id' => 'impiof', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('imphmr', '% Honorarios Martillero') !!}
                                {!! Form::number('imphmr', $importe->imphmr, ['id' => 'imphmr', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                {!! Form::label('', '=') !!}
                                {!! Form::number('impimr', $importe->impimr, ['id' => 'impimr', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="ln_solid"></div>
                            <button id="send" type="submit" class="btn btn-success pull-left">Guardar</button>

                        </div>

                        {!! Form::close() !!}

                    </div>

                    <!-- ################################################################### PLANES DE PAGO ##########################################
    ################################################################################################################################-->

                    <div class="tab-pane fade" id="planes" role="tabpanel" aria-labelledby="planes-tab">

                        <div class="col-8">

                            <button type="button" id="botonAddPlan" class="btn btn-primary float-right"
                                data-toggle="modal" data-target="#addPlanBoleta" data-boleta="{{ $boleta->numero }}"><i
                                    class="fa fa-plus"></i> Nuevo plan</button>
                            <div class="clearfix"></div>

                            <table class="hover table table-striped table-bordered dt-responsive nowrap"
                                id="planes_dataTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Fecha</th>
                                        <th>Cuotas/Pagadas</th>
                                        <th>Importe</th>
                                        <th>Pago</th>
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

    @include('admin.boletas._editEtapaBoleta')
    @include('admin.boletas._addPlanBoleta')
    @include('admin.boletas._editPlanBoleta')
    @include('admin.boletas._addPago')

@endsection

@section('page-js-script')

    <script>
        /* edit plan */

        $(function() {

            $('#editPlanBoleta').on('show.bs.modal', function(e) {

                $('#tab_editPlan li:first-child a').tab('show');

                $(e.currentTarget).find('input[name="nro_edit"]').val($(e.relatedTarget).data('nro'));
                $(e.currentTarget).find('input[name="fechaPlan_edit"]').val($(e.relatedTarget).data('vto'));
                $(e.currentTarget).find('input[name="importePlan_edit"]').val($(e.relatedTarget).data(
                    'importe'));
                $(e.currentTarget).find('input[name="cuotasPlan_edit"]').val($(e.relatedTarget).data(
                    'cuotas'));

                /*items*/

                var boleta = $(e.relatedTarget).data('boleta');
                var nro = $(e.relatedTarget).data('nro');
                var cuotas = $(e.relatedTarget).data('cuotas');

                var baseUrl = document.getElementById('baseUrl').value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: baseUrl + '/getItemsPlan/' + boleta + '/' + nro + '/' + cuotas,
                    type: 'post',
                    success: function(data) {

                        $('#divItems').html(data);

                        //              var ho_reca = data.ho_reca;

                        //console.log( parseInt(ho_reca));

                        //alert(data.ho_reca);

                        //var dataa = (123456789.12345).formatMoney(2, ".", ",");

                        //const profits = data.ho_reca;

                        //profits.toFixed(3) // Returns 2489.824 (rounds up)
                        //alert(profits.toFixed(2)); // Returns 2489.82
                        //profits.toFixed(7) // Returns 2489.8237000 (pads the decimals)
                        //alert(data);
                        //console.log((data.ho_reca).formatMoney(2, ".", ","));
                        /*
                        $(e.currentTarget).find('input[name="ho_reca_e"]').val(data.ho_reca);
                        $(e.currentTarget).find('input[name="ho_ofi_e"]').val(data.ho_ofi);
                        $(e.currentTarget).find('input[name="ca_fo_e"]').val(data.ca_fo);
                        $(e.currentTarget).find('input[name="co_abo_e"]').val(data.co_abo);
                        $(e.currentTarget).find('input[name="emb_e"]').val(data.emb);
                        $(e.currentTarget).find('input[name="inh_e"]').val(data.inh);
                        $(e.currentTarget).find('input[name="eje_sen_e"]').val(data.eje_sen);
                        $(e.currentTarget).find('input[name="mo_b_e"]').val(data.mo_b);
                        $(e.currentTarget).find('input[name="po_re_e"]').val(data.po_re);
                        $(e.currentTarget).find('input[name="ofi_e"]').val(data.ofi);
                        $(e.currentTarget).find('input[name="ho_in_e"]').val(data.ho_in);
                        $(e.currentTarget).find('input[name="ho_mar_e"]').val(data.ho_mar);
                        */
                    }
                });

                /* cuotas dataTable *************************************************************************************************/

                var cuotas_dataTable = $('#cuotas_dataTable').DataTable({
                    processing: true,
                    serverSide: true,

                    ajax: {
                        url: '{!! route('dataCuotas') !!}',
                        type: 'POST',
                        data: {
                            'boleta': {!! $boleta->numero !!},
                            'nro': $(e.relatedTarget).data('nro')
                        },
                    },

                    columns: [{
                            data: 'cuota_raw',
                            className: 'dt-body-right'
                        },
                        {
                            data: 'vto_raw',
                            searchable: true,
                            className: 'dt-body-right'
                        },
                        {
                            data: 'importe_raw',
                            searchable: true,
                            className: 'dt-body-right'
                        },
                        {
                            data: 'pago_raw',
                            searchable: true,
                            className: 'dt-body-right'
                        },
                        {
                            data: 'banco_raw',
                            searchable: true,
                            className: 'dt-body-left'
                        },
                        {
                            data: 'estado_raw',
                            orderable: false,
                            searchable: false,
                            className: 'dt-body-center'
                        }
                    ],

                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });

                //cuotas_dataTable.destroy();       

            });

        });


        /* edit etapa */

        $(function() {

            $('#modal_editEtapaBoleta').on('show.bs.modal', function(e) {

                var idEtapaBoleta = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="id"]').val(idEtapaBoleta);

                var baseUrl = document.getElementById('baseUrl').value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                })

                $.ajax({
                    url: baseUrl + "/getEtapaBoleta/" + idEtapaBoleta,
                    method: "post",
                    success: function(data) {
                        var fecha = data.fecha;
                        var fecha_split = fecha.split('-');
                        var fecha = fecha_split[2] + '-' + fecha_split[1] + '-' + fecha_split[
                        0];
                        var vencimiento = '';

                        if (data.vencimiento) {
                            var vencimiento = data.vencimiento;
                            var vto = vencimiento.split('-');
                            var vencimiento = vto[2] + '-' + vto[1] + '-' + vto[0];
                            $(e.currentTarget).find('input[name="vencimientoEdit"]').val(
                                vencimiento);
                        } else {
                            $(e.currentTarget).find('input[name="vencimientoEdit"]').val(
                                vencimiento);
                        }
                        $('#idEtapaEdit').val(data.idEtapa).trigger('change');
                        $('#idEtapaEdit').select2({
                            disabled: true
                        });
                        $(e.currentTarget).find('input[name="fechaEdit"]').val(fecha);
                        $(e.currentTarget).find('input[name="importeEdit"]').val(data.importe);
                        $(e.currentTarget).find('textarea[name="obsEdit"]').val(data.obs);
                    }
                });

            });

        });

        /* add pago **********************************************************************************************************************************/

        $(function() {

            $('#pagoCuota').on('shown.bs.modal', function(e) {

                $('#fecha_pago').datepicker("setDate", new Date());
                $('#idBanco').val('').trigger('change');

                var nro = $(e.relatedTarget).data('nro');
                var cuotas = $(e.relatedTarget).data('cuotas');

                $(e.currentTarget).find('input[name="nro_pago"]').val(nro);
                $(e.currentTarget).find('input[name="cuota_pago"]').val(1);

                /* cuotas dataTable *************************************************************************************************/

                var cuotas_dataTable = $('#cuotasPago_dataTable').DataTable({
                    processing: true,
                    serverSide: true,

                    ajax: {
                        url: '{!! route('dataCuotas') !!}',
                        type: 'POST',
                        data: {
                            'boleta': {!! $boleta->numero !!},
                            'nro': $(e.relatedTarget).data('nro')
                        },
                    },

                    columns: [{
                            data: 'cuota_raw',
                            className: 'dt-body-right'
                        },
                        {
                            data: 'vto_raw',
                            searchable: true,
                            className: 'dt-body-right'
                        },
                        {
                            data: 'importe_raw',
                            searchable: true,
                            className: 'dt-body-right'
                        },
                        {
                            data: 'pago_raw',
                            searchable: true,
                            className: 'dt-body-right'
                        },
                        {
                            data: 'banco_raw',
                            searchable: true,
                            className: 'dt-body-left'
                        },
                        {
                            data: 'estado_raw',
                            orderable: false,
                            searchable: false,
                            className: 'dt-body-center'
                        }
                    ],

                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });

            });

        });


        /* add plan **********************************************************************************************************************************/

        $(function() {

            $('#addPlanBoleta').on('show.bs.modal', function(e) {

                var boleta = $(e.relatedTarget).data('boleta');
                //$(e.currentTarget).find('input[name="id"]').val(idEtapaBoleta);

            });

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $(function() {

            /* etapas dataTable *************************************************************************************************/

            $('#etapas_dataTable').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: '{!! route('dataEtapasBoletas') !!}',
                    type: 'POST',
                    data: {
                        'boleta': {!! $boleta->numero !!}
                    },
                },

                columns: [
                    //{ "data": "user" , name : "user.name"}, pone esta para ver el loading!!!!
                    {
                        data: 'fecha_raw',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'codigo_raw',
                        searchable: true,
                        className: 'dt-body-right'
                    },
                    {
                        data: 'nombre_raw',
                        className: ''
                    },
                    {
                        data: 'parte',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'archivo',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                    {
                        data: 'acciones',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    }
                ],

                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

            /* planes de pago dataTable */

            $('#planes_dataTable').DataTable({
                processing: true,
                serverSide: true,

                ajax: {
                    url: '{!! route('dataPlanes') !!}',
                    type: 'POST',
                    data: {
                        'boleta': {!! $boleta->numero !!}
                    },
                },

                columns: [
                    //{ "data": "user" , name : "user.name"}, pone esta para ver el loading!!!!
                    {
                        data: 'numero_raw',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'fecha_raw',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'cuotas_raw',
                        className: 'dt-body-center'
                    },
                    {
                        data: 'importe',
                        className: 'dt-body-right'
                    },
                    {
                        data: 'pago_raw',
                        className: 'dt-body-center'
                    },
                    {
                        data: 'acciones',
                        orderable: false,
                        searchable: false,
                        className: 'dt-body-center'
                    },
                ],

                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

        });
    </script>

    <script>
        $('.datespicker').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            //defaultViewDate: { year: 1977, month: 04, day: 25 }
        });

        CKEDITOR.replace('obs');

        $('#addPlanBoleta').on('hidden.bs.modal', function() {
            $('#planes_dataTable').DataTable().ajax.reload();
        });

        $('#modalEtapasBoleta').on('hidden.bs.modal', function() {
            $('#etapas_dataTable').DataTable().ajax.reload();
        });

        $(document).ready(function() {
            $('.select2').select2();
        });


        $('#botonAddPlan').click(function(e) {

            $('#importePlan').val(0);
            $('#cuotas').val(0);
            $('#fechaPlan').datepicker("setDate", new Date());

            $('#ho_reca').val(0);
            $('#ho_ofi').val(0);
            $('#ca_fo').val(0);
            $('#co_abo').val(0);
            $('#emb').val(0);
            $('#inh').val(0);
            $('#eje_sen').val(0);
            $('#mo_b').val(0);
            $('#po_re').val(0);
            $('#ofi').val(0);
            $('#ho_in').val(0);
            $('#ho_mar').val(0);

            var boleta = $('#boleta').val();

            var baseUrl = document.getElementById('baseUrl').value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            })

            $.ajax({
                url: baseUrl + "/getNroPlan/" + boleta,
                method: "post",
                success: function(data) {
                    $('#nro').val(data);
                }
            });

        });

        $('#botonAddEtapa').click(function(e) {

            $('#idEtapa').val('').trigger('change');
            $('#importe').val(0);
            $('#obsEtapa').val('');
            $('#fechaEtapa').datepicker("setDate", new Date());

        });

        function calcular() {

            var impip1 = $('#monto').val() * $('#imppp1').val() / 100;
            $('#impip1').val(impip1);

            var impip2 = $('#monto').val() * $('#imppp2').val() / 100;
            $('#impip2').val(impip2);

            var impima = $('#monto').val() * $('#imphma').val() / 100;
            $('#impima').val(impima);

            var impipa = $('#monto').val() * $('#imphpa').val() / 100;
            $('#impipa').val(impipa);

            var impiof = $('#monto').val() * $('#imphof').val() / 100;
            $('#impiof').val(impiof);

            var impimr = $('#monto').val() * $('#imphmr').val() / 100;
            $('#impimr').val(impimr);

            toast('Cálculos OK!');

        }
    </script>

@stop
