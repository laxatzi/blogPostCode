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