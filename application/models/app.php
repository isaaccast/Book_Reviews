<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Model {

	public function register_user($post)
	{  
		$this->form_validation->set_rules("name", "Name","required|min_length[3]");
		$this->form_validation->set_rules("username", "Username","required|min_length[3]");
		$this->form_validation->set_rules("password", "Password","required|min_length[8]|matches[cpassword]");
		$this->form_validation->set_rules("cpassword", "Confirm Password","required|min_length[8]");
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("register_error", validation_errors());
			redirect('/'); 
		} 
		else
		{
			$query = "INSERT INTO users (name, username, password, date_hired, created_at, updated_at) VALUES (?,?,?,?,NOW(), NOW())";
			$password = md5($post['password']);
			$vals = array($post['name'], $post['username'], $password, $post['dated_hired']);
			if($this->db->query($query, $vals))
			{
				$this->session->set_flashdata('register_success', 'You have successfully registered, please login right above!');
				redirect('/'); 
			}
			else
			{
				echo "Bad Query";
				exit(); 
			}
		}
		$this->load->view('user_dashboard'); 
	}

	public function select_user($id)
	{
		$query = "";
		$vals = $id; 
		$user = $this->db->query($query, $vals)->result_array(); 
		$this->load->view('user', array('user' => $user));
	}



	public function get_user($username)
	{
		return $this->db->query("SELECT * FROM users WHERE username = ?", array($username))->row_array();
	}

	public function no_item()
	{
		$this->session->set_flashdata('add_blank', 'Item/Product description cannot be blank');

	}
	public function single_product($id)
	{
		$query = "SELECT products.id, products.description FROM products WHERE products.id = $id";
		return $this->db->query($query)->row_array(); 
	}
	public function last_product()
	{
		$query = "SELECT id FROM products ORDER BY id DESC LIMIT 1";
		$id = $this->db->query($query)->row_array();
		return $id; 
	}

	public function add_item($post, $id)
	{
		$this->form_validation->set_rules("description", "Item/Product", "required|min_length[3]");
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('add_failure', validation_errors());
		}
		else
		{
			$query = "INSERT INTO products(description, added_by, created_at, updated_at) VALUES (?,?,NOW(), NOW())";
			$vals = array($post['description'], $this->session->userdata['name']);
			if($this->db->query($query, $vals)){
				$query2 = "INSERT INTO wishlists(user_id, product_id, created_at, updated_at) VALUES (?,?, NOW(), NOW())";
				$vals2 = array($this->session->userdata['id'], $this->last_product()['id']); 
				if($this->db->query($query2, $vals2)){
					$this->session->set_flashdata('add_success', 'You have successfully added your item');
					$this->load->view('user_dashboard', array('products'=>$this->user_products($id), 'others'=>$this->others($id)));
				}
				// $this->session->set_flashdata('add_success', 'You have successfully added your item');
				// $this->load->view('user_dashboard', array('products'=>$this->user_products($id)));
			}
			else
			{
				echo "Bad Query";
				exit(); 
			}
		}
	}
	public function add_wish($id,$user)
	{
		$query = "INSERT INTO wishlists(user_id, product_id, created_at, updated_at) VALUES (?,?,NOW(), NOW())";
		$vals = array($this->session->userdata['id'], $this->single_product($id)['id']); 
		if($this->db->query($query, $vals)){
			$this->load->view('user_dashboard', array('products'=>$this->user_products($this->session->userdata['id']), 'others'=>$this->others($user)));
		}
	}

	public function user_products($id)
	{
		$query = "SELECT products.id, products.description, products.added_by, products.created_at, wishlists.user_id FROM products LEFT JOIN wishlists ON products.id = wishlists.product_id 
			WHERE wishlists.user_id = $id";
		return $this->db->query($query)->result_array();
	}
	public function others($id)
	{
		$query = "SELECT products.id as id, products.description, products.added_by, products.created_at, users.id as user_id FROM products LEFT JOIN wishlists ON products.id = wishlists.product_id LEFT JOIN users ON wishlists.user_id = users.id WHERE users.id != $id";
		return $this->db->query($query)->result_array(); 
	}
	public function delete_product($id)
	{
		$user = $this->session->userdata['id']; 
		$query2 = "DELETE FROM wishlists WHERE product_id = $id AND user_id = ?";
		$this->db->query($query2,$user); 
		$query = "DELETE FROM products WHERE id  = $id";
		$this->db->query($query); 
		$this->load->view('user_dashboard', array('products'=>$this->user_products($this->session->userdata['id']), 'others'=>$this->others($this->session->userdata['id'])));
	}
	 public function remove_wish($user, $product)
	 {
	 	$query = "DELETE FROM wishlists WHERE product_id = $product AND user_id = $user";
		$this->db->query($query); 
		$this->load->view('user_dashboard', array('products'=>$this->user_products($this->session->userdata['id']), 'others'=>$this->others($user)));
		 
	 }

	 public function show($id)
	 {
	 	$this->load->view('show', array('product'=> $this->single_product($id))); 
	 	
	 }

	
}