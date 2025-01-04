<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Edit Courses</h1>

 

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">courses</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $course->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="difficulty" class="form-label">difficulty</label>
            <select name="difficulty" id="difficulty" class="form-select" required>
                <option value="beginner" {{ $course->difficulty == 'beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="intermediate" {{ $course->difficulty == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="advanced" {{ $course->difficulty == 'advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
        </div>
          <div class="mb-3">
            <label for="start_date" class="form-label">date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}" required>
        </div>

   

        <button type="submit" class="btn btn-primary">update</button>
    </form>
</div>
</body>
</html>