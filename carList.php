<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    nav,
    #container,
    #notifications {
      background-color: #087830;
    }

    #brand:hover {
      text-shadow: 2px 2px #000000;
    }

    #notifications:hover,
    #logout:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }
	
	body
	{
		position: fixed; 
		overflow-y: scroll;
		width: 100%;
	}
	
	button {
	  cursor: pointer;
	}

    .user {
      display: inline-block;
      width: 65px;
      height: 65px;
      border-radius: 50%;
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

    .one {
      background-image: url('http://placehold.it/65x65');
    }

    .ScrollStyle {
      max-height: 480px;
      overflow-y: scroll;
      overflow-x: hidden;
    }

    ul {
      padding: 0;
      list-style-type: none;
    }
    /* The Modal (background) */

    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 0px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }
    /* Modal Content */

    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }
    /* The Close Button */

    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,.close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .notifs {
      background: none!important;
      color: inherit;
      border: none;
      padding: 0!important;
      font: inherit;
      /*border is optional*/
      border-bottom: 1px solid #444;
      cursor: pointer;
	  max-width: 100%;
   
    }
	
	input {
	  cursor: pointer;
	}

    li {
      list-style: none;
    }

    body {
      overflow-y: hidden;
    }
	
	.ScrollStyle {
      max-height: 480px;
      overflow-y: scroll;
      overflow-x: hidden;
    }
  </style>
</head>

<body style="background-color: #FFFFFF">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:600i|Roboto:900i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Concert+One|Lobster" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap-notifications.css" type="text/css">
  <link rel="stylesheet" href="bootstrap-notifications.min.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
      <a id="brand" class="navbar-brand" href="home_agent.php"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a id="logout" class="btn navbar-btn ml-2 text-white" href="home_agent.php"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
          </li>
		  <ul class="navbar-nav">
          <li class="nav-item">
            <div class="btn-group">
              <button id="notifications" class="btn dropdown-toggle text-white" data-toggle="dropdown" style="cursor:pointer">
				<i style="color: #f42929"class="fa d-inline fa-lg fa-exclamation -o"></i>
				  <span style="font-size: 18px; font-family: 'Roboto', sans-serif" class="w3-badge w3-red">2</span>
					Notifications 
			  </button>
              <div class="dropdown-menu">
				<a class="dropdown-item text-center"><center><a href="#">Dave Lister</a> confirmed <a href="#">Transaction #1</a></center></a></a>                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center"><center><a href="#">Bob Brown</a> rejected <a href="#">Transaction #2</a></center></a></a>                
                <div class="dropdown-divider"></div>
                <a style="color: #087830" href="notifications_agent.html" class="dropdown-item text-center"><i class="glyphicon glyphicon-search"></i>View All</a>
              </div>
            </div>
		  </li>
        </ul>
        </ul>
        <a id="logout" class="btn navbar-btn ml-2 text-white" href="home.html"><i style="font-size:20px" class="fa"></i> Log out</a>
      </div>
    </div>
  </nav>
  <br>
  <div class="bgimg w3-display-container w3-animate-bottom">
  <div class="container">	


      <?php

        $employeeId = $_SESSION["employeeId"];
        $servername = "localhost";
        $clientId = $_GET['id'];
        $username = "root";
        $password = "1234"; 
        $query1 = "SELECT * FROM carInfo WHERE clientId = $clientId ";
        $easyQuery = "SELECT * FROM client WHERE clientId = $clientId";
                #connect
        $dbc = @mysqli_connect($servername, $username, $password, 'upperlimit') OR die("Connection Failed: " . mysqli_connect_error());

        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

      if($result=mysqli_query($dbc,$easyQuery)){
            $row = mysqli_fetch_row($result);

            echo "<h2>".$row[2]."'s Cars</h2>";   
            echo "<div class=\"ScrollStyle\">";
            echo "<div class=\"card-body\">";   
            echo  "<div class=\"list-group\">";
      }

      if ($result=mysqli_query($dbc,$query1))
        {
        // Fetch one and one row
        while ($row=mysqli_fetch_row($result))
          {
              echo "<a href=\"#\" class=\"list-group-item list-group-item-action\" data-toggle=\"modal\" data-target=\"#exampleModalLong1\" >".$row[2]." ".$row[3]." ".$row[4]."</a>";
          }
           mysqli_free_result($result);
      }

     ?>
			<!-- <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong1" >R34 GTR</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Sprinter Trueno</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Levin</a>
			<a href="#" class="list-group-item list-group-item-action">Lancer Evo VII</a>
			<a href="#" class="list-group-item list-group-item-action">WRX STi</a>
			<a href="#" class="list-group-item list-group-item-action">E30</a>
			<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong1" >R34 GTR</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Sprinter Trueno</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Levin</a>
			<a href="#" class="list-group-item list-group-item-action">Lancer Evo VII</a>
			<a href="#" class="list-group-item list-group-item-action">WRX STi</a>
			<a href="#" class="list-group-item list-group-item-action">E30</a>
			<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong1" >R34 GTR</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Sprinter Trueno</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Levin</a>
			<a href="#" class="list-group-item list-group-item-action">Lancer Evo VII</a>
			<a href="#" class="list-group-item list-group-item-action">WRX STi</a>
			<a href="#" class="list-group-item list-group-item-action">E30</a>
			<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong1" >R34 GTR</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Sprinter Trueno</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Levin</a>
			<a href="#" class="list-group-item list-group-item-action">Lancer Evo VII</a>
			<a href="#" class="list-group-item list-group-item-action">WRX STi</a>
			<a href="#" class="list-group-item list-group-item-action">E30</a>
			<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong1" >R34 GTR</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Sprinter Trueno</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Levin</a>
			<a href="#" class="list-group-item list-group-item-action">Lancer Evo VII</a>
			<a href="#" class="list-group-item list-group-item-action">WRX STi</a>
			<a href="#" class="list-group-item list-group-item-action">E30</a>
			<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#exampleModalLong1" >R34 GTR</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Sprinter Trueno</a>
			<a href="#" class="list-group-item list-group-item-action">AE86 Levin</a>
			<a href="#" class="list-group-item list-group-item-action">Lancer Evo VII</a>
			<a href="#" class="list-group-item list-group-item-action">WRX STi</a>
			<a href="#" class="list-group-item list-group-item-action">E30</a> -->
			<!-- Modal -->
              <!-- <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Car #1</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                    <div class="modal-body"> <label for="recipient-name" class="col-form-label">Car Name: R34 GTR</label>                      
                      <hr>
                      <li>Car Model: GTR</li>
					  <li>Car Manufacturer: Nissan</li>
					  <li>Car Value: Php 2,784,870.00</li>
                    </div>					
						<center>							
							<hr>
							<input onclick="location.href='editCar.html';" type="button" class="btn btn-success" value="Edit Info"/>			  
							<input type="button" class="btn btn-danger" value="Delete Car" data-dismiss="modal"/>			  
						</center>
                    </div>
                  </div>
                </div>
              </div>
		</div>
	</div> -->

	<center>			
			<br>
			<input onclick="location.href='pickClient.php';" style="width: 40%" type="button" class="btn btn-success" value="Back to Client List"/>
			<input onclick="location.href='addCar.php?id=<?php echo $clientId?>';" style="width: 40%" type="button" class="btn btn-success" value="Add Car"/>					
			<br>
			<br>
		</center>
	</div>
	</div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>