<?php
  // ###  Cross-site Scripting in PHP Web Applications - Exploiting $_SERVER[‘PHP_SELF’]

  // What is Cross-Site Scripting
  // Cross-Site Scripting, XSS for brevity with X taking the place of C for obvious reasons, is a type of security vulnerability that occurs when a web application allows an attacker to inject malicious scripts into web pages viewed by other users. This can happen when the application does not properly sanitize user inputs before including them in the output that is sent to the user's browser.

  // XSS is considered one of the most popular and riskiest attacks for web applications.
  // It was responsible for 40% of the cyber attacks that occurred during 2019, with the 75% of these attacks targeting large companies in Europe and North America (Source: PreciseSecurity)

// Recent statistics on cross-site scripting reveal a significant increase in XSS attacks, from less than 500 to over 22,000 in the last decade. (Source: PubMed Central)
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
// The above code adds a script tag and an alert command that will be executed when the page is loaded.
// This is a very basic example of how a PHP_SELF superglobal variable can be taken advantage of.

// The prev example was harmless but bear in mind that any JavaScript code can be added inside the <script> tag!
// This way a hacker has the ability to serve the users' browser with malicious script that can really do something harmful like sending the users' cookie to the attackers server.

//## How to remedy the $_SERVER[‘PHP_SELF’]) XSS issue?

// //# Implement Input Validation
// input validation involves comparing an input with a white list or regular expressions to identify unauthorized character sequences.
// Let’s see an example of using a regular expression to validate an email address in PHP.
$email = "infowebsite.com";

if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/", $email)) {
    echo "Invalid email address!";
} else {
    echo "Thanks for your email!";
}
// OUTPUT: Invalid email address!

// //# Implement Character Escaping
// Escaping is the process of converting a character to its escape sequence representation.
// For instance, the < symbol could be transformed into &lt; to prevent the characters after the < from being treated as an HTML tag, when they should be considered as text content.
// In PHP there is the htmlspecialchars() function that Converts special characters to HTML entities.
// In the case of our previous example:
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<?php  // and the OUTPUT will be: http://website.local/test2.php/%22%3E%3Cscript%3Ealert('Your website has been hacked!')%3C/script%3E


// # Filter Input
//Use filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
// Filter the $_SERVER[‘PHP_SELF’], store it in a variable and use that variable instead
$phpSelf = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
?>

<form method="post" action="validate.php">

<?php
// //# Ditch the $_SERVER['PHP_SELF'] superglobal altogether.

// This is a drastic measure and a lot of programmers opt to not bother with such a spoofable variable. So they instead use another global variable like $_SERVER['PHP_NAME'] or leave the action attribute blank.

// The later is better than using the $_SERVER['PHP_SELF'] un-sanitized but it is far from being a good practice.
// For one, we should not use an empty action attribute since this is [specifically mentioned in the HTML spec][https://html.spec.whatwg.org/#attr-fs-action].
// Regarding the $_SERVER['PHP_NAME'], although it is less deceivable we should sanitize it anyway, adhering to the never trust output of dynamic data principle. So we still need to take all measures regarding sanitization..

//# Employ Content Security Policy
//Additionally, employing Content Security Policy (CSP) headers on the server side can provide an additional layer of protection against XSS attacks.
// [...]

//# Use a vulnerability scanner
// Fortunately, running an automated web scan with a vulnerability scanner is a simple way to test if a website is vulnerable to XSS and other vulnerabilities.
//By employing various payloads and techniques, the vulnerability scanner will analyze a website for vulnerabilities.

// [links]
/*
https://www.softwaretestinghelp.com/cross-site-scripting-xss-attack-test/
https://portswigger.net/web-security/cross-site-scripting/preventing#validate-input-on-arrival
https://brightsec.com/blog/cross-site-scripting-php/#how-xss-in-php-works
https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP
https://blog.sucuri.net/2023/04/how-to-set-up-a-content-security-policy-csp-in-3-steps.html
https://stackoverflow.com/questions/14093316/why-use-serverphp-self-instead-of
https://www.w3schools.com/php/php_form_validation.asp
https://www.phphelp.com/t/php-self/25939
https://www.youtube.com/watch?v=Jg4TYNsONOk
https://www.youtube.com/watch?v=oEFPFc36weY

*/
?>