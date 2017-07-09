<?php

class Car
{
	public $brand;
	public $model;
	public $year;
	public $driver;
	private $price;
	
	public function _construct()
	{
		echo 'Car created';
	}
	
	public function showBrand()
	{
		echo $brand;
	}
	public function showModel()
	{
		echo $model;
	}
	public function setPrice($price)
	{
		$this->price = round($price,2);
		
	}
	public function getPrice($t)
	{
		if ($t = true){
			echo $this->price; 
		}
		else{
			echo number_format($price); 
		}
	}
}


$toyota = new Car;
$toyota->brand = 'Toyota';
$toyota->model = 'Corolla';
$toyota->year = '2000';
$mazda = new Car;
$mazda->brand = 'Mazda';
$mazda->model = '6';
$mazda->year = '2015';
$ford = new Car;
$ford->brand = 'Ford';
$ford->model = 'Taurus';
$ford->year = '1995';
 
class WaterCar extends Car
{
	public $waterSpeed;
}

interface User_interface
{
	public function login();
	public function logout();
	public function __set($name,$val);
	
}


class User implements User_interface
{
	private $login;
	private $password;
	private $email;
	private $raiting = '0';
	public $isLogged;
	
	public function login()
	{
		$this->isLogged = true;
		echo '<pre>';
		echo 'User Online now';
		echo '</pre>';
	}
	public function logout()
	{
		$this->isLogged = false;
		echo '<pre>';
		echo 'User Offline now';
		echo '</pre>';
	}
	
	public function __set($name,$val)
	{
		$this->$name = $val;
	}
	
}

$vitalik = new User;
$vitalik->login = 'trofimenko';
$vitalik->password = 'vitalik';
$vitalik->email = 'trofimenko@ukr.net';

$vasya = new User;
$vasya->login  = 'vasya';
$vasya->password = 'vasya87';
$vasya->email = 'vasya@ukr.net';

$dina = clone $vasya;
$dina->login  = 'dina';
$dina->password = 'dina88';
$dina->email = 'dina@ukr.net';

class Manager extends User
{
	
}
$dima = new Manager;
$dima->login = 'dimon';
$dima->password = 'dima97';
$dima->email = 'dima@ukr.net';

class Admin extends User
{
	
}
$oleg = new Admin;
$oleg->login = 'oleg';
$oleg->password = 'oleg91';
$oleg->email = 'oleg@ukr.net';


class ContactForm
{
	public $name;
	public $email;
	public $mobile;
	
	public function __construct()
	{
		
		$this->name = $_POST['username'];
		$this->email = $_POST['email'];
		$this->mobile = $_POST['phone'];
		
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		
	}
		
}




?>