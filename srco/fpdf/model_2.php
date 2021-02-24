<?php
// include('../../partials/dbconnection.php');
  extract($_GET);

    require('fthis182/fthis.php');
    //A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create this object
$this = new FPDF('P','mm','A4');
//add new page
$this->AddPage();
//output the result
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
        class this extends Fthis
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
   
        $y =$this->GetY();
 $x =$this->GetX();
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
   
        // $this->Ln(17);
   
        // $y = $this->GetY();
        // $x = $this->GetX();

      
    }
  }
//set font to arial, bold, 14pt
//$this->SetFont('Arial','B',14);







//make a dummy empty cell as a vertical spacer
$this->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$this->SetFont('Arial','B',12);

$this->Cell(130 ,5,'Description',1,0);
$this->Cell(25 ,5,'Taxable',1,0);
$this->Cell(34 ,5,'Amount',1,1);//end of line

$this->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$this->Cell(130 ,5,'UltraCool Fridge',1,0);
$this->Cell(25 ,5,'-',1,0);
$this->Cell(34 ,5,'3,250',1,1,'R');//end of line

$this->Cell(130 ,5,'Supaclean Diswasher',1,0);
$this->Cell(25 ,5,'-',1,0);
$this->Cell(34 ,5,'1,200',1,1,'R');//end of line

$this->Cell(130 ,5,'Something Else',1,0);
$this->Cell(25 ,5,'-',1,0);
$this->Cell(34 ,5,'1,000',1,1,'R');//end of line

//summary
$this->Cell(130 ,5,'',0,0);
$this->Cell(25 ,5,'Subtotal',0,0);
$this->Cell(4 ,5,'$',1,0);
$this->Cell(30 ,5,'4,450',1,1,'R');//end of line

$this->Cell(130 ,5,'',0,0);
$this->Cell(25 ,5,'Taxable',0,0);
$this->Cell(4 ,5,'$',1,0);
$this->Cell(30 ,5,'0',1,1,'R');//end of line

$this->Cell(130 ,5,'',0,0);
$this->Cell(25 ,5,'Tax Rate',0,0);
$this->Cell(4 ,5,'$',1,0);
$this->Cell(30 ,5,'10%',1,1,'R');//end of line

$this->Cell(130 ,5,'',0,0);
$this->Cell(25 ,5,'Total Due',0,0);
$this->Cell(4 ,5,'$',1,0);
$this->Cell(30 ,5,'4,450',1,1,'R');//end of line
    
$this->Output();


    
?>