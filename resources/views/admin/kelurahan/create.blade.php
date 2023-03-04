@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('kelurahan.store') }}" method="POST">
            @csrf
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nama Kecamatan</label>
                                <select name="kecamatan_id" id="provinsi"
                                    class="form-control @error('kecamatan_id') is-invalid @enderror">
                                @foreach ($kecamatan as $data)
                                    <option value="" hidden>Pilih kecamatan</option>
                                    <option value="{{ $data->id }}">{{ $data->nama_kecamatan}}</option>
                                @endforeach
                                </select>
                                @error('kecamatan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelurahan</label>
                            <input type="text" name="nama_kelurahan"
                                class="form-control mb-2  @error('nama_kelurahan') is-invalid @enderror" placeholder="Nama kelurahan"
                                value="{{ old('nama_kelurahan') }}">
                            @error('nama_kelurahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex float-end">
                    <a href="/admin/kelurahan" class="btn btn-danger me-3"> Kembali</a>
                    <button type="reset" class="btn btn-secondary mx-3">
                        <span class="indicator-label"> Reset </span>
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label"> Kirim </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
