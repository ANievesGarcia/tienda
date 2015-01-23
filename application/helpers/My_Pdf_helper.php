<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('create_pdf')) {

    function create_pdf($html_data, $file_name = "") {
        if ($file_name == "") {
            $file_name = 'report' . date('dMY');
        }
        require 'mpdf/mpdf.php';
        $mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
        $mpdf->SetDisplayMode('fullpage');

		$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

		// LOAD a stylesheet
		//$stylesheet = file_get_contents('mpdf/examples/mpdfstyletables.css');
		$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

		$mpdf->WriteHTML($html,2);

        $mypdf->Output();
    }

}
