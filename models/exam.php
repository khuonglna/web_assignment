<?php
class Exam
{
    private $score;
    private $questionList;

    public function __construct(array $questionList) {
        $this->questionList = $questionList;
    }
}
