@extends('layout.layout')
@section('title')
   Create Petugas
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('petugas') }}">Petugas</a>
@endsection

@section('content')
    <form action="{{ url('petugas') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-3"><label>Nama petugas <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas">
                @error('nama_petugas')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Username <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="username" class="form-control" placeholder="Username">
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Password <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="password" class="form-control" placeholder="Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Confirm Password <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="password_confirmation" class="form-control" placeholder="Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
        <div class="col-sm-3"><label>Level / Role <span class="text-danger">*</span></label></div>
        <div class="col-md-5">
            <select name="level" class="form-control pb-4">
                <option></option>
                <option class="" value="admin">Admin</option>
                <option class="" value="petugas">Petugas</option>
            </select>
            @error('level')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
        <div class="row pb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('petugas') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection