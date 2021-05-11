<?php

require 'vendor/autoload.php';

// Creating database if it has not been created yet
$database = new \Filebase\Database([
    'dir' => '../Filebase/Filebase/Database/users',
	'backupLocation' => 'Database/Backup'
]);

//Function to record reservations of a user
function displayReservations($database, $username)
{
  $user = $database->get("$username");
  $alertReserves = "Current reservations ($user->name):<br>";
  for($i=0; $i < $user->nbrReserves; $i++)
  { 
     //Requires a \ for \n (assumption: to keep the \n character for echo)
     $alertReserves .= "#" . ($i+1) . ": Day: " . $user->date[$i] . ", Time: " . substr($user->time[$i], 0, 2) . ":" . substr($user->time[$i], 2, 2) . ", Place: " . $user->place[$i] . ", Seats: " . $user->ppl[$i] . "<br>";
  }
  return $alertReserves;
}

// Function to make an order for the logged in user
function makeOrder($database, $orders, $username)
{
	$user = $database->get($username);
	for ($i=0; $i < sizeof($orders); $i++) 
 	{ 
 		$user->orderHistory[] = $orders[$i];
	}
	$user->save();
}

// Function to display logged in user's order history
function displayOrderHistory($database, $username)
{
	$user = $database->get($username);
	$tobeDisplayed = array();

	for ($i=0; $i < sizeof($user->orderHistory); $i++) { 
		array_push($tobeDisplayed, $user->orderHistory[$i]);
	}

	for ($i=0; $i < sizeof($tobeDisplayed); $i++) { 
		echo "<p align=center class=\"finishedorder\">$tobeDisplayed[$i]</p>";
	}
}

// Function to get the user's order history 
function getOrderHistory($database, $username)
{
	$user = $database->get($username);
	$orderHistory = array();

	for ($i=0; $i < sizeof($user->orderHistory); $i++) { 
		array_push($orderHistory, $user->orderHistory[$i]);
	}

	return $orderHistory;
}

//Function to create user
function createUser($database, $email, $password, $firstname, $lastname)
{
	$name = $firstname." ".$lastname;
	$username = strstr($email, '@', true);

	$user = $database->get($username);
	$user->name = $name;
	$user->email = $email;
	$user->password = $password;
	$user->save();
}

// Function for LoginPage to check if user exists in database and has entered the correct password
function checkUser($database, $email, $psw)
{
	$username = strstr($email, '@', true);

	if($database->has($username))
	{
		$user = $database->get($username);

		if($user->password == $psw)
		{
			return true;
		}
	}
	return false;
}

// Function to prevent multiple users with same email
function freshEmail($database, $email)
{
	$users = $database->where('email','==',$email)->results();
	if(count($users) > 0)
	{
		return false;
	}
	return true;
}

// Function to get user's full name
function getName($database, $username)
{
	$user = $database->get($username);
	return $user->name;
}

// Function to get user's first name to display when they log in
function getFirstName($database, $username)
{
	$user = $database->get($username);
	$userFirstName = strstr($user->name, ' ', true);
	return $userFirstName;
}	
?>