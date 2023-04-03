@extends('layouts.app')


@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Masyarakat') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
       <a href="{{route('masyarakat.create')}}" class="btn btn-md btn-success mx-1 shadow"><i class="fa fa-lg fa-fw fa-plus"></i> Tambah User</a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_user" class="table table-striped table-hover table-condensed table-bordered">
               <thead style="background-color: darkgray">
                   <tr>
                       <th>Username</th>
                       <th>Nama</th>
                       <th>telepon</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($masyarakat as $masyarakat)
               <tr>
                       <td>{{$masyarakat->username}}</td>
                       <td>{{$masyarakat->nama}}</td>
                       <td>{{$masyarakat->telepon}}</td>
                           <td>
                           <a href="{{route('masyarakat.edit', $masyarakat)}}" class="btn btn-md btn-primary" title="edit"><i>edit</i></a>
                           <form action="{{ route('masyarakat.delete', $masyarakat) }}" 
                            method="post" class="d-inline">
                             @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-md btn-danger"><i>hapus</i></button>
                         </form>
                    
                           </td>
                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
@stop