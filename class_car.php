<?php 
class car {
    // คุณสมบัติ
    public $name;
    public $color;

    //methods

    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }
    

    function set_color($color){
        $this->color = $color;
    }

    function get_color(){
        return $this->color;
    }
        
}


class product {
    public $id;
    public $iname;
    public function __construct($id, $iname){
        $this->id = $id;
        $this->iname = $iname;

    }
    public function info(){
        $id = $this->id;
        $iname = $this->iname;
        return [$id,$iname];
    }
}

?>