<?php
  // Update accordingly
  $base_url = ''; // e.g. directory_name/
  $debug = 0; // e.g. 0, 1 //  If set to 1 Debug info will be printed at the bottom of every page.
  $_SESSION['logged_in'] = 0; 	  
  // Error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  function metroConnect()
	{
		global $db_conn;
		try 
		{
			$db_conn = new PDO('mysql:host=localhost;dbname=?', 'USERNAME', 'PASSWORD');
		}
		catch (PDOException $e) 
		{
			echo "Could not connect to database";
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
?>