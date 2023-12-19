<?php
 // PHP Functions from a JS programmer perspective

 // This is a comprehensive article about PHP functions. Since JS was my first language, I tend to compare everything I learn, outside of the JavaScript world, with the syntax and peculiarities of that loved by me, hated by a lot of other people, language.
// So I thought it could be fun, for someone who want to learn PHP but is well versed in the concepts of programming through JS, to learn PHP and at the same time, compare similarities and differences between the two core web languages.

 // If, however, PHP is the first language you wish to get hands-on experience with, hold the line.
 // The post is also catered to the absolute beginner. Just ignore the remarks about JS.

 // What is a Function

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

// Return a value
// In the above example we just displayed the result of the functions for demonstration purposes.
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

// Function Parameters
// Inside the parens, we can make use of parameters.

function name($arg_1, $arg_2, /* ..., */ $arg_n) {
  // Statements...
}

// Function parameters are not mandatory, and there is no limit to how many we can use.
// Parameters are a convenient way to create variables that are scoped to the function, thus are locally defined. They are also convenient regarding naming, since we can give them any name that aligns with the purpose of our program.

// Note that although arguments, and parameters are concepts that are used interchangeably, they are not the same.
// Parameters are variables passed to a function or method in order to be used by that function when it is called.
// Arguments are the values of that variables.
// So in the bellow example $first_name is the parameter and "John" is the argument.

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

// We see that we can call the function multiple times with different arguments having different results.
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
    // For those of you who haven't met with the concept of scope yet I'll try to explain it bellow.

// A few words about Scopes

// In programming, scope denotes the area where a function or a variable is accessible to other code.
// The concept of scope is fundamental to programming. But each programming language implement it in its own way.
// The highest level of scope is global scope.
$pet = 'Cat';

echo $pet; // Cat
echo "<br>";
// Here we both define and echoing $pet variable in the global scope. So Cat is displayed in the browser. No problem with that!
// Now if a have a function that demonstrate what my pet is, trying to access the global $pet variable from the function's local scope is going to generate a warning!

// function what_pet() {
//   // local scope
//   return 'My pet is a '. $pet;
// }

// echo what_pet(); // Warning: Undefined variable $pet

// From a JS programmer perspective this is very weird, since in JS we can actually do this due to lexical scoping[link mine].
// PHP behaves differently.
// In order to have access to global scope we need to introduce the 'global' statement and define the variable as global.
function what_pet() {
  // local scope
  global $pet;
  return 'My pet is a '. $pet;
}

echo what_pet(); // My pet is a Cat

// Now if we echo out the $pet variable outside of the local scope nothing changes.
echo 'My pet is a '.$pet; // My pet is a Cat

// Changing the global variable inside the local scope, in the above example, want affect the global variable's value prior to the function being called.

function what_pet3() {
  // local scope
  global $pet;
  // reassign it to Dog
  $pet = 'Dog';
  return 'My pet is a '. $pet;
}

echo 'My pet is a '.$pet; // My pet is still a Cat

echo "<br>";
echo what_pet3(); // My pet is a Dog inside the function

// But if we echo it out after the function is called the pet is now a Dog
echo "<br>";
echo 'My pet is a '. $pet;

// So introducing a global variable to a local scope with the global keyword it can become messy, and you have constantly be aware of the scope level you operate you code in.
// Another way, the preferred way since it adheres to the concept of encapsulation, is to pass the global variable as a parameter.
// Note that encapsulation is the practice of bundling related data into a structured unit [link wikipedia]
// So now everything we need 'lives' in that function and everything from the outside is coming in as an argument.
// That way everything is clear.

function what_pet2($pet) {
  return 'My pet is a '. $pet;
}

echo what_pet2($pet); // My pet is a Cat since I haven't change the global scope
// If I want to be a Dog I assign the Dog argument to my parameter

function what_pet4($pet) {
  return 'My pet is a '. $pet;
}

echo what_pet4('Dog'); // My pet is a Dog

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
// In our example, we get the error because the first argument (short) we have provided to hyphenated_word2() function gets assigned to $joiner,overriding the '-' value. This is making $word2 unassigned, that's why the uncaught argument error

// In the above example the function definition should be modified like this:
  function hyphenated_word3($word1, $word2, $joiner='-') {
    return $word1.$joiner.$word2;
  }

  // How to use Variadic parameters in PHP
  // In Programming, a variadic function is a function of indefinite arity, i.e., one which accepts a variable number of arguments
  // Variadic functions are handy in cases where we do not know all the parameters our function needs at the time of definition.
  // If you come from a js background, it is the equivalent of the spread operator.
  // Lets see an example:
  // We create a function and we want to be able to take in as many numbers as we want and add them together.
  // So we use the splat operator, also known as three dots operator.

  function add_numbers(...$numbers) {
    // variable to store the sum of the summation
    $sum = 0;
    // loop through the numbers to add one by one to our sum
    foreach($numbers as $number) {
      $sum += $number;
    }

    return $sum;
  }
  // So now when calling the function I can pass in as many numbers as I want
  echo add_numbers(2, 3, 4, 5); // 14
  echo "<br>";
  echo add_numbers(2, 3, 4, 5, 25); // 39











