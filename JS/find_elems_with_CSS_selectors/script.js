// Element.matches() method
// Apart from element.querySelectorAll(selector) and element.querySelector() methods [link inbound], we can use two other methods to find elements based on CSS selectors.
// The Element.matches(elector) checks if an element matches the selector passed as argument.
// It returns true if the element matches the selector or false if not.

// This method is useful in cases where we trying to filter out one or more elements we are interested in.

const  jellyfish_list= document.querySelectorAll('li');

for (const jellyfish_item of jellyfish_list) {
  if (jellyfish_item.matches('.harmful')) {
     jellyfish_item.style.color="red";
  }
}
// This will color Pelagia noctiluca in red.

/*
// The other method we can use to find elements based on css selector arguments in the elem.closest(selector) method.
This method traverses the DOM from the specified element to the root, checking  each of the ancestors.
Ancestors of an element are: parent, the parent of parent, its parent and so on. The ancestors together form the chain of parents from the element to the top.
If the parent matches the selector, then the search stops, and the ancestor is returned.
The elem itself is also included in the search.

  Example:
*/
const chapter = document.querySelector('.chapter'); // LI

  console.log(chapter.closest('.book')); // UL
  console.log(chapter.closest('.contents')); // DIV

  console.log(chapter.closest('h1')); // null (because h1 is not an ancestor)

  const el = document.getElementById('div-03');

// the closest ancestor with the id of "div-02"
console.log(el.closest('#div-02')); // <div id="div-02">

// the closest ancestor which is a div in a div
console.log(el.closest('div div')); // <div id="div-03">

// the closest ancestor which is a div and has a parent article
console.log(el.closest("article > div")); // <div id="div-01">

// the closest ancestor which is not a div
console.log(el.closest(":not(div)")); // <article>
