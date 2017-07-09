<?php
class Fraction
{
	public $x ;
	public $y ;
	public static $rez;
	public static function test($x,$y)
	{
	    	if ($y!=0){
			self::$rez = $x/$y;
			}else{
			throw new Exception('You are trying Divisioning by zero!!!!!');
			}
			
	
    try{
	self::$rez = $x/$y;	
	}catch(Exception $e){
		echo $e->getMessage();
    }
	
	}
}
	

Fraction::test(2,0);

?>