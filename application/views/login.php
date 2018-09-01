<html>
<head>
	<title>Parking</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <style>
        .keep-right{
            float: right;
        }
        .red-border{
           border-color:#ce2929;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-sm-12 col-md-2 col-lg-4 col-xs-12"></div>
        <div class="col-sm-12 col-md-9 col-lg-4 col-xs-12" style="background-color:#f4f4f4;padding:40px;width:100%; -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);">
            <?php if(isset($error)) { echo $error; }; ?>
            <div class="account-wall">
                <center><i style="font-size:74px" class="fas fa-user-tie"></i></center><p>
                <?=form_open("ctrl_admin/login",array("class"=>"form-signin")); ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo set_value('username'); ?>" autofocus>
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="password" >
                    <?php echo form_error('password'); ?>
                </div>

                <button class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login" type="submit">
                    Login</button>

                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    จดจำรหัสผ่าน
                </label>
                <a href="#" class="keep-right">ช่วยเหลือ? </a><span class="clearfix"></span>
                <?=form_close();?>
            </div>
            <div id="error" style="margin-top: 10px"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</body>
</html>