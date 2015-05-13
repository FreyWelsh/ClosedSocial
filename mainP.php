<?php
    if(!isset($_SESSION)) { session_start(); }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Closed Social</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body id ="mainPage">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Closed Social</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Archive</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="login.php" id="logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!--NAVBAR IS DONE-->


    <!-- Page Content -->
    <div class="container">
            <!-- Page Header -->

            <div class="row">
                <div class="col-lg-12">
                	<div id="mybad"></div>
                    <h1 class="page-header">
                    <?php
                        // echo '<pre>' . var_dump($_SESSION) . '</pre>';
                        if(isset($_SESSION['name']) ){
                            echo ($_SESSION['name'] . '\'s'); 
                        } 
                        else {
                            echo 'My';
                        }
                    ?> 
                    Threads
                        <small>(Group)</small>
                    </h1>
                </div>
            </div>

            <div class = "centerContent">
            <!-- onclick="newthread()" -->
                <button id="addbut" data-toggle="modal" data-target=".forget-modal" class = "btn btn-custom btn-lg btn-block">Add new Thread</button>
                <div id="threads">
                </div>
            </div>

            <!-- Projects Row -->
            <div class = "horzScroll" id = "threads"> </div>
            <!-- /.row -->

        <hr />
        
        <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
        	<div class="modal-dialog modal-sm">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">×</span>
        					<span class="sr-only">Close</span>
        				</button>
        				<h4 class="modal-title">New Thread</h4>
        			</div>
        			<div class="modal-body">
        				<form id="newThread">
        					
        				</form>
        			</div>
        			<div class="modal-footer">
        				
        				
        			</div>
        		</div> <!-- /.modal-content -->
        	</div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
            <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Closed Social 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>

    <script src="js/mainP.js" type="text/javaScript"></script>
    <script src="js/site.js"></script>

</body>

</html>
