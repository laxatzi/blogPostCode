<?php
  // ###  Cross-site Scripting in PHP - Exploiting $_SERVER[‘PHP_SELF’]

  // What is Cross-Site Scripting
  // Cross-Site Scripting, XSS for brevity, is a type of security vulnerability that occurs when a web application allows an attacker to inject malicious scripts into web pages viewed by other users. This can happen when the application does not properly validate or sanitize user inputs before including them in the output that is sent to the user's browser.

  // XSS is considered one of the one of the most popular and riskiest attacks for web applications.
  // XSS was responsible for 40% of the cyber attacks that occurred during 2019, with the 75% of these attacks targeting large companies in Europe and North America (Source: PreciseSecurity)

// Recent statistics on cross-site scripting reveal a significant increase in XSS attacks, from less than 500 to over 22,000 in the last decade.

// (Source: PubMed Central)
  // https://securityescape.com/cross-site-scripting-statistics/



//# Exploiting $_SERVER["PHP_SELF"]
// Exploiting $_SERVER['PHP_SELF'] for XSS is a classic example of a security vulnerability in PHP.
//$_SERVER['PHP_SELF'] is a PHP superglobal variable that contains the name and path of the current file of the currently executing script (from the root folder).
// // Let's say we have a webpage named "http://website.local/test_form.php", in this case the $_SERVER["PHP_SELF"] will contain the "/test_form.php" part.
//$_SERVER["PHP_SELF"]  can be exploited by malevolent programmers. If this variable is not properly sanitized, an attacker could inject malicious code into the URL, and it might get executed when the page is rendered in another user's browser.

// Here's a simplified example of how this vulnerability could be exploited:
  // We usually use PHP_SELF variable in the action attribute of a form.
  ?>
 <form method="post" action="<?= $_SERVER["PHP_SELF"];?>"></form>
<?php
// Now, if a user enters the simple URL in the address bar like "http://website.local/test_form.php", the above code will be translated to:
?>
<form method="post" action="test_form.php">
<?php
// However, let's say that a user types the following URL in the address bar:
// http://website.local/test2.php/%22%3E%3Cscript%3Ealert('Your website has been hacked!')%3C/script%3E

// Now, the previous code will be translated to:

?>
<form method="post" action="test_form.php/"><script>alert('Your website is hacked!')</script>
<?php
// The above code adds a script tag and an alert command.

// This script will be executed when the page is loaded.
// It is a very basic example of how a PHP_SELF superglobal variable can be taken advantage of.

// The prev example was harmless but bear in mind that any JavaScript code can be added inside the <script> tag!
// This way a hacker has the ability to redirect a user to a file on another server holding malicious code.



?>