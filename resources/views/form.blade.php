@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('styles')
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-width: 600px;

        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            font-family: inherit;
        }
    </style>
@endsection

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Task Title:</label>
            <input type="text" name="title" id="title" placeholder="Task title"
                value="{{ old('title', $task->title ?? '') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Task Description:</label>
            <textarea name="description" id="description" placeholder="Task description"
                rows="5">{{ old('description', $task->description ?? '') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Task Long Description:</label>
            <textarea name="long_description" id="long_description" placeholder="Task long description"
                rows="10">{{ old('long_description', $task->long_description ?? '') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2">
            <button type="submit" class="btn">@isset($task) Update Task @else Create Task @endisset</button>
            <a href="{{ route('tasks.index') }}" class="btn underline decoration-red-500 underline-offset-4">Cancel</a>
        </div>
    </form>
@endsection