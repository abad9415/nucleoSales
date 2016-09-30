var chart;
	
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'grafica2'
			},
			title: {
				text: 'Contacto'
			},
			plotArea: {
				shadow: null,
				borderWidth: null,
				backgroundColor: null
			},
			tooltip: {
				formatter: function() {
					return '<b>'+ this.point.name +'</b>: '+ this.y ;
				}
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					dataLabels: {
						enabled: true,
						color: '#000000',
						connectorColor: '#000000',
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y ;
						}
					}
				}
			},
		    series: [{
				type: 'pie',
				name: 'Browser share',
				data: [
							['Correo',parseInt($("#correo").val())],
							['Telefono',parseInt($("#telefono").val())],
							['Cambaceo',parseInt($("#cambaceo").val())],
							['Ref-Rec',parseInt($("#ref_rec").val())],
							['Otros', parseInt($("#otros").val())],
							['Directo',parseInt($("#directo").val())]
						]
			}]
		});
	});			
