
$(function ($) {
  
    $('#grafica1').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        
        xAxis: {
            categories: [$("#mes1").val(), $("#mes2").val(), $("#mes3").val()]
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7]
        }]
    });
});
