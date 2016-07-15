function drawChart(counts, hours, handle) {
    $(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                defaultSeriesType: 'column'
            },
            title: {
                text: 'Tweet Density for @'+handle,
                align: 'left',
                x: 70
            },
            xAxis: {
                categories: hours,
                title: {
                    text: 'Hours'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Tweets'
                }
            },
            legend: {
                align: 'right',
                verticalAlign: 'top',
                x: 0,
                y: 100,
                borderWidth: 0
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    animation: false
                }
            },
            tooltip: {
                enabled: true
            },
            series: [{
                name: 'Tweets',
                data: counts
            }]
        });
    });
}