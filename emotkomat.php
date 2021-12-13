
<!-- NOT https://raw.githubusercontent.com/dantenincevic/Basic-PHP-Calculator/master/site.php -->
<!-- NOT https://gist.github.com/apalm1341/ba0c345f6255721594aab6f1ea7be7e9 -->
<!-- https://gist.github.com/jkuip/43bb6716e0e907f74b49 -->


<!DOCTYPE html>
<html>
	<head>
		<title>Calculator</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
		<div class="container" style="margin-top: 50px">
		
			<div id="screen">
				<?php
				
					// If the submit button has been pressed
					if(isset($_GET['submit']))
					{
						// Print total to the browser
						echo "<h1>box {$_GET['box']}, emoji {$_GET['emoji']}, PIN {$_GET['pin_number']} equals</h1>";
					} else {
						// Print error message to the browser
						echo '****';
					}
				
				?>
			</div>
		    


            <div id="keyboard">
                <button id='button1' value='1'>1</button>
                <button id='button2' value='2'>2</button>
            </div>

		    <!-- Calculator form -->
		    <form method="get" action="emotkomat.php">
		        <input name="box" type="text" class="form-control" style="width: 150px; display: inline" />
				<input name="emoji" type="text" class="form-control" style="width: 150px; display: inline" />
				<input name="pin_number" type="text" class="form-control" style="width: 150px; display: inline" />
                
		        <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
		    </form>
	    
		</div>
	
	</body>
</html>

