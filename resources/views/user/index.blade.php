@extends('layouts.app')


@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('user') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('user.create')}}" class="btn btn-info">+ Tambah user</a>
                    <br/><br/>
                    <div class="table-responsive">
                    <table id="table_user" class ="table table-striped tabel-hover table-condensed">
                        <thead>
                            <tr style="background-color:grey ">
                                <th>no</th>
                                <th>username</th>
                                <th>name</th>
                                <th>email</th>  
                                <th>telepon</th>
                                <th>level</th>
                                <th class="text-center" width="70">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $user)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telepon}}</td>
                            <td>
                                @if($user->level == 'admin')
                                admin
                                @elseif($user->level == 'petugas')
                                petugas
                                @else
                                masyarakat
                                @endif
                            </td>
                            <td>
                            <a href="{{route('user.edit', $user->id )}}" class="btn btn-sm btn-primary mx-1 shadow" title="edit">Edit</a>
                            <a href="{{route('user.delete', $user->id )}}" class="btn btn-sm btn-danger mx-1 shadow" title="delete">Delete</a>
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
