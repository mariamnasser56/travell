<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<style>
#tbstyle {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#tbstyle td, #tbstyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbstyle tr:nth-child(even){background-color: #f2f2f2;}

#tbstyle tr:hover {background-color: #ddd;}

#tbstyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #859161;
  color: White;
}

.container{
	width: 45%;
	position: absolute;
	transform: translate(70% , 0%);
	text-align: left;
}
</style>

</head>
	<body>
	   <div class="container" style="width:45%;">
	   <div class="table-container">

		    <table id="tbstyle">
				<tr>
					<th>ID</th>
                    <th>destination name</th>
					<th>destination photo</th>
					<th>trip details</th>
					<th>price</th>
					<th>action</th>
				</tr>

		    <form method="GET">
                <input type="text" name="search" placeholder="Search by destination...">
                <input type="submit" value="Search">
            </form>

            <?php
 			  $trips = json_decode(file_get_contents('trips.json'),true);
		  	  if(isset($_GET['search'])) {
				$search_query = $_GET['search'];
				$filtered_data = array_filter($trips, function($item) use ($search_query) {
				    return strpos(strtolower($item['name']), strtolower($search_query)) !== false;});
			    } 
			  else {
				$filtered_data = $trips;
				}
			  foreach ($filtered_data as $trip) { 
			?>
				<tr>
					<td><?= $trip['id']; ?></td>
					<td> <?= $trip['name']; ?> </td>
					<td> <?= $trip['photo']; ?> </td>
					<td> <?= $trip['details']; ?> </td>
					<td> <?= $trip['price']; ?> </td>
					<td>   
				    	<form action="" method="POST">  
                        <input type="hidden" name="id" value="<?php echo $trip['id']; ?>">
                        <button type="submit" name="delete">Delete</button>
			            </form>
			        </td>
				</tr>
			</form>	
			<?php }?>								
            </table>
        </div>
        </div>
    </body>
</html>
<?php
  if (isset($_POST['delete'])) {
	$trips = json_decode(file_get_contents('trips.json'), true);
	$trip_id = $_POST['id'];
	foreach ($trips as $key => $trip) {
		if ($trip['id'] == $trip_id) {
			unset($trips[$key]);			
		}
	}
	//$trips = array_values($trips);
    //foreach ($trips as $key => $trip) {
        // $trips[$key]['id'] = $key;
    //}	
	file_put_contents('trips.json', json_encode($trips));
	exit();
  } 
?>
