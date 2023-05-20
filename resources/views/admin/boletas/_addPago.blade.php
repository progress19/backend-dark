@php
  use App\Fun;
  use Carbon\Carbon;
@endphp

<!-- modals -->
<!-- modal nueva etapa -->
<div class="modal fade bs-example-modal-lg" id="pagoCuota" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      {{ Form::open(array('id' => 'add_pago', 'role' => 'form')) }}

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bars"></i> Nuevo pago</h4>
        <button type="button" class="close" onclick="destroyCu()" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      </div>

      <div class="modal-body">

        {{ Form::hidden('boleta', $boleta->numero) }}
        {{ Form::hidden('nro_pago', null) }}
        {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}
       

        <div class="col-md-2">
          <div class="form-group">
            {!! Form::label('cuota_pago', 'Cuota') !!}
            {!! Form::number('cuota_pago', null, ['id' => 'cuota_pago', 'class' => 'form-control']) !!}
          </div>
        </div> 
        

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('fecha_pago', 'Fecha de pago') !!}
            {!! Form::text('fecha_pago', Carbon::now()->format('d-m-Y'), array('class' => 'form-control datespicker','id' => 'fecha_pago')) !!}      
          </div>
        </div>  

        <div class="col-md-6">
          <div class="form-group">
            {!! Form::label('Banco', 'Banco') !!}
            {!! Form::select('idBanco', $bancos, null, ['id' => 'idBanco', 'placeholder' => 'Seleccione banco...', 'class' => 'form-control select2']) !!}
          </div>
        </div>

        <div class="clearfix"></div>  

          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('Of. de Justicia', 'Of. de Justicia') !!}
              {!! Form::select('idOficial_pago', $oficiales, $boleta->idOficial, ['id' => 'idOficial_pago', 'placeholder' => 'Seleccione Oficial...', 'class' => 'form-control select2']) !!}
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              {!! Form::label('circunscripción', 'Circunscripción') !!}
              {!! Form::select('idCircuns_pago', array(0 => 'Seleccione...', 1 => 'Capital', 2 => 'San Rafael', 3 => 'Tunuyan', 4 => 'San Martín'), $boleta->idCircuns, ['id' => 'idCircuns_pago', 'class' => 'form-control select2']); !!}
            </div>
          </div> 

          <div class="clearfix"></div>

        <hr>

         <h6><b> CUOTAS </b> </h6> 

        <table class="hover table table-striped table-bordered dt-responsive nowrap" id="cuotasPago_dataTable" style="width:100%">
          <thead>
            <tr>
              <th>Cuota</th>
              <th>Vto</th>
              <th>Importe</th>
              <th>Pago</th>
              <th>Banco</th>
              <th>Estado</th>
            </tr>
          </thead>
        </table>

      </div> <!-- modal body -->

      <div class="modal-footer">
        <button type="button" onclick="destroyCu()" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>

<script>
  function destroyCu() {
      $('#cuotasPago_dataTable').DataTable().clear().destroy();
  }
</script>