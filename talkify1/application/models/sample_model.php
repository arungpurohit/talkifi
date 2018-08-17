<?php

class Sample_model extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getPieValues()
	{
	
		$pieChart ='{"cols": [  {"id":"","label":"Topping","pattern":"","type":"string"},
        {"id":"","label":"Slices","pattern":"","type":"number"}
      ],
  "rows": [
        {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
        {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
      ]
}';
	return json_decode($pieChart);
	
	}
	
	public function getBarValues()
	{
		$barChart = '{"cols": [  {"id":"","label":"Year","pattern":"","type":"number"},
       							 {"id":"","label":"Sales","pattern":"","type":"number"},
								 {"id":"","label":"Expenses","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":2004,"f":null},{"v":1000,"f":null},{"v":400,"f":null}]},
        						{"c":[{"v":2005,"f":null},{"v":1170,"f":null},{"v":460,"f":null}]},
								{"c":[{"v":2006,"f":null},{"v":660,"f":null},{"v":1120,"f":null}]},
								{"c":[{"v":2007,"f":null},{"v":1030,"f":null},{"v":540,"f":null}]}
        
      						]
					}';

	return json_decode($barChart);
	}
	
	/*public function getBubbleValues()
	{
		$bubbleChart ='{"cols": [  {"id":"","label":"ID","pattren":"","type":"string"},
								   {"id":"","label":"X","pattren":"","type":"number"},
								   {"id":"","label":"Y","pattren":"","type":"number"},
								   {"id":"","label":"Temperature","pattren":"","type":"number"}
								],
						"rows": [
									{"c":[{"v":"CAN","f":null},{"v":80,"f":null},{"V":167,"f":null},{"v":120,"f":null}]},
									{"c":[{"v":"CBB","f":null},{"v":79,"f":null},{"V":136,"f":null},{"v":130,"f":null}]},
									{"c":[{"v":"CMM","f":null},{"v":78,"f":null},{"V":184,"f":null},{"v":50,"f":null}]},
									{"c":[{"v":"CLL","f":null},{"v":72,"f":null},{"V":278,"f":null},{"v":230,"f":null}]},
									{"c":[{"v":"COO","f":null},{"v":81,"f":null},{"V":200,"f":null},{"v":210,"f":null}]},
									{"c":[{"v":"CPP","f":null},{"v":72,"f":null},{"V":170,"f":null},{"v":100,"f":null}]},
									{"c":[{"v":"CTT","f":null},{"v":68,"f":null},{"V":477,"f":null},{"v":80,"f":null}]}
								]		
					}';
			return json_decode($bubbleChart);
	}*/
	
	public function getBubbleValues()
	{
	
		$bubbleChart ='{"cols": [  {"id":"","label":"ID","pattern":"","type":"string"},
								{"id":"","label":"Life Expectancy","pattern":"","type":"number"},
								{"id":"","label":"Fertility Rate","pattern":"","type":"number"},
								{"id":"","label":"Region","pattern":"","type":"string"},
								{"id":"","label":"Population","pattern":"","type":"number"}
			 				 ],
		  			"rows": [
								{"c":[{"v":"CAN","f":null},{"v":80.66,"f":null},{"v":1.67,"f":null},{"v":"North","f":null},{"v":33739900,"f":null}]},
								{"c":[{"v":"DEU","f":null},{"v":79.84,"f":null},{"v":1.36,"f":null},{"v":"South","f":null},{"v":81902307,"f":null}]},
								{"c":[{"v":"DNK","f":null},{"v":78.6,"f":null},{"v":1.84,"f":null},{"v":"South","f":null},{"v":5523095,"f":null}]},
								{"c":[{"v":"EGY","f":null},{"v":72.73,"f":null},{"v":2.78,"f":null},{"v":"East","f":null},{"v":79716203,"f":null}]},
								{"c":[{"v":"GBR","f":null},{"v":80.05,"f":null},{"v":2,"f":null},{"v":"South","f":null},{"v":61801570,"f":null}]},
								{"c":[{"v":"IRN","f":null},{"v":72.49,"f":null},{"v":1.7,"f":null},{"v":"East","f":null},{"v":73137148,"f":null}]},
								{"c":[{"v":"IRQ","f":null},{"v":68.09,"f":null},{"v":4.77,"f":null},{"v":"East","f":null},{"v":31090763,"f":null}]},
								{"c":[{"v":"ISR","f":null},{"v":81.55,"f":null},{"v":2.96,"f":null},{"v":"East","f":null},{"v":7485600,"f":null}]},
								{"c":[{"v":"RUS","f":null},{"v":68.6,"f":null},{"v":1.54,"f":null},{"v":"South","f":null},{"v":141850000,"f":null}]},
								{"c":[{"v":"USA","f":null},{"v":78.09,"f":null},{"v":2.05,"f":null},{"v":"North","f":null},{"v":307007000,"f":null}]}
							 ]
				}';
	return json_decode($bubbleChart);
	
	}
	
	public function getAreaValues()
	{
		$areaChart = '{"cols": [  {"id":"","label":"Year","pattern":"","type":"number"},
       							 {"id":"","label":"Sales","pattern":"","type":"number"},
								 {"id":"","label":"Expenses","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":2004,"f":null},{"v":1000,"f":null},{"v":400,"f":null}]},
        						{"c":[{"v":2005,"f":null},{"v":1170,"f":null},{"v":460,"f":null}]},
								{"c":[{"v":2006,"f":null},{"v":660,"f":null},{"v":1120,"f":null}]},
								{"c":[{"v":2007,"f":null},{"v":1030,"f":null},{"v":540,"f":null}]}
        
      						]
					}';

	return json_decode($areaChart);
	}
	
	public function getLineValues()
	{
		$lineChart = '{"cols": [  {"id":"","label":"Year","pattern":"","type":"number"},
       							 {"id":"","label":"Sales","pattern":"","type":"number"},
								 {"id":"","label":"Expenses","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":2004,"f":null},{"v":1000,"f":null},{"v":400,"f":null}]},
        						{"c":[{"v":2005,"f":null},{"v":1170,"f":null},{"v":460,"f":null}]},
								{"c":[{"v":2006,"f":null},{"v":660,"f":null},{"v":1120,"f":null}]},
								{"c":[{"v":2007,"f":null},{"v":1030,"f":null},{"v":540,"f":null}]}
        
      						]
					}';

	return json_decode($lineChart);
	}
	
	public function getColumnValues()
	{
		$columnChart = '{"cols": [  {"id":"","label":"Year","pattern":"","type":"number"},
       							 {"id":"","label":"Sales","pattern":"","type":"number"},
								 {"id":"","label":"Expenses","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":2004,"f":null},{"v":1000,"f":null},{"v":400,"f":null}]},
        						{"c":[{"v":2005,"f":null},{"v":1170,"f":null},{"v":460,"f":null}]},
								{"c":[{"v":2006,"f":null},{"v":660,"f":null},{"v":1120,"f":null}]},
								{"c":[{"v":2007,"f":null},{"v":1030,"f":null},{"v":540,"f":null}]}
        
      						]
					}';

	return json_decode($columnChart);
	}
	
	
	public function getComboValues()
	{
		$comboChart = '{"cols": [  {"id":"","label":"Month","pattern":"","type":"number"},
       							   {"id":"","label":"Bolivia","pattern":"","type":"number"},
								   {"id":"","label":"Ecuador","pattren":"","type":"number"},
								   {"id":"","label":"Madagascar","pattren":"","type":"number"},
								   {"id":"","label":"Papua New Guinea","pattren":"","type":"number"},
								   {"id":"","label":"Rwanda","pattren":"","type":"number"},
								   {"id":"","label":"Average","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							 {"c":[{"v":2004,"f":null},{"v":165,"f":null},{"v":938,"f":null},
								 {"v":522,"f":null},{"v":998,"f":null},{"v":450,"f":null},{"v":614.6,"f":null}]},
								{"c":[{"v":2005,"f":null},{"v":135,"f":null},{"v":1120,"f":null},
								{"v":599,"f":null},{"v":1268,"f":null},{"v":288,"f":null},{"v":682,"f":null}]},
							{"c":[{"v":2006,"f":null},{"v":157,"f":null},{"v":1167,"f":null},
							{"v":587,"f":null},{"v":807,"f":null},{"v":397,"f":null},{"v":623,"f":null}]},
							{"c":[{"v":2007,"f":null},{"v":139,"f":null},{"v":1110,"f":null},
							{"v":615,"f":null},{"v":968,"f":null},{"v":215,"f":null},{"v":609.4,"f":null}]},
							{"c":[{"v":2008,"f":null},{"v":136,"f":null},{"v":691,"f":null},
							{"v":629,"f":null},{"v":1026,"f":null},{"v":366,"f":null},{"v":569.6,"f":null}]}

      						]
					}';

	return json_decode($comboChart);
	}
      
	  public function getSteppedareaValues()
	{
		$steppedareaChart = '{"cols": [  {"id":"","label":"Director (Year)","pattern":"","type":"string"},
       							 {"id":"","label":"Rotten Tomatoes","pattern":"","type":"number"},
								 {"id":"","label":"IMDB","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":"Alfred Hitchcock (1935)","f":null},{"v":8.4,"f":null},{"v":7.9,"f":null}]},
        						{"c":[{"v":"Ralph Thomas (1959)","f":null},{"v":6.9,"f":null},{"v":6.5,"f":null}]},
								{"c":[{"v":"Don Sharp(1978)","f":null},{"v":6.5,"f":null},{"v":6.4,"f":null}]},
								{"c":[{"v":"James Hawes (2008)","f":null},{"v":4.4,"f":null},{"v":6.2,"f":null}]}
        
      						]
					}';

	return json_decode($steppedareaChart);
	}
	    
	public function getTableValues()
	{
		$table = '{"cols": [  {"id":"","label":"Name","pattern":"","type":"string"},
       						  {"id":"","label":"Salary","pattern":"","type":"number"},
							  {"id":"","label":"Full Time Emp","pattren":"","type":"boolean"}
      						  ],
  					"rows": [
       							{"c":[{"v":"Mike","f":null},{"v":10000,"f":null},{"v":true,"f":null}]},
        						{"c":[{"v":"Jim","f":null},{"v":8000,"f":null},{"v":false,"f":null}]},
								{"c":[{"v":"Alice","f":null},{"v":12500,"f":null},{"v":true,"f":null}]},
								{"c":[{"v":"Bob","f":null},{"v":7000,"f":null},{"v":true,"f":null}]}
        
      						]
					}';

	return json_decode($table);
	}
	
	
	
	public function getCandlestickValues()
	{
		$candlestickChart = '{"cols": [  {"id":"","label":"","pattern":"","type":"string"},
       							 {"id":"","label":"","pattern":"","type":"number"},
								 {"id":"","label":"","pattren":"","type":"number"},
								 {"id":"","label":"","pattren":"","type":"number"},
								 {"id":"","label":"","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":"Mon","f":null},{"v":20,"f":null},{"v":28,"f":null},{"v":38,"f":null},{"v":45,"f":null}]},
        						{"c":[{"v":"Tue","f":null},{"v":31,"f":null},{"v":38,"f":null},{"v":55,"f":null},{"v":66,"f":null}]},
								{"c":[{"v":"Wed","f":null},{"v":50,"f":null},{"v":55,"f":null},{"v":77,"f":null},{"v":80,"f":null}]},
								{"c":[{"v":"Thu","f":null},{"v":77,"f":null},{"v":77,"f":null},{"v":66,"f":null},{"v":50,"f":null}]},
								{"c":[{"v":"Fri","f":null},{"v":68,"f":null},{"v":66,"f":null},{"v":22,"f":null},{"v":15,"f":null}]}
        
      						]
					}';

	return json_decode($candlestickChart);
	}
	
	public function getScatterValues()
	{
		$scatterChart = '{"cols": [{"id":"","label":"Age","pattren":"","type":"number"},
								 {"id":"","label":"Weight","pattren":"","type":"number"}
      						  ],
  					"rows": [
       							{"c":[{"v":8,"f":null},{"v":12,"f":null}]},
								{"c":[{"v":4,"f":null},{"v":5.5,"f":null}]},
								{"c":[{"v":11,"f":null},{"v":14,"f":null}]},
								{"c":[{"v":4,"f":null},{"v":5,"f":null}]},
								{"c":[{"v":3,"f":null},{"v":3.5,"f":null}]},
								{"c":[{"v":6.5,"f":null},{"v":7,"f":null}]}
        					]
					}';

	return json_decode($scatterChart);
	}
}
?>

