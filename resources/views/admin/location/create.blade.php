@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('location.store') }}" method="POST">
            @csrf
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Daerah</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Daerah</label>
                            <input type="text" name="name"
                                class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Nama Daerah"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex float-end">
                    <a href="/admin/location" class="btn btn-danger me-3"> Kembali</a>
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
