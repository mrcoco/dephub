<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jpgraph 
{
    public function barchart($datax,$datay,$title,$filename)
    {
        require_once ('jpgraph/jpgraph.php');
        require_once ('jpgraph/jpgraph_bar.php');

        // We need some data
//        $datay=array(0.13,0.25,0.21,0.35,0.31,0.06);
//        $datax=array("January","February","March","April","May","June");

        // Setup the graph.
        $graph = new Graph(400,240);
        $graph->img->SetMargin(60,20,35,75);
        $graph->SetScale("textlin");
        $graph->SetMarginColor("lightblue:1.1");
        $graph->SetShadow();

        // Set up the title for the graph
//        $graph->title->Set($title);
//        $graph->title->SetMargin(8);
//        $graph->title->SetFont(FF_VERDANA,FS_BOLD,12);

        // Setup font for axis
//        $graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,7);
//        $graph->yaxis->SetFont(FF_VERDANA,FS_NORMAL,10);

        // Show 0 label on Y-axis (default is not to show)
        $graph->yscale->ticks->SupressZeroLabel(false);

        // Setup X-axis labels
        $graph->xaxis->SetTickLabels($datax);
        $graph->xaxis->SetLabelAngle(20);

        // Create the bar pot
        $bplot = new BarPlot($datay);
        $bplot->SetWidth(0.4);

        // Set color for the frame of each bar
        $bplot->SetColor("white");
        $graph->Add($bplot);

        // Finally send the graph to the browser
        $path='assets/img/'.$filename;
        unlink($path);
        $graph->Stroke($path);
        return base_url($path);
    }
}
?>