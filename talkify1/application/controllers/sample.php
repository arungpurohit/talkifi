<?php
session_start();
class Sample extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('sample_model');			
	}
	
	public function index(){
		
		$this->load->view('header');
		$this->load->view('left');
		$this->load->view('sample/index');
		$this->load->view('footer');
	}
	public function getPieChart()
	{  
	
		$pieChart = $this->sample_model->getPieValues();		
		echo json_encode($pieChart);			
	}
	
	public function getBarChart()
	{
		$barChart = $this->sample_model->getBarValues();
		echo json_encode($barChart);
	}
	/*public function getBubbleChart()
	{
		$bubbleChart = $this->sample_model->getBubbleValues();
		echo json_encode($bubbleChart);
	}*/
	
	public function getBubbleChart()
	{
		$bubbleChart = $this->sample_model->getBubbleValues();
		echo json_encode($bubbleChart);
	}
	
	public function getAreaChart()
	{
		$areaChart = $this->sample_model->getAreaValues();
		echo json_encode($areaChart);
	}
	
	public function getLineChart()
	{
		$lineChart = $this->sample_model->getLineValues();
		echo json_encode($lineChart);
	}
	
	public function getColumnChart()
	{
		$columnChart = $this->sample_model->getColumnValues();
		echo json_encode($columnChart);
	}
	
	public function getComboChart()
	{
		$comboChart = $this->sample_model->getComboValues();
		echo json_encode($comboChart);
	}
	
	public function getTable()
	{
		$table = $this->sample_model->gettableValues();
		echo json_encode($table);
	}
	
	public function getSteppedareaChart()
	{
		$steppedareaChart = $this->sample_model->getSteppedareaValues();
		echo json_encode($steppedareaChart);
	}
	
	public function getCandlestickChart()
	{
		$candlestickChart = $this->sample_model->getCandlestickValues();
		echo json_encode($candlestickChart);
	}
	
	public function getScatterChart()
	{
		$scatterChart = $this->sample_model->getScatterValues();
		echo json_encode($scatterChart);
	}
}
?>
