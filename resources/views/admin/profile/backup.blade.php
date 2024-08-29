@extends('layouts2.app')
@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="table table-reponsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="col-2">Actions</th>
                            <th>Status</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telpon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('profiles.recovery', $item->id) }}"
                                        class="btn btn-sm btn-outline-warning mr-3" onsubmit="return confirm('Data akan muncul lagi broo, yakinnn ?')">Recovery</a>
                                    {{-- <a href="{{ route('profiles.softdelete', $item->id) }}"
                                        onsubmit="return confirm('AKAN DI HAPUS SEMENTARA')"
                                        class="btn btn-sm btn-outline-danger">Delete</a> --}}
                                </td>
                                <td><img src="{{ asset('storage/image/' . $item->picture) }}" alt=""></td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_tlp }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
