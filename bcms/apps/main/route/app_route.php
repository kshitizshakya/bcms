<?php

//class to store the all url path and controller and action associated with it.

require_once (ROOT . DS . 'pojo' . DS . 'route.php');


class AppRoute {

	private $data ;
	

	public function init($parameter){
		
		$this->data = $parameter;
		
		$this->routeTable();
	}  

	private function routeTable()
	{
		switch ($this->data) {
			case '/':
			case '':
			$route = new Route('home','showHome');				
			break;


			default:
			trigger_error(404,E_USER_ERROR);
			break;

			
		}
		
	}


	
}
