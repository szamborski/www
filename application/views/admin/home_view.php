<!DOCTYPE html>
<html lang="pl">
	<head>
	    <meta charset="utf-8">
	    <title>Panel administratora</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" />
	    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css" />
	    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css" />
	    <link rel="stylesheet" href="<?php echo base_url();?>css/global.css" />
	</head>
	<body>
            
            <div class="container">

                <form method="post" action="<?php echo base_url();?>admin/login/auth" class="form-signin">
                    <h2 class="form-signin-heading">Proszę sie zalogować</h2>
                    <input type="hidden" name="csrf_name" value="<?php echo $hash; ?>" />
                    <input type="text" name="username" class="input input-medium input-block-level" value="" placeholder="Nazwa użytkownika..." />
                    <input type="password" name="password" class="input input-medium input-block-level" value=""  placeholder="Hasło" />
                    <input type="submit" value="Zaloguj" class="btn btn-primary" /> &nbsp;&nbsp;     <a href="<?php echo base_url();?>admin/forgot">Zapomniałeś hasła?</a>
                   </br></br><a href="/rejestracja" class="btn btn-primary" >Rejestracja nowego konta</a>
                    
                        <?php
                            
                   
                        $message = ! empty($message) ? $message : $this->session->userdata("message");
                        $alert_type = ! empty($alert_type) ? $alert_type : $this->session->userdata("status");

                        if(! empty($message) || $alert_type === 0) { 
                    ?>
                            <br /><br />
                            <div class="alert alert-error">
                                <i class="icon-exclamation-sign"></i> <?php echo $message; ?>
                            </div>
                    <?php
                        $array = array(
                            "message"   =>  "",
                            "alert_type"=>  ""
                        );
                        
                        $this->session->set_userdata($array);
                    ?>
                    <?php
                        }
                    ?>
                </form>
            </div>
	</body>
</html>