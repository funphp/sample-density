<!DOCTYPE html>
<html>
<head>
    <title>Devnet - Tweet Density</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    {!! HTML::script('js/chart.js') !!}
    <script type="text/javascript">
        var tweet_count_chart = {!! json_encode($tweet_count) !!};
        var tweet_handle = {!! json_encode($handle) !!};
        var tweet_data_count =[];
        var tweet_data_hour =[];
        tweet_count_chart.forEach(function(t){
            tweet_data_count[t.hour]= t.count;
            tweet_data_hour[t.hour]= t.hour;
        })
        drawChart(tweet_data_count, tweet_data_hour, tweet_handle);
    </script>
</head>
<body>
<div id="container" style="height:410px; margin: 0 2em; clear:both; min-width: 600px"></div>
</body>
</html>