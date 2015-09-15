<?php

class Users_model extends CI_Model{

	private $cookieDelimiter	=	'#@#';

		private $email		=	'';
		private $password	=	'';
		private $salt		=	'';
		private $usertype	=	'';



	public function __construct()
    {
        $this->load->database();
        $this->load->helper('cookie');
        $this->load->helper('date');
	}
	

	public function email_exist($email)
	 {
	   $this -> db -> select('id, email');
	   $this -> db -> from('users');
	   $this -> db -> where('email', $email);
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->row_array();
	   }
	   else
	   {
	     return false;
	   }
	 }

	
 	public function register( $email, $password )
	{
		$register = false;

		if ( !$this->email_exist( $email ) )
		{
			$usertype	=	1;

			$salt 	=	$this->generateSalt();

			$hashedPassword = $this->hash( $password, $salt );

		$data = array(
	        'email' => $email,
	        'password' => $hashedPassword,
	        'salt' => $salt,
	        'user_type' =>  $usertype,
	        'date' => now()
	        );

    		$this->db->insert('users', $data);

			$this->email 		=	$email;
			$this->salt			=	$salt;
			$this->usertype		=	$usertype;

			$this->createCookie();

			$register	=	true;
			
		}
		else
		{
			$this->session->set_flashdata('flashError', "Er bestaat reeds een gebruiker met dit email adres. Kies een ander.");
		}
		
		return $register;
	}


 	public function login( $email, $password )
	{
		$login = false;

		if ( $this->email_exist( $email ) )
		{
			$this -> db -> select('password, salt');
   			$this -> db -> from('users');
   			$this -> db -> where('email', $email);
   			$this -> db -> limit(1);

   			$query = $this -> db -> get();

      		$result = $query->row_array();
   			
			$this->email 	=	$email;
			$this->salt		=	$result['salt'];
			$this->password	=	$result['password'];

			$saltedInputPassword = $this->hash( $password, $this->salt );

			if ( $this->password === $saltedInputPassword )
			{
				$this->createCookie();
				$login = true;
			}
			else
			{
				$this->session->set_flashdata('flashError', "Oeps, je gebruikersnaam en/of pasoord waren niet juist. Probeer opnieuw.");
			}
		}
		else
		{
			$this->session->set_flashdata('flashError', "Oeps, je gebruikersnaam en/of pasoord waren niet juist. Probeer opnieuw.");
		}
		
		return $login;
	}



	public function logout()
	{
		$loggedOut = false;

		set_cookie( "authenticate", "", 0);

		$loggedOut	=	true;

		return $loggedOut;
	}


 	public function validate()
	{
		$isValid = false;

		if (  get_cookie('authenticate')  )
		{
			$cookie	=	get_cookie('authenticate');

			$rawCookieData	=	explode( $this->cookieDelimiter, $cookie );

			$cookieEmail		=	$rawCookieData[ 0 ];
			$cookieHashedEmail	=	$rawCookieData[ 1 ];


			$this -> db -> select('salt');
   			$this -> db -> from('users');
   			$this -> db -> where('email', $cookieEmail);
   			$this -> db -> limit(1);
 
   			$reslut = $this -> db -> get();

			if ( $result )
			{
				$this->salt		=	$result[0]['salt'];

				$hashedEmail 	=	$this->hash( $cookieEmail, $this->salt );

				if ( $hashedEmail === $cookieHashedEmail )
				{
					$this->email = $cookieEmail;
					$isValid	=	true;
				}
			}
			
		}

		return $isValid;
	}


	public function generateSalt()
		{
			$salt = uniqid(mt_rand(), true);

			return $salt;
		}


	public function hash( $text, $salt )
		{
			$saltedText	=	$salt . $text;
			$hash = hash( 'sha512', $saltedText );

			return $hash;
		}


	public function createCookie()
		{
			$timeToLive	=	60 * 60 * 24 * 30; // 30 dagen;
			$email	=	$this->email;
			$salt	=	$this->salt;

			$hashedEmail 	=	$this->hash( $email, $salt );

			$cookieValue 	=	$email . $this->cookieDelimiter . $hashedEmail;

			$cookie = array(
				'name'   => 'authenticate',
				'value'  => $cookieValue,
				'expire' => $timeToLive	
				);

			set_cookie($cookie);
		}


	public function getEmail()
		{
			return $this->email;
		}

}
