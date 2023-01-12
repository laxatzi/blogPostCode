// How to get elements in the DOM
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
  let ingredients = fishsoup_ingredients.querySelectorAll('li');

   setTimeout(function() {
    let li = document.createElement('li');
    li.textContent = "Rosemary";
    ingredients.append(li);
    console.log(ingredients);
   }, 3000);




//You can also negate selectors:
// const el = document.querySelector("div.user-panel:not(.main) input[name='login']");

// useful links
// https://gomakethings.com/either/or-selectors-with-the-vanilla-js-queryselector-and-queryselectorall-methods/
// https://gomakethings.com/what-to-do-when-queryselector-fail-on-valid-selectors/
// https://gomakethings.com/the-javascript-selector-methods-that-changed-everything/
// https://gomakethings.com/challenges-and-limitations-with-advanced-selectors-and-the-document.queryselectorall-method/
// https://gomakethings.com/live-vs.-static-nodelists-and-htmlcollections-in-vanilla-js/
// https://developer.mozilla.org/en-US/docs/Web/API/Node/textContent