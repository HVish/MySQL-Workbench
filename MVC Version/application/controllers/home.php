<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('sql');
	}
	public function index()
	{
		$this->load->view('home_view.php');
	}
	public function sql(){
		
		$q = $this->input->post("Query");
		$result = $this->sql->RunQry($q);
		
		if($result === TRUE){
			echo "Query executed successfully";

		}else if($result === FALSE){
			echo "Error Code: ".$this->db->error()['code']."<br>Details: ".$this->db->error()['message'];
		}
		else{
			//for column headers
			echo "<thead>";
			foreach($result->result_array() as $row){
				echo "<tr>";
				foreach($row as $keys => $val){
					echo "<th>{$keys}</th>";
				}
				echo "</tr>";
				break;
			}
			//for rows
			echo "</thead><tbody>";
			foreach($result->result_array() as $row){
				echo "<tr>";
				foreach($row as $key => $val){
					echo "<td>{$val}</td>";
				}
				echo "</tr>";
			}
			echo "</tbody>";
		}
	}
}
