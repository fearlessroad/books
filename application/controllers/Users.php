<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Review');
		$this->load->model('Book');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
	public function index(){
		$this->load->view('index');
	}
	public function addReview(){
		$this->load->view('addReview');
	}

	public function register(){
			// setting some validation rules!

			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('alias','Alias','trim|required|is_unique[users.alias]');
			$this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]|valid_email');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');

			// run validation rules; 

			if ($this->form_validation->run()== FALSE){
				$this->load->view('index');
			}
			else{
			$name = $this->input->post('name');
			$alias = $this->input->post('alias');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$date = date('Y-m-d, H:i:s');
			$userdata = array($name, $alias, $date, $date, $email, $password);
			$this->User->add($userdata);
			redirect("/");
		}
	}
	public function login(){
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$logindata = array($email, $password);
			$result = $this->User->login($logindata)->row_array();
				if(empty($result)){
					redirect('/');
				}
				else{
					$this->session->set_userdata('loggedin',true);
					$this->session->set_userdata('id',$result['id']);
					// redirect("/users/userprofile/".$result['id']);
					redirect('/users/welcomeUser/');
				}
	}	
	public function welcomeUser(){
		$id = $this->session->userdata('id');
		$userdata= $this->User->get_by_id($id);
		$recent = $this->Review->getRecent();
		$allReviews = $this->Review->getAll();
		$all = array(
			'userdata'=>$userdata,
			'recent'=>$recent,
			'allReviews'=>$allReviews);

		$this->load->view('welcomeUser',$all);
	}
	public function userProfile($id){
		$thisData = $this->User->get_by_id($id);
		$reviewData = $this->Review->getAllByUserId($id);
		$number = $this->Review->getNumberReviews($id);
		$all = array(
			'thisData'=>$thisData,
			'reviewData'=>$reviewData,
			'number'=>$number);
		$this->load->view('userprofile', $all);
	}
		public function logoff($id){
			$this->session->unset_userdata();
			$this->session->sess_destroy();
			redirect("/");
		}
}