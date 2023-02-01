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
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title">Gambar Produk</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="rumah_id" value="{{ $rumahs->id }}">
                        <div class="mb-3">
                            <label class="form-label">gambar rumah</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('gambar_rumah') is-invalid @enderror"
                                    name="gambar_rumah[]" value="{{ old('gambar_rumah') }}" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('gambar_rumah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="mb-3 btn btn-primary">
                            Kirim
                        </button>
                    </form>
                    <div class="row mb-3">
                        @foreach ($images as $img)
                            <div class="col-md-6 mb-3 col-lg-6">
                                <div class="card-group">
                                    <div class="card shadow">
                                        <img src="{{ asset($img->gambar_rumah) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <form action="{{ Route('image.destroy', $img->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
