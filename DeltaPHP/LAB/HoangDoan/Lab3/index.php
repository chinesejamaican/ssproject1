<?php
/**
 * 
 * @author hoang
 *
 */
class MyClass
{
    
    //1.A function with two required and two defaulted parameters.
    public function myFirstFunction($a, $b, $c = 3, $d = 4)
    {
        echo "Required Parameter1: $a <br/>";
        echo "Required Parameter2: $b <br/>";
        echo "Default Parameter1: $c <br/>";
        echo "Default Parameter2: $d <br/>";
    }
   
    //2.A function with two parameters passed by value and two parameters passed by reference.
    public function mySecondFunction($a, $b, &$c, &$d)
    {
        $a = 1;
        $b = 2;
        $c = 6;
        $d = 8;
        
    }
 
    
}

$obj = new MyClass();
echo "<h1>Functions:</h1>";
$a1 = 1;
$b1 =2;
$c1 = 3;
$d1 =4;
echo "<h2>Required and defaulted parameters:</h2>";

echo "<h3>Required and defaulted parameters a,b,c,d:</h3>";
$obj->myFirstFunction($a1, $b1, $c1, $d1);
echo "<h3>Required and defaulted parameters a, b, c:</h3>";
$obj->myFirstFunction($a1, $b1, $c1);
echo "<h3>Required and defaulted parameters a, b:</h3>";
$obj->myFirstFunction($a1, $b1);

echo "<h2>Parameters passed by value and passed by reference:</h2>";
/**
 * 
 * Part 2
 *A function with two parameters passed by value and two parameters passed by reference.
 */

$a2 = 1;
$b2 =2;
$c2 = 3;
$d2 =4;


$obj->mySecondFunction($a2,$b2,$c2,$d2);

echo "Value Parameter1: $a2 <br/>";
echo "Value Parameter2: $b2 <br/>";
echo "Reference Parameter1: $c2 <br/>";
echo "Reference Parameter2: $d2 <br/>";


// An object with at least three properties, get and set methods for each property and a method that combines (by concatenation or numeric expression) the properties.
// Instantiate two instances of the object and output the properties of each instance through the get methods and the combination of the properties.
echo "<h1>Objects:</h1>";

class Person{
    // Properties
    private $firstName;
    private $lastName;
    private $gender;
    
    // Methods
    function set_name($firstName, $lastName, $gender) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
    }
    function get_firsName() {
        return $this->firstName;
    }
    function get_lastName() {
        return $this->lastName;
    }
    function get_gender() {
        return $this->gender;
    }
    //this function print out all information
   public  function printInfor($firstName, $lastName, $gender){
        echo "Property 1: $firstName <br/>";
        echo "Property 2: $lastName <br/>";
        echo "Property 3: $gender <br/>";
        echo "All = $firstName $lastName - $gender <br/>";
    }
}
$person = new Person();
$person->printInfor("Hoang", "Doan", "Male");


?>