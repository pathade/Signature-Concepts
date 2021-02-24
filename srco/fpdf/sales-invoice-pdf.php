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


// $id = $_GET['pdf_id'];
    //$i=$_GET['id'];

     $code="";
    class PDF extends FPDF
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


   // //$pdf_name = $_GET['pdf_name'];
   //   $id = $_GET['pdf_id'];
     
   //   $view_sql="SELECT mc.name as cname ,baddr1,baddr2,baddr3,bpin,saddr1,saddr2,saddr3,spin,si.date as date
   //   FROM sales_invoice si,mstr_customer mc
   //   WHERE sales_invoice_no='$id' and si.customer_id_fk=mc.id";
   //   $show_result=mysqli_query($db,$view_sql) or die(mysqli_error($db));
   //   //$view_row = mysqli_fetch_assoc($show_result);
   //   $quot_date="";
   //   while ($view_row = mysqli_fetch_array($show_result))
   //   {
   //     $cname=$view_row['cname'];
   //     $baddr1=$view_row['baddr1'];
   //     $baddr2=$view_row['baddr2'];
   //     $baddr3=$view_row['baddr3'];
   //     $bpin=$view_row['bpin'];
   //     $saddr1=$view_row['saddr1'];
   //     $saddr2=$view_row['saddr2'];
   //     $saddr3=$view_row['saddr3'];
   //     $spin=$view_row['spin'];
   //       $sidate=$view_row['date'];


   //   }


     $today = date("Y-m-d");

     $this->Image('uploads/user.jpg',10,8.5,15);


     $this->SetFont('Arial','B',15);
     $this->Cell(18,0,'',0,0);
     $this->Cell(89,0,'Anvi Industry',0,0);
       $this->SetFont('Arial','',12);

       $y = $this->GetY();
       $x = $this->GetX();
               $this->SetXY($x+45, $y-6);
       //$this->Cell(85,0,'('.$pdf_name.')',0,0);
               $this->Ln(6);


     $this->Image('uploads/download.jpg',190,8.5,10);
     $this->Ln(10);

     $this->SetFont('Arial','',10);
     $this->Cell(17,0,' ',0,0);
     $y = $this->GetY();
     $x = $this->GetX();
             $this->SetXY($x, $y-3);
     $this->Cell(14,0,'GSTIN:-',0,0);
     $this->Cell(68,0,'27BTTPG2970CIZI',0,0);
     $this->SetFont('Arial','B',7);
     $this->Cell(77,0,'',0,0);
     $y = $this->GetY();
     $x = $this->GetX();
             $this->SetXY($x, $y+3.5);
     $this->Cell(68,0,'ISO 9001:2015',0,0);
     $this->Ln(4);

     $this->Cell(174.5,0,'',0,0);
     $this->Cell(68,0,'CERTIFIED UNIT',0,0);

     $this->Ln(7);
     $this->SetLineWidth(0.1);
     $this->SetFillColor(255,255,255);
     $this->RoundedRect(70, 22, 70, 9, 2.5, 'DF');
     $this->SetFont('Times','B',22);
     $y = $this->GetY();
     $x = $this->GetX();
             $this->SetXY($x, $y-4);
     $this->Cell(190,0,'TAX INVOICE ',0,1,'C');
     $this->SetFont('Arial','',11);
     $this->Line(2,27,70,27);
     $this->Line(140,27,208,27);

     $this->Ln(5);

     $this->SetFont('Arial','',12);
// Background color?php
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetFillColor(248,203,173);

     $this->Cell(195,6,"Invoice No: ",1,1,'L',true);
     $this->SetXY($x +25, $y+0.5);
     $this->SetFont('Arial','B',12);
     $this->Cell(50,5,"123",0,1,'L',true);
     $this->SetXY($x +139, $y+0.5);
     $this->SetFont('Arial','',12);
     $this->Cell(50,5,"Invoice Date:",0,1,'L',true);
     $this->SetXY($x +166, $y+0.5);
     $this->SetFont('Arial','B',12);
     $this->Cell(28,5,"sidate",0,1,'L',true);

     $this->Ln(6);
     $this->SetFillColor(255,255,255);
     $this->SetFont('Arial','B',10);
     $this->Cell(67,0,'Customer Name',0,0);
     $this->Cell(63,0,'Billing Address',0,0);
     $this->Cell(65,0,'Shipping Address',0,0);
     $this->Ln(5);
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetFont('Arial','',9);
     $this->Cell(52,0,"abcd" ,0,0);


     // $this->Cell(168,0,'Pragati Engg Work',0,1,'C');
     $this->SetXY($x + 67, $y - 3);
     $this ->MultiCell(56,6,"abcd"."\n"."abcd"."\n"."abcd".'-'."abcd", 0, 1, 'R');

     $this->SetXY($x + 130, $y - 3);
     $this ->MultiCell(56,6,"abcd"."\n"."abcd"."\n"."abcd".'-'."abcd", 0, 1, 'R');

       $this->Ln(1);
       $this->SetFont('Arial','B',10);
       $this->SetXY($x, $y +10);
       $this->Cell(37,0,'Customer GSTN',0,0);
       $this->Cell(32,0,'Vendor Code',0,0);

       $this->SetFont('Arial','',9);
       $this->Ln(7);
       $this->Cell(37,0,'27AADPW3395H1Z8',0,0);
       $this->Line(45,57,45,69);

       $this->Cell(140,0,'700270',0,0);

       $this->Ln(5);
       $this->SetFillColor(248,203,173);
       $this->SetFont('Arial','B',9);

       $this->Cell(11,12,'Sr.No',1,'L',1,true);
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


     ////border////
     $width=$this -> w; // Width of Current Page
     $height=$this -> h; // Height of Current Page
     $edge=2;
         $edge1=7;// Gap between line and border , change this value

     $this->Line($edge, $edge1,$width-$edge,$edge1); // Horizontal line at top
     $this->Line($edge, $height-$edge,$width-$edge,$height-$edge); // Horizontal line at bottom
     $this->Line($edge, $edge1,$edge,$height-$edge); // Vetical line at left side
     $this->Line($width-$edge, $edge1,$width-$edge,$height-$edge); // Vetical line at Right side


     /////border end////
 }

 function Footer()
    {

     //  include('../../partials/dbconnection.php');

     //  $id = $_GET['pdf_id'];
     //  $id;
     //  $view_sql1="SELECT si.id,cgst_amount,sgst_amount,igst_amount,total_tax,total_other_charges_amt,total_other_charges_amt1,total_amount,mpt.name as payment_term,transport
     //  from sales_invoice si,mstr_payment_term mpt WHERE sales_invoice_no='$id' and si.payment_term_fk= mpt.id";
     // $show_result1=mysqli_query($db,$view_sql1) or die(mysqli_error($db));
     // //$view_row = mysqli_fetch_assoc($show_result);
     // $id1="";
     // $cgst_amount="";
     // $sgst_amount="";
     // $igst_amount="";
     // $total_tax="";
     // $other_charges_amt="";
     // $other_charges_amt1="";
     // $other_charges_total="";
     // $total_amount="";
     // $payment_term="";
     // $transport="";
     // while ($view_row = mysqli_fetch_array($show_result1))
     // {
     //   $id1=$view_row['id'];
     //   $cgst_amount=$view_row['cgst_amount'];
     //   $sgst_amount=$view_row['sgst_amount'];
     //   $igst_amount=$view_row['igst_amount'];
     //   $total_tax=$view_row['total_tax'];
     //   $other_charges_amt=$view_row['total_other_charges_amt'];
     //   $other_charges_amt1=$view_row['total_other_charges_amt1'];
     //   $other_charges_total=$other_charges_amt +$other_charges_amt1;
     //   $total_amount=$view_row['total_amount'];
     //   $payment_term=$view_row['payment_term'];
     //   $transport=$view_row['transport'];


     // }

     //  $view_sql2="SELECT soi.id,so.sales_order_no,soi.po_line_no,mi.code,sii.invoice_quantity,mi.description,mi.drawing_no,
     // mi.revision_no,mi.hsn,mi.sac,soi.quantity,soi.unit,soi.rate,soi.total,input_type,discount_percent,discount_rs,
     // cgst,sgst,igst from sales_invoice si, sales_invoice_items sii, sales_order so
     // ,sales_order_item soi,mstr_item mi, mstr_tax mt 
     // WHERE si.sales_invoice_no='$id' and si.id=sii.sales_invoice_fk and sii.sales_order_fk=so.id and 
     // sii.sales_order_items_fk =soi.id and so.id=soi.sales_order_id_fk and soi.item_id_fk=mi.id and 
     // mi.tax_id_fk=mt.id";
     // $show_result2=mysqli_query($db,$view_sql2) or die(mysqli_error($db));
     // //$view_row = mysqli_fetch_assoc($show_result);
     // $total1=0;
     // $discount_rs1=0;
     // $i = 1;
     // $total="";
     // while ($view_row = mysqli_fetch_array($show_result2))
     // {
     //   $count=$i++;
     //   $sales_order_no=$view_row['sales_order_no'];
     //   $po_line_no=$view_row['po_line_no'];
     //   $item_code=$view_row['code'];
     //   $description=$view_row['description'];
     //   $drawing_no=$view_row['drawing_no'];
     //   //$h_no=$view_row['h_no'];
     //   $hsn_code=$view_row['hsn'];
     //   $order_quantity=$view_row['invoice_quantity'];
     //   $rate=$view_row['rate'];
     //   $discount_percent=$view_row['discount_percent'];
     //   $discount_percent=number_format($discount_percent,0);
     //   $discount_rs=$view_row['discount_rs'];
     //   $total=$order_quantity * $rate;
     //   $totalamount=($order_quantity * $rate)-$discount_rs;
     //   $total1=$total1+$total;
     //   $discount_rs1=$discount_rs1+$discount_rs;

     // }




     $this->Ln(18);
          $this->SetFont('Arial','B',12);
          $this->Cell(-7.5 ,0,'',0,0);
          $this->Cell(37,0,'Payment Terms :-',0,0);
          $this->SetFont('Arial','',12);
          $this->Cell(185,0,"10 Days",0,0);
          $this->Ln(10);
          $this->SetFont('Arial','B',12);
          $this->Cell(-7.5 ,0,'',0,0);
          $this->Cell(35,0,'Transport :-',0,0);
          $this->SetFont('Arial','',12);
          $this->Cell(185,0,'By '."By Air",0,0);
          $this->Ln(16);

          $this->SetFont('Arial','B',9);


          $y = $this->GetY();
          $x = $this->GetX();
          $this->SetXY($x -8, $y - 47);
          $this->Cell(206,0,'',1,'L',1);
          $this->SetXY($x + 121, $y - 47);
          $this->SetFillColor(248,203,173);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'TOTAL AMOUNT',1,'R',0,TRUE);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0,TRUE);
        

          $this->Ln();
          $this->SetXY($x + 121, $y-41);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'Discount %',1,'R',0,TRUE);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,'',1,'R',0,TRUE);
          $this->Image('uploads/Rs1.jpg',175,174,2.5  );
        
          $this->Ln();
          $this->SetXY($x + 121, $y-35);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'Total Taxable Amount',1,'R',0,TRUE);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0,TRUE);
         
          $this->SetXY($x + 121, $y-29);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'CGST @ 9%',1,'R',0);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0);
   

          $this->Ln();
          $this->SetXY($x + 121, $y-23);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'SGST @ 9%',1,'R',0);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0);


          $this->Ln();
          $this->SetXY($x + 121, $y-17);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'IGST @ 9%',1,'R',0);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,'',1,'R',0);
       


          $this->Ln();
          $this->SetXY($x + 121, $y-11);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'Total GST',1,'R',0);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0);
   

          $this->Ln();
          $this->SetXY($x + 121, $y-5);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'Total Other Charges',1,'R',0);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0);
     

          $this->Ln();
          $this->SetXY($x + 121, $y-0);
          $this->SetFont('Arial','B',9);
          $this->Cell(40,6,'Invoice Total',1,'R',0,TRUE);
          $this->SetFont('Arial','',9);
          $this->Cell(11,6,' ',1,'R',0,TRUE);
    

          $this->Ln(2);

          $this->SetFont('Arial','B',11);
          $this->Cell(-8,0,'',0,'L');
          $this->Cell(52,0,'INVOICE TOTAL IN WORD :-',0,'L');
          $this->Ln(6);
          $this->SetFont('Arial','',11);
          $this->Cell(2,0,'',0,'L');
          $this->Cell(68,0,convertNum("10000").' Only',0,'L');
          $this->Ln(4);


          $this->Cell(18,6,'',0,'L',0);
          $this->SetFont('Arial','B',10);

          $this->Cell(15,6,'Date & Time Removal:-',0,'L',0);
          $this->SetFont('Arial','',10);
          date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
          $date =date('Y-m-d H:i:s');
          $this->Cell(1100,6,"20/2/1997",0,'L',1);

          $this->Ln(7);
        $this->SetY(-64);
        $this->SetFont('Arial','',7);
        $this->Cell(-8,6,'',0,'L',0);
        $this->MultiCell(206,3,'Certified that the particular given above true & correct & that the amount indicate repress the price actually charged is no additional consideration nowing directly or indirectly from the buyer ',1,1);

        $this->Cell(-8,6,'',0,'L',0);
        $this->MultiCell(206,3,'I/we hereby certify that my/our registration certificate under the maharastra act GST 2017 is in force on the date in which the sales of goods specfiedon this tax invoice is made by me/us and the transaction of sales covered by this tax invoice has been effected by me /us and it shall be accounted for in the turn over of sales while filling of return and the due tax if any payble on the sales has been paid or shall be paid ',1,1);

        $this->SetFont('Arial','B',9);
        $this->Cell(-8,6,'',0,'L',0);
        $this->Cell(15,6,'Terms & Condition:-',0,'L',1);

        $this->SetFont('Arial','',7);
        $this->Ln(5);
        $this->Cell(-8,6,'',0,'L',0);
        $this->MultiCell(100,4,'1)Interest will be recovered @24% p.a on overdue unpaid days from date of invoice 2)claim of any bature whats over will lapse unless raised in writting withing 3 days from date of invoice 3)Goods onece sold can not be return and/or exchanged 4)We reserve to overselves the right to demand payment of this bill at any time before due date 5) payment are to be made at our office by a/c RTGS ',0,1);

        $this->Cell(98,6,'',0,'L',0);
        $y = $this->GetY();
        $x = $this->GetX();
        $this->SetXY($x + 0, $y-25);
        $this->SetDrawColor(40,40,40);
        $this-> SetLineWidth(0.00000000000001);
        $this->MultiCell(0.1,13,' ',1,0);

        $this->Ln(-11.5);

        $this->SetFont('Arial','B',10);
        $this->Cell(125,6,'',0,'L',1);
        $this->Cell(15,6,'FOR ANVI INDUSTRY',0,'L',1);
        $this->Ln(5);

        $this->SetFont('Arial','',10);
        $this->Cell(139,6,'',0,'L',1);
        $this->Cell(15,6,'Signatory',0,'L',1);
        $this->Ln(7);

        $this->Cell(-8 ,6,'',0,'L',1);
        $this->Cell(206,0,'',1,'L',1);
        $this->Ln(2);

        $this->SetFont('Arial','B',10);
        $this->Cell(30,6,'',0,'L',1);
        $this->Cell(100,6,'Anvi Industry,A/P Palus Colony Plaus, Tal-Palus dist-sagli-416310',0,'L',1);
        $this->Ln(5);

        $this->SetFont('Arial','B',10);
        $this->Cell(40,6,'',0,'L',1);
        $this->Cell(15,6,'+917709809797, +91 9765966230, anviindustry@gmail.com',0,'L',1);
        $this->Ln(3);
        // Position at 1.5 cm from bottom

        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    }


    $pdf = new PDF();
    $pdf->AliasNbPages();

    // Add new pages
    // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();





//  $view_sql1="SELECT si.id,cgst_amount,sgst_amount,igst_amount,total_tax,total_other_charges_amt,total_other_charges_amt1,total_amount,mpt.name as payment_term,transport
//   from sales_invoice si,mstr_payment_term mpt WHERE sales_invoice_no='$id' and si.payment_term_fk= mpt.id";
// $show_result1=mysqli_query($db,$view_sql1) or die(mysqli_error($db));
// //$view_row = mysqli_fetch_assoc($show_result);
// $id1="";
// $cgst_amount="";
// $sgst_amount="";
// $igst_amount="";
// $total_tax="";
// $other_charges_amt="";
// $other_charges_amt1="";
// $other_charges_total="";
// $total_amount="";
// $payment_term="";
// $transport="";
// while ($view_row = mysqli_fetch_array($show_result1))
// {
//   $id1=$view_row['id'];
//   $cgst_amount=$view_row['cgst_amount'];
//   $sgst_amount=$view_row['sgst_amount'];
//   $igst_amount=$view_row['igst_amount'];
//   $total_tax=$view_row['total_tax'];
//   $other_charges_amt=$view_row['total_other_charges_amt'];
//   $other_charges_amt1=$view_row['total_other_charges_amt1'];
//   $other_charges_total=$other_charges_amt +$other_charges_amt1;
//   $total_amount=$view_row['total_amount'];
//   $payment_term=$view_row['payment_term'];
//   $transport=$view_row['transport'];


// }

// $view_sql2="SELECT soi.id,so.sales_order_no,soi.po_line_no,mi.code,sii.invoice_quantity,mi.description,mi.drawing_no,
// mi.revision_no,mi.hsn,mi.sac,soi.quantity,soi.unit,soi.rate,soi.total,input_type,discount_percent,discount_rs,
// cgst,sgst,igst from sales_invoice si, sales_invoice_items sii, sales_order so
// ,sales_order_item soi,mstr_item mi, mstr_tax mt 
// WHERE si.sales_invoice_no='$id' and si.id=sii.sales_invoice_fk and sii.sales_order_fk=so.id and 
// sii.sales_order_items_fk =soi.id and so.id=soi.sales_order_id_fk and soi.item_id_fk=mi.id and 
// mi.tax_id_fk=mt.id";
// $show_result2=mysqli_query($db,$view_sql2) or die(mysqli_error($db));
// //$view_row = mysqli_fetch_assoc($show_result);
// $total1=0;
// $discount_rs1=0;
// $i = 1;
//   $row1 = mysqli_num_rows($show_result2);

// while ($view_row = mysqli_fetch_array($show_result2))
// {


//   $count=$i++;
//   $sales_order_no=$view_row['sales_order_no'];
//   $po_line_no=$view_row['po_line_no'];
//   $item_code=$view_row['code'];
//   $description=$view_row['description'];
//   $drawing_no=$view_row['drawing_no'];
//   $h_no="HeatNo";
//   $hsn_code=$view_row['hsn'];
//   $order_quantity=$view_row['invoice_quantity'];
//   $rate=$view_row['rate'];
//   $discount_percent=$view_row['discount_percent'];
//   $discount_percent=number_format($discount_percent,0);
//   $discount_rs=$view_row['discount_rs'];
//   $total=$order_quantity * $rate;
//   $totalamount=($order_quantity * $rate)-$discount_rs;
//   $pdf->SetFont('Arial','',8);

//   $pdf->Cell(11,8,$count,1,'L',1);

//   // $pdf->Cell(28,6,'Purchase Order No',1,'L',1);
//   $pdf->MultiCell(24,8,$sales_order_no,1,1);
//   $y = $pdf->GetY();
//   $x = $pdf->GetX();
//   $pdf->SetXY($x + 35, $y - 8);
//   $pdf->MultiCell(13,8,$po_line_no,1,1);
//   $pdf->SetXY($x + 48, $y - 8);
//   $pdf->MultiCell(30,8,$item_code,1,1);
//   $pdf->SetXY($x + 78, $y - 8);
//   $pdf->MultiCell(28,4,$description." ".$drawing_no,1,1);
//   $pdf->SetXY($x + 106, $y - 8);
//   $pdf->MultiCell(15,8,$h_no,1,1);
//   $pdf->SetXY($x + 121, $y - 8);
//   $pdf->MultiCell(20,8,$hsn_code,1,'C',false);
//   $pdf->SetXY($x + 141, $y - 8);
//   $pdf->MultiCell(11,8,$order_quantity,1,'C',false);
//   $pdf->SetXY($x + 152, $y - 8);
//   $pdf->Cell(13,8,$rate,1,0,'R');
//   $pdf->MultiCell(11,8, $discount_percent."%",1,'R',false);
//   $pdf->SetXY($x + 176, $y - 8);
//   $pdf->SetFont('Arial','',10);
//   $totalamount1= number_format((float)$totalamount, 2, '.', '');
//   $pdf->Cell(19,8,$totalamount1,1,0,'R');
//   //
//   // $total1=$total1+$total;
//   // $discount_rs1=$discount_rs1+$discount_rs;


//   $pdf->Ln();

// }

// $row1 = mysqli_num_rows($show_result2);
// if($row1==10 || $row1==20  || $row1==30 || $row1==40 || $row1==50 || $row1==60 || $row1==70 || $row1==80 || $row1==90 || $row1==100)
// {

//   $pdf->Ln(-1);
// }
// if($row1==9 || $row1==19 || $row1==29 || $row1==39 || $row1==49 || $row1==59 || $row1==69 || $row1==79 || $row1==89 || $row1==99)
// {
//   $pdf->Ln(7);
// }
// if($row1==8 || $row1==18 || $row1==28 || $row1==38 || $row1==48 || $row1==58 || $row1==68 || $row1==78 || $row1==88 || $row1==98)
// {
//   $pdf->Ln(15);
// }
// if($row1==7 || $row1==17 || $row1==27 || $row1==37 || $row1==47 || $row1==57  || $row1==67 || $row1==77 ||  $row1==87 ||$row1==97)
// {
//   $pdf->Ln(23);
// }
// if($row1==6 || $row1==16 || $row1==26 || $row1==36 || $row1==46 || $row1==56  || $row1==66 || $row1==76 ||  $row1==86 ||$row1==96)
// {
//   $pdf->Ln(31);
// }
// if($row1==5 || $row1==15 || $row1==25 || $row1==35 || $row1==45 || $row1==55  || $row1==65 || $row1==75 ||  $row1==85 ||$row1==95)
// {
//   $pdf->Ln(39);
// }
// if($row1==4 || $row1==14 || $row1==24 || $row1==34 || $row1==44 || $row1==54  || $row1==64 || $row1==74 ||  $row1==84 ||$row1==94)
// {
//   $pdf->Ln(47);
// }
// if($row1==3 || $row1==13 || $row1==23 || $row1==33 || $row1==43 || $row1==53  || $row1==63 || $row1==73 ||  $row1==83 ||$row1==93)
// {
//   $pdf->Ln(55);
// }
// if($row1==2 || $row1==12 || $row1==22 || $row1==32 || $row1==42 || $row1==52  || $row1==62 || $row1==72 ||  $row1==82 ||$row1==92)
// {
//   $pdf->Ln(63);
// }
// if($row1==11 || $row1==1 || $row1==21 || $row1==31 || $row1==41 || $row1==51  || $row1==61 || $row1==71 ||  $row1==81 ||$row1==97)
// {
//   $pdf->Ln(71);
// }

// else{
//       //
//       // $pdf->Ln(13);
// }



    
      $pdf->Ln();

    $pdf->Output();

?>
