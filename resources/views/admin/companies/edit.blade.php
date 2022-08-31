@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h3>Edit Company</h3>
        <a class="btn btn-success btn-sm" href="{{ route('companies.index') }}">List Companies</a>
    </div>

@stop

@section('content')


    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="patch"/>
        @csrf
        <div class="form-group">
            <label>Name*</label>
            <input type="text" name="name" class="form-control" placeholder="" value="{{old('name', $company->name)}}">
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="" value="{{old('email', $company->email)}}">
            @if($errors->has('email'))
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label>Website</label>
            <input type="text" name="website" class="form-control" placeholder="" value="{{old('website', $company->website)}}">
            @if($errors->has('website'))
                <div class="error text-danger">{{ $errors->first('website') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label>Logo</label>
            @if($company->logo_url)
                <div>
                    <img src="{{$company->logo_url}}" style="max-height: 100px;margin-bottom: 10px" />
                </div>
            @endif

            <input type="file" name="logo" class="form-control">
            @if($errors->has('logo'))
                <div class="error text-danger">{{ $errors->first('logo') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
