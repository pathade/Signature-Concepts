<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

    require('../../fpdf182/fpdf.php');
    // include '../../partials/dbconnection.php';



// returns the number as an anglicized string



// $id = $_GET['pdf_id'];
    //$i=$_GET['id'];

    $code="";
    class PDF extends FPDF
    {

        function Header()
        {

        // $today = date("Y-m-d");
        // $this->Ln(1);
        // $this->Image('uploads/nks_aromas.jpg',15,17,41);

        $this->SetFont('Arial','B',10);
        $this->Cell(60,0,'',0,0);
        $this->Cell(1,0,'Manual Debit Note',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+0, $y+0);
        $this->Ln(1);

        // horizontal line
        $this->Line(2,15,172,15);



        $this->Cell(2,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y+15);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'Debit Note No :',0,0);
        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-60, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(60,1,'SD/69/20-21/SC',0,0);
        $this->SetFont('Arial','B',10);
        $this->Cell(18,1,'Supplier :',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"NKS IMPEX LLP",0,0);        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(2);


        $this->Cell(17.5,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y+4);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
        $date =date('Y-m-d H:i:s');
        $this->Cell(72,1,'Date :',0,0);
        
        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-60, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(60,1,'12/17/2020 12:00:00AM',0,0);

        $this->SetFont('Arial','B',10);
        $this->Cell(18,1,'Address :',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"657/10/1 ShelkeVasti",0,0);        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(1);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+108, $y+0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,6,"GangaDham Katraj Road, Near",0,0);        
        $this->Ln(1); 
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+108, $y+0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,12,"MABA MATA Mandir, Pune-37",0,0);        
        $this->Ln(1);


        $this->Cell(13,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x, $y+4);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'Branch :',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-71, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(1,1,'Signature Concepts LLP',0,0);


        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-20.5, $y+8);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'Amount :',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-69.5, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(28,1,'0.00',0,0);
        $this->SetFont('Arial','B',10);
        $this->Cell(20,1,'Trans Amt.:',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"1,000.00",0,0);        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-48, $y+0);
        $this->SetFont('Arial','B',10);
        $this->Cell(20,1,'Total Amt.:',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"1,000.00",0,0);        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(1);


        $this->Cell(10,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-5, $y+7);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'TAX 18.00% :',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-63, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(28,1,'0.00',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+1, $y+0);
        $this->SetFont('Arial','B',10);
        $this->Cell(20,1,'Other(+/-) :',0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(0,1,"0.00",0,0);        
        $y = $this->GetY();
        $x = $this->GetX();
        $this->Ln(1);

        
        $this->SetFont('Arial','',10);
        $this->Cell(20,0,'',0,0);
        $this->Cell(1,20,'Your Account has been Debited with Rs: 1,180.00/-',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+1, $y+1);
        $this->Ln(1);


        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-5, $y+15);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'Amount In Words :',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-55, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(28,1,'One Thousand One Hundred Eighty',0,0);
        $this->Ln(1);


        $this->Cell(1,0,'',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+11.5, $y+6);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'Reason :',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-71, $y+0);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(1,1,'xjczs asjdn asjkd asjsj',0,0);
        $this->Ln(1);

        // horizontal line
        $this->Line(2,92,172,92);



        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+10, $y+20);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','B',10);
        $this->Cell(88,1,'Prepared By',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-40, $y+0);
        $this->SetFont('Arial','B',10);
        $this->Cell(20,1,'Checked By',0,0);      
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+33, $y+0);
        $this->SetFont('Arial','B',10);
        $this->Cell(35,1,'Authorised By',0,0);       
        $this->Ln(1);


        $this->Cell(1,0,' ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+10, $y+8);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial','',10);
        $this->Cell(88,1,'XYZ',0,0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x-40, $y+0);
        $this->SetFont('Arial','',10);
        $this->Cell(20,1,'XYZ',0,0);      
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x+33, $y+0);
        $this->SetFont('Arial','',10);
        $this->Cell(35,1,'XYZ',0,0);       
        $this->Ln(1);


            
        $width=$this -> w; // Width of Current Page
        $height=$this -> h; // Height of Current Page
        $edge=2;
        $edge1=2;// Gap between line and border , change this value
        $this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
        $this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
        $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left
        $this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right
        
        /////border end////

        }

    }


    $pdf = new PDF('P','mm',array(206,174));
    $pdf->AliasNbPages();

    // Add new pages
    // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();

      $pdf->Ln();

    $pdf->Output();

?>
