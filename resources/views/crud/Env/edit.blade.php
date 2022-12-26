@extends('layout.crud')

@section('title', 'Edit Env Mail')

@section('heading', 'Edit Env Mail')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Edit Env Mail</div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('env.update') }}">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mail Host:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control @error('host') is-invalid @enderror" id="host" placeholder="Enter Mail Host" value="{{ old('host', env('MAIL_HOST')) }}" name="host">
                    @error('host')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mail Port:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control @error('port') is-invalid @enderror" id="port" placeholder="Enter Mail Port" value="{{ old('port', env('MAIL_PORT')) }}" name="port">
                    @error('port')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mail Username:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter Mail Username" value="{{ old('username', env('MAIL_USERNAME')) }}" name="username">
                    @error('username')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mail Password:</label>
                <div class="col-sm-10">          
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Mail Password" value="{{ old('password', env('MAIL_PASSWORD')) }}" name="password">
                    @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mail Pncryption:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control @error('encryption') is-invalid @enderror" id="encryption" placeholder="Enter Mail Encryption" value="{{ old('encryption', env('MAIL_ENCRYPTION')) }}" name="encryption">
                    @error('encryption')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Env</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection