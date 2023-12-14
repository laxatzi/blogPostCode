<?php


 // Functions

//  A function is a block of code designed to carry out a certain task.
//  This function can be used repeatedly within our codebase, enabling cleaner and more eligible code.

 // Function Syntax

 // The basic syntax for a function is this:
 function fn_name($parameter1, $parameter2) {
   // code to be executed
 }

// Here we make use of the function keyword followed by the name of the function. Inside the parens, we make use of two parameters. Function parameters are not always mandatory.
// This code merely enables the function to execute the code between the curly brackets but do not call it.
// the function is called bellow
fn_name($parameter1, $parameter2);

// For example:

 function greet_name($greeting, $name) {
     echo $greeting." ".$name;
 }

 greet_name("Hello", "John"); // Hello John
 echo "<br>";
 greet_name("Good morning", "Maria"); // Good morning Maria