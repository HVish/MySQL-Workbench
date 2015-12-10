<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sql extends CI_Model {
	public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	public function RunQry($q){
		try{
			$result = $this->db->query($q);
			return $result;
		}catch(Exception $e){
			return FALSE;
		}
	}
}