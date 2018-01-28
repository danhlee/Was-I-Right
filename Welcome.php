<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// main controller class
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		// load model into this controller to use Model functions
		$this->load->model("Model_questions_table");
		
		//$test['hello'] = $this->Model_questions_table->getQuestions();
		//var_dump ($data);
		// if the input method() is a post method
		// ??? how does IT know a post() was inputted when the ask button is pressed?
		// https://www.codeigniter.com/user_guide/libraries/input.html
		// alternative: if($this->input->method() == "post")
		if(isset($_POST['ask_btn']))
		{
			// execute Model function called postQuestion($question)
			// $question = "name" attribute value in view (home.php) which is linked to the textArea element
			$this->Model_questions_table->postQuestion($this->input->post('questionInput'), $this->input->post('questionCategoryInput'));
		}
		
		// post yes
		if(isset($_POST['ans_btn']) && $_POST['ans_btn']=="yes")
		{
			// execute Model function called postQuestion($question)
			// $question = "name" attribute value in view (home.php) which is linked to the textArea element
			$this->Model_questions_table->postYes($this->input->post('question_id'));
		}
		if(isset($_POST['ans_btn']) && $_POST['ans_btn']=="no")
		{
			// execute Model function called postQuestion($question)
			// $question = "name" attribute value in view (home.php) which is linked to the textArea element
			$this->Model_questions_table->postNo($this->input->post('question_id'));
		}
		// create a select * from questions_table query, returns an array with results
		// ??? why store all the query results in $data['questions'] specifically @ index = 'questions'
		// ANS: CI turns key's into variables to use on the view page
		// storing in $data[] doesn't work
		// storing in $data doesn't work 
		$data['questions'] = $this->Model_questions_table->getQuestions($this->input->post('question_id'));
		//$data['title'] = "This is my title";
		//$data['myFun'] = function (){echo"this is a test";};

		
		// $data is an array that contains "key" "value" pairs
		// CI turns the "key"s into variables that are available in the view page
		$this->load->view('Home', $data);
	}
}
