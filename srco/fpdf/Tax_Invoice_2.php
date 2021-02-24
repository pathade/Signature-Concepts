<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

 
  require('fpdf182/fpdf.php');
    // include '../../partials/dbconnection.php';
    $ones = array(
 "",
 " One",
 " Two",
 " Three",
 " Four",
 " Five",
 " Six",
 " Seven",
 " Eight",
 " Nine",
 " Ten",
 " Eleven",
 " Twelve",
 " Thirteen",
 " Fourteen",
 " Fifteen",
 " Sixteen",
 " Seventeen",
 " Eighteen",
 " Nineteen"
);

$tens = array(
 "",
 "",
 " Twenty",
 " Thirty",
 " Forty",
 " Fifty",
 " Sixty",
 " Seventy",
 " Eighty",
 " Ninety"
);

$triplets = array(
 "",
 " Thousand",
 " Million",
 " Billion",
 " Trillion",
 " Quadrillion",
 " Quintillion",
 " Sextillion",
 " Septillion",
 " Octillion",
 " Nonillion"
);
function convertTri($num, $tri) 
{
        global $ones, $tens, $triplets;

// chunk the number, ...rxyy
$r = (int) ($num / 1000);
$x = ($num / 100) % 10;
$y = $num % 100;

// init the output string
$str = "";

// do hundreds
if ($x > 0)
$str = $ones[$x] . " hundred";

// do ones and tens
if ($y < 20)
$str .= $ones[$y];
else
$str .= $tens[(int) ($y / 10)] . $ones[$y % 10];

// add triplet modifier only if there
// is some output to be modified...
if ($str != "")
$str .= $triplets[$tri];

// continue recursing?
if ($r > 0)
return convertTri($r, $tri+1).$str;
else
return $str;
}


// returns the number as an anglicized string
function convertNum($num) {
$num = (int) $num;    // make sure it's an integer

if ($num < 0)
return "negative".convertTri(-$num, 0);

if ($num == 0)
return "zero";

return convertTri($num, 0);
}


// $id = $_GET['this_id'];
    //$i=$_GET['id'];

     $code="";
     class this extends FPDF
     {
 
     // Page header
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

//----------------------------------------------------------------------------

  function Header()
 {

    $today = date("Y-m-d");

     $this->Image('uploads/user.jpg',15,22.5,16);

     //$this->Line(210,10,10,10);

    
     $this->SetFont('Arial','B',20);

     $this->Cell(120,0,'',0,0);
     $this->Cell(60,45,'ANVI INDUSTRY',0,0);
      
     $this->SetFont('Arial','',12);

       $y = $this->GetY();
       $x = $this->GetX();
               $this->SetXY($x+90, $y-5);

               $this->Ln(6);

   //  $this->Image('uploads/download.jpg',190,8.5,10);
     $this->Ln(10);

     $this->SetFont('Arial','',10);
    // $this->Cell(17,0,' ',0,0);
     $y = $this->GetY();
     $x = $this->GetX();
             $this->SetXY($x, $y);

     $this->SetFont('Arial','B',7);
   //  $this->Cell(77,0,'',0,0);
     $y = $this->GetY();
     $x = $this->GetX();
             $this->SetXY($x, $y+3.5);
    // $this->Cell(68,0,'ISO 9001:2015',0,0);
     $this->Ln(4);

  //   $this->Cell(174.5,0,'',0,0);
     //$this->Cell(68,0,'CERTIFIED UNIT',0,0);

     $this->Ln(7);
  
     $this->SetFont('Arial','',11);
  //  $this->Line(2,30,208,30);
    // $this->Line(140,27,208,27);

     $this->Ln(7);
   
    //  $this->Cell(55,0,'',0,0);
// Background color?php\

$this->SetFont('Arial','B',15);
//$this->SetTextColor(255,255,255);

$this->SetFillColor(255,255,255);
$this->SetTextColor(60,63,94);
$this->Cell(185,10,'Purchase Order',1,1,'C',true);

$this->SetTextColor(0,0,0);
$y = $this->GetY();
$x = $this->GetX();
     $this->SetXY($x+40, $y);

     $this->Ln(1);

     $this->SetFont('Arial','B',12);
// Background color?php
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetFillColor(228,223,236);

     $this->Cell(185,8,"   Vendor                                                                                                   Ship To",1,20,'L',true);
 
     $this->SetXY($x+20, $y+0.8);
  
     $this->Ln(13);
     
    
     $this->SetFont('Arial','',10);
     $this->Cell(30,0,'Customer Name -',0,0);
     $this->Cell(105,0,'XYZ',0,0);
     $this->Cell(27,0,'P.O Number -',0,0);
     $this->Cell(6,0,'58554142',0,0);
    //  $this->Cell(63,0,'Billing Address',0,0);
    // $this->Cell(65,0,'Shipping Address',0,0);
    $this->SetFont('Arial','',10);
    // $y = $this->GetY();
    //  $x = $this->GetX();
    // $this->Cell(0,0,'P.O Number -',0,0);
    // $this->SetXY($x-550, $y+0.9);
     $this->Ln(6);
     $this->SetFont('Arial','',10);
     $this->Cell(30,0,'Company Name -',0,0);
     $this->Cell(105,0,'Pragati Engg Work pvt.ltd.',0,0);
     $this->Cell(27,0,'Invoice Date -',0,0);
     $this->Cell(6,0,'23/12/2020',0,0);
     $this->Ln(6);
     $this->SetFont('Arial','',10);
     $this->Cell(25,0,'Vendor Code -',0,0);
     $this->Cell(117,0,'700270',0,0);
     $this->Cell(20,0,'Tax Due -',0,0);
     $this->Cell(6,0,'5800',0,0);
     $this->Ln(6);
     $this->SetFont('Arial','',10);
     $this->Cell(30,0,'Customer GSTN -',0,0);
     $this->Cell(115,0,'27AADPW3395H1Z8',0,0);
     $this->Cell(17,0,'Mobile -',0,0);
     $this->Cell(111,0,'7776845553',0,0);
     
     $this->Ln(6);
     $this->SetFont('Arial','',10);
     $this->Cell(10,0,'Mail -',0,0);
 
 $this->SetTextColor(29,30,255);
$this->Cell(125,0, 'abhi.turaikar@gmail.com', 'http://www.oreilly.com');
//$this->Output();
 // $this->Cell(121,0 , 'abhi.turaikar@gmail.com',0,'',false,'http://www.google.com/');
 $this->SetTextColor(0,0,0);
  $this->Cell(31,0,'Payment Terms -',0,0);
     $this->Cell(10,0,'10 Days',0,0);

     $this->Ln(10);
       $this->SetFillColor(228,223,236);
       $this->SetFont('Arial','B',9);

       $y = $this->GetY();
       $x = $this->GetX();
       $this->SetXY($x, $y );
       $this->Cell(21,15,'P.O.LINE NO',1,'C',1,true);
       $this->SetXY($x+21, $y );
       $this->MultiCell(31,15,'ITEM CODE',1,'C',1,true);

      //  $this->SetXY($x +52, $y - 12);
      //  $this->MultiCell(10,12,'Item Code',1,1,true);
       $this->SetXY($x+51,$y );
       $this->MultiCell(46,15,'DESCRIPTION',1,'C',1,true);

       $this->SetXY($x+97, $y);
       $this->MultiCell(19,7.5,'QTY  (NOS)',1,'C',1,true);
       $this->SetXY($x +116, $y);
       $this->MultiCell(19,7.5,'QTY  (Weight)',1,'C',1,true);
       $this->SetXY($x +135, $y);
       $this->MultiCell(18,7.5,'QTY  (LENGTH)',1,'C',1,true);
       $this->SetXY($x +153, $y);
       $this->MultiCell(16,15,'RATE',1,'C',1,true);
       $this->SetXY($x +168.5, $y);
       $this->MultiCell(16,15,'AMOUNT',1,'C',1,true);

     $y = $this->GetY();
     $x = $this->GetX();
     //$this->Ln();
     $this->SetXY($x, $y);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'10',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+21, $y-12);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+51, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(46,12,' ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+97, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'10 NOS',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+116, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,' 5.40 KG ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+135, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'50 MM ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+153, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(15.5,12,'60.00',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+168.5, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'324.00',1,1,'C',0,false);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y-12);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'20',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+21, $y-12);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+51, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(46,12,' ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+97, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'30 NOS',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+116, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,' 8.40 KG ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+135, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'10 MM ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+153, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(15.5,12,'60.00',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+168.5, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'324.00',1,1,'C',0,false);
     $this->Ln();
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y-12);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'20',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+21, $y-12);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+51, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(46,12,' ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+97, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'30 NOS',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+116, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,' 8.40 KG ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+135, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'10 MM ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+153, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(15.5,12,'60.00',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+168.5, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'324.00',1,1,'C',0,false);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y-12);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'20',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+21, $y-12);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+51, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(46,12,' ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+97, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'30 NOS',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+116, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,' 8.40 KG ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+135, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'10 MM ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+153, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(15.5,12,'60.00',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+168.5, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'324.00',1,1,'C',0,false);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y-12);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'20',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+21, $y-12);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+51, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(46,12,' ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+97, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'30 NOS',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+116, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,' 8.40 KG ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+135, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'10 MM ',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+153, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(15.5,12,'60.00',1,1,'C',0,false);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+168.5, $y-12);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'324.00',1,1,'C',0,false);

     $this->Ln(3);
     // Position at 1.5 cm from bottom

    //  // Arial italic 8
    //  $this->SetFont('Arial','I',8);
    //  // Page number
    //  $this->Cell(0,290,'Page '.$this->PageNo().'/{nb}',0,0,'C');

     $this->Ln(3);
     $this->line(10,188,196,188);
     $this->line(10,221,108.5,221);
     //$this->SetFillColor(248,203,173);
     $this->Ln(4);
      $this->SetFont('Arial','B',10);
      $this->Cell(48,23,'OUR TAX REGISTRATION',0,'L',0,false);
      $this->Ln();
      $this->SetFont('Arial','',10);
      $this->Cell(42,-10,'Permanent Account No:',0,'L',0,false);

    
      $this->Ln();
      $this->SetFont('Arial','',10);
      $this->Cell(23,18,'GSTIN No: ',0,'L',0,false);
      $this->Ln();
      $this->SetFont('Arial','',10);
      $this->Cell(24.5,-9,'Order Type: ',0,'L',0,false);
      $this->Ln();
      $this->SetFont('Arial','',10);
      $this->Cell(30.5,17,'Purchase Type: ',0,'L',0,false);
      
      $y = $this->GetY();
      $x = $this->GetX();

      $this->SetXY($x+35, $y-13);
      $this->SetFont('Arial','B',9);
      $this->Cell(120.5,5,'            TOTAL',1,1,'L',0,false);

      $y = $this->GetY();
      $x = $this->GetX();

      $this->SetXY($x+99, $y-5);
      $this->SetFont('Arial','',9);
      $this->Cell(19,5,' 40 NOS ',1,1,'L',0,false);

      // $y = $this->GetY();
      // $x = $this->GetX();

      $this->SetXY($x+118, $y-5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,5,' 21.6 KG ',1,1,'L',0,false);

      $this->SetXY($x+136, $y-5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,5,' 200 MM  ',1,1,'L',0,false);

      $this->SetXY($x+154, $y-5);
      $this->SetFont('Arial','',9);
      $this->Cell(14,5,'   ',1,1,'L',0,false);
      
      $this->SetXY($x+168, $y-5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,5,' 1200.00',1,1,'R',0,false);

      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+168, $y);
      $this->SetFont('Arial','',10);
      $this->Cell(18,5,' 10.00',1,1,'R',0,false);

      // $y = $this->GetY();
      // $x = $this->GetX();
      $this->SetXY($x+99, $y-12);
      $this->SetFont('Arial','',10);
      $this->Cell(87,7,'  ',1,1,'R',0,false); // blank

      $this->SetXY($x+99, $y);
      $this->SetFont('Arial','',9);
      $this->Cell(69,5,' OTHER_CHARGES_1 ',1,1,'C',0,false);

      $this->SetXY($x+168, $y+5);
      $this->SetFont('Arial','',10);
      $this->Cell(18,5,' 20.00',1,1,'R',0,false);

      $this->SetXY($x+99, $y+5);
      $this->SetFont('Arial','',9);
      $this->Cell(69,5,' OTHER_CHARGES_2 ',1,1,'C',0,false);

      $this->SetXY($x+168, $y+10);
      $this->SetFont('Arial','',10);
      $this->Cell(18,5,' 30.00',1,1,'R',0,false);

      $this->SetXY($x+168, $y+15);
      $this->SetFont('Arial','',10);
      $this->Cell(18,5.5,' 1260.00',1,1,'R',0,false);

      $this->SetXY($x+99, $y+10);
      $this->SetFont('Arial','',9);
      $this->Cell(69,5,' TOTAL OTHER CHARGES ',1,1,'C',0,false);

      $this->SetXY($x+99, $y+15);
      $this->SetFont('Arial','',9);
      $this->Cell(69,5.5,' SUB TOTAL_1 ',1,1,'C',0,false);

      $this->Ln();
      $this->SetFont('Arial','B',10);
      $this->Cell(41,2,'TERMS & CONDITION',0,'L',0,false);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+58, $y-5.5);
      $this->SetFont('Arial','',10);
      $this->Cell(56,7,'CGST',1,1,'C',0,false);

      $this->SetXY($x+114, $y-5.5);
      $this->SetFont('Arial','',10);
      $this->Cell(13,7,'8%',1,1,'R',0,false);

      $this->SetXY($x+127, $y-5.5);
      $this->SetFont('Arial','',10);
      $this->Cell(18,7,' 106.00',1,1,'R',0,false);

      $this->Ln(2);
      $this->SetFont('Arial','',9);
      $this->Cell(32,9,'FRIGHT : TO PAY ',0,'L',0,false);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+67, $y-2);
      $this->SetFont('Arial','',10);
      $this->Cell(56,6,'SGST',1,1,'C',0,false);

      $this->SetXY($x+123, $y-2);
      $this->SetFont('Arial','',10);
      $this->Cell(13,6,'8%',1,1,'R',0,false);

      $this->SetXY($x+136, $y-2);
      $this->SetFont('Arial','',10);
      $this->Cell(18,6,' 108.00',1,1,'R',0,false);

      $this->Ln(2);
      $this->SetFont('Arial','',9);
      $this->Cell(76,8,'FOR REJECTION MATERIAL AL TRASPORT ON',0,'L',0,false);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+23, $y-2);
      $this->SetFont('Arial','',10);
      $this->Cell(56,8,'IGST',1,1,'C',0,false);

      $this->SetXY($x+79, $y-2);
      $this->SetFont('Arial','',10);
      $this->Cell(13,8,'0%',1,1,'R',0,false);

      $this->SetXY($x+92, $y-2);
      $this->SetFont('Arial','',10);
      $this->Cell(18,8,' 10.00',1,1,'R',0,false);

      $this->Ln();
      $this->SetFont('Arial','',9);
      $this->Cell(48,-8,'INSPECTION AT YOUR END.',0,'L',0,false);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+51, $y-8);
      $this->SetFont('Arial','',10);
      $this->Cell(69,8.5,'SUB TOTAL',1,1,'C',0,false);

      $this->SetXY($x+120, $y-8);
      $this->SetFont('Arial','',10);
      $this->Cell(18,8.5,' 1238.00',1,1,'R',0,false);
      
      $this->line(10,250.5,110,250.5); // line

      $this->Ln();

      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+6, $y-3);
      $this->SetFont('Arial','B',10);
      $this->Cell(41,2,'REQUIRED DOCUMENTS',0,'L',0,false);

      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+52, $y-5.5);
      $this->SetFont('Arial','',9);
      $this->Cell(69,6,'OTHER_CHARGES_1_1',1,1,'C',0,false);

      $this->SetXY($x+121, $y-5.5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,6,'120.00',1,1,'R',0,false);

      $this->SetXY($x+52, $y+0.5);
      $this->SetFont('Arial','',9);
      $this->Cell(69,6,'OTHER_CHARGES_1_2',1,1,'C',0,false);

      $this->SetXY($x+121, $y+0.5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,6,' 10.00',1,1,'R',0,false);

      $this->SetXY($x+52, $y+6.5);
      $this->SetFont('Arial','',9);
      $this->Cell(69,6,'TOTAL OTHER CHARGES_1',1,1,'C',0,false);

      $this->SetXY($x+121, $y+6.5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,6,' 80.00',1,1,'R',0,false);

      $this->SetXY($x+52, $y+12.5);
      $this->SetFont('Arial','',9);
      $this->Cell(69,6,'TOTAL PURCHAE ORDER AMOUNT',1,1,'C',0,false);

      $this->SetXY($x+121, $y+12.5);
      $this->SetFont('Arial','',9);
      $this->Cell(18,6,' 1618.00',1,1,'R',0,false);

      $this->line(10,274.5,110,274.5); // line
      $this->Ln();

      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x, $y-6);
      $this->SetFont('Arial','B',10);
      $this->Cell(186,12,'Amount In Words -',1,1,'L',0,false);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+40, $y-5);
      $this->SetFont('Arial','',10);
      $this->Cell(182,2,'One Thousand Six Hundred Eighteen And Sixteen Paise Only.',0,1,'L',0,false);
      $this->Ln(8);

      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x, $y-2);
      $this->SetFont('Arial','B',10);
      $this->Cell(186,12,' -',1,1,'L',0,false);
      $y = $this->GetY();
      $x = $this->GetX();
      $this->SetXY($x+40, $y-5);
      $this->SetFont('Arial','',10);
      $this->Cell(182,2,'One Thousand Six Hundred Eighteen And Sixteen Paise Only.',0,1,'L',0,false);
    

      $this->Ln(8);
      


      // $this->SetXY($x+99, $y-5);
      // $this->SetFont('Arial','',9);
      // $this->Cell(15,5,' 40 NOS ',1,1,'L',0,false);
      
       $width=$this -> w; // Width of Current Page
       $height=$this -> h; // Height of Current Page
       $edge=10;
           $edge1=188;// Gap between line and border , change this value
       $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left side

       $width=$this -> w; // Width of Current Page
       $height=$this -> h; // Height of Current Page
       $edge=109;
           $edge1=250;// Gap between line and border , change this value
       $this->Line($edge, $edge1,$edge,$height-$edge);// Vetical line at lRight side


     ////border////
    //  $width=$this -> w; // Width of Current Page
    //  $height=$this -> h; // Height of Current Page
    //  $edge=2;
    //      $edge1=7;// Gap between line and border , change this value

    //  $this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
    //  $this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
    //  $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left
    //  $this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right

     /////border end////
 }

 function Footer()
 {

       
 }

}
$pdf= new this();
 $pdf->AliasNbPages();

// // Add new pages
// // Add new pages
 $pdf->SetAutoPageBreak(true,130);
 $pdf->AddPage();
//      $pdf->Ln();

     $pdf->Output();

    ?>





