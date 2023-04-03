@extends('layouts.app')


@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('tanggapan') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('tanggapan.create')}}" class="btn btn-info">+ Tambah tanggapan</a>
                    <br/><br/>
                    <div class="table-responsive">
                    <table id="table_user" class ="table table-striped tabel-hover table-condensed">
                        <thead>
                            <tr style="background-color:grey ">
                                <th scope="col">#</th>
                                <th scope="col">Pengaduan</th>
                                <th scope="col">Tanggal Pengaduan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $pengaduan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                                <td>{{ $pengaduan->created_at }}</td>
                                <td>{{ $pengaduan->status }}</td>
                                <td>
                                    @foreach ($pengaduan->tanggapan as $tanggapan)
                                        {{ $tanggapan->tanggapan }}
                                    @endforeach
                            <a href="{{route('tanggapan.edit', $tanggapan->id )}}" class="btn btn-sm btn-primary mx-1 shadow" title="edit">Edit</a>
                            <a href="{{route('tanggapan.delete', $tanggapan->id )}}" class="btn btn-sm btn-danger mx-1 shadow" title="delete">Delete</a>
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
