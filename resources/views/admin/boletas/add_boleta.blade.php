@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-8">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-file-text"></i> BOLETAS/<small>Nueva</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'add_boleta',
              'name' => 'add_boleta',
              'url' => '/admin/add-boleta/',
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('numero', 'N° de boleta') !!}
                  {!! Form::text('numero', null, ['id' => 'numero', 'class' => 'form-control']) !!}
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

