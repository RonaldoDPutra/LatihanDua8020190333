@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ url('admin/buku/tambah') }}" class="btn btn-primary btn-round">Tambah Data </a>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">DATA BUKU</h4>
            <p class="card-category">Berisikan Seluruh Data Buku</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>judul</th>
                        <th>Pengarang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($objek as $row)
                    <tr>
                        <td>{{ $loop ->iteration }}</td>
                        <td>{{ $row ->judul }}</td>
                        <td>{{ $row ->pengarang }}</td>
                        <td>
                          {{-- <a href="{{ url('admin/buku/detail/'.$row->id, []) }}" class="btn btn-primary btn-sm">Detail</a> --}}
                          <a href="{{ url('admin/buku/edit/'.$row->id, []) }}" class="btn btn-primary btn-sm">Edit</a>
                          <a href="{{ url('admin/buku/hapus/'.$row->id, []) }}" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin?')">Hapus</a>
                          @csrf
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
