<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Center the form vertically and horizontally */
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<div class="container center-form">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if (session()->has('data'))
            @foreach (session('data') as $key => $result)
                <div>
                    {{ $key }} => {{ $result }}
                    <br>
                </div>
                @if($key == 'image')
                    <img src="{{ asset('storage/image/'.$result) }}" alt="">
                @endif
            @endforeach
            <div> {{ session('status')  }} </div>
            @endif

            @unless (session()->has('data'))
            <form method="POST" action="/form" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi:</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="value" class="form-label">Nilai (2.50 - 99.99):</label>
                    <input type="number" class="form-control" name="value" id="value" step="0.01" min="2.50" max="99.99">
                    @error('value')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (PNG/JPG/JPEG, maks 2MB):</label>
                    <input type="file" class="form-control-file" name="image" id="file" accept=".png,.jpg,.jpeg" accept="/image">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>      
            @endunless
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>
</html>
