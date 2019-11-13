<?php
/**
 * @author HoangDoan
 */
#1.Single and multi-line comments.
//This is a single comments

/* This Echo statement will print out my message to the
the place in which I reside on.  In other words, the World.
This is the multi-line commment.
 */

#2.Variables storing integer, double, boolean and string data types.
$test_var_integer = 15;
echo gettype( $test_var_integer ) . "<br />"; // Displays "integer"
$test_var_double = 8.23;
echo gettype( $test_var_double ) . "<br />"; // Displays "double"
$test_var_boolean = false; //Boolean
echo gettype( $test_var_boolean ) . "<br />"; // Displays "false"
$test_var_string = "Hello, world!";
echo gettype( $test_var_string ) . "<br />"; // Displays "string"

#3.Defining at least two constants.
define( "MY_PI", 3.14 ); // MY_PI always has the double value "19"
//echo MY_PI;     // Displays 3.14
define( "MY_CONST", "30" ); // MY_CONST always has the string value "30"
//echo MY_CONST;     // Displays "30"

#4.Concatenating two strings.

$my_newstring = "Hello" . "Wolrd";

#5.Using string interpolation.

$name = 'Hoang';
// $name will be replaced with `Joel`
echo "<p>Hello $name, Nice to see you.</p>";

#6.Using a numeric compound assignment operator.
$my_number = 1;
$my_number+=2;
echo "a numeric compound assignment operator ".$my_number."<br />";

#7.Generating a random number.
$my_rand_num = rand(10, 30);
echo "my radom number: ".$my_rand_num . "<br />";


#8.Including a header.php file containing header information.

include 'header.php';


#9.Requiring a footer.php file containing footer information.

include_once('footer.php');

#10.Displaying the variables and constants created.
//Done
?>