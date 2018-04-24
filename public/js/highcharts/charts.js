function chart(data){

	
	ready = fillterArray(data, "Ready");
	notReady = fillterArray(data, "Not Ready");
	underMtc = fillterArray(data, "Under Mtc");
	idle = fillterArray(data, "Idle");
	onJob = fillterArray(data, "On Job");
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
	                enabled: false,
	                distance: -50,
	                style: {
	                    fontWeight: 'bold',
	                    color: 'white'
	                }
	            },
	            startAngle: -180,
	            endAngle: 180,
	            center: ['50%', '50%'],
	            showInLegend: true
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
	        // data: [{
	        //     name: 'Ready',
	        //     y: 61.41
	        // }, {
	        //     name: 'Not Ready',
	        //     y: 11.84
	        // }, {
	        //     name: 'Idle',
	        //     y: 10.85
	        // }, {
	        //     name: 'Under Mtc',
	        //     y: 4.67
	        // }, {
	        //     name: 'On Job',
	        //     y: 4.18
	        // }]
	    }]
	});
}

function fillterArray(data, status){
	var filltered = data.filter ( function ( d ) {
    return d.CONDITIONS == status;
	});

	return filltered.length;

}
