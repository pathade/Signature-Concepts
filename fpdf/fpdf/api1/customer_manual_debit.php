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

            include('../../database/dbconnection.php');
            $edit_id = $_GET['id'];
        
            $sql_charges="SELECT *
            FROM customer_manual_debit_credit 
            WHERE id ='$edit_id' ";

            $result_charges = mysqli_query($db, $sql_charges);
            $row=mysqli_fetch_row($result_charges);

           
           

            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+50, $y+14);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Customer Manual [Debit Note]',0,1);

             $this->SetXY($x, $y+10);
              $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',47,17,13);

            $this-> Ln();
        
            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+53.5, $y+11);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Signature Concept LLP',0,1);


                     $this->SetXY($x+23, $y+15);
                     $this->SetFont('arial','',8);
                    //  $this->Cell(200,46,'  ',1,1,'C',0,false);
                 $this->Cell(110,5,'S NO-651/ 25/ 1,GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'R',0,false);
            
                      $this->SetXY($x+20, $y+18.5);
                       $this->SetFont('arial','',8);
                       $this->Cell(110,5,'OPP SHREEJI LAWNS, BIBWADI, PUNE - 411037, MAHARASHTRA, INDIA',0,1,'R',0,false);
                       
           
                         $this->SetXY($x+15.5, $y+21.5);
                          $this->SetFont('arial','',8);
                          $this->Cell(110,5,'Phone No : 7757033204  EmailId : signatureconcepts.pune@gmail.com',0,1,'R',0,false);
                      
            
                        if ($row[2] == "Retailer") 
                        {
                            $sql_charges1="SELECT *
                            FROM mstr_retail_customer 
                            WHERE retail_cust_idpk = $row[5] ";
            
                            $result_charges1 = mysqli_query($db, $sql_charges1);
                            $row1=mysqli_fetch_row($result_charges1);
                        
                            $this->Line(8,46.5,166,46.5); //line

                            //  $x = $this->GetX();
                            //  $y = $this->GetY();
                            $this->SetXY($x, $y+28);
                            $this->SetFont('arial','B',9);
                            $this->Cell(20,5,'Customer    :',0,1,'L',0,false);

                            $this->SetXY($x+20, $y+28);
                            $this->SetFont('arial','',8);
                            $this->Cell(40,5,$row1[1],0,1,'L',0,false);

                            $this->SetXY($x+92, $y+28);
                            $this->SetFont('arial','B',9);
                            $this->Cell(16,5,'Mobile No. :',0,1,'L',0,false);

                            $this->SetXY($x+113, $y+28);
                            $this->SetFont('arial','',9);
                            $this->Cell(30,5,$row1[4],0,1,'L',0,false);

                            $this->SetXY($x, $y+34);
                            $this->SetFont('arial','B',9);
                            $this->Cell(20,5,'Phone No. :',0,1,'L',0,false);

                            $this->SetXY($x+20, $y+34);
                            $this->SetFont('arial','',9);
                            $this->Cell(40,5,$row1[3],0,1,'L',0,false);
                            
                            $this->SetXY($x+95, $y+34);
                            $this->SetFont('arial','B',9);
                            $this->Cell(16,5,'      Date  :',0,1,'L',0,false);

                            $this->SetXY($x+113, $y+34);
                            $this->SetFont('arial','',9);
                            $this->Cell(16,5,$row[4],0,1,'L',0,false);

                            $this->SetXY($x, $y+40);
                            $this->SetFont('arial','B',9);
                            $this->Cell(20,5,' Address   :',0,1,'L',0,false);

                            $this->SetXY($x+20, $y+40);
                            $this->SetFont('arial','',8);
                            $this->Cell(70,5,$row1[2],0,1,'L',0,false);

                        }

            else if ($row[2] == "Wholesaler") {
                $sql_charges2="SELECT *
                FROM tbl_wholesale_customer 
                WHERE wc_id_pk = $row[5] ";

                $result_charges2 = mysqli_query($db, $sql_charges2);
                $row2=mysqli_fetch_row($result_charges2);

                $this->Line(8,46.5,166,46.5); //line

                //  $x = $this->GetX();
                //  $y = $this->GetY();
                 $this->SetXY($x, $y+28);
                 $this->SetFont('arial','B',9);
                 $this->Cell(20,5,'Customer    :',0,1,'L',0,false);
    
                 $this->SetXY($x+20, $y+28);
                 $this->SetFont('arial','',8);
                 $this->Cell(40,5,$row2[1],0,1,'L',0,false);
    
                 $this->SetXY($x, $y+34);
                 $this->SetFont('arial','B',9);
                 $this->Cell(20,5,'Phone No. :',0,1,'L',0,false);
    
                 $this->SetXY($x+20, $y+34);
                 $this->SetFont('arial','',9);
                 $this->Cell(40,5,$row2[4],0,1,'L',0,false);
                 
                 $this->SetXY($x+95, $y+28);
                 $this->SetFont('arial','B',9);
                 $this->Cell(16,5,'      Date  :',0,1,'L',0,false);
    
                 $this->SetXY($x+113, $y+28);
                 $this->SetFont('arial','',9);
                 $this->Cell(16,5,$row[4],0,1,'L',0,false);
    
                 $this->SetXY($x, $y+40);
                 $this->SetFont('arial','B',9);
                 $this->Cell(20,5,'Office Address   :',0,1,'L',0,false);
    
                 $this->SetXY($x+30, $y+40);
                 $this->SetFont('arial','',8);
                 $this->Cell(70,5,$row2[3],0,1,'L',0,false);

            }
             

             $this->Line(8,70,166,70); //line

             $this->SetXY($x-2, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(10,8,'Amount',0,1,'L',0,false);

             $this->SetXY($x-1, $y+58);
             $this->SetFont('arial','',9);
             $this->Cell(10,8,$row[8],0,1,'C',0,false);

             $this->SetXY($x+25, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(30,8,'Total',0,1,'L',0,false);

             $this->SetXY($x+25, $y+58);
             $this->SetFont('arial','',9);
             $this->Cell(30,8,$row[9],0,1,'L',0,false);

             $this->SetXY($x+85, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,'Tax Amount',0,1,'C',0,false);

             $this->SetXY($x+85, $y+58);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row[11],0,1,'C',0,false);

             $this->SetXY($x+111, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,'Other',0,1,'C',0,false);

             $this->SetXY($x+111, $y+58);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row[12],0,1,'C',0,false);

             $this->SetXY($x+134, $y+50);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,'Final Amount',0,1,'C',0,false);

             $this->SetXY($x+134, $y+58);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row[13],0,1,'C',0,false);



            //  $this->SetXY($x+105, $y+75);
            //  $this->SetFont('arial','B',9);
            //  $this->Cell(25,8,'Grand Total:',0,1,'C',0,false);

            //  $this->SetXY($x+135, $y+75);
            //  $this->SetFont('arial','B',9);
            //  $this->Cell(15,8,'1',0,1,'C',0,false);

            //  $this->Line(8,103,166,103); //line
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