@extends('layouts.adminLayout.admin_design')
@section('content')

              <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="x_panel animate__animated animate__fadeIn">
                  <div class="x_title">
                    <h2><i class="fa fa-users"></i> Usuarios<small>/ Nuevo</small></h2>
                    <ul class="nav navbar-right panel_toolbox"></ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
  {{ Form::open([
  	'id' => 'add_usuario',
  	'name' => 'add_usuario',
  	'url' => '/admin/agregar-usuario',
  	'role' => 'form',
  	'method' => 'post',
    'files' => true]) }}

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('name', 'Nombre') !!}
                  {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('email', 'Email') !!}
                  {!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('password', 'Contraseña') !!}
                  {!! Form::password('password',['id' => 'password', 'class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </div>

               <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('rol', 'Rol') !!}
                  {!! Form::select('rol', array('1' => 'Administrador', '0' => 'Operador'), null, ['id' => 'rol', 'class' => 'form-control']); !!}
                </div>
              </div> 

                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', array('1' => 'Activado', '0' => 'Desactivado'), null, ['id' => 'estado', 'class' => 'form-control']); !!}
                  </div>
                </div>   

                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
              </div>

    {!! Form::close() !!}

                  </div>
                </div>
              </div>


@endsection

@section('page-js-script')

@stop