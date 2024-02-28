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

// Here, if the customer is old enough to drink, thus at least 18 years of age, a welcome message is printed.

// NOTE: The curly braces can be omitted entirely if there is only one statement to execute;

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

   // Let's say we want to respond to a question about age eligibility for driving a car.
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
   // Here we have reversed the order of the conditions to check for. The 17 years benchmark is checked first, but it leads to
   // an inaccurate result.
  ##Nested If statements


  //Conditional statements can be nested inside other conditional statements in cases where there are many conditions. In such nested If statements, we can greatly enhance readability with consistent indentation.

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

// NOTE: PHP accepts spaces between else and if thus the above code could be written as:
      $age = 19;


      if ($age >= 17) {
         if ($age > 18) {
             echo "You can certainly drive drive a car if you have a license!";
         } else {
             echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
         }
    } else if ($age < 17) {
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
// Our code should tell a story that is easily comprehensible by other programmers. Here if our main goal is to answer the question "At what age can a teenager drive a car?", then the former example is more readable. If we want to answer the question "What are the rights of a teenager regarding driving respective to his/her age?" then the later is the one more readable.

## Alternate syntax for conditional statements
// PHP provides an alternative syntax for if/else conditional statements.
// The basic change is to replace the opening brace with a colon (:) and the closing brace with the endif statement;
// Regarding our previous example if we used the alternate syntax it would be as follow:
  $age = 19;

  if ($age >= 18 ) :
           echo "You can certainly drive a car if you have a license";
  elseif ($age >= 17) :
           echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
  else :
    echo "You cannot drive a car yet!";
   endif;

// NOTE:
// Using a space between if and else is not acceptable in the alternate syntax.
  $age = 19;

  if ($age >= 18 ) :
           echo "You can certainly drive a car if you have a license";
  else if ($age >= 17) :
           echo "You can drive a car if you have a license and you are accompanied by a licensed driver at least 25 years old";
  else :
    echo "You cannot drive a car yet!";
   endif;

##Embedding if statements in HTML
  // When embedding if/else conditions inside HTML the alternate syntax is recommended for better readability.
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

  ## The Ternary Operator
// The ternary operator offers a sorter syntax for an if-else statement. It is great for simple expressions with clear intent where a boolean expression is expected.
// Syntax:
// expression1 ? expression2 : expression3;
// First we have expression1, which is the condition to check.
// If the condition is true, it returns expression2, separated by a question mark.
// If the condition is false, it returns expression3, separated by a colon:

  // If you need to assign a value to a variable based on a condition, the ternary operator (?) is a convenient alternative to an if statement.
  $is_admin = ($user['permissions'] == 'admin') ? true : false;
  // it is also handy when we are working with HTML elements.
  ?>
  <div style='background-color: <?php echo ($count > $limit) ? "red" : "green" ?>'><?php echo $message ?></div>
<?php

  ## The Null Coalescing Operator
  // As of PHP7 a new logical operator has been introduced that is very similar to the ternary operator.
  // It is the null coalescing operator (??) that returns its first operand if it is not null or undefined; otherwise it returns its second operand.
  // Syntax:
  $first_operand ?? $second_operand;

  // The Null Coalescing Operator is in esense syntactic sugar for cases where we need to use a ternary operator along with the isset() method.
// The following example uses a ternary operator:
$fav_color = "red";

$color = isset($fav_color) ? $fav_color : "green";

echo "The chosen color is: " . $color;
// Output: The chosen color is: red
// The same example with the use of the Null coalescing operator:

$color = $fav_color ?? "green";
// Output: The chosen color is: red


  ## The Switch Statement

  //[ The switch statement is similar to an if statement, except that it does not work with a range of values. A switch statement requires each case to be based on a single value. Depending on the value of the variable used for switching, the program will execute the correct block of code. ]

    // The switch conditional statement, evaluates an expression based on different cases, with each case based on a single value. The program executes the respective statements, depending on each value, when the expression is matched and until the break statement is reached.
    // There can be a default, optional, case denoted with the default statement, which is used when all previous cases remain unmatched.

    // Syntax:
    // switch (variable used for switching) {
      // case firstCase: statements;
      // break;
      // case secondCase: statements;
      // break;
      // default: statements;
    // }

    // Example:

echo "Enter your grade: ";
$userGrade = "A";

switch ($userGrade) {
    case "A+":
    case "A":
        echo "Distinction\n";
        echo "Well Done!\n";
        break;
    case "B":
        echo "B Grade\n";
        break;
    case "C":
        echo "C Grade\n";
        break;
    default:
        echo "Fail\n";
}

/* [
    After getting the user’s grade, we use the switch statement that follows to determine the output. If the grade entered is “A+” (Line 15), the program executes the next statement until it reaches the break statement. This means it’ll execute lines 16 to 19. Thus, the output is “Distinction”, followed by “Well Done!”. If grade is “A” (Line 16), the program executes lines 17 to 19. Similarly, the output is “Distinction”, followed by “Well Done!”. If grade is not “A+” or “A”, the program checks the next case. It keeps checking from top to bottom until a case is satisfied. If none of the cases apply, the default case is executed.]


*/
?>

