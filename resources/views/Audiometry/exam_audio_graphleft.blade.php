@php 
include_once('/home/godesqco/meritaclinic.app/resources/views/Audiometry/phplot/phplot.php') 
@endphp

@php
header("Content-type: image/png");

$plot = new PHPlot(370,324);

//Define some data
$data = array(
	array('250',$_REQUEST['al1'],$_REQUEST['bl1']),
	array('500',$_REQUEST['al2'],$_REQUEST['bl2']),
	array('750',$_REQUEST['al3'],$_REQUEST['bl3']),
	array('1000',$_REQUEST['al4'],$_REQUEST['bl4']),
	array('2000',$_REQUEST['al5'],$_REQUEST['bl5']),
	array('3000',$_REQUEST['al6'],$_REQUEST['bl6']),
	array('4000',$_REQUEST['al7'],$_REQUEST['bl7']),
	array('6000',$_REQUEST['al8'],$_REQUEST['bl8']),
	array('8000',$_REQUEST['al9'],$_REQUEST['bl9'])
);

// Set data color
$plot->SetDataColors(array('blue'),array('blue'));

// Set plot type
$plot->SetPlotType('linepoints');

// Show all shapes:
$plot->SetPointShapes(array('cross','none'));

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