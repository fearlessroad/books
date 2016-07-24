<?php 
class User extends CI_Model{
	function get_all(){
         return $this->db->query("SELECT * FROM users")->result_array();
	}
	function get_by_id($id){
		return $this->db->query("SELECT * FROM users WHERE id=?", array($id))->row_array();
	}
	function add($arr){
		$query = "INSERT INTO users (name, alias, created_at, updated_at, email, password) VALUES (?,?,?,?,?,?)";
		return $this->db->query($query, $arr);
	}
	function login($arr){
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		return $this->db->query($query, $arr);
	}
	function update($name, $description, $price, $id){
		$query = "UPDATE users SET name = ?, description = ?, price = ? WHERE id = ?";
		$values = array($name, $description, $price, $id);
		return $this->db->query($query, $values);
	}
	function remove($id){
		$query = "DELETE from users WHERE id=?";
		return $this->db->query($query, $id);
	}
}