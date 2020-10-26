<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

//header("location: http://localhost/oj_intern/UserController/userLoginProcess");
}
?>
<head>
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
    if (isset($logout_message)) {
        echo "<div class='message'>";       
        echo $logout_message;
        echo "</div>";
    }
    if (isset($message_display)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
    }
?>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php 
   echo form_open('UserController/userLoginProcess'); 
?>
<?php
    echo "<div class='error_msg'>";
    if (isset($error_message)) {
        echo $error_message;
    }
    echo validation_errors();
    echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="txtUserName" id="name" placeholder="username" value='<?php if(isset($_POST['txtUserName']) && $_POST['txtUserName'] != NULL){ echo $_POST['txtUserName']; } ?>'/><br /><br />
<label>Password :</label>
<input type="password" name="txtPassword" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
<a href="<?php echo base_url() ?>UserController/addUser">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>