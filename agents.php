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

    #notifications:hover, #logout:hover, #home:hover, #myBtn:hover, input:hover {
      background-color: rgba(0, 0, 0, 0.3);
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
      <a id="brand" class="navbar-brand" href="home_manager.php"><i class="fa d-inline fa-lg fa-cloud"></i><b style="font-family: 'Roboto', sans-serif">  Upper Limit Insurance</b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent"
        aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a id="home" class="btn navbar-btn ml-2 text-white" href="home_manager.php"><i class="fa fa-home" aria-hidden="true" style="font-size:20px"></i> Home</a>
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
				<a class="dropdown-item text-center"><center><a href="#">Jonathan Wilson</a> recently sent <a href="#">Transaction #1</a></center></a></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center"><center><a href="#">Brian Imanuel</a> recently sent <a href="#">Transaction #2</a></center></a></a>
                <div class="dropdown-divider"></div>
                <a style="color: #087830" href="inbox_manager.html" class="dropdown-item text-center"><i class="glyphicon glyphicon-search"></i>View All</a>
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
	<h2>Your Agents</h2>
	<div class="ScrollStyle">
	<div class="card-body">
		<div class="list-group">
      <!-- LIST OF AGENTS -->
      <?php
      require_once('home_Agent_mysqli_connect.php');

      $query = "SELECT email_address, password, firstName, lastName, employeeId, addressLine1, phoneNumber1, isManager FROM employee WHERE isManager = 0";
      $result = mysqli_query($dbc, $query);
      $agents = array();
      $curr = 0;
          #parse data to strings
          while($data = mysqli_fetch_assoc($result)){
            echo '<a href="#" class="list-group-item list-group-item-action" method="post" data-toggle="modal" data-target="#ModalLong1" name="' . $curr . '">' . $data['firstName'] . ' ' . $data['lastName'] . '</a>';
            array_push($agents, $data);
            $curr++;
          }
      ?>

			   <!-- Modal -->
              <div class="modal fade" id="ModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <!-- Modal CONTENT-->
                  <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Agent #1</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                          </div>

                          <div class="modal-body"> <label for="recipient-name" class="col-form-label">Agent Name: <?php echo $agents[$curr-1]['firstName']. ' '. $agents[$curr-1]['lastName']?></label>
                            <hr>
                              <li>First name: <?php echo $agents[$curr-1]['firstName']?></li>
        					                 <li>Last name: <?php echo $agents[$curr-1]['lastName']?></li>
        					                      <li>Complete Address: <?php echo $agents[$curr-1]['addressLine1']?></li>
        					                           <li>Email Address: <?php echo $agents[$curr-1]['email_address']?></li>
        					                                <li>Contact Number: <?php echo $agents[$curr-1]['phoneNumber1']?></li>
                              <!-- LIST OF CLIENTS -->
                              <?php
                                  require_once('home_Agent_mysqli_connect.php');
                                  $query = "SELECT c.firstName, c.lastName, e.employeeId, c.employeeId FROM client c, employee e WHERE (e.employeeId = c.employeeId)";
                                  $clients = mysqli_query($dbc, $query);
                              ?>
                                <!-- SHOW ALL CLIENTS -->
                                <li>Client/s: <?php
                                              while($data = mysqli_fetch_assoc($clients)){
                                                    echo '<br>'.$data['firstName']. ' ' . $data['lastName'];
                                              }?>
                                </li>
                          </div>
                  						<hr>
                  						<input type="button" class="btn btn-default" value="Close" data-dismiss="modal"/>
                    </div>  <!-- Modal CONTENT-->


                  </div>
                </div>


              </div>
		</div>
	</div>
	</div>
	</div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>
