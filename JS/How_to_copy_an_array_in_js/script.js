// How to clone arrays in JS

//JS provide a number of different ways to make copies of arrays and objects.

// Array.from() method
// Creates a shallow-copy from an iterable or array-like object.

const ingredients = ['sea bass', 'garlic', 'rosemary', 'lemon', 'olive oil'];

const sea_bass_recipe = Array.from(ingredients);
// creates a shallow copy of the ingredients array
console.log(sea_bass_recipe); // ['sea bass', 'garlic', 'rosemary', 'lemon', 'olive oil'];
// add an ingredient to the copied array
sea_bass_recipe.push('mustard');
console.log(sea_bass_recipe); // ['sea bass', 'garlic', 'rosemary', 'lemon', 'olive oil', 'mustard'];

// the original array is not affected;
console.log(ingredients);

// Another way to create a copy is with slice() method
const fish_recipe = ingredients.slice();
fish_recipe.push("oregano");
console.log(ingredients);

// We can also use the spread syntax operator to create a clone of the array
const fish_recipe_sea_bass = [...ingredients];
fish_recipe_sea_bass.push("mayonnaise");
console.log(ingredients);

// All of the above methods are adequate for creating shallow copies of an array.
// Unfortunately, they can't create deep copies of an array.
// When dealing with multi-dimensional arrays, altering nested arrays would affect the original array as well.
// This happens because, since a deep copy of the original array haven't been created, the nested arrays in our copy array are just references of the original one
// example
const pets = ['dogs', 'birds', ['aegean', 'siamese', 'persian']];
const lovely_pets = Array.from(pets);

lovely_pets[2].push("burmese");

// original array is affected. The same would have happened if we used the spread syntax operator or  the Array.slice() method
console.log(pets);
