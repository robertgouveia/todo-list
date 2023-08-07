@extends('layouts.app')
@section('cta')
<a href="{{isset($task) ? route('tasks.show', $task) : route('tasks.index')}}" class="btn"><i class="fa-solid fa-chevron-left"></i></a>
@endsection
@section('title', @isset($task) ? 'Edit Task' : 'Create New Task')

@section('styles')
<style>
.error-message{
    color: red;
    font-size: 0.8rem;
}
</style>
@endsection
@section('content')
<form method="POST"
 action="{{isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store')}}">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="title">Task Name</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" @class(['border-red-500' => $errors->has('title')])>
        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Tag Line</label>
        <textarea name="description" id="description" rows="5"@class(['border-red-500' => $errors->has('description')])>{{$task->description ?? old('description')}}</textarea>
        @error('description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_description">Summary</label>
        <textarea name="long_description" id="long_description" rows="10"@class(['border-red-500' => $errors->has('long_description')])>{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div class="flex gap-2 items-center">
        <button type="submit" class="btn cta w-full">@isset($task) Update Task @else Add Task  @endisset</button>
    </div>
</form>
@endsection
