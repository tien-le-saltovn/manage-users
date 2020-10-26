<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="<?php echo public_helper('js');?>/add_user.js"></script>
</head>
<body>
<div> 
<h2>Sign up for the account</h2> 
<form action="" method="post"  > 
      <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
     ?>  
 
    <label for="exampleInputUserName">User Name:</label>  
    <input type="text" name="txtUserName" onkeyup="check()" value='<?php if(isset($_POST['txtUserName']) && $_POST['txtUserName'] != NULL){ echo $_POST['txtUserName']; } ?>' id="username">
    <td>
            <div id="z-username"></div>
        </td>
    <br><br>
  
    <label>Password:</label><input type="password" name="txtPassword" size="28" class="input" value='<?php if(isset($_POST['txtPassword']) && $_POST['txtPassword'] != NULL){ echo $_POST['txtPassword']; } ?>'  id="password" />
    <td>
            <div id="z-password"></div>
        </td>
        <br/>
    <label>Re-Pass:</label><input type="password" name="txtPassword2" size="28" class="input" value='<?php if(isset($_POST['txtPassword2']) && $_POST['txtPassword2'] != NULL){ echo $_POST['txtPassword2']; } ?>'" id="re_password" /><br />
    <td>
            <div id="z-re_password"></div>
        </td>
   <br> <br>
  <label>Gender:</label> 
   <input type="radio" name="rdoGender"  value='0'<?php if(isset($_POST['rdoGender']) && $_POST['rdoGender'] == 0) {?> checked="checked"<?php } ?> > Male </input>
   <input type="radio" name="rdoGender" value='1' <?php if(isset($_POST['rdoGender']) && $_POST['rdoGender'] == 1) {?> checked="checked"<?php } ?> > Female </input>
   <br><br>
   <label>Birthday:</label>
   <input type="date" name="dtmBirthday" onkeyup="check()" id="birthday" value='<?php if(isset($_POST['dtmBirthday']) && $_POST['dtmBirthday'] != NULL){ echo $_POST['dtmBirthday']; } ?>'>
   <td>
            <div id="z-birthday"></div>
        </td>
   <br><br>
    <label for="type"> Type: </label>                                  
    <select name="chkType" method="get" class="form-control" onkeyup="check()" id="type">                         
    <?php
        foreach ($idType as $row) {
        echo '<option value="'.$row['id'].'">'
        .$row['type'].'</option>';
    }
    ?>
    </select>
    <td>
            <div id="z-type"></div>
        </td>
    <br><br>
  <label>language:</label>
   <input type="radio" name="rdoLanguage" value=0 value='0'<?php if(isset($_POST['rdoLanguage']) && $_POST['rdoLanguage'] == 0) {?> checked="checked"<?php } ?> > VN </input></t>
   <input type="radio" name="rdoLanguage" value=1 value='0'<?php if(isset($_POST['rdoLanguage']) && $_POST['rdoLanguage'] == 1) {?> checked="checked"<?php } ?> > EN </input><br><br>
   <button type="submit" class="btn btn-primary" value="Add User">Save</button>
  
  
</form>
</div>
</body>
</html>