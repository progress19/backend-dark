@php
  use App\Boleta;
@endphp

<div class="col-md-4">
  <h4 style="text-align: left;"> <span style="font-size: 20px">{{ count($result['boletas']) }}</span> Boletas en archivo PDF.</h4>
  <h4 style="text-align: left;"> <span style="font-size: 20px">{{ $result['a_procesar'] }}</span> Boletas a procesar.</h4>
  <h4 style="text-align: left;"> <span style="font-size: 20px">{{ $result['no_encontrada'] }}</span> Boletas no encontradas en EmaWeb.</h4>
</div>

@if ( $result['a_procesar'] > 0 )

  <div class="col-md-4">
    <p>Atención: el siguiente proceso cargará de forma automática los planes de pago y todos sus items descriptos en el detalle con el estado <span class="badge bg-green"> <i class="fa fa-check" aria-hidden="true"></i>A procesar</span>.</p>
  </div>

  <div class="col-md-4">
      <a href="#" class="btn btn-primary" id="procesar" onclick="procesar()" ><i class="fa fa-magic"></i> PROCESAR!</a>        
  </div>

@else

  <div class="col-md-4">
    <p><i class="fa fa-ban" style="font-size: 50px"></i></p>
    <h4>No se encontraron boletas a procesar.</h4>        
  </div>

@endif   

<div class="clearfix"></div><br>

<hr>

@php $i=0 @endphp

@foreach ( $result['boletas'] as $boleta )

      @php  $i++; @endphp

      <div class="conte-boletas">
        <div class="col-md-1"><span class="badge bg-blue">{{ $i }}</span></div>
        
        <div class="col-md-3">
          <h4>Boleta Nº: <b>{{ Boleta::getLink( $boleta['numero'], 2) }}</b></h4>
        </div> 
        
        <div class="col-md-2">
          Estado: {{ Boleta::getEstadoString( $boleta['estado'] ) }} 
        </div>

        <div class="clearfix"></div>

        <div class="col-md-1"></div>
        <div class="col-md-3"><p>Nombre: <b>{{ $boleta['nombre'] }}</b></p></div> 
        <div class="col-md-2"><p>Importe: {{ $boleta['importe'] }}</p></div>
        <div class="col-md-3"><p>Vencimiento: {{ $boleta['vto'] }}</p></div>
        <div class="col-md-1"><p>Cuotas: {{ $boleta['cuotas'] }}</p></div>
            
        <div class="clearfix"></div>
        <hr>
        
        <div class="col-md-5"> <!-- col left --> 
          <div class="col-md-7 right">HR HONORARIOS RECAUDADOR</div>
          <div class="col-md-4">{{ $boleta['hr'] }}</div>

          <div class="col-md-7 right">HO HONORARIO OF. DE JUSTICIA</div>
          <div class="col-md-4">{{ $boleta['ho'] }}</div>

          <div class="col-md-7 right">CF CAJA FORENSE</div>
          <div class="col-md-4">{{ $boleta['cf'] }}</div>

          <div class="col-md-7 right">CA COLEGIO DE ABOGADOS</div>
          <div class="col-md-4">{{ $boleta['ca'] }}</div>

          <div class="col-md-7 right">IH INHIBICIONES</div>
          <div class="col-md-4">{{ $boleta['ih'] }}</div>
        </div>

        <div class="col-md-5"> <!-- col left --> 
          <div class="col-md-7 right">ES EJECUCION DE SENTENCIA</div>
          <div class="col-md-4">{{ $boleta['es'] }}</div>

          <div class="col-md-7 right">MB MOVILIDAD JUDICIAL</div>
          <div class="col-md-4">{{ $boleta['mb'] }}</div>

          <div class="col-md-7 right">GA PORCENTAJE RECAUDADOR</div>
          <div class="col-md-4">{{ $boleta['ga'] }}</div>

          <div class="col-md-7 right">HRI HONOR.RECAU.INHIBICION</div>
          <div class="col-md-4">{{ $boleta['hri'] }}</div>
        </div>

        <div class="clearfix"></div>
      </div>
      
@endforeach

@section('page-js-script')

@stop

<style>
.conte-boletas {
  background-color: #efefef;
  text-align: left;
  padding: 20px 20px 25px 5px;
  border-radius: 8px;
  color: #333;
  margin-bottom: 20px;
  box-shadow: 10px 10px 39px -17px rgba(0,0,0,0.68);
-webkit-box-shadow: 10px 10px 39px -17px rgba(0,0,0,0.68);
-moz-box-shadow: 10px 10px 39px -17px rgba(0,0,0,0.68);
}

.right {text-align: right;}

.badge {font-size: 14px;}

</style>