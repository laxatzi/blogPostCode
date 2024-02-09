<?php

// ###PHP Cookies and Sessions explained.

// Sessions and cookies are useful mechanisms that allow us to store data about a user’s activities on a website. But they do it in a different way and they serve different purposes. We are going to dig in both in this article.

// ##COOKIES

// In an e-commerce website, we are able to put things we consider buying in the cart or on a wish list and then continue shopping and browsing on other pages without losing our selected items. We do this by using cookies*.

// When visiting a website, small pieces of data in the form of key=value pairs, called cookies, are stored in the user’s web browser.

// These cookies contain information that is sent with each HTTP request to the server, enabling us to remember the user and their preferences.

// Cookies are used for remembering user preferences, or tracking user behavior.

// #Setting cookies

// In order to create a cookie, we use the setcookie() function.


  ;setcookie('username', 'john_doe', time() + 3600, '/');
// The above cookie expires in 1 hour and is accessible to the entire domain (‘/’)
// ...


// *This is applicable in cases where are we adding things to the cart as a guest (unauthenticated).

// However, if logged-in, storing stuff in the backend is the preferred way so that users can visit later from another browser or device without losing their selected items.

// ##SESSIONS

// A session is a way to store information about the user’s interaction with a website to be used across multiple pages or requests. Sessions are stored on the server, and PHP uses a session ID to associate a user’s data with their specific session. This session ID is usually stored in a cookie on the client’s browser. Let’s see how sessions work in PHP:

// ##SUMMARY

// In summary, cookies are used to store small pieces of data in the user’s browser, and are useful for storing non-sensitive information, like user preferences or items in a shopping cart.

//Sessions provide a higher level of security for sensitive data compared to cookies, since they are stored on the server, and are more suitable to store and manage user-specific data.
?>