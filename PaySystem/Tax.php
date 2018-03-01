<?php
namespace PaySystem;
class Tax {
    private $id;
    private $current_description;
    private $all_values = array(
        "1" => "18",
        "2" => "10",
        "3" => "18/118",
        "4" => "10/110",
        "5" => "0",
        "6" => "NONE"
    );

    public function __construct($id) {
        $this->setId($id);
        $this->setCurrentDescription();
    }

    private function setId($id){
        if (array_key_exists($id)){
            $this->id = $id;
        }
    }

    public function getId(){
        return $this->id;
    }
    
    public function getAllValues(){
        return $this->all_values;
    }

    private function setCurrentDescription(){
        $this->current_description = $all_values[$this->id];
    }

    public function getCurrentDescription(){
        return $this->current_description;
    }
}