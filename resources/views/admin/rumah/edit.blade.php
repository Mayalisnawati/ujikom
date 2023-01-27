@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('rumah.update', $rumahs->id) }}" method="post">
            @csrf
            @method('put')
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <select name="location_id" class="form-select @error('location_id') is-invalid @enderror">
                                @foreach ($locations as $location)
                                    <option value="" hidden>Pilih Alamat</option>
                                    <option value="{{ $location->id }}">{{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('location_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Rumah</label>
                            <input type="text" name="nama_rumah"
                                class="form-control mb-2  @error('nama_rumah') is-invalid @enderror"
                                placeholder="Nama Rumah" value="{{ $rumahs->nama_rumah }}">
                            @error('nama_rumah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Whatsapp</label>
                            <input type="number" name="wa"
                                class="form-control mb-2  @error('wa') is-invalid @enderror" placeholder="Whatsapp"
                                value="{{ $rumahs->wa }}">
                            @error('wa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat"
                                class="form-control mb-2  @error('alamat') is-invalid @enderror" placeholder="Alamat"
                                value="{{ $rumahs->alamat }}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Spesifikasi</label>
                            <input type="text" name="spesifikasi"
                                class="form-control mb-2  @error('spesifikasi') is-invalid @enderror"
                                placeholder="Spesifikasi" value="{{ $rumahs->spesifikasi }}">
                            @error('spesifikasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi</label>
                            <input type="text" name="konfirmasi"
                                class="form-control mb-2  @error('konfirmasi') is-invalid @enderror"
                                placeholder="Konfirmasi" value="{{ $rumahs->konfirmasi }}">
                            @error('konfirmasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex float-end">
                    <a href="/admin/rumah" class="btn btn-danger me-3"> Kembali</a>
                    <button type="submit" class="btn btn-primary mx-3">
                        <span class="indicator-label"> Kirim </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
