@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h3>Companies</h3>
        <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">Create New</a>
    </div>
@stop

@section('content')

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($companies as $company)
            <tr>
                <td>
                    @if($company->logo_url)
                        <div>
                            <img src="{{$company->logo_url}}" style="max-height: 50px;" />
                        </div>
                    @endif
                </td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>
                    <a href="{{ route('employees.index', ['company_id' => $company->id]) }}" class="btn btn-info btn-sm">Employees</a>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="delete"/>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        {{ $companies->appends(request()->input())->links() }}
    </div>

@stop
