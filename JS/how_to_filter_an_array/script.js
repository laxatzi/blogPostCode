// Three ways to filter an array
//Lets examine three approaches of filtering an array
// We have created an array of numbers.
const numbers = [1, 2, 4, 6, 8, 10, 11];
//We want to filter this array so it contains only even, and not odd, numbers.



// We should loop/iterate through the numbers of the array and filter out every single one that is not an even.
// Here we look at three different ways to do this.

// First way is by using a for...of loop
// In this case we create a new, empty, array in advance, then we loop through the old array, apply a condition to each number, and then push to the newly created array every number that satisfies the condition.
const evens = [];

for (let number of numbers) {
    if (number % 2 == 0) {
        evens.push(number);
    }
}
// We could do the exact same thing with the use of the forEach method

const evens_alt = [];
numbers.forEach((number) => {
  if (number % 2 == 0) {
    evens_alt.push(number);
  }
});

// Another way to filter the array is with the filter method.

// This method iterates through the old array and constructs a new array from the original array's elements which are returned as truthy after they were called by a callback function.

const numbers_even = numbers.filter((number) => {
    return number % 2 == 0;
});

// tests
console.log(evens);
console.log(evens_alt);
console.log(numbers_even);