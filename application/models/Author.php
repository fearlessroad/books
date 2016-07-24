<?php 
class Author extends CI_Model{
	function get_all(){
         return $this->db->query("SELECT name FROM authors")->result_array();
	}
	function get_by_info($arr){
		return $this->db->query("SELECT * FROM books WHERE title=? AND author=?", $arr)->row_array();
	}
	function get_by_name($name){
		return $this->db->query("SELECT * FROM authors WHERE name=?", array($name))->row_array();
	}
	function addAuthor($author){
		return $this->db->query("INSERT INTO authors (name) VALUES (?)", array($author));
	}
	function IfExists($name){
		$query = "SELECT * FROM authors WHERE name = ?";
		return $this->db->query($query, array($name))->row_array();
	}
	// function addBook($arr){
	// 	$query = "INSERT INTO books (title, author) VALUES (?,?)";
	// 	return $this->db->query($query, $arr);
	// }
	// function update($name, $description, $price, $id){
	// 	$query = "UPDATE books SET name = ?, description = ?, price = ? WHERE id = ?";
	// 	$values = array($name, $description, $price, $id);
	// 	return $this->db->query($query, $values);
	// }
	// function remove($id){
	// 	$query = "DELETE from books WHERE id=?";
	// 	return $this->db->query($query, $id);
	// }
}