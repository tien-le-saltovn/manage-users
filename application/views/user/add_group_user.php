<!DOCTYPE html>
<html>
<head>
	<title>add group user</title>
	<style type="text/css">
		#group_usr {
            border-collapse: collapse;
             width: auto;
             height: 300px;
             margin: ;
             }
      h2 {
      	margin-right: 80px;
      }
      .type {
      		margin: 30px 20px 0px 20px;
      }
      button {
      	float: left;
      }
	</style>
</head>
<body>

  <div id="group_usr"> 
    <h2>Group Type:</h2>
    <form  method ="post" >
      <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
        ?>    	
  	<div class="type">
    <label>Type:</label>  
  	 <input  type="text" name="txtType"> <br>
  	</div> <br>
  	 <button type="submit" name="btnSaveType" value="Create news type" >Save</button>
    </form>
  </div>
</body>
</html>
