<?php

 //include('../../database/dbconnection.php');
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

     include('../../database/dbconnection.php');
     $edit_id = $_GET['id'];
     $sql_charges="SELECT * FROM wholesale_work_order WHERE work_order_id ='$edit_id' ";
         
     $result_charges = mysqli_query($db, $sql_charges);
     $row=mysqli_fetch_row($result_charges);

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,30,'  ',0,1,'C',0,false);

     $today = date("d-m-Y");

     $y = $this->GetY();
     $x = $this->GetX();

    //  $this->SetXY($x+147, $y-35);
    //  $this->SetFont('arial','',8);
    //  $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
    //  $this->SetXY($x+150, $y-36);
    //  $this->SetFont('arial','',8);
    //  $this->Cell(18,5,'Original PDF',0,1,'L',0,false);
    //  $this->SetXY($x+172, $y-35);
    //  $this->SetFont('arial','',8);
    //  $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
    //  $this->SetXY($x+175, $y-36);
    //  $this->SetFont('arial','',8);
    //  $this->Cell(20,5,'Duplicate PDF',0,1,'L',0,false);
   


     
     $this->SetXY($x-2, $y-38);
     $this->SetFont('Arial','B',11);
     $this->Cell(185,8,'Quotation',0,1,'C',0,false);
    //  $this->SetXY($x, $y+7);
    //  $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',30,19,15);

     //$this->Line(210,10,10,10);

    
    //  $this->SetFont('Arial','B',20);

    //  $this->Cell(120,0,'',0,0);
    //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

  

     $y = $this->GetY();
     $x = $this->GetX();

    //  $this->SetXY($x-5, $y-23);
    //  $this->SetFont('Arial','B',15);
    //  $this->Cell(200,-15,'Signature Concepts',0,1,'C',0,false);

    //  $this->Ln();

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y+21);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y-15);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y-11);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(200,10,'Phone No : 7757033204',0,1,'C',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x-5, $y-7);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(200,10,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);

    //  $y = $this->GetY();
    //  $x = $this->GetX();
    //  $this->SetXY($x+40, $y);
    //  $this->SetFont('Arial','B',11);
    //  $this->Cell(102,15,'Tax Invoice',0,1,'C',0,false);


    $this->Ln(3);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-3);
     $this->SetFont('Arial','B',15);
     $this->Cell(140,30,'  ',1,1,'C',0,false);

     $sql_charges1 = "SELECT twc.wc_id_pk, twc.cust_name, twc.mob_number,twc.gst_no,wo.work_order_id,
      wo.cust_id_fk, twcs.wc_id_fk, twcs.site_name, twcs.site_address,twc.add_date
      FROM wholesale_work_order AS wo, tbl_wholesale_customer AS twc, tbl_wholesale_customer_site_details AS twcs 
      WHERE wo.work_order_id  and wo.cust_id_fk = twc.wc_id_pk and twc.wc_id_pk = twcs.wc_id_fk ='$edit_id'";
        
    $result_charges1 = mysqli_query($db, $sql_charges1);
    $row1 =mysqli_fetch_row($result_charges1);

   // if ($row1 != ""){

    {
     $this->SetXY($x-5, $y-2);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Customer :      '.$row1['1'],0,1,'L',0,false);       

     $this->SetXY($x-5, $y+3);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,10,' Site           :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+3);
     $this->SetFont('Arial','',8);
     $this->Cell(120,10,$row1['7'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(20,5,' Site Add.  :',0,1,'L',0,false);

     $this->SetXY($x+15, $y+10);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,$row1['8'],0,1,'L',0,false);

     // $this->SetXY($x+15, $y+14);
     // $this->SetFont('Arial','',8);
     // $this->Cell(35,5,'PUNE-411011 ',0,1,'L',0,false);

     $this->SetXY($x+15, $y+15);
     $this->SetFont('Arial','',8);
     $this->Cell(35,5,'Ph.No. '.$row1['2'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+21);
     $this->SetFont('Arial','B',8);
     $this->Cell(120,7,' GST No.   :      '.$row1['3'],0,1,'L',0,false);
//     }
// else {
     
    //  $this->SetXY($x-5, $y-2);
    //  $this->SetFont('Arial','B',8);
    //  $this->Cell(120,10,' Customer :     ',0,1,'L',0,false);

    //  $this->SetXY($x-5, $y+3);
    //  $this->SetFont('Arial','B',8);
    //  $this->Cell(120,10,' Site           :',0,1,'L',0,false);

    //  $this->SetXY($x+15, $y+3);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(120,10,' ',0,1,'L',0,false);

    //  $this->SetXY($x-5, $y+10);
    //  $this->SetFont('Arial','B',8);
    //  $this->Cell(20,5,' Site Add.  :',0,1,'L',0,false);

    //  $this->SetXY($x+15, $y+10);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(35,5,' ',0,1,'L',0,false);

    //  // $this->SetXY($x+15, $y+14);
    //  // $this->SetFont('Arial','',8);
    //  // $this->Cell(35,5,'PUNE-411011 ',0,1,'L',0,false);

    //  $this->SetXY($x+15, $y+18);
    //  $this->SetFont('Arial','',8);
    //  $this->Cell(35,5,'Ph.No. ',0,1,'L',0,false);

    //  $this->SetXY($x-5, $y+21);
    //  $this->SetFont('Arial','B',8);
    //  $this->Cell(120,7,' GST No.   : ',0,1,'L',0,false);
  }

   $edit_id = 1;
     
    $sql_charges5 = "SELECT  *, wo.work_no
                    FROM wholesale_work_order AS wo
                    WHERE wo.work_order_id ='$edit_id'";
                                        
        $result_charges5 = mysqli_query($db, $sql_charges5);
        $row4 =mysqli_fetch_row($result_charges5);
{
     $this->Ln(10);
     $this->SetXY($x+135, $y-3);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,30,'',1,1,'L',0,false);

     $this->SetXY($x+135, $y+2);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'  SO No.  : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+4);
     $this->SetFont('Arial','',9);
     $this->Cell(25,5,$row4['1'],0,1,'L',0,false);
        // $this->Cell(25,5,$row4['1'],0,1,'L',0,false);                       ///
     
     $this->SetXY($x+135, $y+10);
     $this->SetFont('Arial','B',8);
     $this->Cell(60,9,'  Date      : ',0,1,'L',0,false);

     $this->SetXY($x+155, $y+10);
     $this->SetFont('Arial','',9);
     $this->Cell(40,9,$row4['22'],0,1,'L',0,false);

}


     $this->Ln(-1);
     $y = $this->GetY();
     $x = $this->GetX();
    //  $this->SetXY($x-5, $y+9);
    //  $this->SetFont('Arial','B',15);
    //  $this->Cell(200,20,'',1,1,'C',0,false);   // 

    //  $this->SetXY($x-5, $y+9);
    //        $this->SetFont('Arial','B',9); 
    //        $this->Cell(200,8,'  ',1,1,'C',0,false);   //
            {
                $this->SetXY($x-5, $y+9);
                $this->SetFont('Arial','B',9);
                $this->Cell(10,8,'No.',1,1,'C',0,false);            //1
    
                   $this->SetXY($x+5, $y+9);
                   $this->SetFont('Arial','B',9);
                   $this->Cell(56,8,'Description Of Goods',1,1,'C',0,false);                //2

                      $this->SetXY($x+61, $y+9);
                                $this->SetFont('Arial','B',8);
                                $this->Cell(21,8,'Remark',1,1,'C',0,false);                   //3

                          $this->SetXY($x+82, $y+9);
                                    $this->SetFont('Arial','B',9);
                                    $this->Cell(17,8,'Size',1,1,'C',0,false);                    //4
 
                            $this->SetXY($x+99, $y+9);
                                          $this->SetFont('Arial','B',9);
                                          $this->Cell(17,8,'Quantity',1,1,'C',0,false);                   //5

                              $this->SetXY($x+116, $y+9);
                                    $this->SetFont('Arial','B',9);
                                      $this->Cell(19,8,'Sq.Ft.',1,1,'C',0,false);                                 //6                                  
                                $this->SetXY($x+135, $y+9);
                                          $this->SetFont('Arial','B',9);
                                        $this->Cell(30,8,'Rate',1,1,'C',0,false);                //7
                                      
                                        $this->SetXY($x+165, $y+9);
                                                $this->SetFont('Arial','B',9);
                                                $this->Cell(30,8,'Amount',1,1,'C',0,false);                  //8

            }
        //---------------------------------

        $edit_id = 1;

        $sql_charges2 = "SELECT woi.*, mi.item_id_pk, mi.final_product_code
                          FROM wholesale_work_order_items AS woi, mstr_item AS mi 
                          WHERE woi.item_id_fk = mi.item_id_pk = '$edit_id' ";

          // $i = 1;
                  //   if($i=0, $i>=4 , $i++)

                //$c1= mysqli_num_rows($result_a);
              // $array[] = $row;
         
               //   $result_charges7 = mysqli_query($db, $sql_charges7);
                  // $cn = 1;          /// $count = mysqli_num_rows($result_charges2);
             

                $result_charges2 = mysqli_query($db, $sql_charges2);
                $cn =  mysqli_num_rows($result_charges2);
                  while($row2 = mysqli_fetch_array($result_charges2))
                  { 
                 //     $this->Ln(5); 

                      $y = $this->GetY();
                      $x = $this->GetX();
                  
            // $this->SetXY($x+5, $y);
            // $this->SetFont('Arial','',8);
            // $this->Cell(56,12,'',1,1,'L',0,false);    ///           1
        
            // $this->SetXY($x+5, $y);
            // $this->SetFont('Arial','B',9);
            // $this->Cell(17,12,'    ',1,1,'L',0,false);    ///              2
                
                    $this->SetXY($x-5, $y);
                    $this->SetFont('Arial','B',9);
                    $this->Cell(10,9,$row2['1'],1,1,'C',0,false);             ///$row2['1']               //1
          
                          $this->SetXY($x+5, $y);
                          $this->SetFont('Arial','',9);
                          $this->Cell(56,9,'',1,1,'L',0,false);             
          
                            $this->SetXY($x+5, $y+1);
                            $this->SetFont('Arial','',9);
                            $this->Cell(56,4,$row2['20'],0,1,'L',0,false);             // $row2['20']     //2
        
                                $this->SetXY($x+61, $y);
                                $this->SetFont('Arial','',8);
                                $this->Cell(21,9,$row2['12'],1,1,'C',0,false);            //$row2['12']         //3
        
                                      $this->SetXY($x+82, $y);
                                      $this->SetFont('Arial','',8);
                                      $this->Cell(17,9,$row2['4'],1,1,'C',0,false);            // $row2['4']           //4
        
                                          $this->SetXY($x+99, $y);
                                          $this->SetFont('Arial','',9);
                                          $this->Cell(17,9,$row2['3'],1,1,'C',0,false);        // $row2['3']           //5
        
                                              $this->SetXY($x+116, $y);
                                              $this->SetFont('Arial','',8);
                                              $this->Cell(19,9,$row2['5'],1,1,'C',0,false);        //$row2['5']           //6
        
                                                $this->SetXY($x+135, $y);
                                                $this->SetFont('Arial','',8);
                                                $this->Cell(30,9,$row2['6'],1,1,'C',0,false);           //$row2['6']            //7
        
                                                  $this->SetXY($x+165, $y);
                                                  $this->SetFont('Arial','',9);
                                                  $this->Cell(30,9,$row2['9'],1,1,'R',0,false);             //$row2['9']            //8
        
                      
   }
    

   $sql_charges4 = "SELECT woi.*, mi.item_id_pk, mi.final_product_code,woi.sqrfit
   FROM wholesale_work_order_items AS woi, mstr_item AS mi 
   WHERE woi.item_id_fk = mi.item_id_pk = '$edit_id' ";

   $total_qty = 0;
   $total_sq = 0;
   $total_amount = 0;

   $result_charges4 = mysqli_query($db, $sql_charges4);
   while($row6 = mysqli_fetch_row($result_charges4))

   
              {      
                $total_qty = $total_qty+ $row6['3'];
                $total_sq = $total_sq+ $row6['5'];
                $total_amount = $total_amount+ $row6['9'];
                //$sq = $row6['sqrfit'];   
                }

                $this->Ln(-37);
                $y = $this->GetY();
                $x = $this->GetX();
                  $this->SetXY($x-5, $y+37);
                  $this->SetFont('Arial','B',9);
                  $this->Cell(170,8,'Grand Total',1,1,'C',0,false);
                  $this->SetXY($x+97, $y+37);
                  $this->SetFont('Arial','B',9);
                  $this->Cell(20,8,$total_qty,0,1,'C',0,false);                    //$row['3']

                  $this->SetXY($x+116, $y+37);
                  $this->SetFont('Arial','B',9);
                  $this->Cell(20,8,$total_sq,0,1,'C',0,false);                       //  $total           $row['10']

                  $this->SetXY($x+165, $y+37);
                  $this->SetFont('Arial','B',9); 
                  $this->Cell(30,8,$total_amount,1,1,'R',0,false);           // $row['11']

//   $this->Ln(5);
    $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(200,85,'  ',1,1,'C',0,false);   //  //

     $sql_charges8 = "SELECT * ,wwo.disc_per, wwo.unload, wwo.other, wwo.transport, wwo.net_amt
     FROM wholesale_work_order AS wwo, mstr_customer AS m
     WHERE work_order_id AND cust_id_pk ='$edit_id' ";
    
      $result_charges8 = mysqli_query($db, $sql_charges8);
      $roww3=mysqli_fetch_row($result_charges8);
     
     $this-> Ln(-20);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-65);
     $this->SetFont('Arial','B',9);
     $this->Cell(20,8,'In Words -',0,1,'C',0,false); //

     $this->SetXY($x+17, $y-65);
     $this->SetFont('Arial','',9);
     $this->Cell(80,8,'Rs.'.convertNum($roww3['21']).' Only',0,1,'L',0,false);
     
$this->Ln(1);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-4, $y-4);
     $this->SetFont('Arial','',9);
     $this->Cell(30,10,'Bank Details  :',0,1,'L',0,false); 

     $y = $this->GetY();
     $x = $this->GetX();
    //  $this->SetXY($x+24, $y-11);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(49,30,' ',0,1,'C',0,false);    //

     $this->SetXY($x+19, $y-7);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'KOTAK MAHINDRA BANK',0,1,'L',0,false);

     $this->SetXY($x+19, $y-3);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

     $this->SetXY($x+19, $y+1);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'A/C NO: 3912034064',0,1,'L',0,false);

     $this->SetXY($x+19, $y+5);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'BRANCH: BIBWEWADI, PUNE',0,1,'L',0,false);

     $this->SetXY($x+19, $y+9);
     $this->SetFont('Arial','',8);
     $this->Cell(49,5,'IFSC: KKBK0001770',0,1,'L',0,false);

     $this->Ln(-4);
     $y = $this->GetY();
     $x = $this->GetX();
    //  $this->SetXY($x+80, $y-20);
    //  $this->SetFont('Arial','B',9);
    //  $this->Cell(49,30,' ',1,1,'C',0,false);   //

     $this->SetXY($x+70, $y-17);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'HDFC BANK ',0,1,'L',0,false);

     $this->SetXY($x+70, $y-13);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

     $this->SetXY($x+70, $y-9);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'A/C NO: 50200052017929',0,1,'L',0,false);

     $this->SetXY($x+70, $y-5);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'BRANCH: , PUNE',0,1,'L',0,false);

     $this->SetXY($x+70, $y-1);
     $this->SetFont('Arial','',8);
     $this->Cell(42,5,'IFSC: HDFC0005718',0,1,'L',0,false);
    

     $sql_chargess = "SELECT * ,wwo.disc_per, wwo.unload, wwo.other, wwo.transport, wwo.net_amt
     FROM wholesale_work_order AS wwo, mstr_customer AS m
     WHERE work_order_id AND cust_id_pk ='$edit_id' ";
    
      $result_chargess = mysqli_query($db, $sql_chargess);
      $roww2=mysqli_fetch_row($result_chargess);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y-29);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,49,'',1,1,'L',0,false);    // box3

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y-49);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Discount',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,$roww2['13'],0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Load / Unload',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,$roww2['16'],0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Others(+/-)',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,$roww2['19'],0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'Transport',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,$roww2['15'],0,1,'R',0,false); 

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+135, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'GST',0,1,'C',0,false);  
    
    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+165, $y-7);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,7,'',0,1,'R',0,false);            // $roww2['']

    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y+4);
    $this->SetFont('Arial','B',15);
    $this->Cell(200,10,' ',1,1,'C',0,false); // vertical box

    // $this->SetXY($x+2, $y+4);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(15,10,'GST No.',0,1,'C',0,false);
    // $this->SetXY($x+18, $y+4);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(30,10,$roww2['62'],0,1,'C',0,false);

    $this->SetXY($x+65, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'PAN NO.',0,1,'C',0,false);
    $this->SetXY($x+85, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'ADHFS0274J',0,1,'C',0,false);         //
  

    $this->SetXY($x+135, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,'Net Amount.',0,1,'C',0,false);
    $this->SetXY($x+165, $y+4);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,10,$roww2['21'],0,1,'R',0,false);

    // $y = $this->GetY();
    // $x = $this->GetX();
    // $this->SetXY($x-1, $y+2);
    //  $this->SetFont('Arial','',7.6);
    //  $this->Cell(127,4,'INTEREST @18 % WILL BE CHARGED IF NOT PAID WITHIN 7 DAYS',0,1,'L',0,false);

    //  $this->SetXY($x-1, $y+5);
    //  $this->SetFont('Arial','',7.6);
    //  $this->Cell(127,4,"Shortage,Breakage,Damage etc. During Transit At Buyer's Risk.",0,1,'L',0,false);


    // $this->SetXY($x-5, $y+16);
    // $this->SetFont('Arial','B',9);
    // $this->Cell(50,20,'',1,1,'L',0,false);


    $this->Ln(-10);
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-3, $y+10);
    $this->SetFont('Arial','B',9);
    $this->Cell(40,8,'TERM & CONDITIONS-',0,1,'L',0,false);

    $this->SetXY($x, $y+16);
    $this->SetFont('Arial','',8);
    $this->Cell(60,7,'# GOODS ONCE SOLD WILL NOT BE TAKEN BACK',0,1,'L',0,false);
    $this->SetXY($x, $y+19);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'# CHECK MATERIAL BEFORE TEMPO LEAVE SITE, LATER NO  ',0,1,'L',0,false);
    $this->SetXY($x, $y+22);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'    COMPLAINT WILL BE ENTERTAINED',0,1,'L',0,false);

    $this->SetXY($x, $y+25);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'# NO COMPLAINT WILL BE ENTERTAINED IF TILES NOT LAID',0,1,'L',0,false);

    $this->SetXY($x, $y+28);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'    AS PER STANDARED INSTRUCTION',0,1,'L',0,false);

    $this->SetXY($x, $y+31);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'# UPTO 3% BREAKAGE CAN BE POSSIBLE DUE TO NATURE OF    ',0,1,'L',0,false);

    $this->SetXY($x, $y+34);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'     MATERIAL',0,1,'L',0,false);

    $this->SetXY($x, $y+37);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'# 100% ADVANCE PAYMENT AGAINST DELIVERY',0,1,'L',0,false);

    $this->SetXY($x, $y+40);
    $this->SetFont('Arial','',8);
    $this->Cell(40,8,'# UNLOADING WILL BE CUSTOMER END',0,1,'L',0,false);

    $y = $this->GetY();
    $x = $this->GetX();
    $this->SetXY($x+124, $y-13);
    $this->SetFont('Arial','B',13);
    $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

    $this->SetXY($x+118, $y-3);
    $this->SetFont('Arial','',9);
    $this->Cell(68,15,' FOR Signature Concept LLP',0,1,'C',0,false);

    $this->SetXY($x+118, $y+9);
    $this->SetFont('Arial','',9);
    $this->Cell(68,15,'Authorised Sign.',0,1,'C',0,false);

    $this->SetXY($x-5, $y+9);
    $this->SetFont('Arial','',9);
    $this->Cell(50,15,"Receiver's Sign.",0,1,'C',0,false);
          
     }

    function Footer()
    {
   
          
    }
  
   }
     $pdf = new this();
   
    $pdf->AliasNbPages();
  
    // $pdf = new PDF('L','mm',array(160,170));
   // // Add new pages
   // // Add new pages
   $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();
   //      $pdf->Ln();    
  $pdf->Output("invoice.pdf","F");

  $pdf->Output();
   

// // include('../../partials/dbconnection.php');
//   extract($_GET);

 
//   require('../../fpdf182/fpdf.php');
//     // include '../../partials/dbconnection.php';
//     $ones = array(
//  "",
//  " One",
//  " Two",
//  " Three",
//  " Four",
//  " Five",
//  " Six",
//  " Seven",
//  " Eight",
//  " Nine",
//  " Ten",
//  " Eleven",
//  " Twelve",
//  " Thirteen",
//  " Fourteen",
//  " Fifteen",
//  " Sixteen",
//  " Seventeen",
//  " Eighteen",
//  " Nineteen"
// );

// $tens = array(
//  "",
//  "",
//  " Twenty",
//  " Thirty",
//  " Forty",
//  " Fifty",
//  " Sixty",
//  " Seventy",
//  " Eighty",
//  " Ninety"
// );

// $triplets = array(
//  "",
//  " Thousand",
//  " Million",
//  " Billion",
//  " Trillion",
//  " Quadrillion",
//  " Quintillion",
//  " Sextillion",
//  " Septillion",
//  " Octillion",
//  " Nonillion"
// );
// function convertTri($num, $tri) 
// {
//         global $ones, $tens, $triplets;

// // chunk the number, ...rxyy
// $r = (int) ($num / 1000);
// $x = ($num / 100) % 10;
// $y = $num % 100;

// // init the output string
// $str = "";

// // do hundreds
// if ($x > 0)
// $str = $ones[$x] . " hundred";

// // do ones and tens
// if ($y < 20)
// $str .= $ones[$y];
// else
// $str .= $tens[(int) ($y / 10)] . $ones[$y % 10];

// // add triplet modifier only if there
// // is some output to be modified...
// if ($str != "")
// $str .= $triplets[$tri];

// // continue recursing?
// if ($r > 0)
// return convertTri($r, $tri+1).$str;
// else
// return $str;
// }


// // returns the number as an anglicized string
// function convertNum($num) {
// $num = (int) $num;    // make sure it's an integer

// if ($num < 0)
// return "negative".convertTri(-$num, 0);

// if ($num == 0)
// return "zero";

// return convertTri($num, 0);
// }


// // $id = $_GET['this_id'];
//     //$i=$_GET['id'];

//      $code="";
//      class this extends FPDF
//      {
 
//      // Page header
//      function RoundedRect($x, $y, $w, $h, $r, $style = '')
//          {
//              $k = $this->k;
//              $hp = $this->h;
          
//              if($style=='F')
//                 $op='f';
//             elseif($style=='FD' || $style=='DF')
//                 $op='B';
//           else
//               $op='S';
//  $MyArc = 4/3 * (sqrt(2) - 1);
//  $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
//  $xc = $x+$w-$r ;
//  $yc = $y+$r;
//  $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
 
//  $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
//  $xc = $x+$w-$r ;
//  $yc = $y+$h-$r;
//  $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
//  $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
//  $xc = $x+$r ;
//  $yc = $y+$h-$r;
//  $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
//  $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
//  $xc = $x+$r ;
//  $yc = $y+$r;
//  $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
//  $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
//  $this->_out($op);
//     }

//     function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
//   {
//       $h = $this->h;
//       $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
//           $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
//   }

//   function Header()
//  {

//     include('../../database/dbconnection.php');
//     $edit_id = $_GET['id'];
//     $sql_charges="SELECT * FROM wholesale_work_order WHERE work_order_id ='$edit_id' ";
        
//     $result_charges = mysqli_query($db, $sql_charges);
//     $row=mysqli_fetch_row($result_charges);

//       $y = $this->GetY();
//       $x = $this->GetX();

//       $this->SetXY($x+148, $y);
//       $this->SetFont('arial','',8);
//       $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
//       $this->SetXY($x+152, $y);
//       $this->SetFont('arial','',8);
//       $this->Cell(18,3,'Original PDF',0,1,'L',0,false);
//       $this->SetXY($x+172, $y);
//       $this->SetFont('arial','',8);
//       $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
//       $this->SetXY($x+175, $y);
//       $this->SetFont('arial','',8);
//       $this->Cell(20,3,'Duplicate PDF',0,1,'L',0,false);

//      $this->SetXY($x-5, $y+5);
//      $this->SetFont('Arial','B',15);
//      $this->Cell(200,26,'  ',1,1,'C',0,false);

//      $today = date("d-m-Y");

//      $y = $this->GetY();
//      $x = $this->GetX();
  

//      $this->SetXY($x-5, $y-32);
//      $this->SetFont('Arial','B',11);
//      $this->Cell(200,5,'Sales Order',0,1,'C',0,false);
//      $this->SetXY($x, $y+7);
//      $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',32,18,15);

//      //$this->Line(210,10,10,10);

    
//     //  $this->SetFont('Arial','B',20);

//     //  $this->Cell(120,0,'',0,0);
//     //  $this->Cell(60,45,'Signature Concepts LLP',0,0);

//      $y = $this->GetY();
//      $x = $this->GetX();

  
//      $this->SetXY($x-5, $y-30);
//      $this->SetFont('Arial','B',15);
//      $this->Cell(200,7,'Signature Concepts LLP',0,1,'C',0,false);

//      $this->SetXY($x-5, $y-22);
//      $this->SetFont('Arial','',8);
//      $this->Cell(200,5,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

//      $this->SetXY($x-5, $y-19);
//      $this->SetFont('Arial','',8);
//      $this->Cell(200,5,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

//      $this->SetXY($x-5, $y-16);
//      $this->SetFont('Arial','',8);
//      $this->Cell(200,5,'Phone No : 7757033204',0,1,'C',0,false);

//      $this->SetXY($x-5, $y-13);
//      $this->SetFont('Arial','',8);
//      $this->Cell(200,5,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);



//      $y = $this->GetY();
//      $x = $this->GetX();

//      $this->SetXY($x-5, $y+1);
//      $this->SetFont('Arial','B',15);
//      $this->Cell(140,30,'  ',1,1,'C',0,false);

//      $this->SetXY($x-5, $y+3);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(20,5,' Customer :     ',0,1,'L',0,false);

//      $this->SetXY($x-5, $y+5);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(20,10,' Site           :',0,1,'L',0,false);

//      $this->SetXY($x-5, $y+12);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(20,5,' Site Add.  :',0,1,'L',0,false);

//      $this->SetXY($x+15, $y+18);
//      $this->SetFont('Arial','',8);
//      $this->Cell(20,5,'Ph.No. ',0,1,'L',0,false);

     
//      $this->SetXY($x-5, $y+22);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(20,7,' GST No.   :      ',0,1,'L',0,false);

//     //  $this->Ln(10);
//      $this->SetXY($x+135, $y+1);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(60,30,'',1,1,'L',0,false);                   //

//      $this->SetXY($x+135, $y+3);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(15,5,'  SO No.  : ',0,1,'L',0,false);
     
//      $this->SetXY($x+135, $y+10);
//      $this->SetFont('Arial','B',8);
//      $this->Cell(15,5,'  Date      : ',0,1,'L',0,false);


//       // $sql_charges1 = "SELECT twc.wc_id_pk, twc.cust_name, twc.mob_number,twc.gst_no,wo.work_order_id,
//       // wo.cust_id_fk, twcs.wc_id_fk, twcs.site_name, twcs.site_address 
//       // FROM wholesale_work_order AS wo, tbl_wholesale_customer AS twc, tbl_wholesale_customer_site_details AS twcs 
//       // WHERE wo.work_order_id ='$edit_id' AND wo.cust_id_fk = twc.wc_id_pk AND twc.wc_id_pk = twcs.wc_id_fk ";


//       $sql_charges1 = "SELECT twc.wc_id_pk, twc.cust_name, twc.mob_number,twc.gst_no,
//                           twcs.site_name, twcs.site_address 
//                           FROM wholesale_work_order AS wo, tbl_wholesale_customer AS twc, tbl_wholesale_customer_site_details AS twcs
//                           WHERE  wo.cust_id_fk = twc.wc_id_pk AND twc.wc_id_pk = twcs.wc_id_fk AND wo.work_order_id = '$edit_id'";
        
//     $result_charges1 = mysqli_query($db, $sql_charges1);
//     $row1 =mysqli_fetch_row($result_charges1);

//     if ($row1 != "")
//     {
//         //.$row1['1']

        
//      $y = $this->GetY();
//      $x = $this->GetX();

//      $this->SetXY($x+15, $y-12);
//      $this->SetFont('Arial','',8);
//      $this->Cell(115,5, $row1['1'],0,1,'L',0,false);           //        $row1['1']

//      $this->SetXY($x+15, $y-7);
//      $this->SetFont('Arial','',8);
//      $this->Cell(115,5,'fggdf',0,1,'L',0,false);             //      $row1['8']

//      $this->SetXY($x+15, $y-2);
//      $this->SetFont('Arial','',8);
//      $this->Cell(115,5,'sdasd',0,1,'L',0,false);

//      $this->SetXY($x+15, $y+9);
//      $this->SetFont('Arial','',8);
//      $this->Cell(115,5,'sdasd',0,1,'L',0,false);

//      $this->SetXY($x+150, $y-12);
//      $this->SetFont('Arial','',9);
//      $this->Cell(40,5,'pp',0,1,'L',0,false);

//      $this->SetXY($x+150, $y-5);
//      $this->SetFont('Arial','',9);
//      $this->Cell(40,5,'gfg',0,1,'L',0,false);           // $row['18']

//      }

// // else
// //  {
     
//     //  $this->SetXY($x-5, $y-2);
//     //  $this->SetFont('Arial','B',8);
//     //  $this->Cell(120,10,' Customer :     ',0,1,'L',0,false);

//     //  $this->SetXY($x-5, $y+3);
//     //  $this->SetFont('Arial','B',8);
//     //  $this->Cell(120,10,' Site           :',0,1,'L',0,false);

//     //  $this->SetXY($x+15, $y+3);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(120,10,' ',0,1,'L',0,false);

//     //  $this->SetXY($x-5, $y+10);
//     //  $this->SetFont('Arial','B',8);
//     //  $this->Cell(20,5,' Site Add.  :',0,1,'L',0,false);

//     //  $this->SetXY($x+15, $y+10);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(35,5,' ',0,1,'L',0,false);

//      // $this->SetXY($x+15, $y+14);
//      // $this->SetFont('Arial','',8);
//      // $this->Cell(35,5,'PUNE-411011 ',0,1,'L',0,false);

//     //  $this->SetXY($x+15, $y+18);
//     //  $this->SetFont('Arial','',8);
//     //  $this->Cell(35,5,'Ph.No. ',0,1,'L',0,false);

//     //  $this->SetXY($x-5, $y+21);
//     //  $this->SetFont('Arial','B',8);
//     //  $this->Cell(120,7,' GST No.   : ',0,1,'L',0,false);
// //   }   

// //  $this->Ln();
//      $y = $this->GetY();
//      $x = $this->GetX();
//     //  $this->SetXY($x-5, $y+9);
//     //  $this->SetFont('Arial','B',15);
//     //  $this->Cell(200,18,'',1,1,'C',0,false);   // 

//     //  $this->SetXY($x-5, $y-10);
//     //        $this->SetFont('Arial','B',9); 
//     //        $this->Cell(200,8,'  ',1,1,'C',0,false);   //

//           $this->SetXY($x-5, $y+16);
//                 $this->SetFont('Arial','B',9);
//                 $this->Cell(10,8,'No.',1,1,'C',0,false);
    
//                 $this->SetXY($x+5, $y+16);
//                   $this->SetFont('Arial','B',9);
//                   $this->Cell(56,8,'Description Of Goods',1,1,'C',0,false);

//      $this->SetXY($x+61, $y+16);
//               $this->SetFont('Arial','B',8);
//               $this->Cell(21,8,'Remark',1,1,'C',0,false);

//         $this->SetXY($x+82, $y+16);
//                   $this->SetFont('Arial','B',9);
//                   $this->Cell(17,8,'Size',1,1,'C',0,false);

//           $this->SetXY($x+99, $y+16);
//                         $this->SetFont('Arial','B',9);
//                         $this->Cell(17,8,'Quantity',1,1,'C',0,false);

//              $this->SetXY($x+116, $y+16);
//                   $this->SetFont('Arial','B',9);
//                     $this->Cell(19,8,'Sq.Ft.',1,1,'C',0,false);                                           
//               $this->SetXY($x+135, $y+16);
//                         $this->SetFont('Arial','B',9);
//                       $this->Cell(30,8,'Rate',1,1,'C',0,false);
                                        
//                      $this->SetXY($x+165, $y+16);
//                             $this->SetFont('Arial','B',9);
//                             $this->Cell(30,8,'Amount',1,1,'C',0,false);

//     //  $sql_charges2 = "SELECT woi.*, mi.item_id_pk, mi.final_product_code
//     //  FROM wholesale_work_order_items AS woi, mstr_item AS mi 
//     //  WHERE woi.item_id_fk = mi.item_id_pk AND woi.work_order_no_id_fk = '$edit_id' ";
     
//     //  $result_charges2 = mysqli_query($db, $sql_charges2);
//     //  while($row2 =mysqli_fetch_row($result_charges2))
//     //  {                        

//     $y = $this->GetY();
//     $x = $this->GetX();

//     // $this->SetXY($x+5, $y);
//     // $this->SetFont('Arial','',8);
//     // $this->Cell(56,12,'',1,1,'L',0,false);    ///           1

//     // $this->SetXY($x+5, $y);
//     // $this->SetFont('Arial','B',9);
//     // $this->Cell(17,12,'    ',1,1,'L',0,false);    ///              2

//          $this->SetXY($x-5, $y);
//          $this->SetFont('Arial','B',9);
//          $this->Cell(10,9,'1',1,1,'C',0,false);             ///$row2['1']

//           $this->SetXY($x+5, $y);
//           $this->SetFont('Arial','',9);
//           $this->Cell(56,9,'',1,1,'L',0,false);             //

//                   $this->SetXY($x+5, $y+1);
//                   $this->SetFont('Arial','',9);
//                   $this->Cell(56,4,'fgdfgdf',0,1,'L',0,false);             // $row2['20']

//                     $this->SetXY($x+5, $y+5);
//                     $this->SetFont('Arial','',9);
//                     $this->Cell(56,4,'fgdfgdf',0,1,'L',0,false);   

//                         $this->SetXY($x+61, $y);
//                         $this->SetFont('Arial','',8);
//                         $this->Cell(21,9,'ok',1,1,'C',0,false);            //$row2['12']

//                              $this->SetXY($x+82, $y);
//                              $this->SetFont('Arial','',8);
//                              $this->Cell(17,9,'10',1,1,'C',0,false);            // $row2['4']

//                                   $this->SetXY($x+99, $y);
//                                   $this->SetFont('Arial','',9);
//                                   $this->Cell(17,9,'4',1,1,'C',0,false);        // $row2['3']

//                                       $this->SetXY($x+116, $y);
//                                       $this->SetFont('Arial','',8);
//                                       $this->Cell(19,9,'10',1,1,'C',0,false);        //$row2['5']

//                                         $this->SetXY($x+135, $y);
//                                         $this->SetFont('Arial','',8);
//                                         $this->Cell(30,9,'500',1,1,'C',0,false);           //$row2['6']

//                                           $this->SetXY($x+165, $y);
//                                           $this->SetFont('Arial','',9);
//                                           $this->Cell(30,9,'200  ',1,1,'R',0,false);             //$row2['9']
//                   //    }
//     // $this->SetXY($x+5, $y);
//     // $this->SetFont('Arial','',8);
//     // $this->Cell(56,9,'',1,1,'L',0,false);    ///

//     // $this->SetXY($x+99, $y);
//     // $this->SetFont('Arial','B',9);
//     // $this->Cell(17,7,'    ',1,1,'L',0,false);    ///


//   $this->Ln(-37);
//       $y = $this->GetY();
//       $x = $this->GetX();
//       $this->SetXY($x-5, $y+37);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(170,5,'Grand Total',1,1,'C',0,false);
//       $this->SetXY($x+95, $y+37);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(20,5,$row['9'],0,1,'C',0,false);

//       $this->SetXY($x+115, $y+37);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(20,5,$row['10'],0,1,'C',0,false);

//       $this->SetXY($x+165, $y+37);
//       $this->SetFont('Arial','B',9);
//       $this->Cell(30,5,$row['11'],1,1,'R',0,false);

//   // $this->Ln(5);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-5, $y);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(200,85,'  ',1,1,'C',0,false);   //  //
     
//      $this-> Ln(-20);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-5, $y-65);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(20,8,'In Words -',0,1,'C',0,false); //

//      $this->SetXY($x+14, $y-64);
//      $this->SetFont('Arial','',9);
//      $this->Cell(115,6,'Rs.'.convertNum($row['11']),0,1,'L',0,false);
     
//     $this->Ln(20);
//      $y = $this->GetY();
//      $x = $this->GetX();
//      $this->SetXY($x-3, $y-17);
//      $this->SetFont('Arial','B',9);
//      $this->Cell(49,20,' ',0,1,'L',0,false);    //box2

//     $this->SetXY($x-3, $y-17);
//     $this->SetFont('Arial','',8);
//     $this->Cell(49,5,'KOTAK MAHINDRA BANK',0,1,'L',0,false);
    
//     $this->SetXY($x-3, $y-13);
//     $this->SetFont('Arial','',8);
//     $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);
    
//     $this->SetXY($x-3, $y-9);
//     $this->SetFont('Arial','',8);
//     $this->Cell(49,5,'A/C NO: 3912034064',0,1,'L',0,false);

//     $this->SetXY($x-3, $y-5);
//     $this->SetFont('Arial','',8);
//     $this->Cell(49,5,'BRANCH: BIBWEWADI, PUNE',0,1,'L',0,false);

//     $this->SetXY($x-3, $y-1);
//     $this->SetFont('Arial','',8);
//     $this->Cell(49,5,'IFSC: KKBK0001770',0,1,'L',0,false);

//     $this->SetXY($x+50, $y+4);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(49,20,' ',0,1,'L',0,false);    //box1

//      $this->SetXY($x+50, $y-17);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'HDFC BANK',0,1,'L',0,false);             ///

//      $this->SetXY($x+50, $y-13);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'SIGNATURE CONCEPTS LLP',0,1,'L',0,false);

//      $this->SetXY($x+50, $y-9);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'A/C NO: 50200052017929',0,1,'L',0,false);

//      $this->SetXY($x+50, $y-5);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'BRANCH: , PUNE',0,1,'L',0,false);
     
//      $this->SetXY($x+50, $y-1);
//      $this->SetFont('Arial','',8);
//      $this->Cell(49,5,'IFSC: HDFC0005718',0,1,'L',0,false);


//   $this->ln(-29);
//     $y = $this->GetY();
//     $x = $this->GetX();

//     $this->SetXY($x+135, $y-2);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,40,'',1,1,'L',0,false);    // box3

//     $y = $this->GetY();
//     $x = $this->GetX();
//     $this->SetXY($x+135, $y-37);
//     $this->setFont('Arial', 'B',9);
//     $this->Cell(30,5,'Discount',0,1,'C',0,false);

//     $this->SetXY($x+165, $y-37);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,$row['14'],0,1,'R',0,false);

//     $this->SetXY($x+135, $y-31);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'Load / Unload',0,1,'C',0,false);  

//     $this->SetXY($x+165, $y-31);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'0',0,1,'R',0,false);         //

//     $this->SetXY($x+135, $y-25);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'Others(+/-)',0,1,'C',0,false);
    
//     $this->SetXY($x+165, $y-25);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,$row['15'],0,1,'R',0,false); 

//     $this->SetXY($x+135, $y-19);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'Transport',0,1,'C',0,false);

//     $this->SetXY($x+165, $y-19);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'0',0,1,'R',0,false);                /// check

//     $this->SetXY($x+135, $y-13);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'GST',0,1,'C',0,false); 

//     $this->SetXY($x+165, $y-13);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,5,'0',0,1,'R',0,false);            //

//     $this->Ln(-10);
//     $y = $this->GetY();
//     $x = $this->GetX();
//     $this->SetXY($x-5, $y+12);
//     $this->SetFont('Arial','B',15);
//     $this->Cell(200,6,' ',1,1,'C',0,false); // vertical box

//     // $this->SetXY($x+2, $y+12);
//     // $this->SetFont('Arial','B',9);
//     // $this->Cell(15,6,'GST No.',0,1,'C',0,false);
//     // $this->SetXY($x+18, $y+12);
//     // $this->SetFont('Arial','B',9);
//     // $this->Cell(30,6,'27ADHFS0274J1ZU',0,1,'C',0,false);

//     $this->SetXY($x+65, $y+12);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,6,'PAN NO.',0,1,'C',0,false);
//     $this->SetXY($x+85, $y+12);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,6,'ADHFS0274J',0,1,'C',0,false);
  
//     $this->SetXY($x+135, $y+9.5);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,10,'Net Amount.',0,1,'C',0,false);
//     $this->SetXY($x+165, $y+9.5);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(30,10,$row['17'],0,1,'R',0,false);

  
//     // $this->Ln(-3);
//     // $y = $this->GetY();
//     // $x = $this->GetX();
//     // $this->SetXY($x-1, $y+2);
//     //  $this->SetFont('Arial','',7.6);
//     //  $this->Cell(127,4,'INTEREST @18 % WILL BE CHARGED IF NOT PAID WITHIN 7 DAYS',0,1,'L',0,false);

//     //  $this->SetXY($x-1, $y+5);
//     //  $this->SetFont('Arial','',7.6);
//     //  $this->Cell(127,4,"Shortage,Breakage,Damage etc. During Transit At Buyer's Risk.",0,1,'L',0,false);


//              // $this->SetXY($x-5, $y+16);
//              // $this->SetFont('Arial','B',9);
//              // $this->Cell(50,20,'',1,1,'L',0,false);

//               $this->Ln(-8);
//     $y = $this->GetY();
//     $x = $this->GetX();
//     $this->SetXY($x-3, $y+11);
//     $this->SetFont('Arial','B',9);
//     $this->Cell(40,8,'TERM & CONDITIONS -',0,1,'L',0,false);

//     $this->SetXY($x, $y+16);
//     $this->SetFont('Arial','',7);
//     $this->Cell(60,7,'# GOODS ONCE SOLD WILL NOT BE TAKEN BACK',0,1,'L',0,false);
//     $this->SetXY($x, $y+19);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'# CHECK MATERIAL BEFORE TEMPO LEAVE SITE, LATER NO   ',0,1,'L',0,false);
//     $this->SetXY($x, $y+22);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'   COMPLAINT WILL BE ENTERTAINED',0,1,'L',0,false);

//     $this->SetXY($x, $y+25);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'# NO COMPLAINT WILL BE ENTERTAINED IF TILES NOT LAID',0,1,'L',0,false);

//     $this->SetXY($x, $y+28);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'   AS PER STANDARED INSTRUCTION',0,1,'L',0,false);

//     $this->SetXY($x, $y+31);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'# UPTO 3% BREAKAGE CAN BE POSSIBLE DUE TO NATURE OF MATERIAL',0,1,'L',0,false);

//     $this->SetXY($x, $y+34);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'# 100% ADVANCE PAYMENT AGAINST DELIVERY',0,1,'L',0,false);

//     $this->SetXY($x, $y+37);
//     $this->SetFont('Arial','',7);
//     $this->Cell(40,8,'# UNLOADING WILL BE CUSTOMER END',0,1,'L',0,false);


//  $this->Ln(5);
//     $y = $this->GetY();
//     $x = $this->GetX();
//     $this->SetXY($x+124, $y-13);
//     $this->SetFont('Arial','B',13);
//     $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

//     $this->SetXY($x+118, $y-3);
//     $this->SetFont('Arial','',9);
//     $this->Cell(68,15,' FOR Signature Concept LLP',0,1,'C',0,false);

//     $this->SetXY($x+118, $y+9);
//     $this->SetFont('Arial','',9);
//     $this->Cell(68,15,'Authorised Sign.',0,1,'C',0,false);

//     $this->SetXY($x-5, $y+9);
//     $this->SetFont('Arial','',9);
//     $this->Cell(50,15,"Receiver's Sign.",0,1,'C',0,false);
    

//     }

//     function Footer()
//     {
   
          
//     }
   
//   }
//     $pdf= new this();
//     $pdf = new this('L','mm',array(210,200));
//     $pdf->AliasNbPages();
   
//   // // Add new pages
//   // // Add new pages
//     $pdf->SetAutoPageBreak(true,130);
//     $pdf->AddPage();
//   //      $pdf->Ln();
   
        
//   $pdf->Output("invoice.pdf","F");

//   $pdf->Output();
   
    ?>   