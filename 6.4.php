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

    public function __construct($firstname, $lastname, $g, $s, $gpa)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $this->genders[$g];
        $this->status = $this->statuses[$s];
        $this->gpa = $gpa;
    }

    public function showMyself()
    {
        echo "Name: $this->firstname" . ' ' . "$this->lastname" . PHP_EOL;
        echo "Gender: $this->gender" . PHP_EOL;
        echo "Status: $this->status" . PHP_EOL;
        echo "GPA: $this->gpa" . PHP_EOL;
        echo '-----' . PHP_EOL;
    }

    public function studyTime($study_time)
    {
        $this->gpa = $this->gpa + log($study_time);
        if($this->gpa > 4.0) {
            $this->gpa = 4.0;
        }
    }

    public function __sleep()
    {
        echo 'Student' . ' ' . $this->firstname . ' ' . $this->lastname . ' ' . 'was expelled.' . PHP_EOL;
        echo '-----' . PHP_EOL;
        return array('firstname', 'lastname', 'gender', 'status', 'gpa');
    }

    public function __wakeup()
    {
        echo 'Student' . ' ' . $this->firstname . ' ' . $this->lastname . ' ' . 'was admitted back to the Class.' . PHP_EOL;
        echo '-----' . PHP_EOL;
    }

    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname . ' ' . 'is a student of the Class.' . PHP_EOL . '-----' . PHP_EOL;
    }

    public function __invoke($something)
    {
        echo '!!! StudentClass X-Files !!!' . PHP_EOL;
        echo 'Every morning there appears a new writing on the blackboard in the class, and every time it is something new.' . PHP_EOL;
        echo 'Today it says:' . ' ' . $something . PHP_EOL;
        echo $this->firstname . ' ' . $this->lastname . ' ' . 'insists that these signs are left by aliens.' . PHP_EOL;
        echo '-----' . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Student" . ' ' . $this->firstname . ' ' . $this->lastname . ' ' . "gratuated. Therefore the student's personal data were deleted." . PHP_EOL;
    }
}

$studentList = ['barnes', 'nickerson', 'indabox', 'miller', 'scott'];

$studentList[0] = new studentClass('Mike', 'Barnes', 'm', 'f', 4);
$studentList[1] = new studentClass('Jim', 'Nickerson', 'm', 'sm', 3);
$studentList[2] = new studentClass('Jack', 'Indabox', 'm', 'j', 2.5);
$studentList[3] = new studentClass('Jane', 'Miller', 'f', 'sr', 3.6);
$studentList[4] = new studentClass('Mary', 'Scott', 'f', 'sr', 2.7);

$studentList[0]->studyTime(60);
$studentList[1]->studyTime(100);
$studentList[2]->studyTime(40);
$studentList[3]->studyTime(300);
$studentList[4]->studyTime(1000);

for ($i = 0; $i < 5; $i++) {
    $studentList[$i]->showMyself();
}

$expelledStudent = serialize($studentList[3]);
$studentIsBack = unserialize($expelledStudent);

echo $studentList[1];

$studentList[4]('abracadabra');
