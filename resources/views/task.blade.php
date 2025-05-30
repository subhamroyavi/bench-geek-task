<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

   @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="card mt-2">
        <div class="crad-header">
            <h2>Task Table
            </h2>
            <a class="btn btn-success" href="{{ route('create') }}">Create</a>
        </div>
        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Complete</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskData as $data)

                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>
                            @if($data->image)
                            <img src="{{ asset('storage/task/'.$data->image) }}" width="50" height="50" alt="{{ $data->image }}">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ $data->is_completed ? 'Yes' : 'No' }}</td>
                        <td>{{ $data->due_date }}</td>
                        <td>
                            <a href="{{ route('edit', ['id' => $data->id]) }}">EDIT</a>
                            <a href="{{ route('delete', ['id' => $data->id]) }}">DELETE</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>