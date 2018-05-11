<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."css/login.css" ?>">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>images/customs.ico"/>
<title>Bangladesh Customs Intelligence Database</title>
</head>
<body>
<?php echo form_open("auth/login");?>
  <div class="imgcontainer">
    <img src="<?php echo base_url() ?>images/NBR-customs-logo.png" alt="Bangladesh Customs" class="avatar">
  </div>

  <div class="container">
    <?php
    if($this->session->flashdata('message') !== NULL){
    ?>
      <div style="color: red" align="center"> <?= $this->session->flashdata('message'); ?></div>
    <?php
    }
    ?>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="identity" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" name="remember"> Remember me
    </label>
  </div>
<?php echo form_close();?>

</body>
</html>
