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

    $y = $this->GetY();
    $x = $this->GetX();
    
    $this->SetXY($x-5, $y+10);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,25,'  ',1,1,'C',0,false);            ///
    
    $today = date("Y-m-d");
    
    $this->Ln(8);
    $y = $this->GetY();
    $x = $this->GetX();
    

    $this->SetXY($x-5, $y-38);
    $this->SetFont('Arial','B',8);
    $this->Cell(200,5,'QUOTATION / ESTIMATE/ SELECTION',1,1,'R',0,false);

    $this->SetXY($x, $y+7);
    
    $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',22,21,19);

    //$this->Line(210,10,10,10);
    
    $this->SetXY($x+18, $y-21);
    $this->SetFont('Arial','B',15);
    $this->Cell(150,-15,'Signature Concepts LLP',0,1,'C',0,false);

    $this->SetXY($x+18, $y-14.5);
    $this->SetFont('Arial','',10);
    $this->Cell(150,-15,'TILES & BATHING SENSATION',0,1,'C',0,false);
    
    $this->SetXY($x+50, $y-19);
    $this->SetFont('Arial','',8);
    $this->Cell(200,4,'SR NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'L',0,false);
    
    $this->SetXY($x+53, $y-16);
    $this->SetFont('Arial','',8);
    $this->Cell(60,4,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'L',0,false);
    
    $this->SetXY($x+56, $y-12.5);
    $this->SetFont('Arial','',8);
    $this->Cell(15,4,'Phone No : 7757033204  |',0,1,'L',0,false);
    
    $this->SetXY($x+91, $y-15.5);
    $this->SetFont('Arial','',8);
    $this->Cell(200,10,'Email ID : signatureconcepts.pune@gmail.com',0,1,'L',0,false);


    include('../../database/dbconnection.php');

    $edit_id = $_GET['id'];

    $sql_charges = "SELECT * 
                    FROM retail_quotation AS q, mstr_retail_customer AS m
                    WHERE q.id_pk = m.retail_cust_idpk = '$edit_id'";

        $result_charges = mysqli_query($db, $sql_charges);
        $row=mysqli_fetch_row($result_charges);
    
    
  $this->Ln(-3);
         $y = $this->GetY();
         $x = $this->GetX();

         $this->SetXY($x-5, $y+0.5);
         $this->SetFont('Arial','B',14);
         $this->Cell(200,32,'',1,1,'L',0,false);

         $this->SetXY($x-4, $y+3);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'    Name :',0,1,'C',0,false); 

         $this->SetXY($x+10, $y+3);
         $this->SetFont('Arial','',8);
         $this->Cell(120,5,$row['28'],0,1,'L',0,false); 

         $this->SetXY($x+134, $y+3);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'DATE :',0,1,'L',0,false); 

         $this->SetXY($x+150, $y+3);
         $this->SetFont('Arial','',8);
         $this->Cell(30,5,$row['6'],0,1,'L',0,false);

         $this->SetXY($x-4, $y+8);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'     ADD :',0,1,'C',0,false); 
         $this->SetXY($x+10, $y+8);
         $this->SetFont('Arial','',8);
         $this->Cell(118,5,$row['5'],0,1,'L',0,false);

         $this->SetXY($x+134, $y+8);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'ATTD BY :',0,1,'L',0,false);
         $this->SetXY($x+150, $y+8);
         $this->SetFont('Arial','',8);
         $this->Cell(30,5,'ABSC *',0,1,'L',0,false);

         $this->SetXY($x-4, $y+19);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'MOBILE :',0,1,'C',0,false);
         $this->SetXY($x+10, $y+19);
         $this->SetFont('Arial','',8);
         $this->Cell(40,5,$row['4'],0,1,'L',0,false);

         $this->SetXY($x+134, $y+19);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'MOBILE :',0,1,'L',0,false);
         $this->SetXY($x+150, $y+19);
         $this->SetFont('Arial','',8);
         $this->Cell(30,5,$row['4'],0,1,'L',0,false);

        //  $this->SetXY($x-4, $y+26);
        //  $this->SetFont('Arial','',8);
        //  $this->Cell(13,5,'GST NO :',0,1,'C',0,false);

        //  $this->SetXY($x+10, $y+26);
        //  $this->SetFont('Arial','',8);
        //  $this->Cell(40,5,'27ADHFS0274J1ZU',0,1,'L',0,false);

         $this->SetXY($x+134, $y+26);
         $this->SetFont('Arial','',8);
         $this->Cell(13,5,'REF :',0,1,'L',0,false);
         $this->SetXY($x+150, $y+26);
         $this->SetFont('Arial','',8);
         $this->Cell(30,5,'ANIKET *',0,1,'L',0,false);
         

          $this->Ln(1.5);


        
         $y = $this->GetY();
         $x = $this->GetX();
       
         //  $this->SetXY($x-5, $y);
        //  $this->SetFont('Arial','B',14);
        //  $this->Cell(200,5,'',1,1,'L',0,false); 

            $this->SetXY($x-5, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(10,5,'No',1,1,'C',0,false); 

            $this->SetXY($x+5, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(50,5,'Description',1,1,'C',0,false); 

            $this->SetXY($x+55, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(18,5,'REMARK',1,1,'C',0,false); 

            $this->SetXY($x+73, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(13,5,'SIZE',1,1,'C',0,false); 

            $this->SetXY($x+86, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(15,5,'Sqft Qty',1,1,'C',0,false); 

            $this->SetXY($x+101, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(16,5,'Sqft Rate',1,1,'C',0,false); 

            $this->SetXY($x+117, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(12,5,'Rate',1,1,'C',0,false);

            $this->SetXY($x+129, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(14,5,'DISC',1,1,'C',0,false);

            $this->SetXY($x+143, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(15,5,'Box Qty',1,1,'C',0,false);

            $this->SetXY($x+158, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(16,5,'Box Rate',1,1,'C',0,false);

            $this->SetXY($x+174, $y);
            $this->SetFont('Arial','B',9);
            $this->Cell(21,5,'Amount',1,1,'C',0,false);


            $edit_id = $_GET['id'];
          
            $i = 0;
            $total_amt =0;
          //  $gst = 0;

            $sql_charges2 = "SELECT * 
                              FROM retail_quotation_items
                              WHERE rq_id_fk = '$edit_id'";
  
                  $result_charges2 = mysqli_query($db, $sql_charges2);
                while($row2 = mysqli_fetch_array($result_charges2))
           
{

        $i++;
        $total_amt = $total_amt + $row2['13'];
            // $gst =   $gst *18 /100 $row[''];

          $y = $this->GetY();
         $x = $this->GetX();

         $this->SetXY($x-5, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(10,10,$i,1,1,'C',0,false);           //  1

         $this->SetXY($x+5, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(50,10,' '.$row2['3'],1,1,'L',0,false);    //2

         $this->SetXY($x+55, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(18,10,$row2['18'],1,1,'C',0,false);            //3

         $this->SetXY($x+73, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(13,10,$row2['5'],1,1,'C',0,false);                        //4

         $this->SetXY($x+86, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(15,10,$row2['6'],1,1,'C',0,false);                         //5               //$row2['']

         $this->SetXY($x+101, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(16,10,$row2['7'],1,1,'C',0,false);                    //6

         $this->SetXY($x+117, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(12,10,$row2['9'],1,1,'C',0,false);                             //7

         $this->SetXY($x+129, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(14,10,$row2['11'],1,1,'C',0,false);                            //8

         $this->SetXY($x+143, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(15,10,$row2['9'],1,1,'C',0,false);                             //9

         $this->SetXY($x+158, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(16,10,$row2['10'],1,1,'C',0,false);            //10

         $this->SetXY($x+174, $y);
         $this->SetFont('Arial','',9);
         $this->Cell(21,10,$row2['13'],1,1,'C',0,false);                        //11

      
       
     

 }
 
 $edit_id = $_GET['id'];
          

 $sql_charges3 = "SELECT * 
                    FROM retail_quotation AS q
                    WHERE q.id_pk= '$edit_id'";

       $result_charges3 = mysqli_query($db, $sql_charges3);
     $row3 = mysqli_fetch_row($result_charges3);


    $this->Ln(10);
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y-10);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,62,'  ',1,1,'C',0,false);   /// 

    $this->SetXY($x-5, $y-10);
    $this->SetFont('Arial','B',9);
    $this->Cell(28,5,'GSTIN / UIN NO: ',0,1,'L',0,false);

    $this->SetXY($x+23, $y-10);
    $this->SetFont('Arial','B',9);
    $this->Cell(40,5,'27ADHFS0274J1ZU',0,1,'L',0,false);

    $this->SetXY($x+158, $y-10);                     // TOTAL
    $this->SetFont('Arial','B',9);
    $this->Cell(16,5,'TOTAL',1,1,'L',0,false); 
         $this->SetXY($x+174, $y-10);
         $this->SetFont('Arial','B',9);
         $this->Cell(21,5,$total_amt.' ',1,1,'R',0,false); 

 
    $this->SetXY($x+158, $y-5);                     // 
    $this->SetFont('Arial','B',6.5);
    $this->Cell(16,5,'TRANSPORT',1,1,'L',0,false);    

    $this->SetXY($x+174, $y-5);
    $this->SetFont('Arial','B',9);
    $this->Cell(21,5,$row3['10'].' ',1,1,'R',0,false); 

    $this->SetXY($x+158, $y);                     // 
    $this->SetFont('Arial','B',6.5);
    $this->Cell(16,5,'UNLOADING',1,1,'L',0,false);    

    $this->SetXY($x+174, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(21,5,$row3['11'].' ',1,1,'R',0,false); 

    $this->SetXY($x+158, $y+5);                     // 
    $this->SetFont('Arial','B',6.5);
    $this->Cell(16,5,'GST 18%',1,1,'L',0,false);    

    $this->SetXY($x+174, $y+5);
    $this->SetFont('Arial','B',9);
    $this->Cell(21,5,$row3['17'],1,1,'R',0,false); 

    $this->SetXY($x+158, $y+10);                     // 
    $this->SetFont('Arial','B',8);
    $this->Cell(16,5,'AMOUNT',1,1,'L',0,false);    

    $this->SetXY($x+174, $y+10);
    $this->SetFont('Arial','B',9);
    $this->Cell(21,5,$row3['18'].' ',1,1,'R',0,false); 
    
 //---------------------------

    $this->SetXY($x-5, $y-5);
    $this->SetFont('Arial','B',9);
    $this->Cell(122,5,'Payment Details:',1,1,'C',0,false);   //

    $this->SetXY($x-5, $y+1);
    $this->SetFont('Arial','B',8);
    $this->Cell(40,5,'KOTAK MAHIMDRA BANK',0,1,'L',0,false);

    $this->SetXY($x-5, $y+5);
    $this->SetFont('Arial','U',8);
    $this->Cell(40,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

    $this->SetXY($x-5, $y+9);
    $this->SetFont('Arial','',8);
    $this->Cell(40,5,'A/C NO: 3912034064',0,1,'L',0,false);

    $this->SetXY($x-5, $y+13);
    $this->SetFont('Arial','',8);
    $this->Cell(40,5,'BRANCH: BIBWEWADI, PUNE',0,1,'L',0,false);
    $this->SetXY($x-5, $y+17);
    $this->SetFont('Arial','',8);
    $this->Cell(40,5,'IFSC: KKBK001770',0,1,'L',0,false);

    $this->SetXY($x+70, $y+1);
    $this->SetFont('Arial','B',8);
    $this->Cell(40,5,'ICICI BANK',0,1,'L',0,false);

    $this->SetXY($x+70, $y+5);
    $this->SetFont('Arial','U',8);
    $this->Cell(40,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

    $this->SetXY($x+70, $y+9);
    $this->SetFont('Arial','',8);
    $this->Cell(40,5,'A/C NO: 091505500492',0,1,'L',0,false);

    $this->SetXY($x+70, $y+13);
    $this->SetFont('Arial','',8);
    $this->Cell(40,5,'BRANCH: VIMANNAGAR, PUNE',0,1,'L',0,false);
    $this->SetXY($x+70, $y+17);
    $this->SetFont('Arial','',8);
    $this->Cell(40,5,'IFSC: ICIC0000915',0,1,'L',0,false);

    //-----------------------

    $this->SetXY($x-5, $y+24);
    $this->SetFont('Arial','B',9);
    $this->Cell(122,5,'TERM & CONDITIONS',0,1,'L',0,false);   //

    $this->SetXY($x-5, $y+28);
    $this->SetFont('Arial','',8);
    $this->Cell(122,5,'# GOODS ONCE SOLD WILL NOT BE TAKEN BACK',0,1,'L',0,false); 
    $this->SetXY($x-5, $y+31);
    $this->SetFont('Arial','',8);
    $this->Cell(122,5,'# QUOTATION PRICE VALID FOR 15 DAYS',0,1,'L',0,false); 

    $this->SetXY($x-5, $y+34);
    $this->SetFont('Arial','',8);
    $this->Cell(122,5,'# NO COMPLAINT WILL BE ENTERTAINED IF TILES NOT LAIDAS PER STANDARED INSTRUCTION',0,1,'L',0,false); 

    $this->SetXY($x-5, $y+37);
    $this->SetFont('Arial','',8);
    $this->Cell(122,5,'# UPTO 3% BREAKAGE CAN BE POSSIBLE DUE TO NATURE OF MATERIAL',0,1,'L',0,false); 

    $this->SetXY($x-5, $y+40);
    $this->SetFont('Arial','',8);
    $this->Cell(122,5,'# 100% ADVANCE PAYMENT AGAINST DELIVERY',0,1,'L',0,false); 

    $this->SetXY($x-5, $y+43);
    $this->SetFont('Arial','',8);
    $this->Cell(122,5,'# UNLOADING WILL BE CUSTOMER END',0,1,'L',0,false); 

    $this->SetXY($x+10, $y+47);
    $this->SetFont('Arial','B',8);
    $this->Cell(165,5,'NO EXCHANGE & NO RETURN',1,1,'C',0,false);
   
    
   
    


    
    






    // $this->SetXY($x+122, $y-11);
    // $this->SetFont('Arial','B',13);
    // $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

    // $this->SetXY($x+122, $y+5);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'FOR   Signature Concepts LLP.',0,1,'C',0,false);

    // $this->SetXY($x+122, $y+14);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'Authorised Sign.',0,1,'C',0,false);

    // $this->SetXY($x-3, $y+14);
    // $this->SetFont('Arial','',9);
    // $this->Cell(68,5,'  Receiver Sign.',0,1,'L',0,false);
 


   }

   function Footer()
   {
  
         
   }
  
  }
 $pdf= new this();
 $pdf = new this('L','mm',array(180,210));
 // $pdf = new FPDF('P','mm','A10');
   $pdf->AliasNbPages();
  
  // // Add new pages
  // // Add new pages
   $pdf->SetAutoPageBreak(true,130);
   $pdf->AddPage();
  //      $pdf->Ln();
  
       $pdf->Output();
  
   ?>   