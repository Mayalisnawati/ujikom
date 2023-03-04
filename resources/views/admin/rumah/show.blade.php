{{-- @extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- @include('layouts._flash') --}}
{{-- <div class="card border-secondary">
                    <div class="card-header mb-3">Data Rumah </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="">Type</label>
                            <input type="text" name="name" class="form-control" readonly
                                value="{{ $rumahs->nama_rumah }}">
                            </input>
                        </div>
                        <div class="mb-3">
                            <label for="">Whatsapp</label>
                            <input type="text" name="wa" class="form-control" readonly value="{{ $rumahs->wa }}">
                            </input>
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" readonly
                                value="{{ $rumahs->alamat }}">
                            </input>
                        </div>
                        <div class="mb-3">
                            <label for="">Spesifikasi</label>
                            <input type="text" name="spesifikasi" class="form-control" readonly
                                value="{{ $rumahs->spesifikasi }}">
                            </input>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control" readonly
                                value="{{ $rumahs->status }}">
                            </input>
                        </div>
                        <div class="mb-3">
                            <label for="">Konfirmasi</label>
                            <input type="text" name="konfirmasi" class="form-control" readonly
                                value="{{ $rumahs->konfirmasi }}">
                            </input>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('rumah.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection --}}
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title">Data Rumah</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Nama Rumah</strong>
                                    </td>
                                    <td>{{ $rumahs->nama_rumah }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Harga</strong>
                                    </td>
                                    <td>{{ $rumahs->harga }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Nomor</strong>
                                    </td>
                                    <td>{{ $rumahs->wa }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Alamat</strong>
                                    </td>
                                    <td>{{ $rumahs->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Spesifikasi</strong>
                                    </td>
                                    <td>{{ $rumahs->spesifikasi }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Status</strong>
                                    </td>
                                    <td>{{ $rumahs->status }}</td>
                                </tr>
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                                <tr>
                                    <th><strong> Konfirmasi</strong></th>
                                    <th><strong><i> {{ $rumahs->konfirmasi }} </i>
                                        </strong></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title">Gambar Rumah</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        @foreach ($images as $img)
                            <div class="col-md-6 mb-4 col-lg-6">
                                <div class="card-group">
                                    <div class="card shadow">
                                        <img src="{{ asset($img->gambar_rumah) }}" class="card-img" alt="...">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ url('/admin/rumah') }}" class="btn btn-danger me-3"><svg xmlns="http://www.w3.org/2000/svg"
                width="20" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
            </svg> Kembali</a>
    </div>
@endsection
