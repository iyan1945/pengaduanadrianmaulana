@extends('layouts.app')


@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Pengaduan') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('pengaduan.create')}}" class="btn btn-info">+ Buat Pengaduan</a>
                    <br/><br/>
                    <div class="table-responsive">
                    <table id="table_user" class ="table table-striped tabel-hover table-condensed">
                        <thead>
                            <tr style="background-color:grey ">
                                <th>No</th>
                                <th>Tanggal pengaduan</th>
                                <th>Isi laporan</th>  
                                <th>Status</th>
                                <th class="text-center" width="70">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->tgl_pengaduan}}</td>
                                <td>{{$p->isi_laporan}}</td>
                                <td>
                                    @if($p->status == 'proses')
                                    proses
                                    @elseif($p->status == 'selesai')
                                    selesai
                                    @else
                                    
                                    @endif
                                </td>
                                <td>
                                <a href="{{route('pengaduan.edit', $p->id )}}" class="btn btn-sm btn-primary mx-1 shadow" title="edit">Edit</a>
                                <a href="{{route('pengaduan.delete', $p->id )}}" class="btn btn-sm btn-danger mx-1 shadow" title="delete">Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@stop
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('js')
    <script> $('#table_user').DataTable();</script>
@stop
