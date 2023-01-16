// How to get elements in the DOM
// By far, the most versatile method, elem.querySelectorAll(css) returns all elements inside elem matching the given CSS selector.
// The call to elem.querySelector(css) returns the first element for the given CSS selector.

// In other words, the result is the same as elem.querySelectorAll(css)[0], but the latter is looking for all elements and picking one, while elem.querySelector just looks for one. So it’s faster and also shorter to write.

// querySelector()
    // use querySelector() to find a matching element on the page. Any valid css selector can be used.

    // this method follows the same pattern as css and enables developers to use complex selectors
    // for example
    const fishoup_heading = document.querySelector(".fish_recipes .fishsoup h3");

    fishoup_heading.style.color = 'red';


// querySelectorAll()
  //The Document method querySelectorAll() returns a static (not live) NodeList representing a list of the document's elements that match the specified group of selectors.
  // static vs live nodelist
  // static means that it doesn’t change, even if the UI does.
  // suppose we want to add a new ingredient in the fishsoup recipe
  const fishsoup_ingredients = document.querySelector(".fishsoup ul");


  //  for (let ingredient of ingredients) {

  //   console.log(ingredient.textContent);
  //  }

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



// const el = document.querySelector("div.user-panel:not(.main) input[name='login']");


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
// notes from MDN
//https://developer.mozilla.org/en-US/docs/Web/API/Document/querySelector
//https://developer.mozilla.org/en-US/docs/Web/API/Document/querySelectorAll

