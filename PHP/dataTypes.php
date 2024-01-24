<?php

// Exploring Data Types in PHP

 // In programming we instruct computers to do things.
 // We call this instructions programs.
 // We can write programs using diff programming languages, the same way we can communicate with other humans using different human languages.
 // Each language consists of data, and each data has a type.
 // The operations that the computer performs are based on these types.
 // Various data types require different memory allocation and support different operations.
// PHP has its own set of data types. We are going to get into them in this post.

// # PHP is a loosely typed language
 // There are two kinds of programming languages.
 // Loosely typed, and strongly typed, with PHP falling in the former category.
 // Before delving into data types, let's make this distinction clearer.

 // In programming, we can store data in computer memory locations for later use.
 // We call these memory locations, variables.
 // Variables, in simple words, are containers of data types.
 // We give these containers a name in order to manipulate them in our programs.
 // In PHP, variable names are prefixed with a dollar sign, and they must start with a letter or an underscore.
   $name = "Nero";
   $_last_name = "Wolfe";
   echo $name . " ".$_last_name; // Nero Wolfe
 // They can include also numbers but they can't start with one of them.
   $user_124 = "Daniel Crouch";
   echo "<br>";
   echo $user_124; // Daniel Crouch
   echo "<br>";
   // $124_user = "Daniel Crouch";
   // echo $124_user; // syntax error, unexpected integer "124"

 // NOTE: In PHP variables are case sensitive.
 // Capital letters matter.
 // We have declared the variable $name already, but not a variable named $Name.
 echo $Name; // Undefined variable $Name

 // #Loosely typed languages do not require variables to be defined.
 // In the previous example we stored data into variables without explicitly define the type of that data.
 // We can do this in PHP because it is a loosely typed language.
 // If we have written this variables in a strongly typed language, we would have to define the type of the data in that variables
 // This is an example in C# which is a strongly typed language:
 // string name = "Nero";
 // Here we explicitly define that the name variable is a string, and we cannot put any other type in that variable.

 // # Data types
  // PHP supports the following data types:

    // Integer
    // Float (floating point numbers)
    // String
    // Boolean
    // NULL
    // Array
    // Object
    // Resource

// Let's dive deep into them:

 // Integer
  // An integer is a non-decimal number between -2,147,483,648 and 2,147,483,647.
  // For a data type to be classified as Integer, it must have at least one digit,
  // and must not have a decimal point.
  // Integers can be either positive or negative.
  // Regarding integers in CS, we must note that:
  // We use the decimal number system for counting and measuring, but computers operate using a binary number system, with transistors functioning in two states - on and off.
  // In computing, we also use hexadecimal and octal number systems in order to represent binary numbers more efficiently.
  // That is why in PHP integers can be defined in: decimal (base 10), hexadecimal (base 16), octal (base 8), or binary (base 2) notation.
// In the following example $n is an integer. The PHP var_dump() function returns the data type and value:
 $f = 2e3;
 var_dump($f); // float(2000)

 // # Testing an integer value
   // To find weather the type of a variable is integer we can use the is_int() method.
  //Syntax: is_int($value): bool

    var_dump(is_int(17)); // bool(true)
    var_dump(is_int(22.45)); // bool(false)
    // NOTE: We check the type of the variable NOT the actual value.
    var_dump(is_int('2.25')); // bool(false)

// Floating Point Numbers
 // A floating point number or more simply float is a number that can have a decimal point.
$fl = 34.5;
var_dump($fl); // float(34.5)
//Another way of typing floats is to use scientific notation.
$f = 5.327496e3; ;
var_dump($f); // float(5327.496)
// In the above example both $f and $fl are floats.

// # Floating point number's precision
 // In PHP, and in most CS languages, the following expression evaluates to true:
$sum = (.1 + .2) == .3;
echo $sum == false; // 1
 // But hey, my calc says this is not right.
  // .1 + .2 do actually make .3
  // What is going on here?
 // The thing is that, as we have already note, we humans use the decimal notation system and our computers use the binary system.
 // Binary numbers have only 2 as a prime factor, limiting the representation of fractions.
 // In binary, 1/2, 1/4, 1/8 would all be represented accurately as decimals.
 // On the other hand, 0.1 and 0.2 (1/10 and 1/5) are repeating decimals in the binary system.
 // So a more accurate representation would be:
 // .1 + .2 = .29999...
 // and that is the reason for the line 86 equation being true.

 // # Testing a floating value
   // To find weather the type of a variable is float we can use the is_float() method.

    //Syntax: is_float($value): bool
    var_dump(is_float(2.25)); // bool(true)
    var_dump(is_float(225)); // bool(false)
    // NOTE: We check the type of the variable NOT the actual value.
     var_dump(is_float('2.25')); // bool(false)
    // NOTE: NAN being a special constant, holds a float datatype in PHP.
    // Thus:
    var_dump(is_float(NAN)); // bool(true)

// # is_numeric() method
// Since both integers and floats are numbers, we can check them regarding this attribute with the
// is_numeric() method.
// Syntax: is_numeric($value): bool
    var_dump(is_numeric(2.25)); // bool(true)
    var_dump(is_numeric(225)); // bool(true)
    var_dump(is_numeric('A piece of string')); // bool(false);
  // Bear in mind that this method returns true for a numeric string.
    var_dump(is_numeric('225')); // bool(true)

// NOTE: From PHP 7.4 onwards, integers and floats may contain underscores between digits for improving readability.
// These underscores are removed at the lexing stage, so the numeric value does not change.
// In computing, lexing is the process of converting a string of characters into tokens.
// These tokens constitute the smallest meaningful units in a program.
// The lexical analyzer of each language identifies these tokens, and passes them to the next stage of the compiler for further processing. In the case of PHP, the underscores inside a numeric type are excluded from this elevation.

echo 2_345_000.45; // 2345000.45
echo "<br>";
echo 2345000.45; // 2345000.45

// # String
 // In PHP, as in most computer languages, a string represents a sequence of characters.
 // These sequence can consist of various kinds of characters that are wrapped inside quotes.
 // The quotes can be single or double, as long as they are consistent. (For example both start, and finish with double quotes).
 // These two methods of specifying a string value do have some differences though.

 // # Single quoted strings
 // Every character in a single quoted string is literal.
 // Be it escape characters (\r, \n, \b), or variable names ($value), it will be represented literally.
 $number_of_hours = 24;
 echo 'A day has $number_of_hours hours!';
 // A day has $numbers_of_hours hours!

 // The only ecxeption to that rule is the backlash character, which we can use to escape a single quote
 echo 'this isn\'t the first time won\'t be the last time';
 // this isn't the first time won't be the last time

 // # double quoted strings
  // Contrary to the single quoted string method, with double string we can be abstract.
  // Here variables are evaluated. In programming we call the process of placeholders being replaced by their corresponding values in a string, string interpolation:
 $number_of_hours2 = 24;
 echo 'A day has $number_of_hours2 hours!';
// A day has 24 hours!
// In PHP, using \n or \r\n inside double strings will create new lines.
  echo "Hello\r\nWorld";
  // Hello
  // World
// This is not only true for new line escape character but for all escape characters in general (/b, /f, /r etc)

// Heredoc/Nowdoc
 // PHP provides a more efficient method for directly writing multi-line string variables using Heredoc and Nowdoc syntax.
 // The sole difference between a heredoc and a nowdoc is that a heredoc performs string interpolation, while nowdoc doesn’t.
 // So we are going to see how heredoc works and it is pretty much the same with nowdoc.
 // This is an example of a heredoc:
 echo <<<greetWorld
  Hello
  World.
  I Love You!
  greetWorld;

// Hello
// World.
// I Love You!
 // After the <<< operator, we specify an identifier. We can use whatever name we like. Next we add the string itself.
 // The heredoc should be closed by placing the same identifier at the end.
 // Before PHP 7.3 the closing identifier should have no white space in front of it in order to be valid.
 // From PHP 7.3 and on, we can use whitespace in front of the closing identifier as long as the same amount of whitespace is subtracted from the start of each line of the string.

// echo <<<greetWorld
// Hello
// World.
// I Love You!
//  greetWorld;

// The above is invalid

// With heredoc a multiline string is easier to read especially in the case of HTML documents.

$author = 'Lambros Hatzinikolaou';

$copyright = <<<footer
<footer>
    <p>© Copyright 2024 $author. All rights reserved</p>
</footer>
footer;

echo $copyright; // © Copyright 2023 Lambros Hatzinikolaou. All rights reserved


// # Boolean
 //  The boolean data type only has two values, it can be either set or not-set.
 // To denote a boolean literal we use the true or false constants.
 // Both are case insensitive.
 // We declare variables of the boolean type in the following example:
 $is_valid = true;
 $is_number = FALSE;
 $is_checked = True; // bool constants are case insensitive

 // In the PHP language, unless explicitly coerced, almost all values are true except for the following exceptions:
  // The integer zero:
  var_dump((bool) 0); // bool(false)
  // The floating point zero:
  var_dump((bool) 0.0); // bool(false)
  // empty string
  var_dump((bool) ""); // bool(false)
// NULL
var_dump((bool) NULL); // bool(false)

 // There is also a peculiar case:

  var_dump((bool) "0"); // bool(false)
 // But
  var_dump((bool) "false"); // bool(true)
  var_dump((bool) "0.0"); // bool(true)

  // We notice, that one single zero inside a string is falsy.
  // This is due to bad design, since it would be cleaner to not have any exception to the rule that dictates that ALL strings are truthy. And it is something we must consider while casting.

// NOTE: Programmers with a Javascript background should bear in mind that while in JS an empty array evaluates to true, since it is actually considered to be an object,
// in PHP it evaluates to false.
// An empty array
 var_dump((bool) array()); //  bool(false)

 // Booleans are mostly used in conditional testing where a boolean value is checked and the execution of the code is depended in this boolean value.

function is_a_bigger($a, $b) {
  if ($a > $b) {
    return $a;
 }
};

echo is_a_bigger(3, 2); // 3

// In PHP, alike with JS, all negative numbers are considered truthy.

var_dump((bool) -1); // bool(true)

//In order to check if a variable is boolean or not, we can  use the is_bool() built in function.
// Example:
$var1 = false;
$var2 = 'false';

//check if $var1 is a boolean
// Echoes: Variable $var1 is a boolean
if (is_bool($var1)) {
  echo 'Variable $var1 is a boolean.';
} else {
    echo 'Variable $var1 is not a boolean.';
}

//check if $var2 is a boolean
// Echoes: Variable $var2 is NOT a boolean
if (is_bool($var2)){
  echo 'Variable $var2 is a boolean.';
} else {
    echo 'Variable $var2 is NOT a boolean.';
}

// NULL
  // The data type NULL explicitly defines an empty variable. One with no assigned value. Thus this data type's only value can be NULL.
  // NULL is case insensitive
  $no_value_var = null;
  $nullish_value_var = Null;
  var_dump($no_value_var); //NULL
  var_dump($nullish_value_var); // NULL

  // NEW - Both variables are of type NULL no matter the case.

  // We can empty a variable by setting it's value to NULL
  $city_name = "Thessaloniki";
  $city_name = null;
  var_dump($city_name); // NULL

  // Undefined variables resolve to the value of NULL:

  $country_name; // We, of course, get the "Undefined variable $country_name..." Warning!
  var_dump($country_name); // NULL

  // NEW- $The country_name variable is empty, since we haven't assign any value yet, thus it return NULL
  // NEW - NOTE: In Javascript an undefined variable would be of the Undefined data type.
  // NEW - This is not the case in PHP. Such data type doesn't exist, so the variable is considered empty, thus NULL.

  // This is also the case with unset() variables:
  $country_name2 = "Greece";
  unset($country_name2);
  var_dump($country_name2);
  // Undefined variable $country_name2 in
  // NULL

  // To find weather a variable is NULL we can use the built-in is_nun() method
  // Syntax:
  is_null($value); // bool
  // If the variable is NULL this method returns true

  var_dump(is_null($nonexistent));
  // Warning: Undefined variable $nonexistent
  //  bool(true)

  // Another way to check for Null is the identical operator (===):
    $website = null;
    $result = ($website === null);
    var_dump($result); // bool(true)

    $website2 = 'lambroshatzinikolaou.com';
    $result = ($website === null);
    var_dump($result); // bool(false)

  // What is NULL good for?
  // A common application of null is in default arguments.
  // In a case where we want to know if a value has been provided or not, but at the same time an empty one is acceptable too:
  function user($name, $age = null) {
    if($age === null) { return "The name is $name. The age is not revealed!"; } else {
        return "The name is $name. The age is $age";
    }
}

echo user('Lambros'); // The name is Lambros. The age is not revealed!

// Array
 // The array data type can hold multiple values of any data type, even other arrays, in one single variable.
 // This data type, along with the Object data type that we going to cover next, are called compound types.
// In programming a compound type is one that can be structured using other data types both primitive and compound.
// Let's see an example:

$cities = array("Athens", "Thessaloniki", "Herakleion");
$misc = array("String", 45, Null, 4.5, $cities);

// The $misc array consist of multiple data types, a string, a number, a Null, a float, and an array of strings
var_dump($misc); // array(5) {
//     [0]=> string(6) "String"
//     [1]=> int(45)
//     [2]=> NULL
//     [3]=> float(4.5)
//     [4]=> array(3) {
//         [0]=> string(6) "Athens"
//         [1]=> string(12) "Thessaloniki"
//         [2]=> string(10) "Herakleion"
//     }
// }


// Array Syntax:
// In the prev examples, the arrays have been created with the use of the array() construct.
// $array =array(
//       key  => value,
//       key2 => value2,
//       key3 => value3,
//       ...
//    )

// We can also create arrays using the short array syntax
// This syntax replaces array() with [].
// $array = [
//       key  => value,
//       key2 => value2,
//       key3 => value3,
//       ...
//    ]

// As the subject of arrays is broad, we will delve into it with more detail in a future post.

// Object
 // Like Array, Object is also a compound data type in PHP.
 // Unlike Array, though, an object must be declared as an instance of a class.
 // So the Class of the Object should be declared first, and then be used as a template for the object.
 // The data type is defined firstly in the class, so that we can later use the data type in instances of that class.

 // Syntax
     class student {
           // properties
           public $name;
        }
    $student1 = new student;
  // To create the $student1 object, we use the 'new' keyword followed by the class name

  var_dump($student1); // object(student)#1 (1) { ["name"]=> NULL }
  // We see, that $student1 is an object, the first instance of student Class containing one property ("name")

  // Understanding objects deeply is crucial for performing complex operations such as encapsulation. We are going to elaborate more on them in a later post.

  // # Resource
  // The resource data type is one of the two special types, the other being NULL, in PHP.
  // We use it to represent external resources such as database connections, file pointers, images, and more.
  // In order to create and manipulate these resources we use special PHP functions that interact with external services or libraries.

  //  When we need them

   // When connecting to a database with the use of functions like 'PDO', a resource is returned that holds a reference to this connection.

   // When we want to read, write, manipulate, and manage files and directories on a server or local machine.
     // We call these activities 'file handling' [link: https://www.geeksforgeeks.org/php-basics-file-handling/].
     // PHP provides build-in functions like fopen(), and fclose() to enable this processes.
     // Every time we use this functions a resource is returned representing the particular file handle.

     // When we want to manipulate images .
     // Functions like imagecreatefromjpeg in the GD library [link: https://en.wikipedia.org/wiki/GD_Graphics_Library] return a resource representing an image.

     // When we initialize HTTP requests with CURL.
     // When we use CURL handles [link: https://www.php.net/manual/en/ref.curl.php], a resource is returned representing this CURL session

     //NOTE:
     // Resource to Object Migration
     // PHP, from PHP.8 version and on, is gradually phasing out all resource types with class objects,
     // and this migration is one step of the Resource to Object Migration plan.link: https://php.watch/versions/8.0/resource-CurlHandle]

     $curl = curl_init();
     var_dump(gettype($curl)); // string(6) "object"
     // In versions prior to PHP8 var_dump() would return //  string(8) "resource"

     // Resource Management
     // PHP takes care of freeing and destroying resources internally, so there's usually no need to do it yourself.

     // Checking Resource Type:
     // You can use the get_resource_type function to determine the type of a resource.

    $fp = fopen("index.php", 'r');
    echo get_resource_type($fp); // stream

    // The variable is of type stream. There is a list of all functions which create, use or destroy PHP resources in the PHP documentation [https://www.php.net/manual/en/resource.php].


























