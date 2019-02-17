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

$studentList = ['barnes', 'nickerson', 'indabox', 'miller', 'scott'];
foreach ($studentList as &$value) {
    $value = new studentClass;
}
$studentList[0]->setValues('Mike', 'Barnes', 'm', 'f', 4);
$studentList[1]->setValues('Jim', 'Nickerson', 'm', 'sm', 3);
$studentList[2]->setValues('Jack', 'Indabox', 'm', 'j', 2.5);
$studentList[3]->setValues('Jane', 'Miller', 'f', 'sr', 3.6);
$studentList[4]->setValues('Mary', 'Scott', 'f', 'sr', 2.7);

for ($i = 0; $i < 5; $i++) {
    $studentList[$i]->showMyself();
}
