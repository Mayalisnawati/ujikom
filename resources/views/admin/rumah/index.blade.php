@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic Table</h4>
            <a href="{{ Route('rumah.create') }}" class="btn mb-3 btn-primary float-end" data-bs-toggle="tooltip"
                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="Tambah Data">Tambah Data</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Whatsapp</th>
                            <th>Alamat</th>
                            <th>Spesifikasi</th>
                            <th>Status</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($rumahs))
                            @foreach ($rumahs as $rumah)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $rumah->nama_rumah }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            {{ $rumah->wa}}
                                        </div>
                                    </td>
                                     <td>
                                        <div class="d-flex">
                                            {{ $rumah->alamat }}
                                        </div>
                                    </td>
                                     <td>
                                        <div class="d-flex">
                                            {{ $rumah->spesifikasi }}
                                        </div>
                                    </td>
                                     <td>
                                        <div class="d-flex">
                                            {{ $rumah->status }}
                                        </div>
                                    </td>
                                     <td>
                                        <div class="d-flex">
                                            {{ $rumah->konfirmasi }}
                                        </div>
                                    </td>

                                    <td>
                                        <form action="{{ route('rumah.destroy', $rumah->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('rumah.edit', $rumah->id) }}"
                                                class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                                                data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                                title="<span>Edit Data</span>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                            </a> |
                                            <button type="submit" class="btn btn-sm btn-danger"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg>
                                            </button>
                                            {{-- <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog"
                                                aria-labelledby="defaultModalLabel {{ $location->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title " id="defaultModalLabel">
                                                                Apakah Anda Yakin</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn mb-2 btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn mb-2 btn-primary">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </form>
                                    </td>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
