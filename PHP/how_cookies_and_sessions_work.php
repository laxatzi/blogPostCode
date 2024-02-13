<?php

// ###PHP Cookies and Sessions explained.

// Sessions and cookies are useful mechanisms that allow us to store data about a user’s activities on a website. But they do it in a different way and they serve different purposes. We are going to dig in both in this article.

// ##COOKIES

// In an e-commerce website, we are able to put things we consider buying in the cart or on a wish list and then continue shopping and browsing on other pages without losing our selected items. We do this by using cookies*.

//When visiting a website, small pieces of data in the form of key=value pairs, called cookies, are stored as text files in the user’s web browser.

//These cookies contain information that is sent with each HTTP request to the server, enabling us to remember the user, their behavior, and their preferences.

// #Setting Cookies

// In order to create a cookie, we use the setcookie() function.
// Syntax:
// setcookie(name, value, expire, path, domain, secure)
// This function accepts some parameters.
// Let's describe the most important of these parameters in some detail:
// Name: It is the only required parameter, containing the name of the cookie.
// Value: Optional parameter. Is used to set the cookie's value. If not specified the default value is an empty string.
// Expire: Optional parameter. Is used to set the expiration date of the cookie in seconds since the Unix Epoch. If not set, the cookie expires at the end of the current session.
// Path: Optional parameter. Contains the path on the server where the cookie is available. If not set the cookie is available on the entire domain.
// Domain: Optional parameter. Specifies the domain for which the cookie is available. If not specified, the cookie is available on the domain of the request.
// Secure: Optional parameter. Indicates that the cookie is intended for secure connections (HTTPS) only. It set to a boolean value. If TRUE, the cookie will only be available via an HTTPS protocol. If not specified, it defaults to FALSE.

// Example of a cookie set with the setcookie() function.

{
  ;setcookie('username', 'john_doe', time() + (30 * 24 * 60 * 60), '/');
// The above cookie expires in 1 month and is accessible to the entire domain (‘/’)
// ...

}

//We see that the cookie we created is data persistent since we can set it to expire on the client in a time we want beyond the current session. In our example we set it to expire in one month. That means we can close the browser, reopen it a couple of weeks later and it will still "remember" our username.
//Checking for a cookie is very easy with the help of the dev tools.
// [img]
//Selecting the Application tab and the Cookies section enables us to see all the active cookies on a page.
//This is the reason we don't want to store sensitive data in a cookie.

//#Accessing Cookies
  //We can access cookies using the $_COOKIE superglobal.
  //PHP's $_COOKIE superglobal is an associative array that stores the values of cookies sent by the browser in the current request. The values are organized in a list, with the cookie name acting as the key.
  //Continuing from the previous example:
if (isset($_COOKIE)) {
    print_r($_COOKIE); //Array ( [the_cookie] => the_value )
} else {
    echo "Cookie not found.";
}


// # Deleting Cookies
 // To delete a cookie, you can set its expiration time to a past date:

setcookie('username', 'john_doe', 1, '/');
// The above cookie is now expired and will be deleted.
// The expiration time is set to one, that means 1 second after the epoch (1 January 1970 00:00:00 UTC).
// NOTE: We should pass the same parameters of the cookie we want to delete that we passed at the time of creation in order for the cookie to be deleted. If the parameters are not the same, the cookie will remain set.

//*This is applicable in cases where are we adding things to the cart as a guest (unauthenticated).

//However, if logged-in, storing stuff in the backend is the preferred way so that users can visit later from another browser or device without losing their selected items.

// ##SESSIONS

// A session is a mechanism to store data about the user’s interaction with a website. This data is intended to be used across multiple pages or requests, and is useful only during the time a user is interacting with the website. After the connection is ended or the browser is closed the session is usually destroyed.
// Sessions are stored on the server, and PHP uses a session ID to associate a user’s data with their specific session. This session ID is usually stored in a cookie on the client’s browser.
// The server is responsible for generating and managing the session IDs. For every user connected to the server, there will be a corresponding session ID. If a thousand users are visiting a website, there will be a thousand respective session IDs on the server.
// So, although a server has multiple clients for a website, thanks to these unique session IDs, it manages to know which session belong to whom.
// The basic idea is that the client provides the server with a session id, and then the server looks up for this session id in its session data-store. If it finds it there, it gives the client access to their session data.
// It is like a hotel guest asking the hotel reception for the room keys. The person at the desk will ask for the room number and an ID, and if that ID matches the name of the guest on the room's file, they will issue the room key. With that room key the guest gain access to their allocated room but not to any of the dozens of other rooms in the premise.

//Let’s see how sessions work in detail:

  // Session initialization
   // To start a session, you use the session_start() function. Typically, this is called at the beginning of each page where you want to use session data.
 {
    session_start();
    // Rest of code...
 }

  // Data  Storage
    // You can store data in the session using the $_SESSION superglobal. For example:
  {
      session_start();
      $_SESSION['username'] = 'john_doe';
      // Rest of code...
  }
  // Data retrieval
  // Later on, you can access the stored data:
  {
    session_start();
    echo 'Username: ' . $_SESSION['username'];
    // Rest of code...
  }
  // Session Termination
  // To terminate a session and remove all session data, you use session_destroy().
  {
    session_start();
    session_destroy();
    // Rest of code...
  }

// ]
  // [Without sessions users would have no way to recognize and/or remember individual users.
    // That means we'd have to login in the same website with each visit
    // you could save the user’s name in the session so that you don’t have to query the database every time you need it or you could store data in the session to save state between pages

  //]
  //[, for a web application, a server has multiple clients, how does it know which session is yours? ]


// ##SUMMARY

// In summary, cookies are used to store small pieces of data in the user’s browser, and are useful for storing non-sensitive information, like user preferences or items in a shopping cart.

//Sessions provide a higher level of security for sensitive data compared to cookies, since they are stored on the server, and are more suitable to store and manage user-specific data.
?>