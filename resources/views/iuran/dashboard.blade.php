@extends('themes.main')

@section('body')
  <div class="row">
    <div class="col-lg-12">
      <div class="box">
        <div class="box-header with-border">
          <div class="col-lg-6">
            <h3 class="box-title" style="margin-left: 10px;">Akumulasi Kredit dan Debit</h3>
          </div>
          <div class="col-lg-6">
            <div class="input-group-btn">
                <a href="{{ route('export') }}"><button class="btn btn-default pull-right">Export</button></a>
            </div>
          </div>
        </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped table-hover" id="event-table">
          <tr>
            <th>No.</th>
            <th>Bulan</th>
            <th>Total Debit</th>
            <th>Total Kredit</th>
            <th>Total</th>
          </tr>
          @php $no = 1 @endphp
          @foreach($iuran as $data)
            <tr>
              <td>{{ $no++ }}</td>    
              <td>{{$data->bulan}}</td>
              <td>{{'Rp ' . number_format($data->jumlah_debit, 0, ',', '.')}}</td>
              <td>{{'Rp ' . number_format($data->jumlah_kredit, 0, ',', '.')}}</td>
              <td>{{'Rp ' . number_format(($data->jumlah_kredit) - ($data->jumlah_debit), 0, ',', '.')}}</td>
            </tr>
          @endforeach
          @foreach($semua_debit_kredit as $data1)
          <tr>
              <td colspan="2">Total</td>
              <td>{{ 'Rp ' . number_format($data1->semua_debit, 0, ',', '.') }}</td>
              <td>{{ 'Rp ' . number_format($data1->semua_kredit, 0, ',', '.')}}</td>
              <td>{{ 'Rp ' . number_format(($data1->semua_kredit) - ($data1->semua_debit), 0, ',', '.') }}</td>
            </tr>
        </table>
        @endforeach
      </div>
    </div>
    </div>
  </div>
@endsection