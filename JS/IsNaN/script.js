//# What is NaN (Not A Number)?
// The NaN value is one of the most misunderstood values in JavaScript.
// This is because the NaN type has some special behaviors that often create confusion.
// Let's see if we can explain these behaviors in simple terms.
//In JavaScript NaN is a property of the global object. In other words, it is a variable in global scope.
console.log(window.hasOwnProperty(NaN)); // true

// NaN literally means "Not a Number".
// But the funny thing is that in computing (not only in JS), it IS actually considered a number (Number type).
console.log(typeof NaN); // "number"
// In JavaScript specifically, ECMAScript spec dictates that the Number type includes NaN:[ https://262.ecma-international.org/5.1/#sec-4.3.20]
// NaN is also a property of the Number object.
console.log(Number.hasOwnProperty(NaN)); // true

//# sub: NaN in not equal to NaN
// NaN is the only value in JavaScript that is not equal to itself.
console.log(NaN === NaN); // false
// This behavior is not nonsensical if we bear in mind that NaN holds no information about what something is, just what it isn't.
// NaN acts like a placeholder, where a value is evaluated for not being a number.
// NaN === NaN is false because the comparison doesn't necessarily evaluate the same non-number values
// The opposite also holds true
console.log(NaN !== NaN); // false

// The fact that NaN is not equal to itself makes the use of equality for value checking not an option.
// In JavaScript, we can check if a value is of type undefined (or any other type for that matter) by using equality
let x;

if (x === undefined) {
  console.log("x is undefined"); // x is undefined
}
// But we can't do that with NaN:

let codeVitamine = "code" * 2;
console.log(codeVitamine); // NaN
if (codeVitamine === NaN) {
  console.log("codeVitamine is NaN");
} else console.log("codeVitamine is not NaN"); // --> codeVitamine is not NaN !!!

// sub: The isNaN() and Number.isNaN() methods to the rescue!
// To tell if a value is NaN in JS we use both the Number.isNaN() and the isNaN() methods.
// Although the two methods look similar, they differ in how they handle non-numeric values.
// For example:
console.log(isNaN("Hello World")); // true
console.log(Number.isNaN("Hello World")); // false
// What is going on here?
// We'd expect that since "Hello World" is a string, thus not-a-number, we would get true as a result.
// But with the second method the result is false. The string obviously is not considered not-a-number, but we definitely know that it is not a number either!
// Lets dig in a little more to each of these methods to see how they differ and why we get such different results.
//# The isNaN() method
// The isNaN method checks if a value passed as a parameter is NaN.
// // Syntax of isNaN method is: isNaN(value) where value is the parameter checked for being NaN.
// This parameter is force-converted to a number prior to evaluation.
// // If the parameter cannot be converted to a number, it returns true.
console.log(isNaN("Hello World")); // true
console.log(isNaN("London" * 5)); // true
console.log(isNaN(undefined)); // true
console.log(isNaN(NaN)); // true

//If it can be coerced to a number it returns false.
console.log(isNaN(null)); // false
console.log(isNaN("34")); // false

//# The Number.isNaN() method
// The Number.isNaN() method is a static method available on the Number object.
// It checks if the provided value is of NaN type.

//These method returns true if a value is of the NaN value itself.
console.log(Number.isNaN(NaN)); // true
// or if it represents a invalid numerical operation.
console.log(Number.isNaN("London" * 5)); // true
// Or if it evaluates zero divided by zero
console.log(Number.isNaN(0 / 0)); // true
//In mathematics, zero divided by zero is undefined and is therefore represented by NaN in computing.

// In every other case it returns false.
console.log(Number.isNaN(undefined)); // false
console.log(Number.isNaN(null)); // false
console.log(Number.isNaN("6")); // false
console.log(Number.isNaN("Hello World")); // false
console.log(Number.isNaN(1 / 0)); // false (since it evaluates to Infinity)

//# Which of the two methods is preferable?
// The Number.isNaN() method is distinctively different from the isNaN() function in the aspect of not performing parameter type coercion.
// let's see another example to make the distinction more clear.
// Lets say we store a username in a variable
const username = "user34";
// The string "user34" cannot be converted to a valid number so is declared NaN and the isNaN() function returns true.
console.log(isNaN(username)); // true
// The Number.isNaN() method contrary to isNaN(), does not try to convert the input value. It just asks: "is the value of the variable 'username' of type NaN?" and the answer is no (false)
console.log(Number.isNaN("user34")); // false

// We see that it is the coercion process in the isNaN() method that makes the difference.
// Therefore, since  Number.isNaN() doesn't implement coercion, is generally considered more reliable for checking NaN values in JavaScript.
// Once we get a NaN in a math operation, is going to pollute all the other operations making them resulting in NaN.
// So, testing the results of math operations to make sure we didn't get a NaN, is considered best practice.
