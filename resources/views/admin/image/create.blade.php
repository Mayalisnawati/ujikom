@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Gambar</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label">Name Rumah</label>
                            <select name="rumah_id" id="rumah"
                                class="form-control @error('rumah_id') is-invalid @enderror">
                                @foreach ($rumahs as $rumah)
                                    <option value="" hidden>Pilih rumah</option>
                                    <option value="{{ $rumah->id }}">{{ $rumah->nama_rumah }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rumah_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">gambar Rumah</label>
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
                    </div>
                </div>
                <div class="d-flex float-end">
                    <a href="/admin/image" class="btn btn-danger me-3"> Kembali</a>
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
