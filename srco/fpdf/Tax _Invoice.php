<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

    require('fpdf/fpdf.php');
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
function convertTri($num, $tri) {
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

   // include('../../partials/dbconnection.php');


   // //$this_name = $_GET['this_name'];
   //   $id = $_GET['this_id'];
     
   //   $view_sql="SELECT mc.name as cname ,baddr1,baddr2,baddr3,bpin,saddr1,saddr2,saddr3,spin,si.date as date
   //   FROM sales_invoice si,mstr_customer mc
   //   WHERE sales_invoice_no='$id' and si.customer_id_fk=mc.id";
   //   $show_result=mysqli_query($db,$view_sql) or die(mysqli_error($db));
   //$view_row = mysqli_fetch_assoc($show_result);
    //  $quot_date="";
    //  while ($view_row = mysqli_fetch_array($show_result))
    //  {
    //    $cname=$view_row['cname'];
    //    $baddr1=$view_row['baddr1'];
    //    $baddr2=$view_row['baddr2'];
    //    $baddr3=$view_row['baddr3'];
    //    $bpin=$view_row['bpin'];
    //    $saddr1=$view_row['saddr1'];
    //    $saddr2=$view_row['saddr2'];
    //    $saddr3=$view_row['saddr3'];
    //    $spin=$view_row['spin'];
    //      $sidate=$view_row['date'];


    //   }

    
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
       //$this->Cell(85,0,'('.$this_name.')',0,0);
               $this->Ln(6);

    $this->Image('uploads/download.jpg',190,8.5,10);
     $this->Ln(10);

     $this->SetFont('Arial','',10);
    $this->Cell(17,0,' ',0,0);
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
   
  
// Background color?php\

$this->SetFont('Arial','B',15);

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

       
// ->Cell(28,6,'Purchase Order No',1,'L',1);
   //$this->MultiCell(65,12,'Item Code',1,1,true);
       $y = $this->GetY();
       $x = $this->GetX();

       $this->SetXY($x, $y );
       $this->Cell(21,15,'P.O.LINE NO',1,'C',1,true);
       $this->SetXY($x+21, $y );
       $this->MultiCell(31,15,'ITEM CODE',1,'C',1,true);

      //  $this->SetXY($x +52, $y - 12);
      //  $this->MultiCell(10,12,'Item Code',1,1,true);
       $this->SetXY($x+51,$y );
       $this->MultiCell(52,15,'DESCRIPTION',1,'C',1,true);

       $this->SetXY($x+99, $y);
       $this->MultiCell(19,7.5,'QTY  (NOS)',1,'C',1,true);
       $this->SetXY($x +118, $y);
       $this->MultiCell(19,7.5,'QTY  (Weight)',1,'C',1,true);
       $this->SetXY($x +136, $y);
       $this->MultiCell(18,7.5,'QTY  (LENGTH)',1,'C',1,true);
       $this->SetXY($x +154, $y);
       $this->MultiCell(16,15,'RATE',1,'C',1,true);
       $this->SetXY($x +170, $y);
       $this->MultiCell(16,15,'AMOUNT',1,'C',1,true);
     
     
     $y = $this->GetY();
     $x = $this->GetX();

     //$this->Ln();
     $this->SetXY($x, $y);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'        10',1,'C',1,false);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(48,12,' ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'10 NOS',1,'C',1);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,' 5.40 KG ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'50 MM ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'60.00',1,'C',0);
     $this->SetFont('Arial','',12);
     $this->Cell(16,12,'324',1,'C',0);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'        20',1,'C',1,false);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(48,12,' ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'10 NOS',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,' 5.40 KG ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'50 MM ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'60.00',1,'L',0);
     $this->SetFont('Arial','',12);
     $this->Cell(16,12,'324',1,'C',0);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'        30',1,'C',1,false);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(48,12,' ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'10 NOS',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,' 5.40 KG ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'50 MM ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'60.00',1,'L',0);
     $this->SetFont('Arial','',12);
     $this->Cell(16,12,'324',1,'C',0);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'        40',1,'C',1,false);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(48,12,' ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'10 NOS',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,' 5.40 KG ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'50 MM ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'60.00',1,'L',0);
     $this->SetFont('Arial','',12);
     $this->Cell(16,12,'324',1,'C',0);
     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x, $y);
     $this->SetFont('Arial','',11);
     $this->Cell(21,12,'        50',1,'C',1,false);
     $this->SetFont('Arial','',8);
     $this->Cell(30,12,'RMRB36MMGR45C8',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(48,12,' ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(19,12,'10 NOS',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,' 5.40 KG ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(18,12,'50 MM ',1,'C',0);
     $this->SetFont('Arial','',10);
     $this->Cell(16,12,'60.00',1,'L',0);
     $this->SetFont('Arial','',12);
     $this->Cell(16,12,'324',1,'C',0);

     $this->Ln(17);

    
  
        
        $x = $this->GetX();
        $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+112, $y);
     $this->SetFont('Arial','B',11);
     $this->Cell(20,8,' TOTAL',1,'C',1,false);
        $this-> Ln(0);
     
       $this->SetFont('Arial','B',9);
       $this->Cell(2,7,'',0,'',0);
       
       $this->Ln(2);
// $this->SetFont('Arial','B',10);
//  $this->Cell(70,55,'OUR TAX REGISTRATION ',1,0,'L',0);
//  $this->Ln();

//  $y = $this->GetY();
//  $x = $this->GetX();
//  $this->SetXY($x-1.5,$y+8);
//  $this->SetXY($x, $y-1);
//  $this->SetFont('Arial','B',10);
//  $this->Cell(90,30,'TERMS & CONDITIONS',1,'L',1,false);
 
// $y = $this->GetY();
// $x = $this->GetX();
// $this->SetXY($x, $y-2);
// $this->SetFont('Arial','',9);
// $this->Cell(87,6,'40 NOS',1,'C',1,false);


//        $this->Ln(7);
//        $lineHeight=2;
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x, $y-28);
//         $this->SetFont('Arial','',10);
//         $this->Cell(112,5,'Permanent Account No:',0,0,'L',false);
//         $y = $this->GetY();
//         $x = $this->GetX();
//         $this->SetXY($x-11, $y-1);
//         $this->SetFont('Arial','',9);
//         $this->Cell(87,6,'OTHER_CHARGES_1',1,'C',1,false);
//         $this->Ln(7);
        
//         $this->SetFont('Arial','',10);
//         $this->Cell(150,5,'GSTIN No:',0,0,'L',false);
//         $y = $this->GetY();
//         $x = $this->GetX();
//           $this->SetXY($x-51, $y-1);
//           $this->SetFont('Arial','',9);
//           $this->Cell(87,6,'OTHER_CHARGES_2',1,'R',1,false);
//         $this->Ln(7);
        
//         $this->SetFont('Arial','',10);
//         $this->Cell(150,5,'Order Type',0,0,'L',false); 
//         $y = $this->GetY();
//         $x = $this->GetX();
//           $this->SetXY($x-51, $y-1);
//           $this->SetFont('Arial','',9);
//           $this->Cell(87,6,'TOTAL OTHER CHARGES',1,'C',1,false);
//         $this->Ln(7);
        
//         $this->SetFont('Arial','',10);
//         $this->Cell(150,5,'Purchase Type',0,0,'L',false);
//         $y = $this->GetY();
//         $x = $this->GetX();
//           $this->SetXY($x-51, $y-1);
//           $this->SetFont('Arial','',9);
//           $this->Cell(87,6,'SUB TOTAL_1',1,'R',1,false);
        
      // $this->Line(10,10,20,10);
      //$this->Line(185,10,185,10)
    //     $this->Ln(7);
        
    //     $y = $this->GetY();
    //     $x = $this->GetX();
    //     $this->SetXY($x, $y-1);
    //     $this->SetFont('Arial','B',10);
    //  $this->Cell(90,40,'TERMS & CONDITIONS',1,'L',1,false);
    //   $this->Ln();
    //  $this->Cell(90,55,'FRIGHT : TO PAY',0,'L',0,false);
    //   $y = $this->GetY();
    //   $x = $this->GetX();
    //  $this->SetXY($x, $y-22);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(99,18,'FRIGHT : TO PAY',0,'L',1,false);
    //  $this->Ln(1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(99,27,'INSPECTION AT YOUR END.',0,'L',1,false);
     
     
    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x, $y-25);
    //  $this->Cell(10,35,'FRIGHT : TO PAY',0,'L',1,false);
    //  $this->Ln();

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x, $y-1);
    //  $this->SetFont('Arial','',9);
    //  $this->Cell(99,1,'INSPECTION AT YOUR END.',0,'L',1,false);


    //    $this->SetFont('Arial','B',9);

    //    $this->Cell(99,5,'TERMS & CONDITIONS',0,'L',1,false);
    //    $this->Cell(2,40,'',0,'',0);
    //    $this->Cell(88,40,' ',1,'C',0,false);
    //    $this->SetFont('Arial','',9); 
    //    $this->Ln();

    //     $this->Cell(99,10,'FRIGHT : TO PAY',0,'L',1,false);
    //     $this->SetFont('Arial','',9); 
    //     $this->Ln();

    //      $this->Cell(99,1,'INSPECTION AT YOUR END.',0,'L',1,false);

    //     $this->SetXY($x-1.5,$y+40);
    //     $this->SetFont('Arial','B',9);
    //     $this->Cell(2,40,'',0,'',0);
    //     $this->Cell(98,20,'TERMS & CONDITIONS',1,'L',0,false);

      

    //     $this->SetFont('Arial','B',9);
    //      // $this->Cell(2,40,'',0,'',0);
    //       $this->Cell(75,5,' ',1,'C',1,false);
    //       $this->Cell(13,5,' ',1,'C',0,false);
         
    //       $this->Ln();
    //        $this->Cell(98.5,20,'',0,'',0);
    //        $this->Cell(75,5,' ',1,'C',1,false);
    //        $this->Cell(13,5,' ',1,'C',0,false);
         
    //        $this->Ln();
    //        $this->Cell(98.5,20,'',0,'',0);
    //        $this->Cell(75,5,' ',1,'C',1,false);
    //        $this->Cell(13,5,' ',1,'C',0,false);
           
    //        $this->Ln();
    //        $this->Cell(98.5,20,'',0,'',0);
    //        $this->Cell(75,5,' ',1,'C',1,false);
    //        $this->Cell(13,5,' ',1,'C',0,false);
       
    //     $this->Cell(98,20,'REQUIRED DOCUMENTS',1,'L',1,false);
    //     $this->SetFont('Arial','B',9);
    //     // $this->Cell(1,10,'',0,'',0);
    //       $this->Cell(75,5,' ',1,'C',0,false);
    //       $this->Cell(13,5,' ',1,'C',0,false);
    //       $this->Ln();
    //       $this->Cell(98.5,20,'',0,'',0);
    //       $this->Cell(75,5,' ',1,'C',0,false);
    //       $this->Cell(13,5,' ',1,'C',0,false);
    //       $this->Ln();
    //       $this->Cell(98.5,20,'',0,'',0);
    //       $this->Cell(75,5,' ',1,'C',0,false);
    //       $this->Cell(13,5,' ',1,'C',0,false);
    //       $this->Ln();
    //       $this->Cell(98.5,20,'',0,'',0);
    //       $this->Cell(75,5,'',1,'C',0,false);
        
    //      $this->Cell(1,20,'',0,'',0);
    //      $this->Cell(2,5,'TOTAL PURCHAE ORDER AMOUNT',1,'L',0,true);
     
    //     $this->Ln(5);
    //     $this->SetXY($x-1.5,$y+80);
    //     $this->SetFont('Arial','B',9);
    //     $this->Cell(2,40,'',0,'',0);
    //     $this->Cell(186,7,'Amount In Words -',1,'L',1,false);
    //      $this->Ln(1);
        
    //     $this->SetFont('Arial','',11);
    //     $this->Cell(143,8,'One Thousand Six Hundred Eighteen And Sixteen Paise Only.',0,'L',0,false);
    //     //

    //     $this->Ln(13);
   
    //  $y = $this->GetY();
    //  $x = $this->GetX();

  
    // $this->SetXY($x,$y );
    // $this->SetFont('Arial','',9);
    //     $this->Cell(2,7,'',0,'',0);
    //     $this->Cell(184,22,'A/p Palus Colony Palus Near Maharashtra Steel-416310,Tal-Palus Dist-Sangli,Maharashtra(India)',1,'C',1,true);
    //     $this->Ln(12);

    //     $this->SetFont('Arial','',10);
    //     $this->Cell(40,6,'',0,'C',1);
    //     $this->Cell(30,6,'+917709809797, +91 9765966230, anviindustry@gmail.com',0,'C',1,true);
    //     $this->Ln(7);
    //     $this->SetFont('Arial','',10);
    //     $this->Cell(70,0,'Mail -',0,'C',0,true);
 
    //     $this->SetTextColor(29,30,255);
    //     $this->Cell(150,0, 'abhi.turaikar@gmail.com', 'http://www.google.com');

    //     $this->Ln(10);

    // $lineHeight=4;

// $this->Cell(150, 'South Avenue',1,0,'L',true);

// $this->Cell(150,'Suite 107',1,0,'L',true);
// $this->Ln();
// $this->Cell(150,'Scottsdale AZ 85260',1,0,'L',true);
// $this->Ln();
// $this->Cell(150,'111-000-1111',1,0,'L',true);



$width=$this -> w; // Width of Current Page
$height=$this -> h; // Height of Current Page
$edge=2;
    $edge1=7;// Gap between line and border , change this value

$this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
$this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
$this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left
$this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right

     ///border end////
}
function Footer()
    {
      $this->Cell(11,12,'Our tax Registration',0,'L',1,true);
// ->Cell(28,6,'Purchase Order No',1,'L',1);
       $this->MultiCell(24,6,'Purchase Order No',1,1,true);
       $y = $this->GetY();
       $x = $this->GetX();
       $this->SetXY($x + 35, $y - 12);
       $this->MultiCell(13,6,'Line No',1,1,true);
       $this->SetXY($x + 48, $y - 12);
       $this->MultiCell(30,12,'Item Code',1,1,true);
       $this->SetXY($x + 78, $y - 12);
       $this->MultiCell(28,6,'Description & Drawing No',1,1,true);
       $this->SetXY($x + 106, $y - 12);
       $this->MultiCell(15,12,'Heat No',1,1,true);
       $this->SetXY($x + 121, $y - 12);
       $this->MultiCell(21,6,'HSN/SAC Code',1,1,true);
       $this->SetXY($x + 141, $y - 12);
       $this->MultiCell(11,6,'QTY (NOS)',1,1,true);
       $this->SetXY($x + 152, $y - 12);
       $this->MultiCell(13,6,'Rate /Pc',1,1,true);
       $this->SetXY($x + 165, $y - 12);
       $this->MultiCell(12,6,'Discount%',1,1,true);
       $this->SetXY($x + 176, $y - 12);
       $this->MultiCell(19,6,'Taxable Value',1,1,true);

      $this->SetFont('Arial','',10);
        $this->Cell(139,6,'',0,'L',1);
        $this->Cell(15,6,'Signatory',0,'L',1);
        $this->Ln(7);

        $this->Cell(-8 ,6,'',0,'L',1);
        $this->Cell(206,0,'',1,'L',1);
        $this->Ln(2);
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
