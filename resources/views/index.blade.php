@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

@section('cta')
<a href="{{route('tasks.create')}}" class="btn cta">Create</a>
@endsection
@section('secondary-cta')
<a href="#" class="btn"><i class="fa-regular fa-bell"></i></a>
@endsection

<div class="w-full bg-gradient-to-r from-blue-400 to-blue-700 text-slate-50 p-4 rounded-xl mb-5">
    <h1 class="text-xl font-bold">Progress summary</h1>
    <p>@if(!$totalamount) No Tasks @elseif($totalamount === 1) 1 Task @else {{$totalamount}} Tasks @endif</p>
    <div class="bar py-2">
        <div class="flex justify-between">
            <p>Progress</p>
            <p>@if($totalamount){{round($completedamount / $totalamount * 100)}}@else 0 @endif%</p>
        </div>
        <div class="w-full bg-blue-800 rounded-full h-2.5 mt-2">
            <div class="bg-slate-50 h-2.5 rounded-full" @if($totalamount) style="width: {{round($completedamount / $totalamount * 100)}}%" @else style="width: 0%" @endif></div>
        </div>
    </div>
</div>

<div class="flex content-center items-center justify-between my-3">
    <h1 class="text-2xl font-bold">Your Tasks:</h1>
    <p class="text-sm font-normal text-slate-500">Click to edit</p>
</div>

@forelse($tasks as $task)
<div>
    <div class="w-full mb-3 shadow-lg flex ps-5 py-1 h-fit rounded border">
        <div class="flex justify-center flex-col my-2">
            <a href="{{route('tasks.show', $task)}}" class="text-lg font-bold max-w-xs truncate">{{$task->title}}</a>
            <p class="text-sm text-slate-500 max-w-xs truncate">{{$task->description}}</p>
        </div>
        <div class="w-full flex items-center justify-end gap-4 px-3">
            <div class="flex gap-2 justify-center">
                <form method="POST" action="{{route('tasks.update', ['query' => true, 'task' => $task])}}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn hover:bg-green-100 hover:text-green-300">
                        @if($task->completed)
                        <i class="fa-solid fa-x text-red-500"></i>
                        @else
                        <i class="fa-solid fa-check text-green-500"></i>
                        @endif
                    </button>
                </form>
                <form method="post" action="{{route('tasks.destroy', $task)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn hover:bg-red-100 hover:text-red-300"><i class="fa-solid fa-trash text-red-500"></i></button>
                </form>
            </div>
            <a href="{{route('tasks.show', $task)}}" class="text-slate-500"><i class="fa-solid fa-chevron-right"></i></a>
        </div>
    </div>
</div>
@empty
<p>No Tasks</p>
@endforelse

@if (count($tasks))
{{$tasks->links()}}
@endif

@endsection
