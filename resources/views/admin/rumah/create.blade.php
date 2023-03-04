@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('rumah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="card mb-4 shadow-lg rounded card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Tambah Rumah</h4>
                    </div>
                    <div class="card-body">
                        {{-- <div class="form-group mb-3">
                            <label class="form-label">Pilih WIlayah</label>
                            <select name="location_id" id="kategori"
                                class="form-control @error('location_id') is-invalid @enderror">
                                @foreach ($locations as $location)
                                    <option value="" hidden>Pilih Kategori</option>
                                    <option value="{{ $location->id }}">{{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('location_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Type Rumah</label>
                            <input type="text" name="nama_rumah"
                                class="form-control mb-2  @error('nama_rumah') is-invalid @enderror"
                                placeholder="Nama Rumah" value="">
                            @error('nama_rumah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga"
                                class="form-control mb-2  @error('harga') is-invalid @enderror" placeholder="Harga Rumah"
                                value="">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Kabupaten</label>
                            <select name="id_kota" id="kota"
                                class="form-control @error('id_kota') is-invalid @enderror">
                                @foreach ($kota as $data)
                                    <option hidden>Pilih Kabupaten / Kota</option>
                                    <option value="{{ $data->id }}">{{ $data->nama_kabupaten }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan"
                                    class="form-control @error('kecamatan_id') is-invalid @enderror">
                                    <option value="" hidden>Pilih Kota Terlebih dulu</option>
                                </select>
                                @error('kecamatan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Kelurahan</label>
                                <select name="kelurahan_id" id="kelurahan"
                                    class="form-control @error('kelurahan_id') is-invalid @enderror">
                                    <option value="" hidden>Pilih Kecamatan Terlebih dulu</option>
                                </select>
                                @error('kelurahan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Alamat Rumah</label>
                            <textarea name="alamat" cols="20" rows="3" class="form-control  @error('alamat') is-invalid @enderror"
                                placeholder="alamat" value="{{ old('alamat') }}"></textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telephone</label>
                            <input type="number" name="wa"
                                class="form-control mb-2  @error('wa') is-invalid @enderror" placeholder="WhatsApp"
                                value="">
                            @error('wa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Spesifikasi</label>
                            <textarea name="spesifikasi" cols="20" rows="3"
                                class="form-control  @error('spesifikasi') is-invalid @enderror" placeholder="spesifikasi"
                                value="{{ old('spesifikasi') }}"></textarea>
                            @error('spesifikasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" name="status"
                                class="form-control mb-2  @error('status') is-invalid @enderror" placeholder="Status"
                                value="">
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label class="form-label">Konfirmasi</label>
                            <input type="text" name="konfirmasi"
                                class="form-control mb-2  @error('konfirmasi') is-invalid @enderror"
                                placeholder="Konfirmasi" value="">
                            @error('konfirmasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">gambar produk</label>
                            <br>
                            {{-- <div class="custom-file"> --}}
                            <input type="file" @error('gambar_rumah') is-invalid @enderror" name="gambar_rumah[]"
                                value="{{ old('gambar_rumah') }}" multiple>
                            <label>Choose file</label>
                            @error('gambar_rumah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex float-end">
                    <a href="/admin/rumah" class="btn btn-danger me-3"> Kembali</a>
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
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kota').on('change', function() {
                var kota_id = $(this).val();
                if (kota_id) {
                    $.ajax({
                        url: '/admin/getKecamatan/' + kota_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#kecamatan').empty();
                                $('#kecamatan').append(
                                    '<option hidden>Pilih Kecamatan</option>');
                                $.each(data, function(key, kecamatans) {
                                    $('select[name="kecamatan_id"]').append(
                                        '<option value="' + kecamatans.id + '">' +
                                        kecamatans.nama_kecamatan + '</option>');
                                });
                            } else {
                                $('#kecamatan').empty();
                            }
                        }
                    });
                } else {
                    $('#kecamatan').empty();
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kecamatan').on('change', function() {
                var kecamatan_id = $(this).val();
                if (kecamatan_id) {
                    $.ajax({
                        url: '/admin/getKelurahan/' + kecamatan_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#kelurahan').empty();
                                $('#kelurahan').append(
                                    '<option hidden>Pilih Kelurahan</option>');
                                $.each(data, function(key, kelurahans) {
                                    $('select[name="kelurahan_id"]').append(
                                        '<option value="' + kelurahans.id + '">' +
                                        kelurahans.nama_kelurahan + '</option>');
                                });
                            } else {
                                $('#kelurahan').empty();
                            }
                        }
                    });
                } else {
                    $('#kelurahan').empty();
                }
            });
        });
    </script>
@endsection
