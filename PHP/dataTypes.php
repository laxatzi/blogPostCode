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
 // Capital letters do matter.
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
    // Float (floating point numbers - also called double)
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
  // We humans use the decimal number system for counting and measuring, but computers operate using a binary number system, with transistors functioning in two states - on and off.
  // In computing, we also use hexadecimal and octal number systems in order to represent binary numbers more efficiently.
  // That is why in PHP integers can be defined in: decimal (base 10), hexadecimal (base 16), octal (base 8), or binary (base 2) notation.
// In the following example $n is an integer. The PHP var_dump() function returns the data type and value:
 $f = 2e3;
 var_dump($f); // 2000

 // # Testing an integer value
   // To find weather the type of a variable is integer we can use the is_int() method.
  //Syntax: is_int($value): bool

    var_dump(is_int(17)); // bool(true)
    var_dump(is_int(22.45)); // bool(false)
    // NOTE: We check the type of the variable NOT the actual value.
    var_dump(is_int('2.25')); // bool(false)

// Floating Point Numbers
 // A float is a number that can have a decimal point.
$fl = 34.5;
var_dump($fl); // float(34.5)
//Another way of typing floating-point numbers is to use scientific notation.
$f = 5.327496e3; ;
var_dump($f); // float(5327.496)
// In the above example both $f and $fl are floating point numbers or more simply floats.

// # Floating point number's precision
 // In PHP, and all CS languages for that matter, the following expression evaluates to true:
  $sum = (.1 + .2) == .3;
  echo $sum == false; // 1
 // What is going on here?
 // My calc says this is not right.
 // .1 + .2 do actually make .3
 // The thing is that we humans use the decimal notation system and our computers use the binary system.
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
echo 2_345_000.45; // 2345000.45
echo "<br>";
echo 2345000.45; // 2345000.45



