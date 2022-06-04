@extends('layouts.admin-lte')

@section('content-admin')
<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Pengguna {{ empty($toastmsg) }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pengguna</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        
            <div class="row">
            
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pengguna #{{$pengguna['id']}}</h3>
                        </div>

                        <div class="card-body">
                            <!-- {{ $pengguna }} -->
                            <!-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif -->
                            
                            <form method="POST" >
                                @csrf
                                <div id="example2_wrapper" class="dataTables_wrapper">
                                    <div class="row">
                                    
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username"  value="{{$pengguna['name']}}">
                                                @error('username')<div class="invalid-feedback" role="alert">{{ $error }}</div>@enderror
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{$pengguna['email']}}" readonly>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="created_at">Tanggal Pembuatan</label>
                                                <input type="text" class="form-control" id="created_at" name="created_at"  value="{{$pengguna['created_at']}}" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="role">Tipe Pengguna</label>
                                                <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role"  value="{{$pengguna['role']}}">
                                                @error('role')<div class="invalid-feedback" role="alert">{{ $error }}</div>@enderror
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"><button type="submit" class="btn btn-primary">Simpan</button></div>
                                    </div>
                                    
                                    
                                    <!-- table footer --> 
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                        
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
