@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-8">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-building-o"></i> Juzgados<small>/ Editar</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'edit_juzgado',
              'name' => 'edit_juzgado',
              'url' => '/admin/edit-juzgado/'.$juzgado->id,
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('nombre', 'Nombre') !!}
                  {!! Form::text('nombre', $juzgado->nombre, ['id' => 'nombre', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('circunscripcion', 'Circunscripción') !!}
                  {!! Form::text('circunscripcion', $juzgado->circunscripcion, ['id' => 'circunscripcion', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('numero', 'Número') !!}
                  {!! Form::text('numero', $juzgado->numero, ['id' => 'numero', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>
  
              <div class="col-md-6">
                <div class="form-group">
                  {!! Form::label('juez', 'Juez') !!}
                  {!! Form::text('juez', $juzgado->juez, ['id' => 'juez', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-3">
                <div class="form-group">
                  {!! Form::label('secretaria', 'Secretaría') !!}
                  {!! Form::text('secretaria', $juzgado->secretaria, ['id' => 'secretaria', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

                <div class="col-md-3">
                  <div class="form-group">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', array('1' => 'Activado', '0' => 'Desactivado'), $juzgado->estado, ['id' => 'estado', 'class' => 'form-control']); !!}
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

