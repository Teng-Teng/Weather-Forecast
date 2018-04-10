<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather</title>
  </head>
  <body>
    <h1>Weather Report</h1>
	
	<div class="form-group">
	    <label for="city">city</label>
	    <input type="text" class="form-control" id="city" placeholder="Enter city">
  	</div>

  	<button type="submit" class="btn btn-primary btn-block" onclick="searchWeather()">Submit</button>
	
	<!-- render weather info here -->
	<div id="info"></div>

     <h1>Weather Forecast</h1>
    
    <div class="form-group">
        <label for="city">city</label>
        <input type="text" class="form-control" id="forecastcity" placeholder="Enter city">
    </div>

    <button type="submit" class="btn btn-primary btn-block" onclick="forecastWeather()">Submit</button>
    
    <!-- render weather info here -->
    <div id="info-forecast"></div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    	function searchWeather() {
    		var search = $('#city').val();
    		var apiKey = "61be3c1fc6c7aac8112c8f5055973c2b";
    		$.get(
    			"http://api.openweathermap.org/data/2.5/weather?q=" + search + "&appid=" + apiKey,
    			function(data) {
    				$('#info').html('<h3 class = "text-primary">temperature:'+data.main.temp+'</h3>');
    			}

    		);
    		// console.log(search);
    	}

        function forecastWeather() {
            var search = $('#forecastcity').val();
            var apiKey = "61be3c1fc6c7aac8112c8f5055973c2b";
            $.get(
                "http://api.openweathermap.org/data/2.5/forecast?q=" + search + "&appid=" + apiKey,
                function(data) {
                    $('#info-forecast').html('<h3 class = "text-primary">temperature:'+data.list[0].main.temp+'</h3>');
                }

            );
            // console.log(search);
        }

    </script>
  </body>
</html>