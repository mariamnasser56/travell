<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../login-page/users.css">
		
	</head>
	<body>
		<style>
		.navbar{
			width: 100%; 
			height: 80px; 
			background-color:wheat; 
			display: flex; 
			justify-content: space-around; 
			align-items: center; 
			color: #000; 
			transition: 0.4s; 
			list-style: none;		
		} 
		*{
			margin:0;
			padding:0;
		}
		.menu ul{ 
			list-style: none;
			display: flex; 
			align-items: center; 
			transition: 0.4s; 
		} 
		.menu ul li a{ 
			text-decoration: none; 
			color: #000; 
			padding: 5px 12px; 
			letter-spacing: 2px; 
			font-size: 20px; 
			transition: 0.4s; 
		} 

		.menu ul li a:hover{ 
			border-bottom: 4px solid #000; 
			transition: 0.4s; 
		}  
		
	


		.container{
			transform: translate(36%,96%);
			width:91%;
		}
		.table-container{
			width: 59%;
		}
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
		
		</style>
		<header>
			<div class="navbar">  
				<div class="menu"> 
					<ul> 
						<li><a href="users.php">users</a></li> 
						<li><a href="../trips/admintable.php">trips</a></li> 
						<li><a href="../trips/addtrip.php">add trip</a></li> 
					</ul> 
				</div>
			</div>
			<div class="signup"> 
   <a href="../login-page/logout.php">Logout</a> 
  </div> 
		</header>
        <?php
        if(file_exists('users.json'))
        {
            $users = json_decode(file_get_contents('users.json'),true);  
        }?>
	    <div class="container">
	    <div class="table-container">	 
		<table id="tbstyle">
			<tbody>
				<tr>
                    <th>ID</th>
                    <th>first name</th>
					<th>last name</th>
					<th>Email</th>
					<th>phone number</th>
				</tr>
				<?php foreach ($users as $user) { ?>
				<tr>
					<td> <?= $user['id']; ?> </td>
					<td> <?= $user['firstn']; ?> </td>
					<td> <?= $user['lastn']; ?> </td>
					<td> <?= $user['email']; ?> </td>
					<td> <?= $user['phone']; ?> </td>
					
				</tr>
				<?php } ?>
    		</tbody>
		</table>
		</div>
		</div>
	</body>
</html>










