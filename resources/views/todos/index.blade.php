@extends('layouts.app')
@section('title', 'All todos')
@section('content')

<div class = "container">
    <div class = "row pt-3 justify-content-center">
            <div class = "card" style = "width: 55%">
                <div class = "card-header text-center">
                    <h1>Todos Page</h1>
                </div>
                @if(session()->has('success'))
                    <div class = 'alert alert-success'>
                      {{session()->get('success')}}
                    </div>
                @endif

                @if(session()->has('update'))
                    <div class = 'alert alert-success'>
                      {{session()->get('update')}}
                    </div>
                @endif

                @if(session()->has('delete'))
                    <div class = 'alert alert-success'>
                      {{session()->get('delete')}}
                    </div>
                @endif

                <div class = "card-body">

                    <ul class = "list-group">                
                            @forelse($todos as $todo)
                                <li class = "list-group-item text-muted">{{ $todo -> title }}
                                    <span class = "float-right mr-2">
                                        <a href = "/todos/{{$todo->id}}/delete" style = "color: red">
                                            <i class="fas fa fa-trash"></i>
                                        </a>
                                    </span>
                                    <span class = "float-right mr-2">
                                        <a href = "/todos/{{$todo->id}}/edit"  style ="color: green">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                    </span>
                                    <span class = "float-right mr-2">
                                        <a href = "/todos/{{$todo->id}}">
                                            <i class="fas fa fa-eye"></i>
                                        </a>
                                    </span>
                                    @if(!$todo->completed)
                                        
                                       <span class = "float-right mr-2">
                                        <a href = "/todos/{{$todo->id}}/complete" style ="color: orange">
                                            <i class="far fa fa-check-square"></i>
                                        </a>
                                    </span>
                                    @endif
                                    </li>
                                 @empty
                                     <p class = 'text-center'>No todos</p>
                            
                            @endforelse

                    </ul>
            </div>
    </div>
</div>
</div>

@endsection