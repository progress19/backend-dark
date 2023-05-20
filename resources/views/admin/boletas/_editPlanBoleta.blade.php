@php
  use App\Fun;
  use Carbon\Carbon;
@endphp

<!-- modals -->
<!-- modal edit PLAN -->
<div class="modal fade bs-example-modal-lg" id="editPlanBoleta" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      {{ Form::open(array('id' => 'add_plan', 'role' => 'form')) }}

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bars"></i> Editar plan de pago</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="destroyDataTable()" ><span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">

        {{ Form::hidden('boleta', $boleta->numero, array('id' => 'boleta')) }}
        {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('nro_edit', 'Nº de Plan') !!}
            {!! Form::text('nro_edit', null, array('readonly','class' => 'form-control','id' => 'nro_edit')) !!}      
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('fecha', 'Fecha 1er vencimiento') !!}
            {!! Form::text('fechaPlan_edit', Carbon::now()->format('d-m-Y'), array('readonly','class' => 'form-control','id' => 'fechaPlan_edit')) !!}      
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('importe', 'Importe') !!}
            {!! Form::text('importePlan_edit', null, ['readonly','id' => 'importePlan_edit', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            {!! Form::label('cuotas', 'Cuotas') !!}
            {!! Form::text('cuotasPlan_edit', null, ['readonly','id' => 'cuotasPlan_edit', 'class' => 'form-control']) !!}
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">

          <ul class="nav nav-tabs bar_tabs" id="tab_editPlan" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cuotas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Items</a>
            </li>

          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              <table class="hover table table-striped table-bordered dt-responsive nowrap" id="cuotas_dataTable" style="width:100%">
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

            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
      <div class="row">

      <div id="divItems" style="width: 100%;"></div>

    </div>

            </div>

          </div>

        </div>  

        <div class="clearfix"></div>

      </div> <!-- modal body -->

      <div class="modal-footer">
        <button onclick="destroyDataTable()" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
      </div>

      {!! Form::close() !!}

    </div>
  </div>
</div>

<script>
  function destroyDataTable() { $('#cuotas_dataTable').DataTable().clear().destroy(); }
</script>