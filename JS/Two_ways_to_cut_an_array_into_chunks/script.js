// Two ways to cut an array into chunks

// There are two ways to cut off a piece of an array.

// One is immutable. That means, it doesn't change the original array.
// It is the Slice() method.
// Implementing this method the original array will remain intact, and the portion of the array we have sliced off will be returned as a new array.

// The slice() method takes two optional parameters.
// The Start parameter is the zero base index at which the extraction begins
// The End parameter is the zero base index at which the extraction ends. The extraction does't includes end
const cities = ["Thessaloniki", "Athens", "Chania", "Heraklion", "Patras"];

const cretan_cities = cities.slice(2,4);
console.log(cretan_cities);// ["Chania", "Heraklion"] end param, here in index 4, is not included
console.log(cities) // ["Thessaloniki", "Athens", "Chania", "Heraklion", "Patras"] array is not altered


// On the absence of this two optional parameters the slice method creates an exact copy of the original array
const new_cities = cities.slice();
console.log(new_cities); // ["Thessaloniki", "Athens", "Chania", "Heraklion", "Patras"]

// If only Start parameter is provided, the extraction goes all the way to the last index of the array
const south_greece_cities = cities.slice(1);
console.log(south_greece_cities);

// If the start parameter is greater than the last index of the array, the method will return an empty array []
const five_cities = cities.slice(5);
console.log(five_cities);//[] since last index is 4. 4 < 5 hence the empty array

// We can also use negative indexes which will start extracting elements from the end of the array.

// In this example, we set the start parameter at -1 which will slice the last city in the array and return it in a new one.

// A negative index is used to start extracting elements from the end of the array
const newCityArr = cities.slice(-2);
const cities_in_achaia = cities.slice(-1);
console.log(cities_in_achaia);//["Patras"]

// The other method is the Array.prototype.splice() and it is mutable
// This method will alter the original array.
// Similarly to the previous method, the splice() method will return a new array consisted of the extracted portion of the original array.
 // The difference is... the original array is no longer the same.

 const balkans = ["Greece", "Bulgaria", "Serbia", "Romania"];
 const south_balkans = balkans.splice(0,2);
 console.log(south_balkans);
 console.log(balkans);// the Greece and Bulgaria are gone!