<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Task Manager</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="title" placeholder="Task Title" class="p-2 border rounded">
            <button type="submit" class="p-2 bg-blue-500 text-white rounded">Add Task</button>
        </form>
        <ul>
            @foreach ($tasks as $task)
                <li class="mb-2 flex justify-between items-center">
                    <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{ $task->title }}" class="p-2 border rounded mr-2">
                        <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }} class="mr-2">
                        <button type="submit" class="p-2 bg-green-500 text-white rounded">Update</button>
                    </form>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 bg-red-500 text-white rounded">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
