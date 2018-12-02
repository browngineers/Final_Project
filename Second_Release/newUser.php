<?php
   
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
	add squad pic here 
        <div class="row"> 
            <div class="col-md-4 col-md-offset-4"> 
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome! Please Create Your New Account Below</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method='post'>
                            <fieldset>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Phone Number" name="phone" type="text" value="">
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Group Name" name="group" type="text" value="">
                                </div>
								
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Create Account" name="submit">
                                <br/><a href='login.php'>Existing User?</a>
			    </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div align = 'center'>
	    <hr/>
		<p style='font-weight:bold;'>The Final Project</p>
		<p align='center'>Rohan Chaudhry  |  Shane Mathew  |  Mehul Mittal  |  Mohammad Syed</p>
		<p>Wolph-Coffman</p>
		<p>Copyright 2018  |  Browngineerz</p>
	</div> 

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>



<?php
    
    if (isset($_POST['submit'])) {
        echo 'test';
	$v1 = $_POST['phone']; //phone number 
        $v2 = $_POST['group']; // group name will be used for authentication 
        $v3 = $_POST['name']; // username 
        $v4 = $_POST['password'];  // password 
        $cont = true;         
        echo "name is " . $v3."  " ; //test 

        $file = fopen("passwd.txt", "r") or exit("Unable to open file!");
		
        //read each line of txt file 
        while(!feof($file)){
          if(strpos(fgets($file),$v3) !== false){
            echo "Please enter a unique username and password!";
            $cont = false; 
            header('Location: newUser.php');
            echo "Please enter a unique username and password!";

            break;  
          } 
        }
        fclose($file);
         
       
	if($cont){
            echo 'cont'; 
            $_SESSION['user'] = $v3; //'user' == username; considered like a global variable 
             
            $_SESSION['start'] = time(); // Taking logged in time.
            // Ending a session in 15 minutes from the starting time.
			
            $_SESSION['expire'] = $_SESSION['start'] + (15 * 60);
	    //write in passwd.txt 
			$str = $v3 . " : " . $v4 . " : " . $v2 . " : " . $v1 . "\n"; 
			$fh = fopen("passwd.txt", "a"); 
			fwrite($fh, $str); 
			fclose($fh);	
         
            header('Location: homepage.php'); 
	} 
        } 
?>