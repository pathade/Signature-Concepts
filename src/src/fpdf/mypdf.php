<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

    require('fpdf182/fpdf.php');
    // include '../../partials/dbconnection.php';



// returns the number as an anglicized string



// $id = $_GET['pdf_id'];
    //$i=$_GET['id'];

    $code="";
    class PDF extends FPDF
    {

        function Header()
        {

        $today = date("Y-m-d");
        $this->Ln(1);
        $this->Image('uploads/nks_aromas.jpg',15,17,41);


        $this->SetFont('Arial','B',13);
        $this->Cell(55,0,'',0,0);
        $this->Cell(0,5,'Nks aromas',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+1, $y+1);
        $this->Ln(2);


        $this->SetFont('Arial','',8);
        $this->Cell(55,0,'',0,0);
        $this->Cell(89,10,'477b Ravivar peth',0,0);
        $this->SetFont('Arial','',12);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-2);
        $this->Ln(2);

        $this->SetFont('Arial','',8);
        $this->Cell(55,0,'',0,0);
        $this->Cell(89,26,'Pune Maharashtra 411002',0,0);
        $this->SetFont('Arial','',12);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-5);
        $this->Ln(6);


        $this->SetFont('Arial','',8);
        $this->Cell(55,0,'',0,0);
        $this->Cell(89,32,'India',0,0);
        $this->SetFont('Arial','',12);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-6);
        $this->Ln(1);


        $this->SetFont('Arial','',8);
        $this->Cell(55,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-3);
        $this->Cell(11,55,'GSTIN:-',0,0);
        $this->Cell(0,55,'27BVRPS4579P1Z5',0,0);
        $this->SetFont('Arial','B',7);
        $this->Cell(77,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(10);


        $this->SetLineWidth(0.1);
        $this->SetFillColor(255,255,255);
        $this->SetFont('Arial','',22);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+50, $y-4);
        $this->Cell(230,40,'TAX INVOICE ',0,1,'C');
        $this->SetFont('Arial','',11);

        // horizontal line
        $this->Line(10,37,200,37);

        //1.1 first column
        $this->SetFont('Arial','B',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-13);
        $this->Cell(51,1,'#',0,0);
        $this->Cell(51,1,':  INV-001016',0,0);
        $this->SetFont('Arial','',7);
        $this->Cell(88,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(15); 


        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-15);
        $this->Cell(51,10,'Invoice Date',0,0);
        
        $this->SetFont('Arial','B',10);
        $this->Cell(3,10,':',0,'L',0);
        $this->SetFont('Arial','B',10);
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date =date('Y-m-d H:i:s');
        $this->Cell(0,10,"12/11/2020",0,'L',1);
        $this->Cell(87,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(15);


        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-6);
        $this->Cell(51,1,'Terms',0,0);
        $this->SetFont('Arial','B');
        $this->Cell(51,1,':  ADVANCE',0,0);
        $this->Cell(88,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(20); 

        
        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-15);
        $this->Cell(51,1,'Due Date',0,0);
        
        $this->SetFont('Arial','B',10);
        $this->Cell(3,1,':',0,'L',0);
        $this->SetFont('Arial','B',10);
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date =date('Y-m-d H:i:s');
        $this->Cell(0,1,"12/11/2020",0,'L',1);
        $this->Cell(87,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(20);

        // vertical line
        $this->Line(105,37,105,80);
        // horizontal line
        $this->Line(10,58,200,58);
        
        //1.1 second column
        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+95, $y-34);
        $this->Cell(45,1,'Place Of Supply',0,0);
        $this->SetFont('Arial','B',10);
        $this->Cell(45,1,': Gujrat (24)',0,0);
        $this->SetFont('Arial','',7);
        $this->Cell(100,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(19); 
        

        // 1.2 first column
        $this->SetFillColor(242,243,244);
        $this->SetFont('Arial','B',10);
        $this->Cell(-0.1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetFillColor(242,243,244);
        $this->SetFont('Arial','B',9);
        $this->Cell(95,6,'Bill To',1,'L',1,TRUE);
      
        

        // 1.2 second column
        
      
        $this->Ln(20);
        $this->SetFillColor(242,243,244);
        $this->SetFont('Arial','B',10);
        $this->Cell(95,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y-20);
        $this->SetFillColor(242,243,244);
        $this->SetFont('Arial','B',9);
        $this->Cell(95,6,'Ship To',1,'R',1,TRUE);
        

        // 1.3 first column 
        $this->SetFont('Arial','B',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-190, $y-1);
        $this->Cell(1,22,'HAFIZ MUSA TALATI',0,0);
        $this->Ln(50);

        $this->SetFont('Arial','',10);
        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-1, $y-35);
        $this->Cell(1,1,'BHARUCH',0,0);
        $this->Ln(5);

        $this->SetFont('Arial','',10);
        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-1, $y-1);
        $this->Cell(1,1,'8347748493',0,0);
        $this->Ln(5);
        
        $this->SetFont('Arial','',10);
        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-1, $y-1);
        $this->Cell(1,1,'BHARUCH',0,0);
        $this->Ln(5);

        // 1.3 second column 
        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+94, $y-18);
        $this->Cell(120,1,'BHARUCH',0,0);
        $this->Ln(50);
        
        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+94, $y-45.5);
        $this->Cell(120,1,'8347748493',0,0);
        $this->Ln(30);

        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+94, $y-25.5);
        $this->Cell(120,1,'BHARUCH',0,0);
        $this->Ln(50);

        $this->SetFont('Arial','',10);
        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+94, $y-46);
        $this->Cell(120,1,'392230 Gujarat',0,0);
        $this->Ln(50);


        ////border////
            
        $width=$this -> w; // Width of Current Page
        $height=$this -> h; // Height of Current Page
        $edge=10;
        $edge1=10;// Gap between line and border , change this value
        $this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
        $this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
        $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left
        $this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right
        
        /////border end////

        }

    }


    $pdf = new PDF();
    $pdf->AliasNbPages();

    // Add new pages
    // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();






    
      $pdf->Ln();

    $pdf->Output();

?>
