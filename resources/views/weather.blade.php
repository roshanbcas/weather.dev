<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="#">Weather APP</a>                
            </nav>
        </div>

        <!-- Search by -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="post">
                        <h1>Search your location:</h1>
                        <!-- Country -->
                        <div class="form-group">
                          <label for="country">Country:</label>
                          <select class="form-control" name="country" id="country">
                          @foreach ($countries as $data)
                            <option>{{$data->country}}</option>
                          @endforeach
                          </select>
                        </div>

                        <!-- City -->
                        <div class="form-group">
                          <label for="city">City:</label>
                          <select class="form-control" name="city" id="city">
                            <option value="Colombo">Colombo</option>
                            <option value="Kandy">Kandy</option>
                            <option value="London">London</option>
                          </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>