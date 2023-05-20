@php
  use App\Fun;
  use Carbon\Carbon;
@endphp

<!-- modals -->
<!-- modal nueva PLAN -->
<div class="modal fade bs-example-modal-lg" id="addPlanBoleta" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      {{ Form::open(array('id' => 'add_plan', 'role' => 'form')) }}

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bars"></i> Nuevo plan de pagos</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">

        {{ Form::hidden('boleta', $boleta->numero, array('id' => 'boleta')) }}
        {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('nro', 'Nº de Plan') !!}
            {!! Form::text('nro', null, array('readonly','class' => 'form-control','id' => 'nro')) !!}      
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('fecha', 'Fecha 1er vencimiento') !!}
            {!! Form::text('fechaPlan', Carbon::now()->format('d-m-Y'), array('class' => 'form-control datespicker','id' => 'fechaPlan')) !!}      
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('importe', 'Importe') !!}
            {!! Form::number('importePlan', null, ['id' => 'importePlan', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('cuotas', 'Cuotas') !!}
            {!! Form::number('cuotas', null, ['id' => 'cuotas', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="clearfix"></div>

        <hr>

      <div class="row">
      <div class="col-4">

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('ho_reca', 'Hon. Recaudador') !!}
            {!! Form::number('ho_reca', null, ['id' => 'ho_reca', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('ho_ofi', 'Hon. Oficial') !!}
            {!! Form::number('ho_ofi', null, ['id' => 'ho_ofi', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('ca_fo', 'Ca. Forense') !!}
            {!! Form::number('ca_fo', null, ['id' => 'ca_fo', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('co_abo', 'Col. Abogado') !!}
            {!! Form::number('co_abo', null, ['id' => 'co_abo', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('emb', 'Embargo') !!}
            {!! Form::number('emb', null, ['id' => 'emb', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('inh', 'Inhibición') !!}
            {!! Form::number('inh', null, ['id' => 'inh', 'class' => 'form-control']) !!}
          </div>
        </div>

      </div> <!-- col 6 -->

      <div class="col-md-4">

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('eje_sen', 'Ejec. Sentencia') !!}
            {!! Form::number('eje_sen', null, ['id' => 'eje_sen', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('mo_b', 'Movilidad B') !!}
            {!! Form::number('mo_b', null, ['id' => 'mo_b', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('po_re', 'Porc. Recau') !!}
            {!! Form::number('po_re', null, ['id' => 'po_re', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('ofi', 'Oficio Art. 250') !!}
            {!! Form::number('ofi', null, ['id' => 'ofi', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('ho_in', 'Hono. Inhibición') !!}
            {!! Form::number('ho_in', null, ['id' => 'ho_in', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-12">
          <div class="form-group">
            {!! Form::label('ho_mar', 'Hono. Martillero') !!}
            {!! Form::number('ho_mar', null, ['id' => 'ho_mar', 'class' => 'form-control']) !!}
          </div>
        </div>

      </div>
    </div>

      <div class="clearfix"></div>

      </div> <!-- modal body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>