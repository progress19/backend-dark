@extends('layouts.adminLayout.admin_design')
@section('content')

      <div class="col-md-8">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-line-chart"></i> Configuración<small>/ Editar</small></h2>
            <ul class="nav navbar-right panel_toolbox"></ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            {{ Form::open([
              'id' => 'edit_indices',
              'name' => 'edit_indices',
              'url' => '/admin/edit-indices/'.$config->id,
              'role' => 'form',
              'method' => 'post',
              'files' => true]) }}

              <div class="row">

              <div class="col-md-12">
                <h4>Indices</h4>  
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('imppp1', '% suma presupuestada(1)') !!}
                  {!! Form::number('imppp1', $config->imppp1, ['id' => 'imppp1', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('imppp2', '% suma presupuestada(1)') !!}
                  {!! Form::number('imppp2', $config->imppp2, ['id' => 'imppp2', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('imphma', '% Honorarios mandatario') !!}
                  {!! Form::number('imphma', $config->imphma, ['id' => 'imphma', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('imphpa', '% Honorarios patrocinante') !!}
                  {!! Form::number('imphpa', $config->imphpa, ['id' => 'imphpa', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('imphof', '% Honorarios Of. de Justicia') !!}
                  {!! Form::number('imphof', $config->imphof, ['id' => 'imphof', 'class' => 'form-control']) !!}
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-4">
                <div class="form-group">
                  {!! Form::label('imphmr', '% Honorarios Martillero') !!}
                  {!! Form::number('imphmr', $config->imphmr, ['id' => 'imphmr', 'class' => 'form-control']) !!}
                </div>
              </div>
<!-- 
          "monto" => $data['monto'],
          "imppp1" => $data['imppp1'],
          "impip1" => $data['impip1'],
          "imppp2" => $data['imppp2'],
          "impip2" => $data['impip2'],
          "imphma" => $data['imphma'],
          "impima" => $data['impima'],
          "imphpa" => $data['imphpa'],
          "impipa" => $data['impipa'],
          "imphof" => $data['imphof'],
          "impiof" => $data['impiof'],
          "imphmr" => $data['imphmr'],
          "impimr" => $data['impimr'],

-->
                <div class="clearfix"></div>

                <div class="col-md-12">
                  <hr>
                  <h4>Partes</h4>  
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    {!! Form::label('parte_email', 'Destinatario envio de parte') !!}
                    {!! Form::text('parte_email', $config->parte_email, array('class' => 'form-control','id' => 'parte_email')) !!}      
                  </div>
                </div>
                
                <div class="clearfix"></div>

                <div class="col-md-12"><div class="ln_solid"></div>
                <button id="send" type="submit" class="btn btn-success pull-right">Guardar</button>
              </div>

            </div>

            {!! Form::close() !!}

          </div>
        </div>
      </div>

@endsection


