<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Books extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Book');
		$this->load->model('Review');
		$this->load->model('Author');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
	public function booksHome(){
		$this->load->view('booksHome');
	}
	public function bookprofile($id){
		$bookInfo = $this->Book->getAuthorInfoById($id);
		$reviewInfo = $this->Review->getAllByBookId($id);
		$data = array(
			'bookInfo'=>$bookInfo,
			'reviewInfo'=>$reviewInfo
			);
		$this->load->view('bookprofile',$data);
	}
	public function addPage(){
		$authorList = $this->Author->get_all();
		$obj=array(
			'authorList'=>$authorList);
		$this->load->view('addPage',$obj);
	}
	public function addReviewWithId($id){
		$bookInfo = $this->Book->get_by_id($id);
		$this->form_validation->set_rules('content','Review','trim|required');
		if($this->form_validation->run()==FALSE){
				redirect('/books/bookprofile/'.$bookInfo['id']);
			}
		else {
			$content = $this->input->post('content');
			$stars = $this->input->post('stars');
			$date = date('Y-m-d, H:i:s');
			$id = $this->session->userdata('id');
			$reviewArray = array($content, $stars, $date, $date, $id, $bookInfo['id']);
			$this->Review->addReview($reviewArray);
			redirect('/books/bookprofile/'.$bookInfo['id']);
		}
	}
	public function addReview(){
		// Validation Rules! 
		if($this->input->post('authorWrite')== null){
			$this->form_validation->set_rules('authorDrop','Author Name','trim|required');
		}
		else{
			$this->form_validation->set_rules('authorWrite', 'Author Name', 'trim|required|is_unique[authors.name]');
		}
		$this->form_validation->set_rules('title','Book Title','trim|required');
		$this->form_validation->set_rules('content','Review','trim|required');
		// run validation
			if($this->form_validation->run()==FALSE){
				redirect('books/addPage');
			}
			else{
			// Adding the author, then grabbing that author ID because we need it to add the book itself 
				if ($this->input->post('authorWrite')==null){
					$author = $this->input->post('authorDrop');
				}
				else{
					$author = $this->input->post('authorWrite');
				}
				// check if author exists
				$check = $this->Author->IfExists($author);
				// don't add if author already exists!!
				if(empty($check)){
					$this->Author->addAuthor($author);
				}
				$authorInfo = $this->Author->get_by_name($author);
			// Adding the book now 
				$title = $this->input->post('title');
				$bookArray=array($title, $authorInfo['id']);
				$this->Book->addBook($bookArray);
				$bookInfo = $this->Book->get_by_info($bookArray);
				// var_dump($bookInfo);
				// die('happy');
			// Processing Review Info
				$content = $this->input->post('content');
				$stars = $this->input->post('stars');
				$date = date('Y-m-d, H:i:s');
				$id = $this->session->userdata('id');
				$reviewArray = array($content, $stars, $date, $date, $id, $bookInfo['id']);
				$this->Review->addReview($reviewArray);
				redirect('/books/bookprofile/'.$bookInfo['id']);
			}
	}
}