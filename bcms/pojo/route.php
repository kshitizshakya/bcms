
<?php

class Route
{
	private $path;
	private $controller;
	private $action;

	public function __construct($p1,$p2){
		$this->controller = $p1;
    	$this->action = $p2;
	    $this->Redirect();
	}
    
    public function Redirect(){
        loadController($this->controller,$this->action);
    }


}




/*$obj = new Route();
$obj->Redirect("hello");

var_dump($obj); exit;*/


	
	
	
	
	
