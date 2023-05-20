@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-8">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-bars"></i> Etapas /<small>Nuevo</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'add_etapa',
              'name' => 'add_etapa',
              'url' => '/admin/add-etapa/',
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

                          <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('codigo', 'Código') !!}
                  {!! Form::text('codigo', null, ['id' => 'codigo', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('nombre', 'Nombre') !!}
                  {!! Form::text('nombre', null, ['id' => 'nombre', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>
              
              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('parte', 'Parte a rentas') !!}
                  {!! Form::select('parte', array('1' => 'Si', '0' => 'No'), null, ['id' => 'parte', 'class' => 'form-control']); !!}
                </div>
              </div>  

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('resalta', 'Resaltar en boleta') !!}
                  {!! Form::select('resalta', array('1' => 'Si', '0' => 'No'), null, ['id' => 'resalta', 'class' => 'form-control']); !!}
                </div>
              </div>  

              <div class="clearfix"></div>

                <div class="col-md-4" >
                  <div class="form-group">
                    {!! Form::label('archivo', 'Archivo') !!}
                    {!! Form::file('archivo', null, ['id' => 'archivo', 'class' => 'form-control']) !!}
                  </div>
                </div>

                <div class="clearfix"></div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', array('1' => 'Activado', '0' => 'Desactivado'), null, ['id' => 'estado', 'class' => 'form-control']); !!}
                  </div>
                </div>   

              <div class="col-md-12">
                <div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
              </div>

            {!! Form::close() !!}

          </div>
        </div>
      </div>



@endsection

@section('page-js-script')


@stop

