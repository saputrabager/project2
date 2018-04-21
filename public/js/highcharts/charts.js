function chart(data){

	
	ready = fillterArray(data, "1");
	notReady = fillterArray(data, "2");
	underMtc = fillterArray(data, "3");
	idle = fillterArray(data, "4");
	onJob = fillterArray(data, "5");
	total = data.length;

	idePercentage = idle / total * 100;
	readyPercentage = ready/total * 100;
	notReadyPercentage = notReady/total * 100;
	onJobPercentage = onJob/total * 100;
	underMtcPercentage = underMtc/total * 100;

	Highcharts.chart('chart', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: 0,
	        plotShadow: false
	    },
	    title: {
	        text: '',
	        align: 'center',
	        verticalAlign: 'top',
	        y: 40
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
	    plotOptions: {
	        pie: {
	            dataLabels: {
	                enabled: true,
	                distance: -50,
	                style: {
	                    fontWeight: 'bold',
	                    color: 'white'
	                }
	            },
	            startAngle: -180,
	            endAngle: 180,
	            center: ['50%', '50%']
	        }
	    },
	    series: [{
	        type: 'pie',
	        name: 'Asset condition',
	        innerSize: '50%',
	        data: [
	            ['Ready', readyPercentage],
	            ['Not Ready', notReadyPercentage],
	            ['Idle', idePercentage],
	            ['Under Mtc', underMtcPercentage],
	            ['On Job', onJobPercentage]
	        ]
	    }]
	});
}

function fillterArray(data, status){
	var filltered = data.filter ( function ( d ) {
    return d.CONDITIONS == status;
	});

	return filltered.length;

}
