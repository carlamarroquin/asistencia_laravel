<?php

namespace App\Http\Controllers;
use App\Marcacion;
use Barryvdh\DomPDF\Facade\PDF;

class PdfController extends Controller
{
	public function invoice(){
		$data=$this->getData();
		$view=\View::make('invoice',compact('data','invoice'))->render();
		//$pdf=\App::make('dompdf.wrapper');
		$pdf=PDF::loadView($view);
		return $pdf->stream('invoice');
	}

	public function getData(){
      $marcacion=Marcacion::getMarcaciones();
      return $marcacion;
	}
}