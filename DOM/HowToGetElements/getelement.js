// How to get elements in the DOM

// elem.querySelectorAll(selectors) is the preferred and most flexible method for matching (returning) a group of selectors.
// It returns a static NodeList that represents a list of the document's elements that match the selectors appearing in string format as this method's parameters. If there are no matches it returns null.
// By static we mean that the NodeLis doesn't change, even if the UI does change.
// Example:
  // suppose we want to add a new ingredient in the fishsoup recipe
  const fishsoup_ingredients = document.querySelector(".fishsoup ul");


  // suppose we want to add a new ingredient in the fishsoup recipe
  // const fishsoup_ingredients = document.querySelector(".fishsoup ul");


//   fishsoup_ingredients.style.background="beige";
//   const ingredients = fishsoup_ingredients.querySelectorAll('li');

// setTimeout(function () {

// 	// Inject a new button
// 	let li = document.createElement('li');
// 	li.textContent = 'Chilly pepper';
// 	fishsoup_ingredients.append(li);

// 	// logs  not the new one
// 	for(let ingredient of ingredients) {
//     console.log(ingredient.textContent);
//   }

// }, 3000);

// The new ingredient is shown on browser but not on console.

// querySelector() method
// An Element object representing the first element in the document that matches the specified set of CSS selectors.  If there are no matches it returns null.
// The querySelector(selector) result is the same as querySelectorAll(selectors)[0], but the latter is matching all elements and returning just one, while querySelector specifically looks for and returns one.
// In querySelector() method any valid css selector can be used as parameter.

    // It enables developers to use complex selectors
    // for example
    const fishoup_heading = document.querySelector(".fish_recipes .fishsoup h3");

    fishoup_heading.style.color = 'red';


// With querySelector() and querySelectorAll() you can get the first element in the DOM that have one of two or more selectors
// To make it work, pass in your desired selectors separated with a comma, all within quotes as a single argument.
const fish_recipes =  document.querySelectorAll('[data-fish-recipe], .fish');
	for(let fish_recipe of fish_recipes) {
    fish_recipe.style.background = "beige";
  }

  // You can even use pseudo-classes, like negate selectors:Let’s say you want to ignore buttons with the data-recipe="fish" attribute. You can use the :not() pseudo-class in your selector string, like this…
const only_meat_recipes = document.querySelectorAll('.recipes:not([data-recipe="fish"])');

for(let meat_recipe of only_meat_recipes) {
  meat_recipe.style.background = "pink";
}
// and now the meat recipe section is selected



