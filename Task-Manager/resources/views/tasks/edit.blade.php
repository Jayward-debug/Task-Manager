<!DOCTYPE html>
<html>

<head>

    <title>Edit Task - Task Manager</title>

    <link rel="stylesheet" href="/css/style.css?v=2">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="edit-page">

<div class="edit-container">

    <!-- HEADER -->

    <div class="edit-header">

        <div class="edit-icon">
            ✎
        </div>

        <div>

            <h1>Edit Task</h1>

            <p>
                Update the details of your task.
            </p>

        </div>

    </div>


    <!-- EDIT CARD -->

    <div class="edit-card">

        <form
            action="/tasks/{{ $task->id }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- TASK NAME -->

            <div class="form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ $task->task_name }}"
                    placeholder="Task name"
                    required
                >

            </div>


            <!-- DESCRIPTION -->

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <input
                    type="text"
                    id="description"
                    name="description"
                    value="{{ $task->description }}"
                    placeholder="Description"
                >

            </div>


            <!-- STATUS -->

            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                >

                    <option
                        value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Ongoing"
                        {{ $task->status == 'Ongoing' ? 'selected' : '' }}
                    >
                        Ongoing
                    </option>

                    <option
                        value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}
                    >
                        Completed
                    </option>

                </select>

            </div>


            <!-- DUE DATE -->

            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ $task->due_date }}"
                >

            </div>


            <!-- BUTTONS -->

            <div class="button-row">

                <!-- BACK BUTTON -->

                <a
                    href="/tasks"
                    class="back-button"
                >
                    ← Back to Tasks
                </a>


                <!-- UPDATE BUTTON -->

                <button
                    type="submit"
                    class="update-button"
                >
                    ✓ Update Task
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>