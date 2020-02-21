@extends('themes.main')

@section('body')
    <!-- Start content -->
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <section class="content-header">
      <h1>
        Data Pemasukan dan Pengeluaran
      </h1>
    </section>

    <div class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <form id="attendee-form" action="{{ route('iuran.index') }}" method="GET">
            <div class="col-md-4">
              <div class="form-group">
                  @php
                      $list = array(
                      "bulan" => "Bulan",
                      );
                  @endphp
                  <select id="kategori" class="form-control" name="kategori">
                      @foreach($list as $key => $row)
                          <option value="{{ $key }}" <?php echo  !empty(request()->get('kategori') == $key) ? 'selected' : ''; ?> >{{ $row }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class=col-md-3>
              <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control pull-right" placeholder="Search">
            </div>
            <div class="col-md-1">
              <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>

            <div class="col-md-2">
              <div class="input-group-btn">
                  <a href="{{ route('iuran.create') }}"><button class="btn btn-default pull-right">Tambah Baru</button></a>
              </div>
            </div>

            {{--<div class="col-md-2">
              <div class="input-group-btn">
                  <a href=""><button class="btn btn-default pull-right">Export</button></a>
              </div>
            </div>--}}
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            {{--@foreach($table as $table)--}}
            <table class="table table-hover" id="product-table">
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Nama</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Action</th>
              </tr>
              @php $no = 1 @endphp
              @foreach($iuran as $data)
                <tr>    
                  <td>{{ $no++ }}</td>
                  <td>{{$data->bulan}}</td>
                  <td>{{$data->nama}}</td>
                  <td>{{$data->debit_label_string}}</td>
                  <td>{{$data->kredit_label_string}}</td>
                  <td><a href="{{ route('iuran.edit', $data->id) }}"><button type="button" class="btn bg-orange btn-flat margin">Edit</button></a></td>              
                </tr>
              @endforeach
               {{--@foreach($iuran1 as $data1)
                    <tr>
                      <td colspan="3">Total</td>
                      <td>{{ 'Rp ' . number_format($data1->jumlah_debit), 0, ',', '.' }}</td>
                      <td>{{ 'Rp ' . number_format($data1->jumlah_kredit), 0, ',', '.' }}</td>
                    </tr>
                    @endforeach--}}
            </table>
            {{--@endforeach--}}
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    </div>

@endsection

@push('scripts')

<script>
$(function() {


});
  
    </script>
@endpush