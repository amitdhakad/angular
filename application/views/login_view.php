<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $base_url = base_url(); ?>
        <meta charset="utf-8" />
        <title>Adamglobal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Avant" />
        <meta name="author" content="The Red Team" />
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css' />
        <link href="<?php echo $base_url ?>assets/css/styles.min.css" rel='stylesheet' type='text/css' />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body class="focusedform">
        <div class="header-logo">  
            <img src="<?php echo $base_url ?>assets/img/logo-front.png" alt="Logo" class="brand pull-left" />
            <h6 class="pull-right">World's Largest Corporate Services Provider</h6>
        </div>
        <div class="verticalcenter">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4 class="text-center" style="margin-bottom: 40px;">Please login with your details below</h4>
                    <?php
                    if (isset($validation_error)) {
                        echo '<p class="text-danger">' . $validation_error . '</p>';
                    }
                    ?>
                    <?php
                    $attr = array('class' => 'form-horizontal', 'id' => 'loginhere');
                    echo form_open("", $attr);
                    ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="">Email:</label>
                        <div class="col-sm-8">
                            <input type="text" placeholder="test@gmail.com" class="form-control" id="email" name="email" value="<?php if ($this->input->cookie('email') != '') echo $this->input->cookie('email'); ?>" class="input-xlarge" />
                            <?php echo form_error("email"); ?>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="">Password:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="*****"  id="pass" name="pass" value="<?php if ($this->input->cookie('pass') != '') echo $this->input->cookie('pass'); ?>" class="input-xlarge"/>
                            <?php echo form_error("pass"); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for=""></label>
                        <div class="col-sm-8">
                            <label class="remem-text">
                                <input type="checkbox" id="reminder" name="reminder" value="1" />
                                Remember Me</label>
                        </div>
                    </div>

                    <!--<div class="clearfix">
                      <div class="pull-right">
                        <label class="remem-text">
                          <input type="checkbox" id="reminder" name="reminder" value="1" />
                          Remember Me</label>
                      </div>
                    </div>-->
                    <div class="login-btn pull-right">
                        <input type="submit" class="btn btn-success btn-block" value="Login" />
                    </div>
                </div>
                <!--<div class="panel-footer"> <a href="#" class="pull-left btn btn-link" style="padding-left:0">Forgot password?</a>
                  <div class="pull-right">
                    <button class="btn btn-default" type="reset" value="Reset">Reset</button>
                  </div>
                </div>-->
                </form>
            </div>
        </div>
    </body>
</html>
