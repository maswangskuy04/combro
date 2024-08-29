@extends('layouts2.app')
@section('content')
    <div class="card mb-3">
        <div class="card-body p-5">
            <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Photo</label>
                    <input type="file" name="picture" id="picture" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Nama</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">No Telp</label>
                    <input type="number" name="no_tlp" id="no_tlp" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Facebook</label>
                    <input type="url" name="facebook" class="form-control" placeholder="https://example.com">
                </div>
                <div class="mb-3">
                    <label for="">Twitter</label>
                    <input type="url" name="twitter" class="form-control" placeholder="https://example.com">
                </div>
                {{-- <div class="mb-3">
                    <label for="">Instagram</label>
                    <input type="url" name="instagram" class="form-control" placeholder="https://example.com">
                </div>
                <div class="mb-3">
                    <label for="">LinkedIn</label>
                    <input type="url" name="linkedin" class="form-control" placeholder="https://example.com">
                </div> --}}
                <div class="mb-3">
                    <label for="">Descriptions</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-outline-success">Create</button>
                    {{-- <a href="{{ url('admin/profile') }}" class="btn btn-sm btn-outline-danger">Back</a> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
