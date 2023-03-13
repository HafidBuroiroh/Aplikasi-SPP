@extends('layout.layout')
@section('title')
    Edit Petugas
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('petugas', $petugas->id) }}">Petugas</a>
@endsection

@section('content')
    <form action="{{ url('petugas', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-3"><label>Nama petugas <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}" class="form-control" placeholder="Nama Petugas">
                @error('nama_petugas')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Username <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="username" value="{{ $petugas->username }}" class="form-control" placeholder="Username">
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Current Password <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="current_password" class="form-control" placeholder="Current Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>New Password <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="password" class="form-control" placeholder="New Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
        <div class="col-sm-3"><label>Level / Role <span class="text-danger">*</span></label></div>
        <div class="col-md-5">
            <select name="level" class="form-control pb-4">
                <option>{{ $petugas->level }}</option>
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