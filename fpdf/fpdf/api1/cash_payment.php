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

      function RoundedRect($x, $y, $w, $h, $r, $style = '')
{
$k = $this->k;
$hp = $this->h;
if($style=='F')
    $op='f';
elseif($style=='FD' || $style=='DF')
    $op='B';
else
    $op='S';
$MyArc = 4/3 * (sqrt(2) - 1);
$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
$xc = $x+$w-$r ;
$yc = $y+$r;
$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
$xc = $x+$w-$r ;
$yc = $y+$h-$r;
$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
$xc = $x+$r ;
$yc = $y+$h-$r;
$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
$xc = $x+$r ;
$yc = $y+$r;
$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
$this->_out($op);
}
function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
 {
     $h = $this->h;
     $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
         $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
 }
 



        function Header()
        {

              $this->SetLineWidth(0.1);
      $this->SetFillColor(255,255,255);
  
  
  //    $this->RoundedRect(70, 22, 70, 9, 2.5, 'DF');
    
    
     //$this->Cell(10,0,'TAX INVOICE ',0,1);
     $this->SetFont('Arial','',50);
     //$this->Line(2,27,70,27);
   // $this->Line(140,27,208,27);
            $this->RoundedRect(8, 22, 158,80, 2.5, 'DF');

        
            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+56, $y+16);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Petty Cash Payment',0,1);

            $this-> Ln(5);
        
            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+53.5, $y);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Signature Concept LLP',0,1);

            $this-> Ln(5);
            $y = $this->GetY();
            $x = $this->GetX();
                     $this->SetXY($x+35, $y);
                     $this->SetFont('arial','',7);
                     $this->Cell(10,0,'S NO-651/ 25/ 1,GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1);
            $this-> Ln(2);
            $y = $this->GetY();
            $x = $this->GetX();
                      $this->SetXY($x+35, $y+1);
                       $this->SetFont('arial','',7);
                       $this->Cell(10,0,'OPP SHREEJI LAWNS, BIBWADI, PUNE - 411037, MAHARASHTRA, INDIA',0,1);
             $this-> Ln(2);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+68, $y);
             $this->SetFont('arial','',7);
             $this->Cell(10,0,'Ph.No.7757033204',0,1);
            
             $this->Line(8,43,166,43); //line
        
             $this-> Ln(7);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+13, $y);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Voucher No.:',0,1);

             $this->SetXY($x+37, $y);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'PV/267/SC/20-21',0,1);

             $this->Line(45,50,87,50); //line

             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+80, $y);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Voucher Date:',0,1);

             $this->SetXY($x+105, $y);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'31-DEC-2020',0,1);
            
             $this->Line(113,50,150,50); //line

             $this-> Ln(7);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+18, $y);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Given To:',0,1);

             $this->SetXY($x+37, $y);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'SAGAR AUTO',0,1);

             $this->Line(45,57,150,57); //line

             $this-> Ln(7);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+20, $y);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Against:',0,1);

             $this->SetXY($x+37, $y);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'TRASNPORT',0,1);

             $this->Line(45,64,150,64); //line

             $this-> Ln(7);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+18, $y);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Narration:',0,1);

             $this->SetXY($x+37, $y);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'P H DIAGNOSTIC CENTER WTI 228',0,1);

             $this->Line(45,72,150,72); //line

             $this-> Ln(12);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+12, $y);
             $this->SetFont('arial','B',9);
             $this->Cell(10,0,'Amt In Words:',0,1);

             $this->SetXY($x+36, $y);
             $this->SetFont('arial','',9);
             $this->Cell(10,0,'',0,1);

             $this->Line(45,84,150,84); //line

             $this-> Ln(10);
             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+15, $y);
             $this->SetFont('arial','B',9);

             $this->MultiCell(35,9,'  Rs.: ',1,1,true);

             $this->SetXY($x+26, $y+2);
             $this->SetFont('arial','B',10);
             $this->MultiCell(20,5,'       200.00',0,'L',1,true);

             $y = $this->GetY();
             $x = $this->GetX();
             $this->SetXY($x+58, $y-7);
             $this->SetFont('arial','B',9);
             $this->MultiCell(35,9,' ',1,1,true);

             $this->SetXY($x+60, $y-6);
             $this->SetFont('arial','B',9);
             $this->MultiCell(30,5,'Authorised By ',0,'C',1,true);
            //  $this->MultiCell(35,8,'  ',1,1,true);
           
            //  $this->MultiCell(35,8,'Authorised By: ',1,1,true);
          
            //  $this->SetXY($x+103, $y-8);
            //  $this->SetFont('arial','B',9);

            $this->SetXY($x+58, $y-1);
            $this->SetFont('arial','B',9);
             $this->MultiCell(32,2,'ADMIN',0,'C',1,true);
             $this->SetXY($x+103, $y-7);
             $this->SetFont('arial','B',9);
             $this->MultiCell(35,9,'',1,'C',1,true);

             $this->SetXY($x+105, $y-2.5);
             $this->SetFont('arial','B',9);
             $this->MultiCell(29,4,"Reciever's Sign.",0,'C',1,true);
             
             
            
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
