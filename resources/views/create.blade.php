<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 6 Multiple Image Upload Example Tutorial - XpertPhp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>Upload Multiple Image</h1>
            <a href="{{route('image.index')}}"><i class="fa fa-image"></i> Gallery</a>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Error!</strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif
            <form action="{{route('image.store')}}" enctype="multipart/form-data" method="post" class="my-5">
                @csrf
                <div class="form-group">
                    <label for="images">Choose Multiple Image:</label>
                    <input  type="file" class="form-control" id="images" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>