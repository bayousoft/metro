<?php
  
	// Update accordingly
  $base_url = ''; // e.g. directory_name/	  
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
	//
	
	function metroMessage($message, $class='normal')
	{
		echo '<div class="message ' . $class . '">' . $message . '</div>';
	}

	function metroParam(&$var, $default_var){
			if (! isset($var)){
					$var = $default_var;
					return true;
			} else {
					return false;
			}
	}


  function metroAuthenticate() 
  {
		if (!isset($_SESSION['logged_in']))
		{
			$_SESSION['logged_in'] = 0;
		}
		
		if ($_SESSION['logged_in'] == 0)
		{
			echo '<div class="authenticate"><div class="register_form"><form method="post" id="register">';
			echo '<input type="hidden" name="form_id" value="register">';
			echo '<div><input type="text" name="first_name" value="" placeholder="First name"></div>';
			echo '<div><input type="text" name="last_name" value="" placeholder="Last name"></div>';
			echo '<div><input type="text" name="email" value="" placeholder="Email address"></div>';
			echo '<div class="submit_button"><input type="submit" name="submit" value="Register"></div>';	  	  
			echo '</form></div>';  
			echo '<div class="login_form"><form method="post" id="login">';
			echo '<input type="hidden" name="form_id" value="login">';
			echo '<div><input type="text" name="email" value="" placeholder="Email address"></div>';
			echo '<div><input type="password" name="password" value="" placeholder="Password"></div>';
			echo '<div class="submit_button"><input type="submit" name="submit" value="Log in"></div>';	  
			echo '</form></div></div><br clear="left" />';	  
		}
		
		if ($_SESSION['logged_in'] != 0)
		{	
			$sql = 'SELECT * FROM users WHERE id = :user';
			$stmt = $db_conn->prepare($sql);
			$stmt->execute(array("user" => $_SESSION['logged_in']));
			$user_details = $stmt->fetch();
			echo $user_details['email']; 	
		}
  }
	
	function metroEmailPassword()
	{
		if (!isset($_POST['email']))
		{
			echo '<div align="right"><a href="/">Home</a></div>';
			metroMessage('Please provide your email address and your password will be sent to you');
			echo '<h3>Lost Login</h3>';
			echo '<form id="email-password" method="post">';
			echo '<input type="hidden" name="form-id" value="email-password">';
			echo '<div><input type="text" name="email" placeholder="Email address"></div>';
			echo '<div><input type="submit" name="submit" value="Email Password"></div>';
			echo '</form>';
		}
		else
		{
			echo 'Your password was sent to your email address.';
			// TODO: Send password to email address of record.
		}	
	}
	
	function metroLogOut()
	{
		global $path; 
		if ($path[1] == 'logout')
		{
			session_destroy();
			header('Location: /');
		}
	}	
	
?>