@extends('adminlte::page')

@section('title', 'Create Employee')

@section('content_header')
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h3>Create Employee</h3>
        <a class="btn btn-success btn-sm" href="{{ route('employees.index') }}">List Employees</a>
    </div>

@stop

@section('content')



    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>First Name*</label>
            <input type="text" name="first_name" class="form-control" placeholder="" value="{{old('first_name')}}">
            @if($errors->has('first_name'))
                <div class="error text-danger">{{ $errors->first('first_name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Last Name*</label>
            <input type="text" name="last_name" class="form-control" placeholder="" value="{{old('last_name')}}">
            @if($errors->has('last_name'))
                <div class="error text-danger">{{ $errors->first('last_name') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="" value="{{old('email')}}">
            @if($errors->has('email'))
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="" value="{{old('phone')}}">
            @if($errors->has('phone'))
                <div class="error text-danger">{{ $errors->first('phone') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label>Company</label>
            <select name="company_id" class="form-control">
                <option value="">-- Select Company --</option>
                @foreach($companies as $id => $company)
                    <option @if($id == old('company_id')) selected @endif value="{{$id}}">{{$company}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@stop
