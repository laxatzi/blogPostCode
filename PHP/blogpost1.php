<?php
 // Functions

//  A function is a block of code designed to carry out a certain task.
//  This function can be used repeatedly within our codebase, enabling cleaner, easier to maintain, and more legible code.

 // Function Syntax

 // The basic syntax for a function is this:
 function fn_name($parameter1, $parameter2) {
   // code to be executed
 }

// Here we make use of the function keyword followed by the name of the function and parens.
// Function names can only contain letters, numbers, and underscores. They cannot start with a number though.
// Inside the parens, we make use of two parameters. Function parameters are not mandatory.
// Thus we can write functions without parameters.
// The above code merely enables the function to execute the code between the curly brackets but do not actually run it.
// In order to run the code inside the function or more simply call the function, we enter the function's name followed by parenthesis and the respective arguments in the case that our function includes parameters.
fn_name($parameter1, $parameter2);

// For example:

 function greet_name($greeting, $name) {
     echo $greeting." ".$name;
 }

greet_name("Hello", "John"); // Hello John
echo "<br>";
greet_name("Good morning", "Maria"); // Good morning Maria

// We see that we can call the function multiple times with different parameters and different results.
// In the above example we just displaying the result of the function for demonstration purposes.
// In reality, functions are returning code rather than displaying it.
// Returning means storing a value for later use.
// Regarding the previous example:

function greet_name2($greeting, $name) {
  return $greeting. " ". $name;
}
// The result of the code executed inside the curly braces is now stored in the function itself
// If we want to display this result we must display the function.

echo greet_name2("Hello", "John"); // Hello John