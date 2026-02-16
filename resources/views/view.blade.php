@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 0.5rem 1rem;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 150px;
            /* Fixed width */
            align-self: flex-start;
        }

        button:hover {
            background-color: #218838;
        }

        .error_message {
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Task Title:</label>
            <input type="text" name="title" placeholder="Task title">
            @error('title')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Task Description:</label>
            <textarea name="description" placeholder="Task description" rows="5"></textarea>
            @error('description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Task Long Description:</label>
            <textarea name="long_description" placeholder="Task long description" rows="10"></textarea>
            @error('long_description')
                <p class="error_message">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Add Task</button>
    </form>
@endsection