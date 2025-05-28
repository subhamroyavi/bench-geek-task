<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 18rem;">
        <div class="card-header">
            <h2>

                @isset($data->id)
                Edit Task
                @else
                Task Form
                @endisset
            </h2>
        </div>
        <div class="card-body">
            <form action="{{ isset($data->id) ? route('update', $data->id) : route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title :</label>
                    <input type="text" class="form-control" id="title" placeholder="title name" name="title" value="{{ old('title', $data->title ?? '') }}">
                    @if ($errors->has('title'))
                    <span style="color: red;">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Write description..." name="description">{{ old('description', $data->description ?? '') }}</textarea>
                    @if ($errors->has('description'))
                    <span style="color: red;">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image :</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if(isset($data) && $data->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/task/'.$data->image) }}" width="100" class="img-thumbnail" alt="Current Image">

                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="complete" class="form-label">Complete :</label>

                    <input class="form-check-input" type="radio" name="is_completed" id="yes" value="1"
                        {{ old('is_completed', $data->is_completed ?? '') == '1' ? 'checked' : '' }}> Yes

                    <input class="form-check-input" type="radio" name="is_completed" id="no" value="0"
                        {{ old('is_completed', $data->is_completed ?? '') == '0' ? 'checked' : '' }}> No
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date :</label>
                    <input type="date" class="form-control" id="date" name="due_date" value="{{ old('due_date', $data->due_date ?? '') }}">
                    @if ($errors->has('due_date'))
                    <span style="color: red;">{{ $errors->first('due_date') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">
                    {{ isset($data->id) ? 'Update' : 'Create' }}
                </button>
            </form>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>