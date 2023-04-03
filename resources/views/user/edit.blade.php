@extends('layouts.app')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="container mt-4">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                    @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                         </div>


                        <div class="form-group">
                            <label class="font-weight-bold">Username</label>
                            <input type="text" class="form-control " id="username" name="username" value="{{$user->username}}">
                       
                                 
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">email</label>
                            <input type="email" class="form-control " id="email" name="email" value="{{$user->email}}">
                       
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">telepon</label>
                            <input type="textarea" class="form-control " id="telepon" name="telepon" value="{{$user->telepon}}">
                       
                           
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">password</label>
                            <input type="textarea" class="form-control " id="password" name="password" value="{{$user->password}}">
                       
                           
                        </div>
                        <div class="form-group">
                        <label for="level" class="col-md-4 col-form-labeltext-md-end">{{ __('Level') }}</label>
                           <div class="col-md-6">
                               <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required >
                                 <option value=""> Pilih Level User</option>
                                 <option value="admin"> Admin </option>
                                 <option value="petugas"> Petugas </option>
                               </select>
                               @error('level')
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
@endsection
