
<h4 style="text-align: left;">{{ $mensaje }}</h4>

<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      
      <th>Boleta</th>
      <th>Nombre</th>
      <th>Cuota</th>
      <th>Importe</th>
      <th>Fecha</th>
      <th>Estado</th>

    </tr>
  </thead>
  <tbody>

  	@foreach ($array as $linea)
  	
    <tr>

      <td class="text-right"> {!! $linea['boleta'] !!} </td> 
      <td class="text-left"> {{ $linea['nombre'] }} </td>
      <td class="text-right"> {{ $linea['cuota'] }} </td>
      <td class="text-right"> {{ $linea['importe'] }} </td>
      <td class="text-right"> {{ $linea['fecha'] }} </td>
      <td> {!! $linea['estado'] !!} </td>

    </tr>

  	@endforeach
                            
  </tbody>
</table>