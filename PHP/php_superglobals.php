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
  // $_SESSION is a superglobal
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
  function first(){
    $GLOBALS['a'] = 1;
    echo "First: " . $GLOBALS['a']."<br>";
    ++$GLOBALS['a'];

    // NOTE: This is a closure. We'll talk extensively about closures in a later post
    $second = function(){
        echo "Second: ". $GLOBALS['a'];
    };

    $second();
  };

 first(); // First: 1, Second: 2
}

// But there is a better, less verbose, way to do the same thing with the USE keyword.
// Used in an anonymous function the ‘use’ keyword enables us to introduce, in that function scope, variables from outer scope.

{
    function the_first(){
      $a = 1;
      echo "First: " . $a."<br>";
      ++$a;

      // NOTE: This is a closure. We'll talk extensively about closures in a later post
      $the_second = function() USE ($a){
          echo "Second: ". $a;
      };

    $the_second();
  };

  the_first(); //First: 1, Second: 2
}

//NOTE:  As of PHP 8.1.0, $GLOBALS is now a read-only copy of the global symbol table.
// So for the post PHP 8.1 versions of PHP, global variables cannot be modified through its copy.

//Example:
 // Before PHP 8.1:
  $email = 'myemail@gmail.com';
  $globals_copy = $GLOBALS;
  $globals_copy['email'] = 'mysecondemail@gmail.com';
  echo $email; // mysecondemail@gmail.com
  echo $globals_copy['email']; // mysecondemail@gmail.com
  echo $GLOBALS['email'];  // mysecondemail@gmail.com
 // Here by modifying the copy we modify the $GLOBALS array as well.

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
  echo "The server request method is: ". $_SERVER["REQUEST_METHOD"]; // The server request method is: GET
}

// $_SERVER['SERVER_PROTOCOL']:
// It stores the name and version of the protocol of the request like HTTP 1, or HTTP/2 e.t.c
// Example:
{
  echo "The server protocol is: " . $_SERVER['SERVER_PROTOCOL']; //The server protocol is:  HTTP/1.0
}

// // $_SERVER['SERVER_NAME']:
// It is used in order to retrieve  the name of the host server.
// Example:
{
  echo "The server name is: " . $_SERVER['SERVER_NAME']; // The server name is: mywebsite.local
}

// // $_SERVER['SERVER_PORT']:
//  It returns the port number that the server machine (not the client’s machine) use for communication.
// Example:
{
  echo "The server port number is: " . $_SERVER['SERVER_PORT']; // The server port number is: 10023
}

// // $_SERVER['SERVER_SOFTWARE']:
// It is used to get the server identification string, that contains details of the server software.  
// Example:
{
  echo "The server software is: " . $_SERVER['SERVER_SOFTWARE']; // The server software is:  Apache/2.4.43 (Win32) mod_fcgid/2.3.9a
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
// Just like $SERVER['SCRIPT_NAME'], it returns the file name of the script currently executed on the server. It can include the URL query string though.
// Example:
{
 echo "The file name of the script currently executed on the server is: " . $_SERVER['PHP_SELF']; // The file name of the script currently executed on the server is: /test.php
}

// SPECIAL NOTE:
// It is essential to perform HTML encoding on $_SERVER['PHP_SELF'] when used in the action attribute of your form tag in order to avoid cross site scripting (XSS) attacks. [link to own site page post about it]



// // $_SERVER['REMOTE_ADDR']:
// It returns the IP address of the client.
// NOTE: It gives the address of the machine where the connection is coming from, not the address of the connecting computer.
// NOTE: In the case of a local connection, like in the bellow example, both client and server has (obviously) the same address, namely 124.0.0.1, so that is what is returned. This address is universally used by all computers, and is commonly called 'localhost'.
//There is also a second IP address, in the form of 45.139.....,   which is provided from an ISP and is used for communicating with other computers. Since in a local connection our computer is both the server and the client, the former address is the one returned.
// Example:
{
  echo "The remote address is: " . $_SERVER['REMOTE_ADDR']; // The remote address is, since I use my local host : 127.0.0.1

}


// // $_SERVER['HTTP_HOST']:
// It returns the HTTP host header from the current request. The HTTP host specifies the domain name that the client try to access. If a user wants to visit mywebsite.com, their client needs to make a request with the HTTP host header as shown bellow:
// Host: mywebsite.com and this is the value returned by the $_SERVER['HTTP_HOST']
// Example:
{
  echo "The client wants to access: " . $_SERVER['HTTP_HOST']; // mywebsite.com
}

// // $_SERVER['HTTP_REFERER']:
// It returns, if available, an absolute or partial address from which a resource has been requested.
// Example:
{
  echo "The referring page is: " . $_SERVER['HTTP_REFERER']; // Referer: https://example.com/page?q=123
}

//It is not always available though, since the current page could be accessed by typing the URL into the address bar or using a bookmark. In that case there will be no referring page and $_SERVER['HTTP_REFERER'] will not be set.
//
// Example:
{
  echo "The referring page is: " . $_SERVER['HTTP_REFERER']; // Undefined index: HTTP_REFERER
}

// For avoiding the later warning we can check this element's presence with the help of the isset() function
{
  if (isset($_SERVER['HTTP_REFERER'])) {
    $the_referrer = $_SERVER['HTTP_REFERER'];
    echo "The referring page is: " . $the_referer; // The referring page is: https://example.com/page?q=123

  } else {
  // The HTTP_REFERER variable is not set
   $the_referrer = "unknown";
   echo "The referring page is:" . $the_referer; // The referring page is unknown.
  }
}

// // $_SERVER['HTTP_USER_AGENT']:
// It returns the user agent string which gives information about the application type, operating system, software vendor or software version of the requesting software user agent.
// Example:
{
    echo $_SERVER['HTTP_USER_AGENT']; // Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36
}

// NOTE: We see in our example, that although the use agent string indicates that I'm on a Chrome browser of the 120.0.0.0 version, we also get, at the beginning of the string, a 'Mozilla/5.0' token. We get this regardless of the browser that we use, even if it is Chrome, Safari, Opera or any other browser for that matter.
// Mozilla/5.0 is the general token that says that the browser is Mozilla-compatible. For historical reasons, almost every browser today sends it.[link: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/User-Agent]


// // $_SERVER['QUERY_STRING']:
// It returns, if applicable, the URL query string.
// Example:
{
    echo "The query string is: " .$_SERVER['QUERY_STRING']; // The query string is: page=home&category=php
}


// // $_SERVER['REQUEST_URI']:
// It returns the URL of the request including the query string, if there is one.
// Example:
{
    echo "This is the URI: " . $_SERVER['REQUEST_URI'];  //This is the URI: /test.php?page=home&category=php
}
// If there would be a query string we would get:
{
  echo "This is the URI: ". $_SERVER['REQUEST_URI']; // This is the URI: /test.php?
}


// ## The $_ENV superglobal
 //The $_ENV superglobal is an associative array of variables passed from the environment in which PHP is running.
 // These variables are called environment variables and are set by the web server or the server's operating system.
 // They are not PHP specific, but rather system wide and can be accessed by other programming languages as well.

 // # Using getenv
 // To retrieve an environment variable we use the getenv() function.
 // Example:
 {
    $root = getenv('SYSTEMROOT');
    echo "The system root directory is: ". $root; //The system root directory is: C:\WINDOWS
 }
 // If we want to get the values of all the available environment variables we can use the following script:
 {
   $env_vars = getenv();

   foreach ($env_vars as $key=>$var) {
      echo "$key=>$var";
   }
 }

 // We get:
// envs.bat

// NOTE: Environment variables are case sensitive on UNIX and case insensitive on Windows
{

   $max_requests = getenv('php_fcgi_max_requests');
   echo "A PHP job can handle up to " . $max_requests . " requests!"; // PHP can handle up to 1000 requests!
}
// Since I am on a Windows machine I can write the environment variable PHP_FCGI_MAX_REQUESTS in lowercase character.
// That wouldn't be the case in a Linux machine.
//PHP_FCGI_MAX_REQUESTS determines how many requests a PHP job should handle before ending and restarting.


// # Using putenv()
  // By using this function, we can easily set a new environment variable, for the duration of the current request.
  //The putenv() function can alter the value of an existing environment variable or set the value of a newly created.
  // Variables set with the putenv function, are only available by calling the getenv function.
 {
// Echo out the existing environment variable, PHP_FCGI_MAX_REQUESTS current limit.
   echo getenv('PHP_FCGI_MAX_REQUESTS') . "<br>"; // 1000
// Set the environment variable, PHP_FCGI_MAX_REQUESTS to a new limit.
   putenv('PHP_FCGI_MAX_REQUESTS=100');
   echo "Now: ". getenv('PHP_FCGI_MAX_REQUESTS'). "<br>"; // 100
 }

// Regarding existing environment variables:
// We can set a new variable from scratch:
 {
  // Set the environment variable, NAME
  putenv('NAME="Lambros"');
  // Get and echo the variable NAME
  echo "The name is: ". getenv('NAME'). "<br>"; // The name is: "Lambros"
  // Unset the variable NAME
  putenv('NAME');
  echo "The name is: ".getenv('NAME'); // The name is:
 }

 // NOTE: White spaces are allowed in environment variables and must be taken into account.
 {
   putenv('NAME ="Lambros"');
   echo "The name is: ". getenv('NAME'). "<br>"; // The name is:
   echo "The name is: ". getenv('NAME '); // The name is: Lambros
 }
// 'NAME' and 'NAME ' are two distinct variables


// # The $_GET superglobal

  // The $_GET superglobal is an associative array of variables. These variables are received via the HTTP GET method.
  // This method is one of the two ways browsers use to send information to the web server.
  // The other is the POST method that we are going to talk later on.
  // A GET request is sent as a URL containing a query string added to its end with a question mark. This query string has name-value pairs as parameters.
  // These parameters are separated by ampersands
  // Example: http://www.mywebsite.com/about.php?name="Lambros"&surname="Hatzinikolaou"
  // The above query string contains two variables
  // name="Lambros"
  // surname="Hatzinikolaou"

  // Regarding the previous example of a get request we would retrieve the variables 'name' and 'surname':
  {
    echo "This page is about ". $_GET['name']. " ". $_GET['surname']. "!"; // This page is about "Lambros" "Hatzinikolaou"!
  }

  // We should avoid using GET requests for sensitive data as it can be easily viewed, cached, or bookmarked.
  // GET requests can be subject to XSS so it is good practice to be escaped before they are displayed on our web page.
  // Escaping means converting special characters in user input to HTML entities.
  // This conversion prevents them from being interpreted as code by the browser.
  // In PHP, we can use the htmlentities() built in function to achieve this. This function converts special characters in user input into their HTML entities.

   // Example:
   // Lets say we get user input from a from regarding a name and we store it in the $name variable

   {
     $name = $_GET["name"];
     echo isset($name) ? "The name is " . $name : "No input"; // The name is John
   }

   // In the example a well meaning user with the name of John filled his name in and we get the respective string on our browser.
   // But what if the user is not so benevolent?
   // Lets say he puts, instead of his name, something like:
   // <script>alert%28"This%20is%20XSS%20attack"%29</script>
   // Now when we load our page we get an alert box with the string "This is XSS attack"

   // We can prevent this by escaping our code
  {
     $name = $_GET["name"];
    // Escape output using htmlentities()
     $name = htmlspecialchars($name);
     echo isset($name) ? "The name is " . $name : "No input";
   }
  // Now we get the string:
  // The name is <script>alert("This is XSS attack")</script>
  // The malicious code the malevolent user injected in the input is displayed as simple text. So it can't be executed by the browser.


  // # The $_POST superglobal
  // The $_POST superglobal is an associative array of variables sent via an HTTP POST request.
  // POST requests are not cached and cannot be bookmarked or stored in a browser's history, thus they are suitable for sending sensitive information.
  // The $_POST superglobal can handle data submitted from a form using a POST request.
  // Example:
  ?>

    <body>
        <form action="" method="post">
        <label for="name">Name:</label><input type="text" name="name" id="name">
        <label for="email">Email:</label><input type="email" name="email" id="email">
        <input type="submit" value="Send">
      </form>
      <?php
        $email = $_POST['email'];
        $name = $_POST['name'];
          if (empty($email) || empty($name)) {
            echo "<p>Data is Empty</p>";
          } else {
            echo "<p>You have submitted the ". $email.  " email and ".$name." name!</p>";
        }
      ?>
    </body>

<?php
  // In the above example we have a form that asks for an email address. After submitting the form, we use the $_POST superglobal to store the variables we receive from the HTTP POST method to the variable $email.
  // Then we use conditional statements to check if an email has been filled in, and if this is the case we echo a message to the browser.
  // Here, similarly to the example with the GET request, we are depended on the honesty of the user. The user can input malicious code.
  // It is unwise to trust external input so we 'd better escape our code
  // Suppose that a user enters the following script, <script>alert("This is XSS attack")</script>, in the name field of our form.
  // This is just an alert code but it could a malicious script.
  // We need to escape our code with the htmlspecialchars function.
  ?>
  <body>
        <form action="" method="post">
        <label for="name">Name:</label><input type="text" name="name" id="name">
        <label for="email">Email:</label><input type="email" name="email" id="email">
        <input type="submit" value="Send">
      </form>
      <?php
        $email = htmlspecialchars($_POST['email']);
        $name = htmlspecialchars($_POST['name']);
          if (empty($email) || empty($name)) {
            echo "<p>Data is Empty</p>";
          } else {
            echo "<p>You have submitted the ". $email.  " email and ".$name." name!</p>";
        }
      ?>
    </body>
<?php
 // Now we get the malicious code displayed as text.


 //# PHP $_FILES
  // An HTML Form can be used not only for collecting user input but also files.
  // PHP supports file uploads natively. It can receive files from the vast majority of browsers that support the “multipart/form-data” enctype attribute.
  // Before sent to the server, form data should be encoded. Τhe enctype attribute defines how.
  // The default value is “application/x-www-form-urlencoded”. This format is compatible with URLs.
  // But if the form includes files, we need to use the “multipart/form-data” type of encoding.
  // # The $_FILES superglobal
  // The $_FILES superglobal is an associative array that holds information about uploaded files such as names, sizes, and error types.
  //  When a user submits a form that includes a file input field, the file data is sent to the server, and PHP inserts to the $_FILES array information about the uploaded file.

  // Lets see an example:

  //
    echo "<pre>";
     var_dump($_FILES);
    echo "</pre>";
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <div>
          <input id="choose_file" name="choose_file" type="file">
          <input value="Upload ►" type="submit">
      </div>
    </form>
  <?php

    // In the above example the enctype="multipart/form-data" attribute enables file submission to the server via the POST method, and the input element with type="file" enables us to use a file selection panel for finding the intended file.

    // To our example form, I upload the image 'abstract2.php' from a directory in my machine.
    // I var_dump the $_FILES superglobal to look inside.
    // The $_FILES superglobal array's structure is multidimensional and it contains the following file data.

// array(1) {
//   ["choose_file"]=>
//   array(6) {
//     ["name"]=>
//     string(13) "abstract2.png"
//     ["full_path"]=>
//    string(13) "abstract2.png"
//     ["type"]=>
//     string(9) "image/png"
//     ["tmp_name"]=>
//     string(27) "C:\Windows\Temp\phpAD1D.tmp"
//     ["error"]=>
//     int(0)
//     ["size"]=>
//     int(561497)
//   }
// }

// In the example we see the $_FILES superglobal associative array nesting another associative array with 6 items, all representing the attributes of the file to be uploaded.
// The attributes are:
// 'name' : Represents the original name of the uploaded file as it is named in user's machine
// 'full_path': Represents the full path as submitted by the browser. Thanks to its value it is possible to store the relative paths, or reconstruct the same directory in the serve
// 'type' : Represents the nature and format of a document. This can be obtained from the browser but should not be    completely trusted, as it can be manipulated. A better way is to use other PHP built-in functions [link: https://stackoverflow.com/questions/59986082/php-how-to-properly-check-mime-type-of-a-file]
// 'tmp_name': Represents the name of the server's  temporary file in which the uploaded file will be stored
// 'error' : Represents the error code[link: https://www.php.net/manual/en/features.file-upload.errors.php] for this file upload with 0 meaning no error.
// 'size' : Represents the size of the uploaded file in bytes

// NOTE: I run PHP 8.3 in my local server so we get six keys.
// But If I 'd run a PHP version prior to PHP 8.1 we would get one less attribute.
// The full_path attribute would missing.
// This is something to consider since roughly 30% of servers run previous PHP installations. [link: https://stitcher.io/blog/php-version-stats-january-2024]

// We can access any of these attributes directly:
    echo "<pre>";
     echo "The uploaded files name is: ". $_FILES['choose_file']['name']; // The uploaded file's name is: abstract2.png
    echo "</pre>";

  // Where to upload
  // To handle file uploads, we use the PHP function move_uploaded_file() to move the file from the temporary directory to a location of our choice.


  ?>
































