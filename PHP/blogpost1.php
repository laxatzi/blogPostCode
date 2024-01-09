<?php

 // What is a Function in PHP

//  A function is a block of code designed to carry out a certain task.
//  It can be used repeatedly within our codebase, enabling cleaner, easier to maintain, and more legible code.

// Lets see an example:
function c_to_f($celsius) {
  echo $celsius * (9 / 5) + 32;
}
// This is an example of a function converting celsius degrees to Fahrenheit
// By writing this function, we can now easily convert different celsius values to Fahrenheit
// convert 30 celsius degrees and then 40, 42, 47 to Fahrenheit.
c_to_f(30); //86
c_to_f(40); // 104
c_to_f(42); // 107.6
c_to_f(47); // 116.6

//We only need to change the $celsius parameter and we get the respective result.
// Had we not built a function, we should write the same code again and again.
// convert 30 celsius degrees and then 40, 42, 47 celsius degrees to Fahrenheit.
echo 30 * (9/5) + 32; // 86
echo 40 * (9/5) + 32; // 104
echo 42 * (9/5) + 32; // 107.6
echo 47 * (9/5) + 32; // 116.6

// This is repetitive code, a big no no for programming, but also more difficult to read, comprehend and maintain.

 // Function Syntax

 // The basic syntax for a function is as follows:
 function function_name() {
   // code to be executed
 }

// Here we make use of the function keyword, followed by the name of the function and parenthesis.
// Function names can only contain letters, numbers, and underscores. They cannot start with a number, though.
// Function names are case-insensitive, so we could also write the above function as Function_Name(), or Function_name, but it is good practice to call them as they are named in their declaration.

// The example code enables the function to execute the code between the curly braces, but does not actually run it.
// In order to run the code inside the function, we enter the function's name followed by parenthesis (call operator).
// We refer to this expression as calling the function.
function_name();

// Return a value
// In the previous example, we just displayed the result of the functions in the browser for demonstration.
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
// If we want to display this result to the browser, we must echo the function.

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
// Parameters are a convenient way to create variables that are scoped to the function. They are also convenient regarding naming, since we can give them any name that aligns with the purpose of our program.

// Note that although arguments and parameters are concepts that are used interchangeably, they are not the same.
// Parameters are variables passed to a function or method in order to be used by that function when it is called.
// Arguments are the values of that variables.
// So in the bellow example, $first_name is the parameter and "John" is the argument.

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

// We see we can call the function multiple times, with different arguments having different results.
// By using parameters, we can take a variable from a function scope and give its value to a local scope.
// More specifically to our example, breaking down the different scopes:
  // -Function Scope:
    // 'greet_name' function
    // parameters: $greeting, $name
  // - Local Scope:
    // each function scope
    // first call arguments $greeting="Hello", $name="John"
    // second call arguments $greeting="Good morning" , $name = "Maria"
    // We notice that regarding both calls, the parameter is maintaining the integrity of the argument outside that function scope.
    // Put it simply, when we assign a value to one call, the other is not affected. We can greet both "John" and "Maria" using the same parameter ($name).


    // For those of you who haven't met with the concept of scopes yet, let's dig in a little further.

// A few words about Scopes

// In programming, scope denotes the area where a function or a variable is accessible to other code.
// The concept of scope is fundamental to programming. Each programming language implements it in its own way.
// The highest level of scope is global scope.
$pet = 'Cat';

echo $pet; // Cat
echo "<br>";
// Here, we both define and echo $pet variable in the global scope. So Cat is displayed in the browser. No problem with that!
// Now if a have a function that demonstrates what my pet is, trying to access the global $pet variable from the function's local scope is going to generate a warning!

// function what_pet() {
//   // local scope
//   return 'My pet is a '. $pet;
// }

// echo what_pet(); // Warning: Undefined variable $pet

// From a JS programmer perspective, this is very weird, since in JS we can actually do this because of lexical scoping[link mine].
// PHP behaves differently.
// In order to have access to global scope, we need to introduce the 'global' statement and define the variable as global.
function what_pet() {
  // local scope
  global $pet;
  return 'My pet is a '. $pet;
}

echo what_pet(); // My pet is a Cat

// Now if we echo out the $pet variable outside of the local scope, nothing changes.
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
echo 'My pet is a '. $pet; // My pet is a Dog

// As we see in the above example, introducing a global variable to a local scope with the global keyword can lead to messiness, and you must constantly know the scope level at which you operate your code.
// Another way, the preferred way, since it adheres to the concept of encapsulation, is to pass the global variable as a parameter.
// Note that encapsulation is the practice of bundling related data into a structured unit [link wikipedia]
// So now everything we need 'lives' in that function and everything from the outside is coming in as an argument.
// That way, everything is clear.

function what_pet2($pet) {
  return 'My pet is a '. $pet;
}

echo what_pet2($pet); // My pet is a Cat since I haven't change the global scope
// If I want it to be a Dog I assign the Dog argument to my parameter

function what_pet4($pet) {
  return 'My pet is a '. $pet;
}

echo what_pet4('Dog'); // My pet is a Dog

// NOTE: In cases where the global variable is a constant, we can access it within the function scope without the use of the global statement or the need to importing it as a parameter, since it has a global scope by default.

const KEY_NUMBER = 123456789;

function reveal_my_key() {
  return KEY_NUMBER;
}

echo reveal_my_key(); // 123456789

// Passing arguments by reference
// When we pass an argument to a function, PHP creates a copy within the function's scope. Any changes made to the variable inside the function do not affect the original variable outside the function.

function add_one($number) {
   return $number += 1;
}

$value = 10;
echo add_one($value); // variables value in function scope: 11
echo "<br>";
echo $value; // variables value in global scope: 10

// We have, however, the option to pass an argument by reference using the & symbol in the function definition.
// In that case, the function takes a reference to the original variable.
// From now on, any modifications made to the variable inside the function will directly affect the original variable outside the function.
function add_two(&$number) {
   return $number += 2;
}

$another_val = 10;
echo add_two($another_val); // variables value in function scope: 12
echo "<br>";
echo $another_val; // variables value in global scope: 12

//In this example, the add_two function takes an argument $number by reference.
//  When the function is called with $another_val as argument, any changes made to $number inside the function directly affect the original value of $another_val outside the function. As a result, the value of $another_val is modified to 12 after the function call.
// We must use the option of passing arguments by reference carefully because it can lead to unexpected behavior and loss of transparency in our code.
// Passing arguments by value and have functions return the modified value, is more simple and adds predictability to the code.


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
//  Creating a function that will have an optional parameter before mandatory parameters would cause an error (Uncaught ArgumentCountError)

function hyphenated_word2($joiner='-', $word1, $word2) {
  return $word1.$joiner.$word2;
}

echo hyphenated_word('short', 'term'); // Uncaught ArgumentCountError

// This is happening because arguments are parsed to function left-to-right,
// In our example, we get the error because the first argument (short) we have provided to hyphenated_word2() function gets assigned to $joiner,overriding the '-' value. This is making $word2 unassigned, that's why the uncaught argument error.
// $joiner => 'short'
// $word1 => 'term'
// $word2 => ?

// In the above example the function definition should be modified like this:
  function hyphenated_word3($word1, $word2, $joiner='-') {
    return $word1.$joiner.$word2;
  }

  // How to use Variadic parameters in PHP
  // In Programming, a variadic function is a function of indefinite arity, i.e., one which accepts a variable number of arguments
  // Variadic functions are handy in cases where we do not know all the parameters our function needs at the time of definition.
  // If you come from a JavaScript background, it is the equivalent of the spread operator.
  // Let's see an example:
  // We create a function and we want to take in as many numbers as we want and add them together.
  // So we use the splat operator, also known as a three dots operator.

  function add_numbers(...$numbers) {
    // variable to store the sum of the summation
    $sum = 0;
    // loop through the numbers to add one by one to our sum
    foreach($numbers as $number) {
      $sum += $number;
    }

    return $sum;
  }
  // So now when calling the function we can pass in as many numbers as we want
  echo add_numbers(2, 3, 4, 5); // 14
  echo "<br>";
  echo add_numbers(2, 3, 4, 5, 25); // 39
//Combining a variadic argument with non-variadic ones is possible if the variadic argument is at the end.We can only have one argument with variable length in a function.

   function joiner($merge, ...$words) {

        return ($merge($words));
    }

    echo joiner("join", "I ", "Love ", "Salonika"); // I Love Salonika


 // Type declarations

 // From PHP 7 onwards, we have the option to declare the type of the parameters we're going to use in a function, as well as the type of the value that function is going to return.
// The advantage of type declarations is code that is more robust and less vulnerable to errors.

// For example:
// If we want to declare a function that accepts two strings as arguments:

//  we first need to declare and turn on (value of 1) the strict_types directive, otherwise arguments will be coerced.


// Turning on the strict_types directive
declare(strict_types=1);

// Prefixing arguments with data type
 function greet(string $greeting, string $name) {
   return $greeting. " ".$name;
 }

 echo greet("Hello", "Mike"); // "Hello, Mike"

 echo "<br>";

 //echo greet("Hi", 56.7); // Fatal error: Uncaught TypeError: greet(): Argument #2 ($name) must be of type string, float given
// Had we not declare strict_types=1, the 56.7 float will be coerced to a string and we are going to get "Hi 56.7"

// In the same way, you can also specify the return type of a function.
// We have a function that takes as arguments the total points scored by a player and the number of games he played to score these points. The function return avg points per game.
// We declare the type of the arguments to be integer and the return number to be a string
function points_per_game(int $total_points, int $games):string {
  $avg_points = round($total_points/$games, 3);
  return (string)$avg_points;
}

echo points_per_game(10, 3); // 3.333

// Suppose that we have a function which doesn't return a value.
// In that case, we use the void declaration
function greeting(string $name):void {
  echo "Hello ".$name;
}

echo greeting('Paul'); // Hello Paul

// Anonymous Functions
// Aside from named functions, PHP allows us to define anonymous functions.
function ($n) {
  return $n * $n;
};

// The above function has no name. We also notice that it ends in a semicolon. The semicolon is needed since the function is treated as an expression.
// An anonymous function can be stored to a variable.
$divide = function($x, $y) {
  return $x / $y;
};

echo $divide(21, 7); // 3

// When we var_dump the info of the $divide variable we see that it is actually a closure object

//object(Closure)#1 (1) {
  // ["parameter"]=> array(2) {
  //   ["$x"]=> string(10) ""
  //   ["$y"]=> string(10) ""
  // }
  // }

// So an anonymous function is a closure object and as such it can be passed as argument to another function or be returned from a function

// Being passed as argument(callback) to another function
$cities = ["athens", "milan", "saragossa", "toulon"];
// here we use array_map built-in function to apply an anonymous callback function to every element of an array (the array $cities in the example)
$capitalize = array_map(function($item){
  return ucfirst($item);
},$cities);

print_r($capitalize); // Array ( [0] => Athens [1] => Milan [2] => Saragossa [3] => Toulon )

// Return an anonymous function from a function
function multiplier_generator($n) {
  return function ($x) use ($n){
    return $n * $x;
  };
}

// the above multiplier_generator function doesn't work because php has function scope, thus variables inside a function are available only inside that function.
// $n is undefined inside the anonymous function.
// The 'use' construct comes to the rescue. The 'use' construct unables us to inherit variables from the parent scope

//We call the function which return an anonymous function that we then store in the $five_times variable.
$five_times = multiplier_generator(5);
// Now the variable can be invoked like a normal function. It remembers the anonymous function's return value and reference it in function scope.
echo $five_times(3); // 15

// Arrow functions
// PHP 7.4 introduced arrow functions. Arrow functions are very popular in JS, so for programmers with js background this is not a new concept.
// The benefits of using arrow functions are cleaner syntax, improved readability and the implication of return statements, which of course contribute to the former two.
// Example:
// Lets say we have a very simple function that adds two arguments.
function adder($n, $x) {
  return $n + $x;
}

echo adder(5, 6); // 11

// We could write it like:

$adder = fn ($n, $x)=> $n + $x;

echo $adder(2,3); // 5

// We see we do not use the function keyword but the fn keyword instead
// then we use, what's called, a fat arrow with arrow functions we cannot use curly braces or the return statement.
// Arrow functions in PHP cannot perform multi-line expressions.
// This is a fundamental difference to Javascript, where using multi-line expressions, with curly braces and the return statement, is an option.
// Being strictly one liners, arrow functions in PHP are suitable for small, helper functions or callbacks.
// Let's refactor the capitalized function we used before to use an arrow function.

// $cities = ["athens", "milan", "saragossa", "toulon"];
// here we use array_map built-in function to apply an anonymous callback function to every element of an array (the array $cities in the example)
$capitalize2 = array_map( fn ($item) => ucfirst($item) ,$cities);

print_r($capitalize2); // Array ( [0] => Athens [1] => Milan [2] => Saragossa [3] => Toulon )

// Unlike js, we can't omit the parentheses around a single argument.

// If you have any questions about functions in PHP, don’t hesitate to leave them in the comments section below



