<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

 
  require('../../fpdf182/fpdf.php');
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

  function Header()
 {

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,28,'  ',1,1,'C',0,false);   //

     $today = date("Y-m-d");

    $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x+147, $y-35);
     $this->SetFont('arial','',8);
     $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
     $this->SetXY($x+150, $y-36);
     $this->SetFont('arial','',8);
     $this->Cell(18,5,'Original PDF',0,1,'L',0,false);
     $this->SetXY($x+172, $y-35);
     $this->SetFont('arial','',8);
     $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
     $this->SetXY($x+175, $y-36);
     $this->SetFont('arial','',8);
     $this->Cell(20,5,'Duplicate PDF',0,1,'L',0,false);
   

     $this->SetXY($x, $y+7);
     $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,16,12);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

     

     $y = $this->GetY();
     $x = $this->GetX();

     
    //  $this->Ln(4);
    //   $y = $this->GetY();
    //  $x = $this->GetX();
     $this->SetXY($x-7, $y-34);
      $this->SetFont('Arial','B',12);
      $this->Cell(200,8,'Wholesale Return Goods',0,1,'C',0,false);  //
     
     $this->SetXY($x-5, $y-16);
     $this->SetFont('Arial','B',14);
     $this->Cell(200,-15,'Signature Concepts LLP ',0,1,'C',0,false);
    
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+19, $y+20);
     $this->SetFont('Arial','',8);
     $this->Cell(150,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);
     $this->SetXY($x+45, $y+23.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);
     $this->SetXY($x+15, $y+26.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Phone No : 7757033204',0,1,'C',0,false);
     $this->SetXY($x+62, $y+26.5);
     $this->SetFont('Arial','',8);
     $this->Cell(100,19,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);

    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-6.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,26,'  ',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y-6.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'  Customer   :',0,1,'L',0,false);  
    $this->SetXY($x+17, $y-6.5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,'  RESHMA',0,1,'L',0,false);  
    
    $this->SetXY($x+125, $y-6.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'C.No.  :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y-6.5);
    $this->SetFont('Arial','',9);
    $this->Cell(15,7,'11 ',0,1,'L',0,false);


    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'  Phone No.  :',0,1,'L',0,false); 
    $this->SetXY($x+17, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,'  9284446511',0,1,'L',0,false); 
    
    $this->SetXY($x+125, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'Date    :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(15,7,'12-Jan-2020 ',0,1,'L',0,false);
    
    
    $this->SetXY($x-5, $y+7);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'  Address     :',0,1,'L',0,false); 
    $this->SetXY($x+17, $y+7);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,'  GANGA SATTALITE BUILDING - S-6, F-1001,',0,1,'L',0,false);
    $this->SetXY($x+17, $y+10.5);
    $this->SetFont('Arial','',9);
    $this->Cell(40,7,'  WANAWADI PUNE',0,1,'L',0,false);

    $this->SetXY($x+125, $y+7);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'PINo.   :',0,1,'L',0,false);  
    $this->SetXY($x+141, $y+7);
    $this->SetFont('Arial','',9);
    $this->Cell(15,7,'PI/19-20/SC/407',0,1,'L',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x-5, $y+5.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,7,'  ',1,1,'C',0,false);   //


    $this->SetXY($x-5, $y+12.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,11,'  ',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y+23.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,6,'  ',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(12,7,'Sr.No',1,1,'C',0,false);

    $this->SetXY($x-5, $y+5.5);
    $this->SetFont('Arial','',9);
    $this->Cell(12,18,' ',1,1,'C',0,false);  //
    $this->SetXY($x-5, $y+13);
    $this->SetFont('Arial','',9);
    $this->Cell(12,8,'1',0,1,'C',0,false);

    $this->SetXY($x+7, $y+5.5);    
    $this->SetFont('Arial','B',9);
    $this->Cell(57,8,' Particulars',0,1,'L',0,false);
    $this->SetXY($x+7, $y+5.5);    
    $this->SetFont('Arial','',9);
    $this->Cell(57,18,'',1,1,'L',0,false); //
    $this->SetXY($x+7, $y+12.5);
    $this->SetFont('Arial','',8);
    $this->Cell(57,8,' 4542IN-CP-GEOMETRIC SHOWERHEAD',0,1,'L',0,false);
    $this->SetXY($x+7, $y+18);
    $this->SetFont('Arial','',8);
    $this->Cell(20,5,' ASSY-NA',0,1,'L',0,false);

    $this->SetXY($x+64, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(14,18,'',1,1,'L',0,false); //
    $this->SetXY($x+64, $y+4.5);
    $this->SetFont('Arial','B',8);
    $this->Cell(14,6,' No.of ',0,1,'L',0,false);
    $this->SetXY($x+64, $y+7.5);
    $this->SetFont('Arial','B',8);
    $this->Cell(14,6,' Goods ',0,1,'L',0,false);
    $this->SetXY($x+64, $y+12.5);
    $this->SetFont('Arial','',9);
    $this->Cell(10,8,'1',0,1,'C',0,false);

    $this->SetXY($x+78, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,18,'',1,1,'L',0,false); //
    $this->SetXY($x+78, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(17,8,'HSN',0,1,'C',0,false);
    $this->SetXY($x+78, $y+12.5);
    $this->SetFont('Arial','',8);
    $this->Cell(17,8,'',0,1,'C',0,false);

    $this->SetXY($x+95, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(16,18,'',0,1,'L',0,false); //
    $this->SetXY($x+95, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(16,7,'GST Rate',0,1,'C',0,false);
    $this->SetXY($x+95, $y+12.5);
    $this->SetFont('Arial','',9);
    $this->Cell(16,8,'0.00 ',0,1,'R',0,false);



   
    $this->SetXY($x+111, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(10,18,'',1,1,'L',0,false);  //
    $this->SetXY($x+111, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(10,8,'Qty',0,1,'C',0,false);
    $this->SetXY($x+111, $y+12.5);
    $this->SetFont('Arial','',9);
    $this->Cell(10,8,'1',0,1,'C',0,false);

    $this->SetXY($x+121, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,18,'',0,1,'C',0,false); //
    $this->SetXY($x+121, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'Rate',0,1,'C',0,false);
    $this->SetXY($x+121, $y+12.5);
    $this->SetFont('Arial','',9);
    $this->Cell(22,8,'2530.00 ',0,1,'R',0,false);
    
    $this->SetXY($x+109, $y+23);
    $this->SetFont('Arial','B',9);
    $this->Cell(10,8,'Total',0,1,'C',0,false);
    $this->SetXY($x+121, $y+23);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,8,'2530.00  ',0,1,'R',0,false);

    $this->SetXY($x+143, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,18,'',1,1,'C',0,false); //
    $this->SetXY($x+143, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,7,'Disc. %',0,1,'C',0,false);
    $this->SetXY($x+143, $y+12.5);
    $this->SetFont('Arial','',9);
    $this->Cell(22,8,'12 %',0,1,'C',0,false);
   

    $this->SetXY($x+170, $y+5.5);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,' Amount  ',0,1,'R',0,false);
    $this->SetXY($x+170, $y+12.5);
    $this->SetFont('Arial','',9);
    $this->Cell(25,8,'2530.00 ',0,1,'R',0,false);
    $this->SetXY($x+170, $y+23);
    $this->SetFont('Arial','B',9);
    $this->Cell(25,8,'2530.00 ',0,1,'R',0,false);


    
    // $this->Ln(20);
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-1.5);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,35,'  ',1,1,'C',0,false);   //


    $this->SetXY($x-1, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Remark     : ',0,1,'L',0,false);
    $this->SetXY($x+15, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'RETURN  ',0,1,'R',0,false);

    $this->SetXY($x-1, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'In Words   : ',0,1,'L',0,false);
    $this->SetXY($x+50, $y+5);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'One Thousand Eight Hundred Fifty ',0,1,'R',0,false);

    $this->SetXY($x-1, $y+14);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'GST No.  :',0,1,'L',0,false);
    $this->SetXY($x+27, $y+14);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'27ADHFS0274J1ZU',0,1,'R',0,false);
    $this->SetXY($x+55, $y+14);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'PAN NO. : ',0,1,'L',0,false);
    $this->SetXY($x+75, $y+14);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'ADHFS0274J',0,1,'R',0,false);


    
    $this->SetXY($x+141, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Process Amt   ',0,1,'L',0,false);
    $this->SetXY($x+174, $y);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'0.00',0,1,'R',0,false);
    $this->SetXY($x+141, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Trans Amt     ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+5);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'0.00',0,1,'R',0,false);
    $this->SetXY($x+141, $y+10);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Discount    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+10);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'962.00',0,1,'R',0,false);
    $this->SetXY($x+141, $y+15);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Tax    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+15);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'282.28',0,1,'R',0,false);
    $this->SetXY($x+141, $y+20);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Other    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+20);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'0.00',0,1,'R',0,false);
    $this->SetXY($x+141, $y+25);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Return Amt    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+25);
    $this->SetFont('Arial','',9);
    $this->Cell(20,8,'1850.00',0,1,'R',0,false);

    $this->SetXY($x+141, $y+33);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'Total    ',0,1,'L',0,false);
    $this->SetXY($x+174, $y+33);
    $this->SetFont('Arial','B',9);
    $this->Cell(20,8,'1850.00',0,1,'R',0,false);

    // $this->SetXY($x+133, $y+45);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'FOR  Signature Concepts LLP.',0,1,'C',0,false);

    // $this->SetXY($x+135, $y+54);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

    // $this->SetXY($x-3, $y+54);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Receiver Sign.',0,1,'L',0,false);
   
   
  

    }

    function Footer()
    {
   
          
    }
   
   }
   $pdf= new this();

   

   $pdf->AliasNbPages();
   
 // $pdf = new PDF('L','mm',array(160,174));
   // // Add new pages
   // // Add new pages
  //  $pdf = new PDF('L','mm',array(160,174));
  
    $pdf->SetAutoPageBreak(true,130);

    $pdf->AddPage();
   //      $pdf->Ln();
   
        $pdf->Output();
   
    ?>   