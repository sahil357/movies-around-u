<?php
class user extends Controller {
  public function __construct(){
    $this->usermodel =$this->model('users');
}
  //function for default webpage
public function index(){
 $data=[];
 $this->view('home',$data);
}
  // function with operations of register
public function register(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //int post function
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'fname' => trim($_POST['fname']),
            'lname' => trim($_POST['lname']),
            'gender' => trim($_POST['gender']),
            'roll_no' => trim($_POST['roll_no']),
            'hostel_name' => trim($_POST['hostel_name']),
            'hostel_block' => trim($_POST['hostel_block']),
            'room_no' => trim($_POST['room_no']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' =>trim($_POST['confirm_password']),
            'fname_err' => '',
            'lname_err' => '',
            'gender_err' =>'',
            'roll_no_err' => '',
            'hostel_err' =>'',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' =>''
        ];
        //VALIDATE EMAIL
        if(empty($data['email'])){
            $data['email_err']='fill in your email address';
        }else{
            if($this->usermodel->finduserbyemail($data['email'])){
             $data['email_err']='email is already taken';
         }
     }
        //validate first name
     if(empty($data['fname'])){
        $data['fname_err']='fill in your first name';
    }
        //validate last name
    if(empty($data['lname'])){
        $data['lname_err']='fill in your last name';
    }
        //validate roll number
    if(empty($data['roll_no'])){
        $data['roll_no_err']='fill in your roll number';
    }elseif(strlen($data['roll_no'])!=9)
    {
        $data['roll_no_err']='enter a valid roll number';
    }else{
        if($this->usermodel->finduserbyroll($data['roll_no'])){
         $data['roll_no_err']='roll number is already taken';
     }
 }


 if(empty($data['gender'])){
    $data['gender_err']='Hostels are based on gender, so please enter your gender ';
}
if(empty($data['hostel_name']) || empty($data['hostel_block']) || empty($data['room_no'])){
    $data['hostel_err']='please enter your complete hostel details';
}
if(empty($data['password'])){
    $data['password_err']='fill in a password';
}elseif(strlen($data['password'])<6)
{
    $data['password_err']='password entered is too short';
}
if(empty($data['confirm_password'])){
    $data['confirm_password_err']='please confirm the entered password';
}elseif($data['password']!=$data['confirm_password'])
{
    $data['confirm_password_err']='entered password doesnot match';
}
if(empty($data['fname_err']) && empty($data['lname_err']) && empty($data['roll_no_err']) && empty($data['email_err']) && empty($data['gneder_err']) &&
   empty($data['password_err']) && empty($data['confirm_password_err']))
{
            //hash password
    $data['password']= password_hash($data['password'],PASSWORD_DEFAULT);

            //REGISTER USER
    if($this->usermodel->register($data)){
        flash('register_success','you are successfully register and now you can log in');
        redirect('user/login');
    }else{
        die('something went wrong');
    }

        }else{//load view with error
            $this->view('user/register', $data);
        }
        
        
    }else{
      $data = [
        'fname' => '',
        'lname' => '',
        'gender' => '',
        'roll_no' => '',
        'hostel_name' =>'',
        'hostel_block' => '',
        'room_no' =>'',
        'email' => '',
        'password' => '',
        'confirm_password' =>'',
        'fname_err' => '',
        'lname_err' => '',
        'gender_err' =>'',
        'roll_no_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' =>''
    ];
    $this->view('user/register', $data);
}
}




public function login(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'roll_no' => trim($_POST['roll_no']) ,
            'password' => trim($_POST['password']),
            'roll_no_err' => '',
            'password_err' => ''
        ];
        
        if(empty($data['roll_no'])){
            $data['roll_no_err']='fill in your roll number';
        }elseif(strlen($data['roll_no'])!=9)
        {
            $data['roll_no_err']='enter a valid roll number';
        }
        //check by roll number
        if($this->usermodel->finduserbyroll($data['roll_no'])){
            //user found
        }else{
            $data['roll_no_err']='no user found';
        }

        if(empty($data['password'])){
            $data['password_err']='fill in a password';
        }elseif(strlen($data['password'])<6)
        {
            $data['password_err']='password entered is too short';
        }
        
        if(empty($data['roll_no_err']) && empty($data['password_err']))
        {
            //creating session
            $loggeduser = $this->usermodel->login($data['roll_no'],$data['password']);

            if($loggeduser){
                $this->createusersession($loggeduser);

            }else{
                $data['password_err']='password incorrect';

                $this->view('user/login', $data);
            }
            
        }else{
            //load view with error
            $this->view('user/login', $data);
        }
    }else{
      $data = [
        'roll_no' => '',
        'password' => '',
        'roll_no_err' => '',
        'password_err' => '',
    ];
    $this->view('user/login', $data);
}
}

public function createusersession($user){
    $_SESSION['user_id']= $user->id;
    $_SESSION['user_roll_no']= $user->roll_no;
    $_SESSION['user_name']= $user->name;
    redirect('home');
}
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_roll_no']);
      unset($_SESSION['user_name']);
      session_destroy();
        redirect('user/login');
    }
   public function isloggedin(){
      if(isset($_SESSION['user_id'])){
          return true;
      }else{
          return false;
      }
   }
}