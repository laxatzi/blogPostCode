<?php

// ###PHP Cookies and Sessions explained.

// Sessions and cookies are useful mechanisms that allow us to store data about a user’s activities on a website. But they do it in a different way and they serve different purposes. We are going to dig in both in this article.

// ##COOKIES

// In an e-commerce website, we are able to put things we consider buying in the cart or on a wish list and then continue shopping and browsing on other pages without losing our selected items. We do this by using cookies*.

// When visiting a website, small pieces of data in the form of key=value pairs, called cookies, are stored as text files in the user’s web browser.

// These cookies contain information that is sent with each HTTP request to the server, enabling us to remember the user their behavior, and their preferences.

// #Setting Cookies

// In order to create a cookie, we use the setcookie() function.
// This function accepts up to 6 parameters.
// Syntax:
// setcookie(name, value, expire, path, domain, secure)
// Let's describe these parameters in some detail
// Name: It is the only required parameter, containing the name of the cookie.
// Value: Optional parameter. Is used to set the cookie's value. If not specified the default value is an empty string.
// Expire: Optional parameter. Is used to set the expiration date of the cookie. If not set, the cookie expires at the end of the current session.
// Path: Optional parameter. Contains the path on the server where the cookie is available. If not set the cookie is available on the entire domain.
// Domain: Optional parameter. Specifies the domain for which the cookie is available. If not specified, the cookie is available on the domain of the request.
// Secure: Optional parameter. Indicates that the cookie is intended for secure connections (HTTPS) only. It set to a boolean value. If TRUE, the cookie will only be available via an HTTPS protocol. If not specified, it default to FALSE.

// Example of a cookie set with the setcookie() function.

{
  ;setcookie('username', 'john_doe', time() + (30 * 24 * 60 * 60), '/');
// The above cookie expires in 1 month and is accessible to the entire domain (‘/’)
// ...

}
###############
// We see that the cookie we created is data persistent since we can set it to expire on the client in a time we want beyond the current session. In our example we set it to expire in one month. That means we can close the browser, reopen it a couple of weeks later and it will still "remember" our username.

// #Accessing Cookies
  // We can access cookies using the $_COOKIE superglobal.
  // PHP's $_COOKIE superglobal is an associative array that stores the values of cookies sent by the browser in the current request. The records are organized in a list, with the cookie name acting as the key.
  // Continuing from the previous example:
  echo "<pre>";
   print_r($_COOKIE); //[username] => john_doe
  echo "</pre>";

// # Deleting Cookies
 // To delete a cookie, you can set its expiration time to a past date:

setcookie('username', 'john_doe', time() - 3600, '/');
// The above cookie is now expired and will be deleted

// NOTE: We should pass the same arguments to the parameters of the cookie we want to delete, that we passed at the time of creation in order for the cookie to be deleted. If the arguments are not the same, the cookie will remain set.

// Example:



// *This is applicable in cases where are we adding things to the cart as a guest (unauthenticated).

// However, if logged-in, storing stuff in the backend is the preferred way so that users can visit later from another browser or device without losing their selected items.
##############
// ##SESSIONS

// A session is a way to store information about the user’s interaction with a website to be used across multiple pages or requests. Sessions are stored on the server, and PHP uses a session ID to associate a user’s data with their specific session. This session ID is usually stored in a cookie on the client’s browser. Let’s see how sessions work in PHP:

// ##SUMMARY

// In summary, cookies are used to store small pieces of data in the user’s browser, and are useful for storing non-sensitive information, like user preferences or items in a shopping cart.

//Sessions provide a higher level of security for sensitive data compared to cookies, since they are stored on the server, and are more suitable to store and manage user-specific data.
?>