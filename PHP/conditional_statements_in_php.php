<?php
   ### Conditional statements in PHP

   /*

    When we want to submit a form by clicking the send button, or show a warning message next to empty required fields, we use conditional statements.

    With the use of conditional statements, we are able to evaluate conditions and determine which code should be executed.

    We create conditional statements using the if, else, elseif, and switch keywords together with comparison operators.

    So let's see them one by one:

   */

  ##The If statement

  // The syntax should be like:
  if ($condition) {
  // code to be executed
}
// If the condition in the parens evaluates to true, the code will be executed.
// For example:


$age = 23;

if ($age >= 18) {
  echo "Welcome to our Bar!";
}

// Here, if the customer is old enough to drink, thus at least 18 years of age, is granted access in the Bar, and a welcome message is printed.

// NOTE: The curly braces can be omitted entirely if there is only one expression after the condition.

// In that case the previous example would be written as:
  if ($age  >= 18 ) echo "Welcome to our Bar";


  ##The If-Else statement

  // But what if the customer, in our example, is not of the right age and we want to display a message regarding  the reason for our denial to grant him access to our bar?
  // We can use the If-Else statement:
  //If the condition evaluates to true, the code within the if block will be executed, while the code within the else block will only be executed when the condition is false.
  if ($age >= 18 ) {
    echo "Welcome to our Bar!";
  } else {
    echo "Sorry but we cannot grant you access to our Bar! You are only ". $age . " old!";
  }
  // Now if the customer is too young to be granted access to our Bar, we can at least explain the reason with a message!

   // There are cases when executing either one piece of code or another would not suffice.
   // In these cases we need to use the elseif keyword.

   // Let's say we want to response to a question about age eligibility for driving a car.
   // In certain countries you can drive a car at 17 if accompanied by a licensed driver at least 25 years old.
  $age = 19;
  if ($age >= 18 ) {
    echo "You can certainly drive a car if you have a license";

   } elseif ($age >= 17) {
        echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";

   } else {
    echo "You cannot drive a car yet!";
   }
  // Output: You can certainly drive a car if you have a license

// Had we not use an elseif statement but two if statements in a row:
  $age = 19;

   if ($age >= 18 ) {
           echo "You can certainly drive a car if you have a license";

   }
   if ($age >= 17) {
           echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";

   } else {
    echo "You cannot drive a car yet!";
   }

   // Output: You can certainly drive a car if you have a licenseYou can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old
   // Now we get two messages in a row. this is because PHP checks both if statements. Even if the first statement has been evaluated to true it want stop.

   // Note If the conditions are not in the correct order, this could result in an inaccurate result.
  $age = 19;
  if ($age >= 17 ) {
    echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
   } elseif ($age >= 18) {
    echo "You can certainly drive a car if you have a license";
   } else {
    echo "You cannot drive a car yet!";
   }
   // Output: You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old

  ##Nested If statements


  //Conditional statements can be nested inside other conditional statements in cases where there many conditions. In such nested If statements, we can greatly enhance readability with consistent indentation.

  // Let's say we want to add another condition in our previous example. With proper indentation and proper nesting we can avoid a the mess of too many conditions:

      if ($age >= 17) {
         if ($age > 18) {
             echo "You can certainly drive drive a car if you have a license!";
         } else {
             echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
         }
    } elseif ($age < 17) {
         if ($age < 16) {
             echo "You cannot drive a car yet!";
         } else {
             echo "You cannot drive a car yet. But you can drive a motorbike!";
         }
    }

// Nesting is not the only option when dealing with a lot of conditions:
// Regarding the prev example, we could remove nesting with the use of elseif statements as some small changes in the conditional statements.


if ($age < 16) {
    echo "You cannot drive a car yet.";
}
elseif ($age < 17) {
    echo "You cannot drive a car yet. But you can drive a motorbike!";
}
elseif ($age <= 18 ) {
    echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
}
elseif ($age > 18) {
    echo "You can certainly drive drive a car if you have a license!";
}

// Our code now is a little cleaner, but not neccesarrily more readable. Readability has a lot to do with the context.
// Our code should tell a story that is easily comprehensible by other programmers. Here if our main goal is to answer the question "When can a teenager drive a car?", then the former example is more readable. If we want to answer the question "What are the rights of a teenager regarding driving respective to his/her age?" then the later is the one more readable.

// [alternate syntax]

## Alternate syntax for conditional statements
// PHP provides an alternative syntax for if/else conditional statements.
// The basic change is to replace the opening brace with a colon (:) and the closing brace with the endif statement;
// Regarding our previous example:
$age = 19;
if ($age >= 17 ) :
    echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
elseif ($age >= 18):
    echo "You can certainly drive a car if you have a license";
else :
    echo "You cannot drive a car yet!";
endif;

##Embedding if statements in HTML
  // When embedding if/else conditions inside HTML it is recommended for better readability the alternate syntax in order to define if/elseif conditions.
  ?>
<div class="message-display">

    <? if ($condition): ?>
      <h2>Some message</h2>
    <? elseif ($alternative_condition): ?>
      <h2>Some other message</h2>
    <? else: ?>
      <h2>The default message</h2>
    <? endif; ?>

</div>
<?php

  ##The Switch statement
 ?>