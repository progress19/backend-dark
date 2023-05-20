@php
  use App\Fun;
  use Carbon\Carbon;
@endphp

<!-- modals -->
<!-- modal nueva etapa -->
<div class="modal fade bs-example-modal-lg" id="modalEtapasBoleta" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      {{ Form::open(array('id' => 'add_etapaBoleta', 'role' => 'form')) }}

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bars"></i> Nueva etapa</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">

        {{ Form::hidden('boleta', $boleta->numero) }}
        {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('fecha', 'Fecha') !!}
            {!! Form::text('fecha', Carbon::now()->format('d-m-Y'), array('class' => 'form-control datespicker','id' => 'fecha')) !!}      
          </div>
        </div>  

        <div class="col-md-6">
          <div class="form-group">
            {!! Form::label('Etapa', 'Etapa') !!}
            {!! Form::select('idEtapa', $etapas, null, ['id' => 'idEtapa', 'placeholder' => 'Seleccione etapa...', 'class' => 'form-control select2']) !!}
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('obs', 'Observaciones') !!}
            {!! Form::textarea('obs', null, ['id' => 'obs', 'class' => 'form-control']) !!}
          </div>
        </div>

      </div> <!-- modal body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>