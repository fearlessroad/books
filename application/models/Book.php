<?php 
class Book extends CI_Model{
	function get_all(){
         return $this->db->query("SELECT * FROM books")->result_array();
	}
	function get_by_info($arr){
		return $this->db->query("SELECT * FROM books WHERE title=? AND author_id=?", $arr)->row_array();
	}
	function getAuthorInfoById($id){
		$query = "SELECT books.id, books.title, authors.name FROM books JOIN authors ON books.author_id = authors.id WHERE books.id=?";
		return $this->db->query($query, array($id))->row_array();
	}
	function get_by_id($id){
		return $this->db->query("SELECT * FROM books WHERE id=?", array($id))->row_array();
	}
	function addAuthor($author){
		return $this->db->query("INSERT IGNORE INTO authors (name) VALUES (?)", array($author));
	}
	function addBook($arr){
		$query = "INSERT INTO books (title, author_id) VALUES (?,?)";
		return $this->db->query($query, $arr);
	}
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