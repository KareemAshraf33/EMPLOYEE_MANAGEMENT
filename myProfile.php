<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">


  </head>
<body>
<?php
    include 'conn.php';
    
     $query="SELECT employees.name as name
     FROM employees JOIN tasks
     ON employees.id = tasks.emp_id"; 
     $result=$con->query($query);
     $row=$result->fetch_assoc()
    ?>
    <?php
    $fname='';
    $lname='';
    $email='';
    $password='';
    $city='';
    $gender='';
    ?>
<header>
		<nav>
			<h1><?php echo $row['name'];?></h1>
			<ul id="navli">
				<li><a class="homered" href="index.php">myTasks</a></li>
				<li><a class="homeblack" href="empLogin.php">Chat</a></li>
				<li><a class="homeblack" href="myProfile.php">Profile</a></li>
                <li><a class="homeblack" href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

<!-- <form id = "registration" action="edit.php" method="POST"> -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
 <?php
    $serverName='localhost';
    $dbUser='root';
    $dbPassword='';
    $dbName='employee_system';    

    $con=new mysqli($serverName,$dbUser,$dbPassword,$dbName);

    if($con->connect_error)
    {
       die($con->connect_error);
    }
     $query="SELECT * FROM employees WHERE id=id"; 
     $result=$con->query($query);
     $row=$result->fetch_assoc()
    ?>
                        
                    <form method="POST" action="handlemyProfile.php?id=<?php echo $id?>" >

                        <div class="input-group ">
                        <h2 class="title" >My Info</h2>
                        </div>
                       
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>First Name</p>
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $row['name'];?>"  >
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $row['name']; ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $row['email']; ?>" >
                        </div>

                        <div class="input-group">
                          <p>Password</p>
                            <input class="input--style-1" style="color: #666;" type="password"  name="password" value="<?php echo $row['password']; ?>" >
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>City</p>
                                    <input class="input--style-1" type="text" name="city" value="<?php echo $row['city']; ?>" >
                                   
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $row['gender']; ?>" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Phone Number</p>
                            <input class="input--style-1" type="number" name="phone" value="<?php echo $row['phone']; ?>" >
                        </div>

                        <input type="hidden" name="id" id="textField" value="" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="send" >Update Info</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script> 

  </body>
</html>


