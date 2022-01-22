@extends('layouts.App')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Input Data Anggota Perpustakaan</h4>
          </div>
          <div class="card-body">

            {!! Form::model($objek, ['action' => $action, 'method' => $method, 'files' => true]) !!}

                    <div class="row">
                        <div class="col-lg-6">
                                <label for="judul" class="form-control-label">Judul Buku</label>
                                {!! Form::text('judul',null,array('class'=>'form-control')) !!}
                                <span class="text-danger">{{ $errors->first('judul') }}</span>

                        </div>
                        <div class="col-lg-6">
                                <label for="pengarang" class="form-control-label">Nama Pengarang</label>
                                {!! Form::text('pengarang',null,array('class'=>'form-control')) !!}
                                <span class="text-danger">{{ $errors->first('pengarang') }}</span>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                                <label for="penerbit_id" class="form-control-label">Penerbit Buku</label>
                                {{ Form::select('penerbit_id', \App\Penerbit::pluck('namapen','id') , null,['class' =>'form-control']) }}
                                <span class="text-danger">{{ $errors->first('penerbit_id') }}</span>

                        </div>
                        <div class="col-lg-4">
                                <label for="tahun_terbit" class="form-control-label">Tahun Terbit</label>
                                {!! Form::text('tahun_terbit',null,array('class'=>'form-control')) !!}
                                <span class="text-danger">{{ $errors->first('tahun_terbit') }}</span>

                        </div>
                        <div class="col-lg-4">
                                <label for="kategori_id" class="form-control-label">Kategori Buku</label>
                                {{ Form::select('kategori_id', \App\Kategori::pluck('namakat','id') , null,['class' =>'form-control']) }}
                                <span class="text-danger">{{ $errors->first('kategori_id') }}</span>

                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-6">
                                <label for="foto" class="form-control-label">Foto Diri</label>
                                {{ Form::file('foto',['class' =>'form-control']) }}
                                <span class="text-danger">{{ $errors->first('foto') }}</span>

                        </div>
                        <div class="col-lg-6">
                                <label for="jml_buku" class="form-control-label">Jumlah Buku</label>
                                {!! Form::number('jml_buku', null, array('class' => 'form-control')) !!}

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
