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

            // $y = $this->GetY();
            // $x = $this->GetX();
            // $this->SetXY($x+143, $y-32);
            // $this->SetFont('arial','',8);
            // $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
            // $this->SetXY($x+146, $y-32);
            // $this->SetFont('arial','',8);
            // $this->Cell(18,3,'Original PDF',0,1,'L',0,false);
            // $this->SetXY($x+167, $y-32);
            // $this->SetFont('arial','',8);
            // $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
            // $this->SetXY($x+170, $y-32);
            // $this->SetFont('arial','',8);
            // $this->Cell(20,3,'Duplicate PDF',0,1,'L',0,false);

            $db = mysqli_connect("192.168.0.101","stn","root","nks2");

            $y = $this->GetY();
            $x = $this->GetX();
                    $this->SetXY($x+52, $y+14);
                    $this->SetFont('arial','B',12);
                    $this->Cell(10,0,'Return Goods [Debit Note]',0,1);


             $this->SetXY($x, $y+10);
             $this->Image('C:/Users/admin/Desktop/Work/LOGO-SIGNATURE_3.jpeg',45,18,13);

               // $this->Image('../../app-assets/images/pdf/LOGO-SIGNATURE_3.jpeg',57,17,12);
              //$this->Image('C:\Users\admin\Desktop\Work\signature_2.jpg',45,20,15);

            $this-> Ln();
        
                $y = $this->GetY();
                $x = $this->GetX();
                        $this->SetXY($x+53.5, $y+11);
                        $this->SetFont('arial','B',12);
                        $this->Cell(10,0,'Signature Concept LLP',0,1);

                $this->SetXY($x+107, $y-5);
                $this->SetFont('arial','',8);
                $this->Cell(3,3,'',1,1,'L',0,false);      // Checkbox
                $this->SetXY($x+110, $y-5);
                $this->SetFont('arial','',8);
                $this->Cell(18,3,'Original PDF',0,1,'L',0,false);
                $this->SetXY($x+131, $y-5);
                $this->SetFont('arial','',8);
                $this->Cell(3,3,'',1,1,'L',0,false);            // Checkbox
                $this->SetXY($x+135, $y-5);
                $this->SetFont('arial','',8);
                $this->Cell(20,3,'Duplicate PDF',0,1,'L',0,false);


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
                      
            
             $this->Line(8,46.5,166,46.5); //line


            

                        $edit_id = 2;     //$_GET['id'];

             $sql_charges =  " SELECT * 
                            FROM grn
                             WHERE grn_id_pk  = '$edit_id'";

                    $result_charges = mysqli_query($db, $sql_charges);
                    $row = mysqli_fetch_row($result_charges);

            //  $x = $this->GetX();
            //  $y = $this->GetY();
             $this->SetXY($x, $y+28);
             $this->SetFont('arial','B',9);
             $this->Cell(20,5,'Supplier    :',0,1,'L',0,false);

             $this->SetXY($x+20, $y+28);
             $this->SetFont('arial','',8);
             $this->Cell(40,5,$row['1'],0,1,'L',0,false);                  //'KOHILER INDIA CORPORATE PVT. LTD.'

             $this->SetXY($x+95, $y+28);
             $this->SetFont('arial','B',9);
             $this->Cell(16,5,'        No. :',0,1,'L',0,false);

             $this->SetXY($x+113, $y+28);
             $this->SetFont('arial','',9);
             $this->Cell(30,5,$row['6'],0,1,'L',0,false);

             $this->SetXY($x, $y+34);
             $this->SetFont('arial','B',9);
             $this->Cell(20,5,'Phone No. :',0,1,'L',0,false);

             $this->SetXY($x+20, $y+34);
             $this->SetFont('arial','',9);
             $this->Cell(40,5,$row['7'],0,1,'L',0,false);
             
             $this->SetXY($x+95, $y+34);
             $this->SetFont('arial','B',9);
             $this->Cell(16,5,'      Date  :',0,1,'L',0,false);

             $this->SetXY($x+113, $y+34);
             $this->SetFont('arial','',9);
             $this->Cell(16,5,$row['10'],0,1,'L',0,false);

             $this->SetXY($x, $y+40);
             $this->SetFont('arial','B',9);
             $this->Cell(20,5,' Address   :',0,1,'L',0,false);

             $this->SetXY($x+20, $y+40);
             $this->SetFont('arial','',8);
             $this->Cell(70,5,$row['2'],0,1,'L',0,false);

            //  $this->SetXY($x+20, $y+43);
            //  $this->SetFont('arial','',8);
            //  $this->Cell(70,5,'MAHARASHTRA',0,1,'L',0,false);

             $this->SetXY($x+90, $y+40);
             $this->SetFont('arial','B',9);
             $this->Cell(16,5,'      GRN No. :',0,1,'L',0,false);

             $this->SetXY($x+113, $y+40);
             $this->SetFont('arial','',9);
             $this->Cell(16,5,$row['4'],0,1,'L',0,false);
         
             

             $this->Line(8,70,166,70); //line


             $y = $this->GetY();
             $x = $this->GetX();

             $this->SetXY($x-2, $y+4.5);
             $this->SetFont('arial','B',9);
             $this->Cell(10,8,'Sr.No',0,1,'L',0,false);

             $this->SetXY($x+14, $y+4.5);
             $this->SetFont('arial','B',9);
             $this->Cell(30,8,'Particulars',0,1,'L',0,false);
        
             $this->SetXY($x+85, $y+4.5);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,'Size',0,1,'C',0,false);

             $this->SetXY($x+111, $y+4.5);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,'Qty',0,1,'C',0,false);

             $this->SetXY($x+134, $y+4.5);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,'Rate',0,1,'C',0,false);

             $this->Line(8,78,166,78); //line
         
             $this->Line(8,93,166,93); //line



         $edit_id = 3;

          $sql_charges2 = "SELECT * 
                                FROM grn_items
                                WHERE id_pk = '$edit_id'";

        $result_charges2 = mysqli_query($db, $sql_charges2);
        $row2 = mysqli_fetch_row($result_charges2);


             $y = $this->GetY();
             $x = $this->GetX();

             
             $this->SetXY($x-1, $y+1);
             $this->SetFont('arial','',9);
             $this->Cell(10,8,$row2['2'],0,1,'C',0,false);

             $this->SetXY($x+14, $y+1);
             $this->SetFont('arial','',9);
             $this->Cell(30,8,$row2['3'],0,1,'L',0,false);

            //  $this->SetXY($x+14, $y+4);
            //  $this->SetFont('arial','',9);
            //  $this->Cell(30,8,'Supplier Code',0,1,'L',0,false);

              $this->SetXY($x+85, $y+1);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row2['4'],0,1,'C',0,false);

             $this->SetXY($x+111, $y+1);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row2['5'],0,1,'C',0,false);

             $this->SetXY($x+133, $y+1);
             $this->SetFont('arial','',9);
             $this->Cell(15,8,$row2['6'],0,1,'C',0,false);

             $this->SetXY($x+105, $y+15);
             $this->SetFont('arial','B',9);
             $this->Cell(25,8,'Grand Total:',0,1,'C',0,false);

             $this->SetXY($x+135, $y+15);
             $this->SetFont('arial','B',9);
             $this->Cell(15,8,$row2['10'],0,1,'C',0,false);

            //  $this->Line(8,103,166,103); //line
            }

        }
    
    
        $pdf = new PDF('L','mm',array(115,174));
        $pdf->AliasNbPages();
    
        // Add new pages
        // Add new pages
        $pdf->SetAutoPageBreak(true,130);
        $pdf->AddPage();
    
          $pdf->Ln();
    
        $pdf->Output();
    
    ?>