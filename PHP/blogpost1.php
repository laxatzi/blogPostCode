<?php
 // A Comprehensive Guide to PHP Functions

//  A function is a block of code designed to carry out a certain task.
//  It can be used repeatedly within our codebase, enabling cleaner, easier to maintain, and more legible code.

 // Function Syntax

 // The basic syntax for a function is as follows:
 function say_hi() {
   // code to be executed
   echo "Hi";
 }

// Here we make use of the function keyword followed by the name of the function and parenthesis.
// Function names can only contain letters, numbers, and underscores. They cannot start with a number though.
// Function names are case-insensitive, so the above function could be written as Say_Hi(), but it is considered good practice to call them as they are named in their declaration.

// The above code enables the function to execute the code between the curly brackets but do not actually run it.
// In order to run the code inside the function, we enter the function's name followed by parenthesis(call operator).
// We refer to this expression as calling the function.
say_hi(); // Hi

// Inside the parens, we can make use of parameters.

function name($arg_1, $arg_2, /* ..., */ $arg_n) {
  // Statements...
}
// Function parameters are not mandatory, and there is no limit to how many you can use.
// Parameters are a convenient way to create variables that are scoped to the function, thus are locally defined. The are also convenient regarding naming, since we can give them any name that aligns with the purpose of our program.

// Note that although arguments, and parameters are concepts that are used interchangeably, they are not the same.
// Parameters are variables passed to a function or method in order to be used by that function when it is called.
// Arguments are the values of that variables.
// So in our example $first_name is the variable and "John" is the argument.

 function fn_name($first_name, $last_name) {
   // code to be executed
 }

fn_name('John', 'Doe');

//Lets see another example:

 function greet_name($greeting, $name) {
     echo $greeting." ".$name;
 }

greet_name("Hello", "John"); // Hello John
echo "<br>";
greet_name("Good morning", "Maria"); // Good morning Maria

// We see that we can call the function multiple times with different arguments and different results.
// By using parameters, we can take a variable from a function scope, and give its value to a local scope.
// More specifically to our example, breaking down the different scopes:
  // -Function Scope:
    // 'greet_name' function
    // parameters: $greeting, $name
  // - Local Scope:
    // each function scope
    // first call arguments $greeting="Hello", $name="John"
    // second call arguments $greeting="Good morning" , $name = "Maria"
    // We notice that regarding both calls the parameter is maintaining the integrity of the argument outside that function scope.
    // Put it simply, when we assign a value to one call, the other is not affected. We can greet both "John" and "Maria" using the same parameter ($name).

// Return a value
// In the above examples we just displayed the result of the functions for demonstration purposes.
// In reality, functions are returning code rather than displaying it.
// a return statement forces the function to cease execution.

function phrases() {
  echo "First phrase"; // First phrase
  return;
  echo "Second phrase"; // Second phrase will never be executed
}

// Returning the code enables us storing it to a variable for later use.
// Regarding the previous example:

function greet_name2($greeting, $name) {
  return $greeting. " ". $name;
}
// The result of the code executed inside the curly braces is now the value of the function itself
// If we want to display this result to the browser, we must echoing the function.

echo greet_name2("Hello", "John"); // Hello John

// We can also pass this returned value to another variable and use it as we wish.
$greeting_john = greet_name2("Hello", "John");
echo $greeting_john.". How are you?"; // Hello John. How are you?

// In a function with the return omitted, the value null will be returned.

function greet_name3($greeting, $name) {
 $greeting. " ". $name; // return keyword omitted
}

echo greet_name3("Hello", "Slay"); // null is returned resulting in displaying an empty page


// Default arguments
  // In PHP, you can set a default argument for a parameter.
  // This is handy for cases where a specific value is very common
  // and it is repetitive to define it again and again.

  function hyphenated_word($word1, $word2, $joiner='-'){
    return $word1.$joiner.$word2;
  }
// When you call the hyphenated_word() function and don’t pass the $joiner argument, the function will use the '-' as the default argument:
echo  hyphenated_word('short', 'term'); // short-term

// However, if we do pass a third argument the default argument will be ignored
echo "<br>";
echo hyphenated_word('short', 'term', ' '); // short term

  // Order of default arguments matters
   // The parameter list should have default values at the very end.
   //  Creating a function that will have an optional parameter before mandatory parameters would result in an error (Uncaught ArgumentCountError)

function hyphenated_word2($joiner='-', $word1, $word2) {
  return $word1.$joiner.$word2;
}

echo hyphenated_word('short', 'term'); // Uncaught ArgumentCountError
// This is happening because arguments are parsed to function left-to-right,
// In our example, we get the error because the first argument (short) we have provided to hyphenated_word2() function gets assigned to $joiner,overriding the '-' value. This is making $word2 unassigned.

// In the above example the function definition should be modified like this:
  function hyphenated_word3($word1, $word2, $joiner='-') {
    return $word1.$joiner.$word2;
  }








