@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="John Doe"  value="{{ old('full_name') }}">
                                        @error('full_name')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone_number">Nomer HP</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="08xxxxxxxxx" value="{{ old('phone_number') }}">
                                        @error('phone_number')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <select class="form-control" id="kecamatan" name="kecamatan">
                                                <option value="Bojong Gede">Bojong Gede</option>
                                                <!-- <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option> -->
                                            </select>
                                             <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                             <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                                             <select class="form-control" id="kelurahan" name="kelurahan">
                                                <option value="Pabuaran">Pabuaran</option>
                                                <!-- <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="postalcode">Kode Pos</label>
                                             <input type="text" class="form-control" id="postalcode" name="postalcode" aria-describedby="emailHelp" value="16921" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="rw">RW</label>
                                             <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="16921"> -->
                                             <select class="form-control" id="rw" name="rw">
                                                <option value="13">13</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="rt">RT</label>
                                             <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="16921"> -->
                                             <select class="form-control" id="rt" name="rt">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <!-- <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="full_address">Alamat Lengkap</label>
                                             <textarea row="3" class="form-control @error('full_address') is-invalid @enderror" id="full_address" name="full_address" placeholder="Jl. Cipete No. 4" >{{ old('full_address') }}</textarea>
                                             @error('full_address')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                </div>

                        <div class="form-row mb-5">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <!-- <div class="input-group"> -->
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" >
                                        @error('email')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                    <!-- </div> -->
                                    
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="johndoe" value="{{ old('username') }}">
                                        @error('username')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                        
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  placeholder="******" >
                                        @error('password')<div class="invalid-feedback" role="alert">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="emailHelp" placeholder="******" >
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->

                        <div class="row mb-0">
                            <div class="col-sm-12 ">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
