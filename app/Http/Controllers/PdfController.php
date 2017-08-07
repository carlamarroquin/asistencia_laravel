<?php

namespace App\Http\Controllers;
use App\Marcacion;
use App\Docente;
use DB;
use PDF;
use Datetime;
use Illuminate\Http\Request;
use App\Http\Controllers\CalendarController; 	
use Carbon\Carbon;

class PdfController extends Controller
{
	public function generarPDF(){
		$data=$this->getData();
		//$view=\View::make('invoice',compact('data','invoice'))->render();
		//$pdf=\App::make('dompdf.wrapper');
		$pdf=PDF::loadView('reportes.invoice',['data'=>$data]);
		return $pdf->stream('pruebapdf.pdf');
	}

	public function getData(){
      $marcacion=Marcacion::getMarcacionesReporte();
      return $marcacion;
	}

	public function generarReporte(){
		$data=['title'=>'Generar Reporte de Marcación',
				'subtitle'=>''];
				
		$docentes=Marcacion::getDocentes();
		$data['docentes']=$docentes;
		return view('reportes.generarReporte',$data);

	}

	public function reportePorEmpleado(Request $request){
		//dd($request);

		$data=$this->getDataEmpleado($request);
		//$view=\View::make('invoice',compact('data','invoice'))->render();
		//$pdf=\App::make('dompdf.wrapper');
		$pdf=PDF::loadView('reportes.porEmpleado',['data'=>$data]);
		return $pdf->stream('pruebapdf.pdf');
	}

	public function getDataEmpleado($request){

	  $inicio=new DateTime($request->inicio);
	  $inicio->format('Y-m-d');

	  $fin = new DateTime($request->fin);
	  $fin->format('Y-m-d');
	  
	  $marcacion=Marcacion::getMarcacionesDocente($request->docente,$inicio,$fin);
      return $marcacion;
	}
	public function getReporteAsistencias(){
		$data=['title'=>'Generar Reporte de Marcación',
				'subtitle'=>''];
				
		return view('reportes.generarReporteAsistencia',$data);

	}

	public function reporteAsistencias(Request $request){
		$data=$this->getAsistencias($request->mes);
		
		$pdf=PDF::loadView('reportes.asistencias',['data'=>$data]);
		$pdf->setPaper('Legal', 'landscape');
		return $pdf->stream('informe.pdf');
	}

	
	public function getAsistencias($idMes){
		$mar=Marcacion::getDiasTrabajados($idMes);
		return $mar;
	}

	

}