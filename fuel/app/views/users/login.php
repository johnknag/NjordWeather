<?php

/*		$create_user = Auth::instance()->create_user('Jason','Jason','jason@guroos.com','100');
 
//		if( $create_user )
		{
			echo "User created";			
		}
		else
		{
			echo "not created";
		}
*/


	echo View::forge( 'login/header' );  ?>
     
<div class="row">
    	<div class="col-md-offset-5 top50"><?php  echo Asset::img('NjordLogoTransparent.png') ?></div>  
</div>  
    <?php if (isset($errors)) { ?>
        <div class="row top50">
            <?php foreach($errors as $err) { ?>
                <p><h4 class="text-danger text-center"><?=$err?></h4></p>
            <?php } ?>
        </div>
	<?php } elseif(isset($messages)) { ?>
        <div class="row top50">
            <?php foreach($messages as $msg) { ?>
                <p><h4 class="text-center"><?=$msg?></h4></p>
            <?php } ?>
        </div>
    <?php } ?>
    <div id="loginDiv" class="row top<?=isset($errors)?'50':'100'?>" style="<?php echo (($form != 'login' && !is_null($form)) ? 'display: none' : ''); ?>">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default panel-loginForm">
            	<p class="pull-right top10"><b>New to Njord? <a onclick="document.getElementById('loginDiv').style.display = 'none';
                															document.getElementById('registerDiv').style.display = '';">Register</a>&nbsp;&nbsp;&nbsp;</b></p>
                <div class="panel-body panel-body-loginForm">
                
                    <form class="form-horizontal" role="form" action="<?=Uri::Base()?>users/login" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label formControlLeft">Username</label>
                            <div class="form-control col-sm-9 panel-loginForm">
                                <input class="form-control" id="form_username" name="username" type="text">
                            </div>
                        </div>
                        <div class="form-group top25">
                            <label for="inputPassword3" class="col-sm-3 control-label formControlLeft">Password</label>
                            <div class="form-control col-sm-9 panel-loginForm">
                                <input class="form-control" id="form_password" name="password" type="password">
                            </div>
                        </div>
                        <div class="form-group last top25">
                            <div class="col-sm-9">
                                <button id="form_login" type="submit" name="login" Value="Login" class="btn btn-info btn-md">Login ></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer panel-footer-loginForm">
                	<h4><b>Why you should sign up:</b></h4>
                    <br>
                    &bull; Why not?
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div id="registerDiv" class="row top<?=isset($errors)?'50':'100'?>" style="<?php echo (($form != 'register') ? 'display: none' : ''); ?>">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default panel-loginForm">
            	<p class="pull-right top10"><b><a onclick="document.getElementById('loginDiv').style.display = '';
                															document.getElementById('registerDiv').style.display = 'none';">Back to Login</a>&nbsp;&nbsp;&nbsp;</b></p>
                <div class="panel-body panel-body-loginForm">
                    <form class="form-horizontal" role="form" method="post" action="<?=Uri::Base()?>users/register">
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label formControlLeft">Username</label>
                            <div class="form-control col-sm-9 panel-loginForm">
                                <input class="form-control" id="form_username" name="username" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label formControlLeft">E-Mail</label>
                            <div class="form-control col-sm-9 panel-loginForm">
                                <input class="form-control" id="form_email" name="email" type="text">
                            </div>
                        </div>
                        <div class="form-group top25">
                            <label for="inputPassword" class="col-sm-3 control-label formControlLeft">Password</label>
                            <div class="form-control col-sm-9 panel-loginForm">
                                <input class="form-control" id="form_password" name="password" type="password">
                            </div>
                        </div>
                        <div class="form-group top25">
                            <label for="inputPasswordVerify" class="col-sm-9 control-label formControlLeft">Verify Password</label>
                            <div class="form-control col-sm-9 panel-loginForm">
                                <input class="form-control" id="form_passwordVerify" name="passwordVerify" type="password">
                            </div>
                        </div>
                        <div class="form-group last top25">
                            <div class="text-center">
                                <button id="form_register" type="submit" name="register" Value="register" class="btn btn-info btn-md">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
        

<?php echo View::forge( 'login/footer' ); ?>
