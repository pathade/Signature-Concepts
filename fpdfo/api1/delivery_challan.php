

<?php
	//$db=mysqli_connect("192.168.0.101","stn","root","nks1");
	//$db=mysqli_connect("localhost","nks","root","");
	 $db = mysqli_connect("localhost","root","","nks");
	if(!$db)
	{
	?>
		<script language="javascript">
		alert("Error: Unable to Connect Database");
		</script>
	<?php 	
	}
?>
<?php
 //include('C:\xampp\htdocs\NKS\database\dbconnection.php');
 // include('../../database/dbconnection.php');

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

  function Header()
 {

     $x = $this->GetX();
     $y = $this->GetY();
     $this->SetXY($x-5, $y+5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,30,'  ',1,1,'C',0,false);  // CELL 1
     $today = date("Y-m-d");

     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-4, $y-36);
     $this->SetFont('arial','',8);
     $this->Cell(18,5,'Original PDF',1,1,'L',false);
     $this->SetXY($x+15, $y-36);
     $this->SetFont('arial','',8);
     $this->Cell(20,5,'Duplicate PDF',1,1,'L',false);

     $this->SetXY($x-5, $y-29);
     $this->SetFont('Arial','B',12);
     $this->Cell(200,8,'DELIVERY CHALLAN',0,1,'C',0,false);
     $this->SetXY($x, $y+10);
     $this->Image('C:\Users\admin\Desktop\Work\LOGO-SIGNATURE_3.jpeg',62  ,16,11);


     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y-20);
     $this->SetFont('Arial','',13);
     $this->Cell(200,-15,'  Signature Concepts LLP',0,1,'C',0,false);

     $this->Ln();

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+20);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'S NO- 651/ 25/ 1, GANGADHAM KONDHWA ROAD, NEAR AAI MATA MANDIR,',0,1,'C',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y-15);
     $this->SetFont('Arial','',8);
     $this->Cell(200,19,'OPP SHREEJI LAWNS, BIBWEWADI, PUNE- 411037, MAHARASHTRA INDIA',0,1,'C',0,false);

     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+44, $y-9.5);
     $this->SetFont('Arial','',8);
     $this->Cell(40,7,'Phone No : 7757033204',0,1,'C',0,false);

  
     $this->SetXY($x+92, $y-9.5);
     $this->SetFont('Arial','',8);
     $this->Cell(40,7,'Email ID : signatureconcepts.pune@gmail.com',0,1,'C',0,false);


            //   //  include('../NKS/database/dbconnection.php');
           

             $db = mysqli_connect("localhost","root","","nks");  
               $edit_id =  1;           //   $_GET['id'];


            // $sql_charges = "SELECT twc.*, twc.cust_name, wdc.cust_id_fk,wdc.challan_no, mv.v_no, td.site_id_pk,
            // td.site_name,td.site_address, ex.po_no , wdc.total
            // FROM  tbl_wholesale_customer twc,wholesale_delivery_challan wdc,mstr_customer m,mstr_transporter_vehicle AS mv,
            // tbl_wholesale_customer_site_details AS td, exp_purchase_order AS ex
            // WHERE twc.wc_id_pk = 3 AND m.cust_id_pk = wdc.cust_id_fk AND mv.tv_id_pk ='$edit_id'";

// $result_charges = mysqli_query($db, $sql_charges);
// $row=mysqli_fetch_row($result_charges);
                    
//   $sql_charges = "SELECT *,wc.challan_no, ms.gst_no, mv.v_no,ts.site_name, ts.site_address, wi.qty, wi.size, wi.remark
//                FROM wholesale_delivery_challan wc, wholsale_delivery_challan_items wci,tbl_wholesale_customer_site_details td, wholesale_work_order_items wi
//               WHERE wc.wd_ch_id_pk = dci_id_pk AND  wci.dci_id_pk = wci.cust_id_fk
              
      $sql_charges = "SELECT twc.*
                      FROM  tbl_wholesale_customer twc,wholesale_delivery_challan wdc, wholsale_delivery_challan_items wci, tbl_wholesale_customer_site_details td
                      WHERE wd_ch_id_pk AND dci_id_pk AND  wci.dci_id_pk = wci.cust_id_fk ='$edit_id'";

                $result_charges = mysqli_query($db, $sql_charges);
                        $row=mysqli_fetch_row($result_charges);
                 {           
                            
     $y = $this->GetY();
     $x = $this->GetX();

     $this->SetXY($x-5, $y-0.5);
     $this->SetFont('Arial','B',15);
     $this->Cell(200,40,'  ',1,1,'C',0,false);   // CELL 2

     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(90,8,'     Customer  :',0,1,'L',0,false);
     $this->SetXY($x+19, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,$row['1'],0,1,'L',0,false);

     $this->SetXY($x+130, $y);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,'SO NO.       :',0,1,'L',0,false);
     $this->SetXY($x+150, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(45,8,$row['0'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(90,8,'      Site :',0,1,'L',0,false);
     $this->SetXY($x+19, $y+7);
     $this->SetFont('Arial','',9);
    $this->Cell(45,8,$row['3'],0,1,'L',0,false);

     $this->SetXY($x+130, $y+7);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,'DC NO.       :',0,1,'L',0,false);
     $this->SetXY($x+150, $y+7);
     $this->SetFont('Arial','',9);
    $this->Cell(45,8,'',0,1,'L',0,false);                 // $row['28']

     $this->SetXY($x-5, $y+13);
     $this->SetFont('Arial','B',9);
     $this->Cell(90,8,'      Site Add.  :',0,1,'L',0,false);
     $this->SetXY($x+19, $y+13);
     $this->SetFont('Arial','',9);
    $this->Cell(45,8,'',0,1,'L',0,false);           // $row['28']

     $this->SetXY($x+130, $y+13);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,'DC Date     :',0,1,'L',0,false);
     $this->SetXY($x+150, $y+13);
     $this->SetFont('Arial','',9);
     $this->Cell(45,8,$row['16'],0,1,'L',0,false);

                 }
    //  $this->SetXY($x+19, $y+17);
    //  $this->SetFont('Arial','',7.5);
    //  $this->Cell(45,8,' PUNE - 411001',0,1,'L',0,false);

     $this->SetXY($x+19, $y+18);
     $this->SetFont('Arial','',8);
     $this->Cell(45,8,' Ph.No.',0,1,'L',0,false);
     $this->SetXY($x+29, $y+18);
     $this->SetFont('Arial','',8);
     $this->Cell(45,8,$row['4'],0,1,'L',0,false);

     $this->SetXY($x-5, $y+30);
     $this->SetFont('Arial','B',9);
     $this->Cell(90,8,'      GST NO.   :',0,1,'L',0,false);   //   mstr_supplier
     $this->SetXY($x+19, $y+30);
     $this->SetFont('Arial','',9);
     $this->Cell(45,8,$row['15'],0,1,'L',0,false);

     $this->SetXY($x+130, $y+22);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,'PO No.       :',0,1,'L',0,false);
     $this->SetXY($x+150, $y+22);
     $this->SetFont('Arial','',9);
   //  $this->Cell(45,8,$row['30'],0,1,'L',0,false);

     $this->SetXY($x+130, $y+30);
     $this->SetFont('Arial','B',9);
     $this->Cell(45,8,'Vehical No.:',0,1,'L',0,false);
     $this->SetXY($x+150, $y+30);
     $this->SetFont('Arial','',9);
  //   $this->Cell(45,8,$row['26'],0,1,'L',0,false);

            
  /// ----------------------------------------------------------------

$this->Ln(2);
$y = $this->GetY();
 $x = $this->GetX();
//  $this->SetXY($x-5, $y+9);
//  $this->SetFont('Arial','B',15);
//  $this->Cell(200,40,'  ',1,1,'C',0,false);  // CELL 3
     

    //  $this->SetXY($x-5, $y+4.5);
    //  $this->SetFont('Arial','B',15);
    //  $this->Cell(200,10,'  ',1,1,'C',0,false); // CELL 4

     $this->SetXY($x-5, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,7,'  ',1,1,'C',0,false); // CELL 5

     $this->SetXY($x-5, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(10,7,' No. ',0,1,'C',0,false); //Head

     $this->SetXY($x+5, $y+7.5);
      $this->SetFont('Arial','B',15);
      $this->Cell(65,7,'  ',1,1,'C',0,false); // CELL 6
 
      $this->SetXY($x+5, $y+7.5);
      $this->SetFont('Arial','B',9);
      $this->Cell(65,7,' Product Name ',0,1,'C',0,false); //Head
      
        $this->SetXY($x+70, $y+7.5);
     $this->SetFont('Arial','B',15);
     $this->Cell(30,7,'  ',1,1,'C',0,false); // CELL 7

     $this->SetXY($x+70, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(30,7,' Remark ',0,1,'C',0,false); //Head

     $this->SetXY($x+100, $y+7.5);
     $this->SetFont('Arial','B',15);
     $this->Cell(40,7,'  ',1,1,'C',0,false); // CELL 8

     $this->SetXY($x+100, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(40,7,' Size ',0,1,'C',0,false); // Head

          $this->SetXY($x+140, $y+7.5);
     $this->SetFont('Arial','B',15);
     $this->Cell(55,7,'  ',1,1,'C',0,false); // CELL 9

     $this->SetXY($x+140, $y+7.5);
     $this->SetFont('Arial','B',9);
     $this->Cell(55,7,' QTY ',0,1,'C',0,false); // Head

        
    //  $db = mysqli_connect("localhost","root","","nks");  
    //  $edit_id = 2;

    //  $sql_charges1= "SELECT *  ,mi.nks_code, mi.design_code
    //                  FROM wholsale_delivery_challan_items As wdci, mstr_item AS mi
    //                  WHERE dc_id_fk = item_id_pk ='$edit_id'";

    // $sql_charges1= " SELECT * 
		// FROM mstr_item 
    //     WHERE supplier_id_fk ='$edit_id'";  

    // $result_charges1 = mysqli_query($db, $sql_charges1);
    // while($row1=mysqli_fetch_row($result_charges1));
    
    $y = $this->GetY();
    $x = $this->GetX();

    $this->SetXY($x-5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(10,24,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+5, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(65,24,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+70, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,24,'  ',1,1,'C',0,false); //Head

    $this->SetXY($x+100, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(40,24,'  ',1,1,'C',0,false); // Head

    $this->SetXY($x+140, $y);
    $this->SetFont('Arial','B',9);
    $this->Cell(55,24,' ',1,1,'C',0,false); // Head



    $this->Ln(-24);
    $sql_charges2 = "SELECT *
    FROM wholsale_delivery_challan_items , mstr_item 
    WHERE dc_id_fk AND  item_id_pk ='$edit_id'";
    
    $result_charges2 = mysqli_query($db, $sql_charges2);
    while($row1=mysqli_fetch_row($result_charges2))
   {

     $y = $this->GetY();
     $x = $this->GetX();
    
     $this->SetXY($x-5, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(10,7,$row1['11'],0,1,'C',0,false);

     $this->SetXY($x+5, $y);
      $this->SetFont('Arial','',9);
      $this->Cell(65,7,$row1['19']. ' + '.$row1['20'],0,1,'L',0,false);   

    $this->SetXY($x+70, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(30,7,$row1['10'],0,1,'C',0,false);

     $this->SetXY($x+100, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(40,7,$row1['3'],0,1,'C',0,false);

         $this->SetXY($x+140, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(55,7,$row1['4'],0,1,'C',0,false);

          $this->SetXY($x+145, $y);
     $this->SetFont('Arial','',9);
     $this->Cell(40,7,$row1['24'],0,1,'R',0,false);
   }
   

     $this->Ln(-12.5);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x-5, $y+15.5);
     $this->SetFont('Arial','',15);
     $this->Cell(200,25,'  ',1,1,'C',0,false);  // CELL 3

     $this->SetXY($x, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(21,5,' GST No.  : ',0,1,'L',0,false);
     $this->SetXY($x+18, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(32,5,$row['15'],0,1,'L',0,false);   //$row['15']

     $this->SetXY($x+59, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(18,5,' PAN No. : ',0,1,'L',0,false);
     $this->SetXY($x+75, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(32,5,$row['9'],0,1,'L',0,false);    /// $row['9']

     $this->SetXY($x+100, $y+16);
     $this->SetFont('Arial','B',9);
     $this->Cell(40,5,'    Grand Total',0,1,'C',0,false);

     $this->SetXY($x+140, $y+16);
     $this->SetFont('Arial','B',9);
    // $this->Cell(55,5,$row['31'],0,1,'C',0,false);   // $row['31']
   
     $this->Ln(9);
     $y = $this->GetY();
     $x = $this->GetX();
     $this->SetXY($x+2, $y);
     $this->SetFont('Arial','B',13);
     $this->Cell(68,15,' NO EXCHANGE. NO RETURN.',0,1,'C',0,false);

     $this->Ln(14);
     $this->SetXY($x+6, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(20,15,'Receivers Sign.',0,1,'L',0,false);

     
     $this->SetXY($x+140, $y+16);
     $this->SetFont('Arial','',9);
     $this->Cell(50,5,'FOR Signature Concepts LLP',0,1,'L',0,false);

     $this->SetXY($x+146, $y+21);
     $this->SetFont('Arial','',9);
     $this->Cell(20,15,'Authorised Sign.',0,1,'L',0,false);

    }

    function Footer()
    {
   
          
    }
   
   }
   $pdf= new this();

   /// $pdf = new PDF('L','mm',array(200,250));
    $pdf->AliasNbPages();
   
   // // Add new pages
   // // Add new pages
    $pdf->SetAutoPageBreak(true,130);
    $pdf->AddPage();
   //      $pdf->Ln();
   
        $pdf->Output();
   
 ?>   