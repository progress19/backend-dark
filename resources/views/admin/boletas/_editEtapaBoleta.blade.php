<!-- ################################################################### ETAPAS EDIT MODAL ##########################################
################################################################################################################################-->

      <!-- modals EDIT etapaBoleta -->
      <!-- modal nueva etapa -->
      <div class="modal fade bs-example-modal-lg" id="modal_editEtapaBoleta" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          
          <div class="modal-content">

            {{ Form::open(array('id' => 'edit_etapaBoleta', 'role' => 'form')) }}

            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bars"></i> Editar etapa</h4>
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">

              {{ Form::hidden('id', null) }}
              {{ Form::hidden('boleta', null) }}
              {{ Form::hidden('baseUrl', url('/'), array('id' => 'baseUrl')) }}

                <div class="col-md-6">
                  <div class="form-group">
                    {!! Form::label('Etapa', 'Etapa') !!}
                    {!! Form::select('idEtapaEdit', $etapas, null, ['id' => 'idEtapaEdit', 'placeholder' => 'Seleccione etapa...', 'class' => 'form-control']) !!}
                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('fechaEdit', 'Fecha') !!}
                    {!! Form::text('fechaEdit', null, array('readonly','class' => 'form-control','id' => 'fechaEdit')) !!}      

                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('vencimientoEdit', 'Vencimiento') !!}
                    {!! Form::text('vencimientoEdit', null, array('readonly','class' => 'form-control','id' => 'vencimientoEdit')) !!}
                  </div>
                </div>  

                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('importeEdit', 'Importe') !!}
                    {!! Form::number('importeEdit', null, ['id' => 'importeEdit', 'class' => 'form-control']) !!}
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    {!! Form::label('obsEdit', 'Observaciones') !!}
                    {!! Form::textarea('obsEdit', null, ['id' => 'obsEdit', 'class' => 'form-control']) !!}
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