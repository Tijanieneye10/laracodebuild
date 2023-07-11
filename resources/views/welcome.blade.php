<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <!-- component -->
    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
        <div class="bg-gray-100 rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
            <div class="mb-4">
                <h1 class="text-grey-darkest text-xl">Todo App</h1>

                <form method="POST" action="{{ route('todo.store') }}" class="flex mt-4">
                    @csrf
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                        placeholder="Add Todo" name="task">
                    <button
                        type="submit"
                        class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Add</button>
                </form>
            </div>
            <div>
                @foreach ($tasks as $task )
                    
                    <div class="flex mb-4 items-center border-b-2 border-grey-200 py-2">
                        <p class="w-full text-grey-darkest {{ $task->status ? 'line-through' : '' }}">{{ $task->task }}</p>
                        <a
                            href="{{ route('todo.show', $task->id) }}"
                            class="bg-green-700 text-white flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">
                            {{ $task->status ? "Unmark" : "Done" }}
                        </a>
                        <form method="POST" action="{{ route('todo.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="bg-red-600 text-white flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove</button>
                        </form>

                    </div>

                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
