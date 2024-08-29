@extends('layouts2.app')
@section('content')
    <div class="card mb-3">
        <div class="card-body p-5">
            <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Posisi</label>
                    <input type="text" name="posisi" id="posisi" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Job</label>
                    <input type="text" name="job" id="job" class="form-control">
                    <input type="hidden" name="id_profile" id="job" class="form-control" value="{{ $profile->id }}">
                </div>

                <div class="mb-3">
                    <label for="">Periode</label>
                    <input type="number" name="periode" id="periode" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-outline-success">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
