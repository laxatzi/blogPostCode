// Today we take a look at how to update the values of elements in an array.
// Lets say we have an array of names. The array's name is (unsurprisingly) names.
// The original array
const names = ["john", "paul", "mary", "helen"];

//We want to update this names since they are not capitalized.
// We create the capitalize function to achieve our goal
const capitalize = function(str) {
    return str[0].toUpperCase().concat(str.substring(1));
}

// We should loop/iterate through the elements of the array and update every single element by capitalizing its value
// Here we look at three different ways to do this.

// First way is by using a for...of loop
// In this case we create a new, empty, array in advance, then we loop through the old array, update element values one by one, and then push this updated elements to the newly created array
const capitalized_names_alt = [];
for (let name of names) {
   capitalized_names_alt.push(capitalize(name));
}

// We could do the exact same thing with the use of the forEach method
const capitalized_names_alt2 = [];
names.forEach((name) => {
   capitalized_names_alt2.push(capitalize(name));
});

// Third and preferred way is by using the map method
// This method iterates through the array and constructs a new array that consists of the old original array's elements modified by a callback function.
// The diff here is that we don't have to create a new array in advance, since the map method adhering to the immutability principle, creates the new array itself and then returns it


const capitalized_names = names.map((name) => {
    return capitalize(name);
});

// Test in the console
console.log(capitalized_names);
console.log(capitalized_names_alt);
console.log(capitalized_names_alt2);
console.log(names);