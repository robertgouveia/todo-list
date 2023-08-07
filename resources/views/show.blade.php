@extends('layouts.app')
@section('cta')
<a href="{{route('tasks.index')}}" class="btn"><i class="fa-solid fa-chevron-left"></i></a>
@endsection
@section('title', 'Task Details')
@section('secondary-cta')
@isset($task)
<div class="flex gap-2">
    <a href="{{route('tasks.edit', $task)}}" class="btn cta">Edit</a>
</div>
@endisset
@endsection
@section('content')
<h1 class="text-3xl font-bold mb-3">{{$task->title}}</h1>

<p class="mb-4 text-sm text-slate-500">Created {{$task->created_at->diffForHumans()}} ● Updated {{$task->updated_at->diffForHumans()}}</p>

<h1 class="text-xl font-bold mb-3">Tag Line</h1>
<p class="mb-4 text-slate-400 font-normal">{{$task->description}}</p>

@isset($task->long_description)
<h1 class="text-xl font-bold mb-3">Summary</h1>
<p class="mb-4 text-slate-700">{{$task->long_description}}</p>
@endisset
@endsection
