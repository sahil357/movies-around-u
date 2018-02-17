<?php

class users{
	private $db;
	public function __construct(){
		$this->db =new database;
	}

	public function register($data){
		$this->db->query('INSERT INTO user (fname, lname, gender, roll_no,hostel_name,hostel_block,room_no,email,password) VALUES(:fname, :lname, :gender, :roll_no,:hostel_name,:hostel_block,:room_no,:email,:password)');

		$this->db->bind(':fname',$data['fname']);
		$this->db->bind(':lname',$data['lname']);
		$this->db->bind(':gender',$data['gender']);
		$this->db->bind(':roll_no',$data['roll_no']);
		$this->db->bind(':hostel_name',$data['hostel_name']);
		$this->db->bind(':hostel_block',$data['hostel_block']);
		$this->db->bind(':room_no',$data['room_no']);
		$this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);

        if($this->db->execute()){
        	return true;
        }else{
        	return false;
        }
	}
	 public function login($roll_no, $password){
	 	$this->db->query('SELECT * FROM user WHERE roll_no=:roll_no');
	 	$this->db->bind(':roll_no',$roll_no);

	 	$row =$this->db->single();

	 	$hashed_password = $row->password;
	 	if(password_verify($password, $hashed_password)){
	 		return $row;
	 	}else{
	 		return false;
	 	}
	 }

	public function finduserbyroll($roll_no){
		$this->db->query('SELECT * FROM user WHERE roll_no =:roll_no');
		$this->db->bind(':roll_no',$roll_no);

		$row = $this->db->single();

		if($this->db->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}

	public function finduserbyemail($email){
		$this->db->query('SELECT * FROM user WHERE email =:email');
		$this->db->bind(':email',$email);

		$row = $this->db->single();

		if($this->db->rowCount()>0){
			return true;
		}else{
			return false;
		}
	}
}
?>