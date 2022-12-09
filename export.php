<?php 

  //Create Connection of Database
include("connect.php");
   
  // Fetch data from Users table
  $result = pg_query($conn, "SELECT * FROM authors");
  
  //Create header of excel
  $content = '<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<table style="width:100%">                            
                            <th class="px-1 py-1 text-center">First Name</th>
                            <th class="px-1 py-1 text-center">Last Name</th>
			                <th class="px-1 py-1 text-center">Email</th>
                            <th class="px-1 py-1 text-center">Age</th>
                             <th class="px-1 py-1 text-center">Groupes</th>
                      
                    </thead>'; 

  //fetch all data with the help of mysqli_fetch_array 
  while($row = pg_fetch_array($result))  
  {  

	    $content .='<tr><td>'.$row['first_name'].'</td>';
	    $content .='<td>'.$row['last_name'].'</td>';
	    $content .='<td>'.$row['email'].'</td>';
		$content .='<td>'.$row['age'].'</td>';
		$content .='<td>'.$row['groupes'].'</td>';

		
		
		
		
	  
	      
  } 
  $content.='</table>

</body>
</html>'; 
  

  //This code is use to create excel format
  $fileName = "etudiant_".date('d/m/Y').".xls";
  header('Content-Type:application/xls');  
  header('Content-Disposition: attachment; filename='.$fileName);
  echo $content;
  exit();

?>