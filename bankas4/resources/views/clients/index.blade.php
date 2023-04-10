@extends('layouts.app')

@section('content')
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    <a href="{{route('clients-sort', 'A')}}" style="text-decoration: none;">
                    Account number <span style="color: red;">{{session('sortA')}}</span></a></th>
                <th scope="col">PID</th>
                <th scope="col">Name</th>
                <th scope="col">
                    <a href="{{route('clients-sort', 'D')}}" style="text-decoration: none;">
                    Surname <span style="color: red;">{{session('sortD')}}</span></a></th>
                <th scope="col">
                    <a href="{{route('clients-sort', 'E')}}" style="text-decoration: none;">
                    Values <span style="color: red;">{{session('sortE')}}</span></a></th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $v)
            <tr>
                <th scope="row">{{$v->accNr}}</th>
                <td>{{$v->pid}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->surname}}</td>
                <td><b>{{$v->value}}</b></td>
                <td>
                    <a href="{{route('clients-edit', ['Add', $v])}}" class="btn btn-outline-success">Add funds</a>
                </td>
                <td>
                    <a href="{{route('clients-edit', ['Rem', $v])}}" class="btn btn-outline-primary">Deduct funds</a>
                </td>
                <td>
                    <form action="{{route('clients-delete', $v)}}" method="post">
                    <button type="submit" class="btn btn-outline-danger">Remove account</button>
                    @csrf
                    @method('delete')
                    </form>
                </td>
            </tr>
            @empty
                <th>No clients</th>
            @endforelse
        </tbody>
    </table>
    @endsection