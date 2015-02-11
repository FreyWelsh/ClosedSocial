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

        <title>Register</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">

    </head>
    <body>
        <!-- a place to dump error messages for debugging -->
        
        <div class = "backgroundPicture"/>
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-wrap">
                        <h1>Activate your account</h1>
                            <!-- onSubmit="javascript:return register();"  -->
                            <div id="mybad"></div>
                            <form role="form">
                                <!-- weird syntax, works with framework -->
                                <input type="submit" id="btn-activate" class="btn btn-custom btn-lg btn-block" value="Activate Now" />
                            </form>
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>
        <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Recovery password</h4>
                    </div>
                    <div class="modal-body">
                        <p>Type your email account</p>
                        <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-custom subm">Recovery</button>
                    </div>
                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Closed Social © - 2014</p>
                        <p>Powered by <strong>Magic</strong></p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/activate.js" type="text/javaScript"></script>
        <script src="js/site.js"></script>
    </body> 

</html>