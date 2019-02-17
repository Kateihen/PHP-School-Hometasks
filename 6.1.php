<?php

class studentClass
{
    public $firstname;
    public $lastname;
    protected $genders = [
        'm' => 'male', 
        'f' => 'female',
    ];
    public $gender;
    protected $statuses = [
        'f' => 'freshman', 
        'sm' => 'sophomore', 
        'j' => 'junior', 
        'sr' => 'senior',
    ];
    public $status;
    public $gpa;

    public function setValues($firstname, $lastname, $g, $s, $gpa)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $this->genders[$g];
        $this->status = $this->statuses[$s];
        $this->gpa = $gpa;
    }
    public function showMyself()
    {
        echo '-----' . PHP_EOL;
        echo "Name: $this->firstname" . ' ' . "$this->lastname" . PHP_EOL;
        echo "Gender: $this->gender" . PHP_EOL;
        echo "Status: $this->status" . PHP_EOL;
        echo "GPA: $this->gpa" . PHP_EOL;
    }
    public function studyTime($study_time)
    {
        $this->gpa = $this->gpa + log($study_time);
        if($this->gpa > 4.0) {
            $this->gpa = 4.0;
        }
    }

}
