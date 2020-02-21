@extends('themes.main')

@section('body')

        @if(session()->has('success'))
            <br/>
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <br/>
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">

          <div class="col-lg-12">

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Kredit / Debit</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="{{ route('iuran.update', $data->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" value="{{ old('nama') ? old('nama') : $data->nama }}">
                    @if ($errors->has('nama')) <p style="color:red;">{{ $errors->first('nama') }}</p> @endif
                  </div>

                  <div class="form-group">
                    <label for="bulan">Pilih Bulan</label>
                    @php
                      $list = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    @endphp
                    <select id="pilih-bulan" name="bulan" class="form-control select2" style="width: 100%;">
                      <option value="">-- Pilih Bulan --</option>
                      @foreach($list as $key)
                        <option value="{{ $key }}" {{ (old('bulan') || $bulan[0] == $key) ? 'selected' : '' }}>{{ $key }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="kredit">Tahun</label>
                  <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun" value="{{ old('tahun') ? old('tahun') : $bulan[1] }}">
                  @if ($errors->has('tahun')) <p style="color:red;">{{ $errors->first('tahun') }}</p> @endif
                </div>

                <div class="form-group">
                  <label for="kredit">Jumlah Kredit</label>
                  <input type="text" class="form-control" id="kredit" name="kredit" placeholder="Masukan Kredit Tanpa Titik Ataupun Koma. Cth: 180000" value="{{ old('kredit') ? old('kredit') : $data->kredit }}">
                  @if ($errors->has('kredit')) <p style="color:red;">{{ $errors->first('kredit') }}</p> @endif
                </div>

                <div class="form-group">
                  <label for="debit">Jumlah Debit</label>
                  <input type="text" class="form-control" id="debit" name="debit" placeholder="Masukan Debit Tanpa Titik Ataupun Koma. Cth: 180000" value="{{ old('debit') ? old('debit') : $data->debit }}">
                  @if ($errors->has('debit')) <p style="color:red;">{{ $errors->first('debit') }}</p> @endif
                </div>

                <div class="form-group">
                  <label>Keterangan Tambahan</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukan Keterangan Tambahan">{{ old('keterangan') ? old('keterangan') : $data->keterangan }}</textarea>
                </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('iuran.index')}}" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>

          </div>

        </div>

@endsection

@push('scripts')

@endpush