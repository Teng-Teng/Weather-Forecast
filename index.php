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

      <div class="container">
          <div class="jumbotron">
              <h1 class="display-4">Weather Forecast</h1>
              <p class="lead">This is a weather forecast demo</p>
              <hr class="my-4">

              <div class="form-group">
                  <label for="">City:</label>
                  <input type="text" id="city" class="form-control" placeholder="Enter City">
              </div>

              <p class="lead">
<!--                  <button type="submit" id="" class="btn btn-primary btn-lg" onclick="searchWeather()">-->
<!--                      Current-->
<!--                  </button>-->

                  <button type="submit" id="" class="btn btn-primary btn-lg" onclick="forecastWeather()">
                      Forecast
                  </button>
              </p>
              <!-- render weather info here -->
              <h1 class="lead" id="info"></h1>
          </div>

      </div>

      <div id="curve_chart" style="width: 900px; height: 500px"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    	// function searchWeather() {
    	// 	var search = $('#city').val();
    	// 	var apiKey = "61be3c1fc6c7aac8112c8f5055973c2b";
    	// 	$.get(
    	// 		"http://api.openweathermap.org/data/2.5/weather?q=" + search + "&appid=" + apiKey,
    	// 		function(data) {
    	// 			$('#info').html('<h3 class = "text-primary">temperature:'+data.main.temp+'</h3>');
    	// 		}
        //
    	// 	);
    	// 	// console.log(search);
    	// }
        var arr;
        function forecastWeather() {
            var search = $('#city').val();
            var apiKey = "61be3c1fc6c7aac8112c8f5055973c2b";
            $.get(
                "http://api.openweathermap.org/data/2.5/forecast?q=" + search + "&appid=" + apiKey,
                function(data) {
                    // $('#info').html('<h3 class = "text-primary">temperature:'+data.list[0].main.temp+'</h3>');
                     arr = `[
              ['Date', 'Temperature', 'Humidity'],
              ['Today',  `+Data.list[0].main.temp+`,`+ Data.list[0].main.humidity+`]`;
                }

            );
            // console.log(search);
        }

    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          // var arr = [
          //     ['Date', 'Temperature', 'Humidity'],
          //     ['Today',  Data.list[0].main.temp, Data.list[0].main.humidity],
          //     ['Second Day',  Data.list[1].main.temp, Data.list[1].main.humidity],
          //     ['Third Day',  Data.list[2].main.temp, Data.list[2].main.humidity],
          //     ['Fourth Day',  Data.list[3].main.temp, Data.list[3].main.humidity]
          // ];

          // var arr = `[
          //     ['Date', 'Temperature', 'Humidity'],
          //     ['Today',  `+Data.list[0].main.temp+`,`+ Data.list[0].main.humidity+`]`;

          var data = google.visualization.arrayToDataTable(arr);

          var options = {
              title: 'Weather Trend',
              curveType: 'function',
              legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
      }
    </script>

  </body>
</html>