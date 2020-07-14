
<?php

class validation extends db {

    public $errors = [];

    public function input($field){
        if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'post'){
            return strip_tags(trim($_POST[$field]));
        } else if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get'){
            return;
        }
    }
    public function validate($field, $label, $rules){

        
    $allRules = explode("|", $rules);
    $inputField = $this->input($field);
    
    if(in_array("required", $allRules)){
        
        if(empty($inputField)){
            return $this->errors[$field] = $label . " je obavezno polje";
        }

    }

    if(in_array('uniqueEmail', $allRules)){

        $uniqueIndex = array_search("uniqueEmail", $allRules);
        $tableIndex  = $uniqueIndex + 1;
        $tableName   = $allRules[$tableIndex];
        $result = mysqli_query($this->connect, " SELECT * FROM " . $tableName . " WHERE " . $field . " = ? ");
        if($result){
            if($result->rowCount() > 0 ){
                return $this->errors[$field] = $label . " već postoji";
            }
        }

    }
    
    if(in_array("min_len", $allRules)){
        $minLenIndex = array_search("min_len", $allRules);
        $valueIndex = $minLenIndex + 1;
        $minValue = $allRules[$valueIndex];
        if(strlen($inputField) < $minValue){
            return $this->errors[$field] = $label . " je previše kratak";
        }

    }

    
    if(in_array("number", $allRules)){
        
        if(gettype($inputField) != "integer"){
            return $this->errors[$field] = $label . " mora da bude broj";
        }

    }

    }

    public function run(){
        if(empty($this->errors)){
            return true;
        } else {
            return false;
        }
    }

}

?>