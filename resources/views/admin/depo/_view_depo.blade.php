@php
  use App\Fun;
@endphp

    <table class="hover table table-striped table-bordered dt-responsive nowrap" id="table" style="width:100%;font-size: 12px;text-align: right;">
      <thead>
        <tr>

            <th>Cta</th>
            <th>H.Rec</th>
            <th>H.Of</th>
            <th>Ca.For</th>
            <th>Col.Abo</th>
            <th>Emba</th>
            <th>Inhi.</th>
            <th>Eje.Sen</th>
            <th>Mov.B</th>
            <th>Por.Rec</th>
            <th>Of250</th>
            <th>H.Inh</th>
            <th>H.Mar</th>
            <th>Total</th>

        </tr>
      </thead>

      <tbody>

        @foreach ($items as $item)
        
        <tr>
            <td>{{ $item->cuota }}</td>
            <td>{{ $item->ho_reca }}</td>
            <td>{{ $item->ho_ofi }}</td>
            <td>{{ $item->ca_fo }}</td>
            <td>{{ $item->co_abo }}</td>
            <td>{{ $item->emb }}</td>
            <td>{{ $item->inh }}</td>
            <td>{{ $item->eje_sen }}</td>
            <td>{{ $item->mo_b }}</td>
            <td>{{ $item->po_re }}</td>
            <td>{{ $item->ofi }}</td>
            <td>{{ $item->ho_in }}</td>
            <td>{{ $item->ho_mar }}</td>
            <td>{{ $item->total }}</td>
            <td>{!! Fun::getIconStatus($item->marca) !!}</td>
        </tr>

        @endforeach
                                
      </tbody>
    </table>

@section('page-js-script')

  @if (session('flash_message'))
    <script>toast('{!! session('flash_message') !!}');</script>
  @endif

@stop



