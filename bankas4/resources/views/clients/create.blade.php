@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8 ">
    <div class="card mt-5">
        <div class="card-header">
            <h1>New client</h1>
        </div>
            <div class="card-body">
                <form action="{{route('clients-store')}}" method="post">
                    <div class="mb-3">
                        <label class="form-label fs-4">Client name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        <div class="form-text">Client name: min 3 characters</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Client surname</label>
                        <input type="text" class="form-control" name="surname" value="{{old('surname')}}">
                        <div class="form-text">Client surname: min 3 characters</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Clients PID <span class="fs-6 fst-italic">example:    {{session('pid')}}</span></label>
                        <input type="text" class="form-control" name="pid" value="{{old('pid')}}">
                        <div class="form-text">Clients PID</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Clients account number</label>
                        <input readonly type="text" class="form-control" name="accNr" value="{{old('accNr') ?? session('accNr')}}">
                        <div class="form-text">Clients account number <span style="color: red">cannot be changed</span></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection