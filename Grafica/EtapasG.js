var etapP;
$(function() {

  $('#Gfunnel').highcharts({
    chart: {
      type: 'funnel',
      marginRight: 100
    },
    title: {
      text: 'Etapas',
      x: -50,

    },

    plotOptions: {

      series: {
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b> ({point.y:,.0f})',
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
          softConnector: true
        },
        cursor: 'pointer',
        point: {

          events: {
            click: function(e) {
              etapP= this.name;
              document.cookie ='variable='+etapP;
              $("#listP").load( "ListaProspectos.php" );
                 
            }
          }
        },

        neckWidth: '20%',
        neckHeight: '10%'

        //-- Other available options
        // height: pixels or percent
        // width: pixels or percent
      }
    },
    legend: {
      enabled: true

    },

    series: [{
      name: 'Total',

      data: [
        [$("#Etapa1N").val(), parseInt($("#Etapa1").val())],
        [$("#Etapa2N").val(), parseInt($("#Etapa2").val())],
        [$("#Etapa3N").val(), parseInt($("#Etapa3").val())],
        [$("#Etapa4N").val(), parseInt($("#Etapa4").val())],
        [$("#Etapa6N").val(), parseInt($("#Etapa6").val())],
        [$("#Etapa5N").val(), parseInt($("#Etapa5").val())]

      ]
    }],

  });
});