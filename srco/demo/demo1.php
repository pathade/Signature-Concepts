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
              
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
               
            </tr>
        </tfoot>
       
    </table> 
</body>

</html>
<script>
		$(document).ready(function() {
		   
            $('#example').DataTable( {
        dom: 'lBfrtSip',
        paginate: true,
        lengthMenu : [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        buttons: [{extend: 'copy', exportOptions: { columns: ''}}, {extend: 'csv', exportOptions: { columns: ''}}, {extend: 'excel', exportOptions: { columns: ''}}, {extend: 'pdf', exportOptions: { columns: ''}}, {extend: 'print', exportOptions: { columns: ''}}, 'colvis', 'selectAll', 'selectNone'],
        searching:true,
        retrieve: true,
        serverSide: true,
        ajax: {
            "url": "demo_get.php",
            "type": "POST"
        },
        deferRender: true,
    
   
    });
		} );

</script>