<!DOCTYPE html>
<html>

<head>

    <title>Task Manager</title>

    <link rel="stylesheet" href="/css/style.css?v=2">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div class="container">

    <!-- ADD TASK -->

    <div class="add-task-box">

        <div class="add-task-title">

            <div class="add-icon">
                +
            </div>

            <div>
                <h1>Task Manager</h1>

                <p>
                    Fill in the details below to create a new task.
                </p>
            </div>

        </div>


        <form action="/tasks" method="POST">

            @csrf

            <div class="input-row">

                <input
                    type="text"
                    name="task_name"
                    placeholder="☰   Task name"
                    required
                >

                <input
                    type="text"
                    name="description"
                    placeholder="▣   Description (optional)"
                >

            </div>


            <div class="date-row">

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                >

                <button
                    type="submit"
                    class="add-task-button"
                >
                    + &nbsp; Add Task
                </button>

            </div>

        </form>

    </div>


    <!-- TASKS -->

    <div class="tasks-container">

        <div class="tasks-header">

            <div class="tasks-title">

                <div class="tasks-icon">
                    ☷
                </div>

                <h2>My Tasks</h2>

            </div>

            <div class="task-filter">
                All &nbsp;⌄
            </div>

        </div>


        <!-- TASK LIST -->

        @foreach ($tasks as $task)

            <div class="task">

                <!-- CHECK BOX -->

                <div class="check-box"></div>


                <!-- TASK INFORMATION -->

                <div class="task-information">

                    <h3>
                        {{ $task->task_name }}
                    </h3>

                    @if($task->description)

                        <p class="task-description">
                            {{ $task->description }}
                        </p>

                    @endif

                </div>


                <!-- DUE DATE -->

                @if($task->due_date)

                    <div class="due-date">

                        <span class="calendar-icon">
                            ▣
                        </span>

                        {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}

                    </div>

                @endif


                <!-- ACTION BUTTONS -->

                <div class="actions">

                    <a
                        href="/tasks/{{ $task->id }}/edit"
                        class="edit-button"
                        title="Edit"
                    >
                        ✎
                    </a>


                    <form
                        action="/tasks/{{ $task->id }}"
                        method="POST"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-button"
                            title="Delete"
                            onclick="return confirm('Are you sure you want to delete this task?')"
                        >
                            ♧
                        </button>

                    </form>

                </div>

            </div>

        @endforeach


        <!-- NO TASKS -->

        @if($tasks->count() == 0)

            <div class="no-tasks">

                <div class="no-tasks-icon">
                    📝
                </div>

                <h3>
                    No tasks yet!
                </h3>

                <p>
                    Add your first task above.
                </p>

            </div>

        @endif

    </div>

</div>

</body>

</html>