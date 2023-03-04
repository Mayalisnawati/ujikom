@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('kota.update', $kotas->id) }}" method="post">
            @csrf
            @method('put')
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kabupaten</label>
                            <input type="text" name="nama_kabupaten"
                                class="form-control mb-2  @error('nama_kabupaten') is-invalid @enderror" placeholder="Nama Kabupaten"
                                value="{{ $kotas->nama_kabupaten }}">
                            @error('nama_kabupaten')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex float-end">
                    <a href="/admin/kota" class="btn btn-danger me-3"> Kembali</a>
                    <button type="submit" class="btn btn-primary mx-3">
                        <span class="indicator-label"> Kirim </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
