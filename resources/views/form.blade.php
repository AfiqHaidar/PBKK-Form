<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Assignment</title>
    
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="vh-100 bg-image" style="background-image: linear-gradient(to bottom, #333333, #000000);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">

                                @if (session()->has('data'))
                                    <h3 class="text-uppercase text-center mb-5">Member Card</h3>
                                    <div class="row">
                                        <div class="col-md-5">
                                            @foreach (session('data') as $key => $result)
                                                @if ($key == 'image')
                                                    <img src="{{ asset('storage/image/'.$result) }}" alt="" width="200" height="150" style="border-radius: 10px;">
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-7">
                                            @foreach (session('data') as $key => $result)
                                                @if ($key != 'image')
                                                    <div>
                                                        {{ $key }}: {{ $result }}
                                                        <br>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <br>
                                            <div class="gradient-custom-4 d-flex align-items-center justify-content-center">
                                                {{ session('status') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @unless (session()->has('data'))
                                    <h2 class="text-uppercase text-center mb-5">Member Registration</h2>
                                    <form method="POST" action="/form" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-outline mb-4">
                                            <label for="name" class="form-label">Name:</label>
                                            <input  class="form-control form-control-lg" name="Name" id="Name">
                                            @error('Name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="email" class="form-label">Email:</label>
                                            <input  class="form-control form-control-lg" name="Email" id="Email">
                                            @error('Email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="description" class="form-label">Address:</label>
                                            <textarea class="form-control form-control-lg" name="Address" id="Address"></textarea>
                                            @error('Address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="value" class="form-label">Age [2.50 - 99.99]:</label>
                                            <input  class="form-control form-control-lg" name="Age" id="Age" step="0.01" min="2.50" max="99.99">
                                            @error('Age')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="image" class="form-label">Self Portrait:</label>
                                            <input type="file" class="form-control-file" name="image" id="image" accept=".png,.jpg,.jpeg" accept="/image">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-lg gradient-custom-4 text-body">Register</button>
                                        </div>
                                    </form>
                                @endunless

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
