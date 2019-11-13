<?php
/**
 * @author HoangDoan
 */
/**
One, and only one, array (Hint: Use a multi-dimensional array) to store the following questions and your answers to the questions:
What is your first memory of using a computer?
What was the first computer you bought and what is your fondest memory of using it?
What was the first web page you created? Why was it created?
What is your favorite HTML tag? Why?
What is your favorite CSS property? Why?
What is your favorite programming language? Why?
What is your favorite tool for writing code? Why?
For the following technologies, rate your skills as Excellent, Proficient or Beginner and state why you selected each rating:
PHP
HTML
CSS
JavaScript
Web Page Design
Graphic Design and Creation
What is your opinion on internships?
Have you completed an internship at Broward College? If you have, what did you gain out of completing the internship?
Are you currently registered for an internship at Broward College? If you are, what do you plan to get out of the internship?
If no for the previous two questions: Are you interested in completing an internship at Broward College?
Display the questions and answers in the array using a foreach loop.
**/
$QandA = array(
    1 => array(
        'Question' => 'What is your first memory of using a computer?',
        'Answer' => 'Using MS DOS'
    ),
	2 => array(
        'Question' => 'What was the first computer you bought and what is your fondest memory of using it?',
        'Answer' => 'PC 2006. HDD: 60GB, RAM: 128Mb'
    ),
	3 => array(
        'Question' => 'What is your favorite HTML tag? Why?',
        'Answer' => 'br tag. Line break'
    ),
	4 => array(
        'Question' => 'What was the first web page you created? Why was it created?',
        'Answer' => 'HTML CSS. To make impression on someone.'
    ),
	5 => array(
        'Question' => 'What is your favorite CSS property? Why?',
        'Answer' => 'position: absolute; position: relative; To make website responsive.'
    ),
	6 => array(
        'Question' => 'What is your favorite programming language? Why?',
        'Answer' => 'JAVA. Because it run cross muitple platform.'
    ),
	7 => array(
        'Question' => 'What is your favorite tool for writing code? Why?',
        'Answer' => 'Eclipse. Open source'
    ),
	8 => array(
        'Question' => 'For the following technologies, rate your skills as Excellent, Proficient or Beginner and state why you selected each rating:PHP, HTML, CSS, JavaScript, Web Page Design, Graphic Design and Creation',
        'Answer' => array(
            'PHP' => 'Beginner',
            'HTML' => 'Proficient',
            'CSS' => 'Proficient',
		    'JavaScript' => 'Excellent',
		    'Web Page Design' => 'Proficient',
			'Graphic Design and Creation' => 'Proficient'
        )
    ),
	9 => array(
        'Question' => 'What is your opinion on internships?',
        'Answer' => 'Intern - Software engineering'
    ),
	10 => array(
        'Question' => 'Have you completed an internship at Broward College? If you have, what did you gain out of completing the internship?',
        'Answer' => 'No. I have not'
    ),
	11 => array(
        'Question' => 'Are you currently registered for an internship at Broward College? If you are, what do you plan to get out of the internship?',
        'Answer' => 'No. I am not'
    ),
	12 => array(
        'Question' => 'If no for the previous two questions: Are you interested in completing an internship at Broward College?',
        'Answer' => 'Yes. I do'
    )
	
);

$keys = array_keys($QandA); 

for($i = 0; $i < count($QandA); $i++) { 
	if(($QandA[$keys[$i]]) != null){
		foreach($QandA[$keys[$i]] as $key => $value) {
		if(is_array($value)){
		echo  $key.": <br/>";	
			foreach($value as $subKey => $subValue) {
				echo  $subKey.": ".$subValue . "<br/>";
			}
		}
		else{
		echo  $key.": ".$value . "<br/>";
		}
    }
	}
    echo "<br/>";
}
//var_dump($QandA);
?>