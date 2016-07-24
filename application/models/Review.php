<?php 
class Review extends CI_Model{
	function get_all(){


         return $this->db->query("SELECT * FROM reviews")->result_array();
	}
	function getAllByBookId($id){
		$query = "SELECT reviews.content, reviews.stars, reviews.user_id, DATE_FORMAT(reviews.created_at, '%M %D, %Y') as date, users.alias from reviews 
			JOIN users on reviews.user_id=users.id 
			WHERE book_id = ?
			ORDER BY reviews.created_at 
			DESC LIMIT 3";
		return $this->db->query($query, array($id))->result_array();
	}
	function getAllByUserId($id){
		$query = "SELECT books.title, books.id
			FROM reviews
			JOIN books on reviews.book_id = books.id
			JOIN authors on books.author_id=authors.id
			WHERE reviews.user_id=?";
			return $this->db->query($query, array($id))->result_array();
	}
	function getNumberReviews($id){
		$query = "SELECT COUNT(reviews.content) as number 
			FROM reviews
			JOIN books on reviews.book_id = books.id
			JOIN authors on books.author_id=authors.id
			WHERE reviews.user_id=?";
		return $this->db->query($query, array($id))->row_array();
	}
	function addReview($arr){
		$query = "INSERT INTO reviews (content, stars, created_at, updated_at, user_id, book_id) VALUES (?,?,?,?,?,?)";
		return $this->db->query($query, $arr);
	}
	function getRecent(){
		$query = "SELECT reviews.content, reviews.stars, DATE_FORMAT(reviews.created_at, '%M %D, %Y %H:%i') as date, books.title, books.id as book_id, users.alias, users.id FROM reviews
				JOIN books on reviews.book_id=books.id
				JOIN users on reviews.user_id=users.id
				ORDER BY date DESC LIMIT 3";
		return $this->db->query($query)->result_array();
	}
	function getAll(){
		$query = "SELECT reviews.content,
		 reviews.stars, 
		 DATE_FORMAT(reviews.created_at, '%M %D, %Y') as date, 
		 books.title, 
		 books.id as book_id, 
		 users.alias, 
		 users.id 
		 FROM reviews 
		 JOIN books on reviews.book_id=books.id 
		 JOIN users on reviews.user_id=users.id 
		 ORDER BY date DESC";
		return $this->db->query($query)->result_array();
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