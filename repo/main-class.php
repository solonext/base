<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class URL
{
    public $name;

    public $data = array();

    function __construct($route,$require,$data)
    {

        if (isset($_GET['data'])) {
            $dataarray = explode("/", $_GET['data']);
            $array = array('set' => true, 'value' => $dataarray[0]);

            if($dataarray[0]==$route){
              if(file_exists('pages/'.$require.'.blade.php')){
                include_once('pages/'.$require.'.blade.php');
              }
              else{
                include_once('pages/404.blade.php');
              }
            }
        }
    }

    function with($data)
    {
        $this->data = $data;
    }

    function br()
    {
        echo '<br>';
    }

}
function url($route,$require, $d)
{
    return new URL($route,$require,$d);
}


?>
