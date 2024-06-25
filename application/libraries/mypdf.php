<?php
    
    class mypdf
    {
        public function __construct()
        {
            require_once APPPATH.'third_party/fpdf/fpdf.php';
            require_once APPPATH.'third_party/fpdf/font/helvetica.php';

            $pdf = new FPDF('L');
            $pdf->AddPage();

            $CI=get_instance();
            $CI->fpdf=$pdf;
        }
    }
?>