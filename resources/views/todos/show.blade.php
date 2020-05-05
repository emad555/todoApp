@extends('layouts.app')
@section('title', 'todo - '. $todos->id)
@section('content')



<div class = 'container'>
<h1 class="mt-5 text-center">{{$todos->title}}</h1>
<div class = 'row pt-5 justify-content-center'>

<div class = 'col-md-8'>
<div class = 'card'>
<div class = 'card-header'>
<span>Details</span>
todo<span class = 'badge badge-warning float-right'>{{boolval($todos->completed)? 'Completed' : 'Not Completed'}}</span>
</div>
<div class = 'card-body'>{{$todos->description}}</div>
</div>

</div>

</div>

</div>
@endsection