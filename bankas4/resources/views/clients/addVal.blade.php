@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8 ">
    <div class="card mt-5">
        <div class="card-header lentele-bg">
            <h1>Add values</h1>
        </div>
            <div class="card-body">
                <form action="{{route("updateA", $client)}}" method="post">
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Client name</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="name" value="{{ $client->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Client surname</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="surname" value="{{ $client->surname }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Client PID</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="pid" value="{{ $client->pid }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Account number</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="accNr" value="{{ $client->accNr }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Account balance</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="value" value="{{ $client->value }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">The amount of added feed</label>
                        <input type="text" class="form-control w-50 d-inline-block float-end" name="addValue" value="0">
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