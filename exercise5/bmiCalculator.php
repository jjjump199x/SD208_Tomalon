<?php
	// session_start();
?>

<!DOCTYPE html> 
<html lang="en">
	<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>BMI Calculator</title>

	<style>
	body {
		background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSNhWX3MUPhPHx4cuhSIGI42DMxef1ZgNFijg&usqp=CAU);
		background-repeat: no-repeat;
		background-size: cover;	
	}
	.center {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
	}
	.formNeh {
		float: right;
		display: inline;
		width: 50%;
		padding: 200px;
	}
	input[type=text] {
        width: 50%;
        padding: 10px;
        border-radius: 4px;
    }
    input[type=text]:hover {
        background-color: skyblue;
		color: black;
    }
    input[type=submit] {
        width: 30%;
        background-color: indianred;
        padding: 10px;
        border-radius: 4px;
		float: right;
    }
    input[type=submit]:hover {
        background-color: lightcoral;
    }
	</style>
<head>

<body>
	<?php
	if (isset($_POST['submit'])) {
		$weight = $_POST['weight'];
		$height = $_POST['height'];

		if ($weight <= 0 || $height <= 0) {
			echo '<script>alert("Invalid input.")</script>';
		} else {
			$toMeter = 100;
			$newheight = $height / $toMeter;
	
			$bmi = round($weight / ($newheight * $newheight), 2);
			$bmiFeedback = "Your BMI is " . $bmi . " kg/m<sup>2</sup>.";
				
			$result = "";
			if ($bmi < 18.5) {
				$result = "You are underweight. Seems like you're unfit.";
			}
			elseif ($bmi > 18.5 or $bmi < 25) {
				$result = "You're BMI result is normal. Good job.";
			}
			elseif ($bmi > 25 or $bmi < 30) {
				$result = "You are overweight, not so good.";
			}
			elseif ($bmi > 30 or $bmi < 35) {
				$result = "You are obese. It's time to work out.";
			} else {
				$result = "Oops! You are extremely obese.";
			}
	
			// To submit the result
			echo '<form id="formid" action="bmiResult.php" method="post">
			<input type="hidden" name="height" value="'.$height.'">
			<input type="hidden" name="weight" value="'.$weight.'">
			<input type="hidden" name="bmi" value="'.$bmiFeedback.'">
			<input type="hidden" name="result" value="'.$result.'">
			</form>
			<script>document.getElementById("formid").submit()</script>';
		}
	}

	?>

	<form class="formNeh" action="bmiCalculator.php" method="Post">
		<div class="form-group">
			<label for="formGroupExampleInput"><strong>HEIGHT :&nbsp;&nbsp;&nbsp;&nbsp;</strong></label>
			<input type="text" class="form-control" name="height" placeholder="Input height in centimeters">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput2"><strong>WEIGHT :&nbsp;&nbsp;&nbsp;</strong></label>
			<input type="text" class="form-control" name="weight" placeholder="Input weight in kilograms">
		</div><br><br>
		<input type="submit" class="btn btn-primary btn-block" name="submit"/>
	</form>


</body>
</html>
