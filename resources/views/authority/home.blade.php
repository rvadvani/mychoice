@extends('layouts.authority')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="{{ url('authority/home') }}" class="list-group-item">Home</a>
                <a href="{{ url('authority/elect') }}" class="list-group-item">Elect</a>
                <a href="{{ url('authority/nominies') }}" class="list-group-item">Nominies</a>
                <a href="{{ url('authority/voters') }}" class="list-group-item">Voters</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Authority Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
