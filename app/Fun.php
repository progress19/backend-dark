<?php

namespace App;
use Image;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Fun extends Model {

	public static function getFormatDateInv($date) { //recupero desde la bd

		if ($date) {

			$date = explode("-",$date);
        	$date = "$date[2]-$date[1]-$date[0]";  
		
			return $date;
			
		}
	
	}

	public static function getStatusParte($status, $parte) {

		if ($status == 1) { 
		
			return '<span class="style="padding: 7px !important;"><i class="fa fa-check"></i> Enviado</span>'; }  
		
		else { 
		
			return "<a href='send-parte/".$parte."'><span class='badge badge-warning'>Enviar</span></a>";
	
		 }
	}

	public static function getIconStatus($status) {

		if ($status==1) {return '<i style="font-size:18px;" class="fa fa-check"></i>';} 
			else {return '<i style="font-size:18px;" class="fa fa-times"></i>';}
		}

	public static function getFormatDate($date) {

		$date = explode("-",$date);
        $date = "$date[2]-$date[1]-$date[0]";  
		
		return $date;
	}

	public static function getCircunscripcion($id) {

		// 1 => 'Capital', 2 => 'San Rafael', 3 => 'Tunuyan', 4 => 'San Martín'
		 
		switch ($id) {

			case '0':
		 		$cir = 'Todas';
		 		break;

		 	case '1':
		 		$cir = 'Capital';
		 		break;
		 	
		 	case '2':
		 		$cir = 'San Rafael';
		 		break;
		 		
		 	case '3':
		 		$cir = 'Tunuyan';
		 		break;
		 		
		 	case '4':
		 		$cir = 'San Martín';
		 		break;		

		 	default:
		 		$cir = '--';
		 		break;
		 } 

		 return $cir;

	}

}
