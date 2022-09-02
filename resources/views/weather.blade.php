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
                    <div class="card">                        
                        <div class="card-body">
                            <form id="findWeather">
                                @csrf
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
        
                                <button type="submit" class="btn btn-primary">Go</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">                    
                    <div class="weather-status">                        
                        <div class="card">
                            <div class="card-body">
                                <h4 id="weather-city">NEW YORK</h4>
                                <h5 id="weather-country">US</h5>
                                <h5 id="dt">Date and time</h5>
                                <h2 id="weather-type">CLOUDY</h2>
                                <img class="img-thumbnail" id="weather-icon">
                                <p id="weather-info">Lorem ipsum dolor sit amet.</p>
                                <h2 id="temperature">15 C </h2>
                                <p id="other_info">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
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

            $('#findWeather').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{url('find-weather')}}",
                    data: $('#findWeather').serialize(),
                    success: function(result)
                    {
                        $.each(result.weather, function (key, value) {
                            $('#weather-type').html(value.main);
                            document.getElementById("weather-icon").src = "https://openweathermap.org/img/w/" + value.icon + ".png";
                            $('#weather-info').html(value.description);
                        });
                        $.each(result, function (key, value) {
                            if(key == "dt")
                                $('#dt').html(value);
                            if(key == "name")
                                $('#weather-city').html(value);
                            // Country
                            $('#weather-country').html(value.country);
                            if(key == "main"){
                                $('#temperature').html(value.temp + " <span>&#8451;</span>");
                                $('#other_info').html("<b>Feel like: </b>" + value.feels_like + " <span>&#8451;</span>, Min: " + value.temp_min + "  <span>&#8451;</span>, Max: " + value.temp_max + "  <span>&#8451;</span>, Pressure: " + value.pressure + " hPa, Humidity: " + value.humidity + " %");
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>