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
                <div class="col-md-4">
                    <form action="" method="post">
                        <h1>Search your location:</h1>
                        <!-- Country -->
                        <div class="form-group">
                          <label for="country">Country:</label>
                          <select class="form-control" name="country" id="country">
                          @foreach ($countries as $data)
                            <option value="{{$data->country}}">{{$data->country}}</option>
                          @endforeach
                          </select>
                        </div>

                        <!-- City -->
                        <div class="form-group">
                          <label for="city">City:</label>
                          <select class="form-control" name="city" id="city">                            
                          </select>
                        </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <div class="weather-status">
                        <h4>NEW YORK</h4>
                        <h5>US</h5>
                        <h2>CLOUDY</h2>
                        <img src="" alt="">
                        <p>15 C</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country').on('change', function () {
                var country = this.value;
                $("#city").html('<option value="">-- Select City --</option>');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "post",
                    data: {
                        country: country,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city').html('<option value="">-- Select City --</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.city + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>