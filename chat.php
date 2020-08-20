<!DOCTYPE html>
<head>	
	<title>Izadora</title>	
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript" ></script>	
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript" ></script>	
<script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js" type="text/javascript" ></script>				
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
<style = "text/css">	
.messages_display {height: 300px; overflow: auto;}		
.messages_display .message_item {padding: 0; margin: 0; }		
.bg-danger {padding: 10px;}	

</style>		
</head>
<body>
        <?php
   include 'conn.php';
    
     $query="SELECT employees.name as name
FROM employees JOIN tasks
ON employees.id = tasks.emp_id"; 
     $result=$con->query($query);
     $row=$result->fetch_assoc();
    ?>
   <header>
		<nav>
			<h1><?php echo $row['name'];?></h1>
			<ul id="navli">
				<li><a class="homered" href="index.php">myTasks</a></li>
				<li><a class="homeblack" href="chat.php">Chat</a></li>
				<li><a class="homeblack" href="myProfile.php">Profile</a></li>
                <li><a class="homeblack" href="empLogin.php">Logout</a></li>
			</ul>
		</nav>
	</header> 
<br />

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
    
     $query="SELECT name
     FROM employees";
     $result=$con->query($query);
     $row=$result->fetch_assoc();
?>
<!--Form Start-->
<div class = "container">		
	<div class = "col-md-6 col-md-offset-3 chat_box" id="chatbox">						
		<div class = "form-control messages_display"></div>			
		<br />						
		<div class = "form-group">						
			<input type = "text" class = "input_name form-control" value="<?php echo $row['name'];?>"/>			
		</div>						
		<div class = "form-group">						
			<textarea class = "input_message form-control" placeholder = "Enter Message" rows="5"></textarea>			
		</div>						
		<div class = "form-group input_send_holder">				
			<input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />			
		</div>					
	</div>	

<!--form end-->
	
	<script type="text/javascript">			
	
// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

// Add API Key & cluster here to make the connection 
var pusher = new Pusher('690baa864053ce134c15', {
    cluster: 'mt1',
    encrypted: true
});

// Enter a unique channel you wish your users to be subscribed in.
var channel = pusher.subscribe('test_channel');

// bind the server event to get the response data and append it to the message div
channel.bind('my_event',
    function(data) {
        //console.log(data);
        $('.messages_display').append('<p class = "message_item">' + data + '</p>');
        $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block input_send" />');
        $(".messages_display").scrollTop($(".messages_display")[0].scrollHeight);
    });

// check if the user is subscribed to the above channel
channel.bind('pusher:subscription_succeeded', function(members) {
    console.log('successfully subscribed!');
});

// Send AJAX request to the PHP file on server 
function ajaxCall(ajax_url, ajax_data) {
    $.ajax({
        type: "POST",
        url: ajax_url,
        //dataType: "json",
        data: ajax_data,
        success: function(response) {
            console.log(response);
        },
        error: function(msg) {}
    });
}

// Trigger for the Enter key when clicked.
$.fn.enterKey = function(fnc) {
    return this.each(function() {
        $(this).keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        });
    });
}

// Send the Message enter by User
$('body').on('click', '.chat_box .input_send', function(e) {
    e.preventDefault();

    var message = $('.chat_box .input_message').val();
    var name = $('.chat_box .input_name').val();

    // Validate Name field
    if (name === '') {
        bootbox.alert('<br /><p class = "bg-danger">Please enter a Name.</p>');
    } 

	else if (message !== '') {
        // Define ajax data
        var chat_message = {
            name: $('.chat_box .input_name').val(),
            message: '<strong>' + $('.chat_box .input_name').val() + '</strong>: ' + message
        }
        //console.log(chat_message);
        // Send the message to the server passing File Url and chat person name & message
        ajaxCall('message.php', chat_message);

        // Clear the message input field
        $('.chat_box .input_message').val('');
        // Show a loading image while sending
        $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary btn-block" disabled /> &nbsp;<img     src = "Spinner-1s-200px.gif" />');
    }
});

// Send the message when enter key is clicked
$('.chat_box .input_message').enterKey(function(e) {
    e.preventDefault();
    $('.chat_box .input_send').click();
}); 
</script>
</div>
</body>