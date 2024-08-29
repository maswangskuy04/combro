@extends('layouts2.app')

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ route('experiences.create') }}" class="btn btn-primary btn-sm mb-2">ADD</a>
            <a href="" class="btn btn-secondary btn-sm mb-2">BACKUP</a>
            <div class="table table-reponsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Perusahaan</th>
                            <th>Posisi</th>
                            <th>Job</th>
                            <th>Periode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experiences as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td></td>
                                <td>{{ $item->nama_perusahaan }}</td>
                                <td>{{ $item->posisi }}</td>
                                <td>{{ $item->job }}</td>
                                <td>{{ $item->periode }}</td>
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
