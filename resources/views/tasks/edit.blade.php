@extends('layouts.app')
@section('content')
<div class="card shadow-sm p-5">
    <h1>Edit Task</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}"
                required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description"
                name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group form-check mb-3">
            <input type="checkbox" class="form-check-input" id="is_completed" name="is_completed" value="1"
                {{ $task->is_completed ? 'checked' : '' }}>
            <label class="form-check-label" for="is_completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection