@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts._flash')
            <div class="card border-secondary">
                <div class="card-header mb-3">Data Rumah </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label for="">Type</label>
                        <input type="text" name="name" class="form-control" readonly value="{{ $rumah->name }}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="">Whatsapp</label>
                        <input type="text" name="wa" class="form-control" readonly value="{{ $rumah->wa}}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" readonly value="{{ $rumah->alamat}}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="">Spesifikasi</label>
                        <input type="text" name="spesifikasi" class="form-control" readonly value="{{ $rumah->spesifikasi}}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="text" name="status" class="form-control" readonly value="{{ $rumah->status}}">
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="">Konfirmasi</label>
                        <input type="text" name="konfirmasi" class="form-control" readonly value="{{ $rumah->konfirmasi}}">
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
@endsection
