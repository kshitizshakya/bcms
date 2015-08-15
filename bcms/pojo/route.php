
<?
class Route
{
	private $path;

    public function Redirect($parameter)
    {
    	$this->path = $parameter;


    }
}


$obj = new Route();
$obj->Redirect("hello");

var_dump($obj); exit;


	
	
	
	
	
