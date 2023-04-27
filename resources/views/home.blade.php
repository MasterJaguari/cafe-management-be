@extends('layouts.app')

@section('content')
<h1>Test</h1>
@auth
@if(auth()->user()->role_id === 2)
<stolovi></stolovi>
@else
<meni />
@endif
@endauth
@endsection
