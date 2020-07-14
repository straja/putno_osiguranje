<?php

class db {

    public $connect;
    public function __construct() {
        try {

			$this->connect = mysqli_connect('localhost', 'root', '', 'osiguranje');

        } catch(Exception $e){
            echo "Connection error: ". $e->getMessage();
        }
	}
	
	public function selectAll() {
		$query = "SELECT * FROM osiguranja";
		return mysqli_query($this->connect, $query);
	}

	public function selectAllSort($sort) {
		$query = "SELECT * FROM osiguranja ORDER BY $sort";
		return mysqli_query($this->connect, $query);
	}

	public function selectAllGrupna($id) {
		$query = "SELECT * FROM grupno WHERE osiguranje_id=$id";
		return mysqli_query($this->connect, $query);
	}

	public function insert($punoime, $drodj, $pasos, $tel, $email, $od, $do, $tip) {
		$query = "INSERT INTO osiguranja (punoime, drodj, pasos, telefon, email, od, do, individualno) VALUES ('$punoime',STR_TO_DATE('$drodj', '%Y-%m-%d'),$pasos, $tel, '$email', STR_TO_DATE('$od', '%Y-%m-%d'), STR_TO_DATE('$do', '%Y-%m-%d'), $tip)";
		if(mysqli_query($this->connect, $query)) {
			return mysqli_insert_id($this->connect);
		} else {
			return false;
		}
	}

	public function insertGrupno($osiguranje_id, $punoime, $pasos) {
		$query = "INSERT INTO grupno (osiguranje_id, punoime, pasos) VALUES ($osiguranje_id,'$punoime',$pasos)";
		return mysqli_query($this->connect, $query);
	}
}


?>