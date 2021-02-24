<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
  </head>
  <body>
  <style>
  #example input, #example select	{
  font-size:14px;
  padding:5px 5 5px 5px;
  display:block;
  width:100%;
  border:none;
  background: transparent;
  
}

#example input:focus,#example select:focus	{ outline:none; border-bottom:1px solid #757575;}
 
  </style>
    <bR>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="name">Name</th>
                <th class="position">Position</th>
                <th class="office">Office</th>
                <th class="age">Age</th>
                <th class="start_date">Start date</th>
                <th class="area">Start date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Area</th>
            </tr>
        </tfoot>
        <tbody>
            <tr id="row1">
                <td><input type="text" name="data1"  id="data1" value="Tiger Nixon" onblur="saveData(event,'name','1')"><span style="display:none">Tiger Nixon</span></td>
                <td><input type="text" name="data2"  id="data2" value="System Architect" onblur="saveData(event,'type','1')" ><span style="display:none">System Architect</span></td>
                <td><input type="text" name="data3"  id="data3" value="Edinburgh" onblur="saveData(event,'city','1')"><span style="display:none">Edinburgh</span></td>
                <td><input type="text" name="data4"  id="data4" value="61" onblur="saveData(event,'age','1')"><span style="display:none">61</span></td>
                <td><input type="text" name="data5"  id="data5" value="2011/04/25" onblur="saveData(event,'dob','1')"><span style="display:none">2011/04/25</span>
</td>
				<td><select name="data6" id="data6" onChange="saveData(event,'area','1')"><option>area2</option><option>area4</option><option>area5</option></select><span style="display:none">area2</span>
				</td>
            </tr>
            <tr id="row2">
                <td><input type="text" name="data7"  id="data7" value="Garrett Winters" onblur="saveData(event,'name','2')"><span style="display:none">Garrett Winters</span></td>
                <td><input type="text" name="data8"  id="data8" value="Accountant" onblur="saveData(event,'type','2')"><span style="display:none">Accountant</span></td>
                <td><input type="text" name="data9"  id="data9" value="Tokyo" onblur="saveData(event,'city','2')"><span style="display:none">Tokyo</span></td>
                <td><input type="text" name="data10"  id="data10" value="63" onblur="saveData(event,'age','2')"><span style="display:none">63</span></td>
                <td><input type="text" name="data11" id="data11" value="2011/07/25" onblur="saveData(event,'dob','2')"><span style="display:none">2011/07/25</span></td>
				<td><select name="data12" id="data12" onChange="saveData(event,'area','1')"><option>area2</option><option>area4</option><option>area5</option></select><span style="display:none">area5</span>
				</td>                
            </tr>
        </tbody>
    </table> 
</body>

</html>
<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );

		function saveData(event,fieldname,primaryid){
			console.log($('#'+event.target.id).val());
			console.log(fieldname);
			console.log(primaryid);
		}
</script>