@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('masyarakat.store') }}">
                @csrf
                <h3>Register Masyarakat</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="telepon" class="form-control" id="telepon" placeholder="telpon">
                    <label for="telepon">Telepon</label>
                </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                   
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>  
</div>
@endsection