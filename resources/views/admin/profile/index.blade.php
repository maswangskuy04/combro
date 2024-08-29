@extends('layouts2.app')
@section('content')
    <div class="card">
        <div class="card-header">profiles</div>
        <div class="card-body">
            <a href="{{ route('profiles.create') }}" class="btn btn-primary btn-sm mb-2">ADD</a>
            <a href="{{ route('profiles.recycle') }}" class="btn btn-secondary btn-sm mb-2">Recycle</a>
            <div class="table table-reponsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th class="col-2">Action</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telpon</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><input type="radio" name="status" class="status-radio"
                                        data-id="{{ $item->id }}" {{ $item->status == 1 ? 'checked' : '' }}></td>
                                <td>
                                    <a href="{{ route('profiles.edit', $item->id) }}"
                                        class="btn btn-sm btn-outline-warning">Update</a>
                                    <form action="{{ route('profiles.softdelete', $item->id) }}"
                                        onsubmit="return confirm('Akan di delete sementara ?');" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Soft Delete</button>
                                    </form>
                                    <a href="{{ route('profiles.generate-pdf', $item->id) }}" class="btn btn-sm btn-outline-secondary">Print</a>
                                </td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_tlp }}</td>
                                <td><img src="{{ asset('storage/image/' . $item->picture) }}" width="50%" alt=""></td>
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
@section('script-sweetalert')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const statusRadios = document.querySelectorAll('.status-radio');
            statusRadios.forEach(radio => {
                radio.addEventListener('click', (event) => {
                    const itemId = event.target.getAttribute('data-id');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content');

                    fetch(`/admin/profile/update-status/${itemId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Berhasil',
                                    'Status berhasil diperbarui.',
                                    'success'
                                );
                                statusRadios.forEach(r => {
                                    if (r.getAttribute('data-id') != itemId) {
                                        r.checked = false;
                                    }
                                });
                            } else {
                                Swal.fire(
                                    'Gagal',
                                    data.error ||
                                    'Terjadi kesalahan saat memperbarui status',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Gagal',
                                'Terjadi kesalahan saat memperbarui status.',
                                'error'
                            );
                        });
                });
            });
        });
    </script>
@endsection
