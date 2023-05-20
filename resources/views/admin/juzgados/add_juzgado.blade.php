@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-8">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-building-o"></i> Juzgados<small>/ Nuevo</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'add_juzgado',
              'name' => 'add_juzgado',
              'url' => '/admin/add-juzgado/',
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('nombre', 'Nombre') !!}
                  {!! Form::text('nombre', null, ['id' => 'nombre', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('circunscripcion', 'Circunscripción') !!}
                  {!! Form::text('circunscripcion',null, ['id' => 'circunscripcion', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('numero', 'Número') !!}
                  {!! Form::text('numero', null, ['id' => 'numero', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>
  
              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('juez', 'Juez') !!}
                  {!! Form::text('juez', null, ['id' => 'juez', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('secretaria', 'Secretaría') !!}
                  {!! Form::text('secretaria', null, ['id' => 'secretaria', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', array('1' => 'Activado', '0' => 'Desactivado'), null, ['id' => 'estado', 'class' => 'form-control']); !!}
                  </div>
                </div>   

                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
              </div>

            {!! Form::close() !!}

          </div>
        </div>
      </div>



@endsection

@section('page-js-script')


@stop

