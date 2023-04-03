@extends('layouts.app')


@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card border-dark mb-1" style="max-width: 85rem;">
<div class="card-header">Tambah pengaduan</div>
<div class="card-body">
<form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">

                    @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">tanggal pengaduan</label>
                            <input type="date" class="form-control" id="tgl_pengaduan" name="tgl_pengaduan">
                         </div>
                        <div class="form-group">
                            <label class="font-weight-bold">isi laporan</label>
                            <input type="text" class="form-control " id="isi_laporan" name="isi_laporan">
                            <div class="form-group">
                                <label for="status" class="col-md-4 col-form-labeltext-md-end">{{ __('Status') }}</label>
                                   <div class="col-md-6">
                                       <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required >
                                         <option value=""> Pilih Status</option>
                                         <option value="proses"> Proses </option>
                                       </select>
                                       @error('status')
                                           <span class="invalid-feedback"role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>
                                 </div>
                               
                       
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    </form>


</div>
</div>
</div>
</div>
</div>  
</div>
 @endsection
