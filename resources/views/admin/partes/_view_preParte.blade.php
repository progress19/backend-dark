@php
  use App\Fun;
@endphp

    <p>Se encontraron las siguientes etapas :</p>

    <div class="row">
      <div class="col-sm-12">
        <div class="card-box">

          <table class="hover table table-striped table-bordered dt-responsive nowrap" id="table" style="width:100%">
            <thead>
              <tr>
                <th>Boleta</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Código de etapa</th>
                <th>Nombre de etapa</th>

              </tr>
            </thead>

              <tbody>

                @foreach ($etapas_arr as $etapa)
                
                <tr>
                
                  <td style="text-align:right"> 
                    <a href="{{ url('/admin/edit-boleta/'.$etapa["idBoleta"]) }}" target="new">     
                      {{ $etapa['boleta'] }} 
                    </a>
                  </td>

                  <td> {{ $etapa['nombre'] }} </td>
                  <td style="text-align:right"> {{ $etapa['fecha'] }}</td>
                  <td style="text-align:right"> {{ $etapa['etapa_codigo'] }} </td>
                  <td> {{ $etapa['etapa_nombre'] }} </td>

                </tr>

                @endforeach
                                        
              </tbody>

          </table>

        </div>
      </div>
    </div>

@section('page-js-script')

<script>

$(document).ready(function() {
    $('#table tbody').on( 'click', '.delReg', function () {
    if (confirm('Está seguro de eliminar el registro ?')) {
        return true;
    }
    return false;
    });
});

</script>





