@php
    use App\Fun;
    use Carbon\Carbon;
@endphp

@extends('layouts.adminLayout.admin_design')
@section('content')

    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">

            <div class="x_title">
                <h2><i class="fa fa-file-text"></i> Informe Boletas /<small>Filtro</small></h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                          {{ Form::open([
                            'id' => 'informe-boletas',
                            'name' => 'informe-boletas',
                            'url' => '/admin/informe-boletas/',
                            'role' => 'form',
                            'method' => 'post']) }}

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('desde', 'Fecha desde') !!}
                                    {!! Form::text('desde', Carbon::now()->format('d-m-Y'), ['class' => 'form-control datespicker', 'id' => 'desde']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('hasta', 'Fecha hasta') !!}
                                    {!! Form::text('hasta', Carbon::now()->format('d-m-Y'), ['class' => 'form-control datespicker', 'id' => 'hasta']) !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('circunscripción', 'Circunscripción') !!}
                                    {!! Form::select(
                                        'idCircuns',
                                        ['0' => 'Todos', 1 => 'Capital', 2 => 'San Rafael', 3 => 'Tunuyan', 4 => 'San Martín'],
                                        null,
                                        ['id' => 'idCircuns', 'class' => 'form-control select2'],
                                    ) !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('Of. de Justicia', 'Of. de Justicia') !!}
                                    {!! Form::select('idOficial', $oficiales, null, [
                                        'id' => 'idOficial',
                                        'placeholder' => 'Todos',
                                        'class' => 'form-control select2',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('Monto', 'Monto desde') !!}
                                    {!! Form::number('monto_desde', 0, ['id' => 'monto_desde', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('Monto', 'Monto hasta') !!}
                                    {!! Form::number('monto_hasta', 0, ['id' => 'monto_hasta', 'class' => 'form-control']) !!} 
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-12" style="padding-bottom: 30px;">
                                {!! Form::label('etapas', 'Etapas') !!}
                                <select multiple="multiple" id="etapas-select" name="etapas[]">
                                    @if ($etapas)
                                        @foreach ($etapas as $etapa)
                                            @php
                                                
                                                echo '<option value=' . $etapa->id . '> (' . $etapa->codigo . ') ' . $etapa->nombre . ' </option>';
                                                
                                            @endphp
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <hr>
                            <button id="send" type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filtrar</button>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('page-js-script')

    <!-- Multi-select -->
    <script src="{{ asset('vendors/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('js/back_js/jquery.quicksearch.js') }}"></script>

    @if (session('flash_message'))
        <script>
            toast('{!! session('flash_message') !!}');
        </script>
    @endif

    <script>
        $('.datespicker').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true,
            //defaultViewDate: { year: 1977, month: 04, day: 25 }
        });

        $('#etapas-select').multiSelect({

            selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Buscar'>",
            selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Buscar'>",

            afterInit: function(ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') +
                    ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') +
                    ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function() {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function() {
                this.qs1.cache();
                this.qs2.cache();
            }

        });
    </script>

@stop
