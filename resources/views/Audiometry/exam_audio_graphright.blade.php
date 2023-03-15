@php 
include_once('/home/godesqco/meritaclinic.app/resources/views/Audiometry/phplot/phplot.php') 
@endphp

@php
header("Content-type: image/png");
$plot = new PHPlot(370,324);

//Define some data
$data = array(
	array('250',$_REQUEST['ar1'],$_REQUEST['br1']),
	array('500',$_REQUEST['ar2'],$_REQUEST['br2']),
	array('750',$_REQUEST['ar3'],$_REQUEST['br3']),
	array('1000',$_REQUEST['ar4'],$_REQUEST['br4']),
	array('2000',$_REQUEST['ar5'],$_REQUEST['br5']),
	array('3000',$_REQUEST['ar6'],$_REQUEST['br6']),
	array('4000',$_REQUEST['ar7'],$_REQUEST['br7']),
	array('6000',$_REQUEST['ar8'],$_REQUEST['br8']),
	array('8000',$_REQUEST['ar9'],$_REQUEST['br9'])
);

// Set data color
$plot->SetDataColors(array('red'),array('red'));

// Set plot type
$plot->SetPlotType('linepoints');

// Show all shapes:
$plot->SetPointShapes(array('box','none'));

// Make the points bigger so we can see them:
$plot->SetPointSizes(10);

// Make the lines all be solid:
$plot->SetLineStyles(array('solid','dashed'));

// Make the lines a bit wider:
$plot->SetLineWidths(2);

// Range for y axis
$plot->SetPlotAreaWorld(0, 0, 9, 100);

// Set titles
$plot->SetXTitle('Frequency in Hertz (Hz)');
$plot->SetYTitle('Hearing in Decibels (Db)');

// Turn off X axis ticks and labels because they get in the way:
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');

// Draw no grids:
$plot->SetDrawXGrid(true);
$plot->SetDrawYGrid(true);

// Set data values
$plot->SetDataValues($data);

// Draw it
$plot->DrawGraph();
@endphp