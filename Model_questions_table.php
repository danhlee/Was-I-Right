<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_questions_table extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function postQuestion($questionInput, $questionCategoryInput) 
    {
        // gets variables from view page using name attribute value
        $sql = "INSERT INTO questions_table(question, question_category, answer_yes, answer_no, answer_total) VALUES('$questionInput', '$questionCategoryInput', 0, 0, 0);";
        // $this->
        $query = $this->db->query($sql);
    }

    // how did we sync db to this function???
    // ans: database.php in application/config folder
    public function getQuestions()
    {
        $sql = "SELECT * FROM questions_table";
        // $this.db.query($sql)
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // get ID of question from view?
    // useID to post to DB
        // increment yes
        // increment total
    public function postYes($question_id)
    {
        $sql = "UPDATE questions_table SET answer_yes = answer_yes+1, answer_total = answer_total+1 WHERE question_id = $question_id;";
        $query = $this->db->query($sql);
    }

    public function postNo($question_id)
    {
        $sql = "UPDATE questions_table SET answer_no = answer_no+1, answer_total = answer_total+1 WHERE question_id = $question_id;";
        $query = $this->db->query($sql);
    }
}