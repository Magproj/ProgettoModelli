$(document).ready(function(){
	$.ajax({
		url: "http://localhost/miosito/chartjs/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var tipo = [];
			var valore  = [];

			valore[0]=0;
			tipo[0]=null;

			for(var i in data) {
				tipo.push("Tipo " + data[i].tipo);
				valore.push(data[i].valore);
			}

			var chartdata = {
				labels: tipo,
				datasets : [
					{
						label: 'Media dei valori per tipo di sensore',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: valore
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
				        tooltips: {
				          cornerRadius: 0,
				          caretSize: 0,
				          xPadding: 16,
				          yPadding: 10,
				          backgroundColor: 'rgba(0, 150, 100, 0.9)',
				          titleFontStyle: 'normal',
				          titleMarginBottom: 15
				        }
   				 }
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
