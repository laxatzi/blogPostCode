<?php
// # Superglobal Variables in PHP

// Superglobals are special built-in variables in PHP, that are available from any function, class, or file without previous declaration of them as global variables.

// That practically means, there is no need to use the global keyword to access them.

// Bellow is how we can access a common global variable from a function:

$x = 10;
$y = 2;

function subtract() {
  // Without the global keyword we'd get an 'Undefined variable' notice, and the result would be different (0)
  global $x, $y;
  return $x - $y;
}

echo subtract(); // 8

// Superglobals do not need the global keyword
{
  session_start();
  $_SESSION["newSession"]= 1.1;

  function get_session() {
  // no need for the global keyword
  return $_SESSION["newSession"];
  }

  echo get_session(); // 1.1
}

// We're going to be talking about how the $_SESSION superglobal works later on, but for now just pay attention to how we get access to the global scope without the use of the 'global' keyword.

// There are nine superglobals in PHP.
// These superglobal variables are:

    // $_GLOBALS: It holds a reference to all the global variables that have been defined in a PHP script.
    // $_GET: contains the parameters passed to the script through the query string.
    // $_POST: contains data sent via an HTTP POST request.
    // $_COOKIE: contains data passed to the script as cooky values.
    // $_SESSION: contains data stored in a user's session.
    // $_REQUEST: contains all the data sent by user's client.
    // $_SERVER: contains information about the server.
    // $_ENV: contains information about the environment.

    // Becoming familiar with the basics of each superglobal makes data manipulation in web applications easy and simple.

    // # The $_GLOBALS Variable in PHP
    // The $_GLOBALS variable is an associative array that references all variables in global scope, with the variable names being the keys of the array.

    // Let’s see how the $_GLOBALS variable can be used to access a global variable with an example:

$age = 10;
$name = "Tommy";

function get_students_age() {

  return $GLOBALS['name']. " is " .$GLOBALS['age'] ." years old!";
}

echo get_students_age(); //Tommy is 10 years old!

// Apart from accessing global variables, $GLOBALS can be used to modifying them.
// In the same example:
{
  $age = 10;
  $name = "Tommy";

function get_students_age2() {

  return $GLOBALS['name']. " is " .$GLOBALS['age']=12 ." years old!";
}

 echo get_students_age2(); //Tommy is 12 years old!
}

// We can possibly use this superglobal in order to pass variables between functions
// Examples:
{
  function first_number(){
    $GLOBALS['a'] = 1;
    echo "First number: " . $GLOBALS['a']."<br>";
    ++$GLOBALS['a'];

    // NOTE: This is a closure. We'll talk extensively about closures in a later post
    $second_number = function(){
        echo "Second number: ". $GLOBALS['a'];
    };

    $second_number();
  };

 first_number(); // First number: 1, Second number: 2
}

// But there is a better, less verbose, way to do the same thing with the USE keyword.
// Used in an anonymous function the ‘use’ keyword enables us to introduce, in that function scope, variables from outer scope.

{
    function the_first_number(){
      $a = 1;
      echo "First number: " . $a."<br>";
      ++$a;

      // NOTE: This is a closure. We'll talk extensively about closures in a later post
      $the_second_number = function() USE ($a){
          echo "Second number: ". $a;
      };

    $the_second_number();
  };

  the_first_number(); //First number: 1, Second number: 2
}

//NOTE:  As of PHP 8.1.0, $GLOBALS is now a read-only copy of the global symbol table.
// So for the post PHP 8.1 versions of PHP, global variables cannot be modified through their copy.

//Example:
 // Before PHP 8.1:
  $email = 'myemail@gmail.com';
  $globals_copy = $GLOBALS;
  $globals_copy['email'] = 'mysecondemail@gmail.com';
  echo $email; // mysecondemail@gmail.com
  echo $globals_copy['email']; // mysecondemail@gmail.com
  echo $GLOBALS['email'];  // mysecondemail@gmail.com
 // By modifying the copy we do modify the $GLOBALS array as well.

 // From version PHP 8.1 and on:
 {
  $email = 'myemail@gmail.com';
  $globals_copy = $GLOBALS;
  $globals_copy['email'] = 'mysecondemail@gmail.com';
  echo $email; // myemail@gmail.com
  echo $globals_copy['email']; // mysecondemail@gmail.com
  echo $GLOBALS['email'];  // myemail@gmail.com
 // Copy modification does not affect $GLOBALS
 }

// ## The $SERVER superglobal

 //The $SERVER superglobal array makes available information about the server in which the current script is being executed.

// Information such as the server name, the user agent, the queryString and other variables.

// PHP automatically defines the array based on the server configuration and the current HTTP request, and therefore there is no guarantee that every single variable will be provided.
// [link: http://www.faqs.org/rfcs/rfc3875.html]In any case, the » CGI/1.1 specification covers most of these variables and they are likely to be defined.
 // Example of $_SERVER in use:
 {
  echo $_SERVER['SERVER_NAME']; // myWebsite.local
  //
 }
 // We can list all available elements with the following code:
 {
  foreach ($_SERVER as $param => $value)  echo "$param = '$value' <br>";
 }
 // It's going to print, depending in our server config, something similar to the above image:
 // [site the image]

// We are going to look at some of the most commonly used elements of the PHP $_SERVER superglobal.
// A complete list is available in the PHP documentation [link: https://www.php.net/manual/en/reserved.variables.server.php]

// $_SERVER['REQUEST_METHOD']:
// It returns the request method that is used to access the page.
// This can be a 'POST', a 'GET', a 'PUT' method e.t.c
// Example:
{
  echo "The server request method is: ". $_SERVER["REQUEST_METHOD"]; // GET
}

// It stores the name and version of the protocol of the request like HTTP 1, or HTTP/2 e.t.c
// Example:
{
  echo "The server protocol is: " . $_SERVER['SERVER_PROTOCOL']; // HTTP/1.0
}

// // $_SERVER['SERVER_NAME']:
// It is used in order to retrieve  the name of the host server.
// Example:
{
  echo "The server name is: " . $_SERVER['SERVER_NAME']; // The server name is: mywebsite.local
}

// // $_SERVER['SERVER_PORT']:
//  It returns the port number the server machine (not the client’s machine) use for communication.
// Example:
{
  echo "The server port is: " . $_SERVER['SERVER_PORT']; // The server port is: 10023
}

// // $_SERVER['SERVER_SOFTWARE']:
// It is used to get the server identification string, that contains details of the server software.  
// Example:
{
  echo "The server software is: " . $_SERVER['SERVER_SOFTWARE']; // The server name is:  Apache/2.4.43 (Win32) mod_fcgid/2.3.9a
}


// // $_SERVER['SERVER_ADMIN']:
// It is used to store the email address of the server administrator/webmaster.
// Example:
{
  echo "The server admin is: " . $_SERVER['SERVER_ADMIN']; // The server admin is: webmaster@localhost
}


// // $_SERVER['DOCUMENT_ROOT']:
// It returns the root of the document. That's where the script that we are running resides.
// Example:
{
  echo "The document root is: " . $_SERVER['SERVER_ADMIN']; // The document root is: C:/Users/LAMBROS/Local Sites/mywebsite/app/public
}


// // $_SERVER['SCRIPT_FILENAME']:
// It returns not just the filename as the name implies, but the absolute pathname of the currently executed PHP script.
// Example:
{
  echo "The script filename is: " . $_SERVER['SCRIPT_FILENAME']; //  C:/Users/LAMBROS/Local Sites/mywebsite/app/public/test.php
}


// // $_SERVER['SCRIPT_NAME']:
// It returns the script name of the currently executed PHP file. It doesn't include the path-info nor a URL query string. It always includes a leading slash.
// Example:
{
  echo "The script name is: " . $_SERVER['SCRIPT_NAME']; // /test.php
}

// // $_SERVER['PHP_SELF']:
// Just like $SERVER['SCRIPT_NAME'], it returns the file name of the script currently executed on the server. It does include the URL query string though.
// Example:
{
 echo "The file name of the current script currently executed on the server is: " . $_SERVER['PHP_SELF']; // The file name of the script currently executed on the server is: /test.php
}









