<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- main view file -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Amirite.info</title>
		<!-- Latest compiled and minified CSS -->
		
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />

	</head>

	<body onload="fetchIssues()">
		<div class="container">
			<h1><center>Amirite?<small></br> survey says...</small></center></h1>
			<div class="jumbotron">
				<h3>Ask a Yes/No question:</h3>
				<form id="issueInputForm" method="post">

					<div class="form-group">
						<label for="questionInput">Question</label>
						<textarea class="form-control" name="questionInput" id="questionInput" rows="4" placeholder="Type your question here..."></textarea>
					</div>

					<div class="form-group">
						<label for="questionCategoryInput">Category</label>
						<select name="questionCategoryInput" id="questionCategoryInput" name="questionCategoryInput" class="form-control">
							<option value="Cat 1">Cat 1</option>
							<option value="Cat 2">Cat 2</option>
							<option value="Cat 3">Cat 3</option>
						</select>
					</div>

					<button type="submit" name="ask_btn" class="btn btn-primary">Ask</button>
					<!-- post question to mysql DB -->



				</form>
			</div>

			<!-- questions populate here! -->
			<!-- fetch() -->
			<div class="col-lg-12">
				<div id="questionList">
					<?PHP 
					if(ISSET($questions))
					{
						if(COUNT($questions) > 0)
						{
							foreach($questions as $question)
							{
					?>
							<div class="container-fluid">
								<form id="answer_question" method="post">			
									
										<div name="individual_question" id="display_question_<?PHP echo $question['question_id']?>">
											<p>
												<?PHP echo $question['question'];?><br>
												<?php echo $question['question_category'];?><br>
												YES: <?php echo $question['answer_yes'];?><br>
												NO: <?php echo $question['answer_no'];?><br>
												TOTAL: <?php echo $question['answer_total'];?><br>

												<input type="hidden" name="question_id" value="<?PHP echo $question['question_id']?>">
											
											</p>

										</div>
										<button type="submit" name="ans_btn" value="yes" class="btn btn-success">Yes</button>
										<button type="submit" name="ans_btn" value="no" class="btn btn-danger">No</button>
										<p><br></p>
								</form>
							</div>
								
					<?PHP
							}
						} else echo "<p>No questions found.<p>";
					}
					?>
				</div>
			</div>

			<div class="footer">
				<p>&copy www.Amirite.info</p>
			</div>
		</div>


		<!-- Latest compiled and minified JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>

