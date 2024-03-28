# CSS 101 - The Cascade and Specificity With Examples

CSS, which stands for Cascading Style Sheets, is responsible for the visual presentation of a webpage on a browser.
Although a website can function without CSS, it won’t look pretty. The use of CSS makes websites visually appealing and ensures a better user experience.
CSS documents are considered style sheets because they define style. But why cascading style sheets? We are going to delve in to the process of cascade and see how it resolves conflicting CSS declarations in this article. But first let's talk about CSS declarations.

## CSS Declarations

In order to style different aspects of an HTML element, like color or size, we use CSS properties.
A property declaration includes a name and a value. The order is property name, then a colon, and then the value.

```css
font-size: 22px;
```

When we need to include multiple CSS properties, we separate each name-value pair with a semicolon.

```css
font-size: 22px;
font-weight: bold;
```

### CSS Rules

A CSS Rule is comprised of a selector and a declaration block. We use the selector to select one or more HTML elements.
We style these elements with CSS declarations that we insert into the declaration block of the CSS rule.

```css
h1 {
  font-size: 48px;
  color: blue;
}
```

Here h1 is the selector. In the declaration block, inside the curly braces, we define the styles of the HTML element.

### Types of Selectors

There are three types of selectors.

#### ID Selectors

To denote an ID selector, we use a hash sign # followed by the id name.

Each ID selector should be unique and reserved for styling a single element.
Example:

```css
#main-heading {
  font-weight: bold;
  color: blue;
}
```

### Class Selectors

To denote a Class selector, we use a period . followed by the class name.
A Class selector is meant to be reusable and can be applied to more than one element.

Example:

```css
.heading {
  font-weight: bold;
  color: blue;
}
```

### Attribute Selectors

[//]: # "https://developer.mozilla.org/en-US/docs/Web/CSS/Attribute_selectors"

With an attribute selector [link] we select all elements that have this specific attribute explicitly set.

Example:

```html
<form>
  <label for="name">Name</label>
  <input type="text" name="name" id="name" /><br />
  <label for="email">Email</label>
  <input type="email" name="email" id="email" />
</form>
```

```css
input[type="email"] {
  background-color: yellow;
}
```

### Pseudo-class Selectors

A CSS pseudo-class is a selector keyword that indicates a specific state of the selected element(s).

A pseudo-class is made up of a colon (:) and the name of the pseudo-class.

Example of a pseudo-class selector:

```css
a:hover {
  color: pink;
}
```

### Type Selectors

CSS Type selectors are used to match all element nodes of a given name.

Example:

```css
small {
  font-weight: bold;
  color: blue;
}
```

### Pseudo-elements

Adding pseudo-elements is similar to including a completely new HTML element in the markup.

Pseudo-elements are denoted by the use of double colons (::).

Example of pseudo-element syntax:

```css
.box::before {
  content: "\2192";
}
```

The "before" pseudo-element is used here along with the "content" property in order to insert an arrow, which can then be styled like a normal element.

```css
.box::before {
  content: "\2192";
  color: red;
  font-weight: bold;
  font-size: 1.54rem;
  margin-right: 3px;
}
```

## CSS Cascade

The 'C' in CSS abbreviation stands for “Cascade”. This fact highlights the importance of the Cascade in CSS.
The cascade is an algorithm.

Its purpose is to resolve conflicts when applying multiple CSS rules to the same HTML element.

```css
h1 {
  font-weight: normal;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: bold;
}
```

In the example, the Cascade is responsible for deciding which CSS declaration to apply in the h1 heading.
In our case, the font weight of the heading will be bold and not normal.

A declaration for a certain style property can appear several times in the same stylesheet, as we saw in our example, or in more than one source. The Cascade resolves conflicts that may arise as a result.

The Cascade algorithm's output is dependent on a few different factors.
Let's examine them one by one:

# importance

Declarations labeled with ‘!important’ are considered more important than normal declarations.

This is the order of importance, from most important to least important:

1. User Agent (browser) !important declarations
2. User !important declarations
3. Author (developer) !important declarations
4. Author declarations
5. User declarations
6. Default browser declarations

In our previous example, applying the !important label changes the order of importance and, as a result, the style of the heading

```css
h1 {
  font-weight: normal !important;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-weight: bold;
}
```

Now the weight of the heading is normal and not bold

[//]: # "A comment about how we shouldn't use the important label"

!important should be treated as a tool of last resort.
Overusing it could cause problems for other users maintaining the code.
Using specificity is the best practical way to anticipate conflicts but doing so is not always feasible.
There are of course cases where the available selectors are not sufficient to enable enhanced specificity, and changing the HTML to add additional selectors may be difficult, with a CMS that does not allow easy customization, for example.

In cases like that, the use of the !important label may be a much more pragmatic way to achieve our goal and sustain maintainability.

# Specificity

Resolving conflicts with the !important label is not the most popular nor the ideal scenario.
Most of the time, all the conflicting declarations will have the exact same importance.
In this case, the cascade resolves the conflicts by comparing the specificity of the declaration selectors.
The declaration with the highest specificity prevails.
In order to calculate specificity, the algorithm uses a specificity score. The higher the score, the higher the specificity.

The specificity algorithm is a three-column value, with each column representing a different weight of importance and different type of selector. All types of selectors are represented in the columns with each column in the left weight more than the one on its right.
The ID selectors are represented in the first, leftmost column, the class, pseudo-class\* and attribute selectors in the second, and the type and pseudo-element selectors in the third column.

Example of specificity:

```css
#hero-section a.btn {
  background-color: blue;
}
// Specificity: (1, 1, 1)
```

Here, each type of selector is represented once, so each respective column gets 1 point.
Let's see how conflicts are resolved with the use of the specificity algorithm:

```html
<div id="hero-section">
  <a href="#" class="btn">button</a>
</div>
```

```css
div#hero-section a.btn {
  background-color: blue;
  color: white;
}

// Specificity (1, 1, 2)

#hero-section a.btn {
  background-color: red;
  color: white;
}

// Specificity (1, 1, 1)
```

Now the first rule is the winner, since it gets more points in the third column.
The div element node added to the 'hero-section' id makes all the difference.
It adds a second point in the type selector (third) column.
But this only matters because the score in the other two columns is a draw.
If this wasn't the case, the third column would be irrelevant and the number of type selectors wouldn't make a difference.

```html
<div id="hero-section">
  <div>
    <div>
      <div>
        <a href="#" class="btn btn-link">button</a>
      </div>
    </div>
  </div>
</div>
```

```css
div#hero-section div div div a.btn {
  background-color: blue;
  color: white;
}

// Specificity: (1, 1, 5)

#hero-section a.btn.btn-link {
  background-color: red;
  color: white;
}

// Specificity: (1, 2, 1)
```

In this example multiple divs intervent between the first div and the link. Now the winner is the second rule since it gets two points in the second column thanks to the 'btn-link' class.
The fact that the third column type selectors in the first rule are five doesn't matter.
It wouldn't make any difference if a hundred type selectors were denoted in the rule.
From the example, it is obvious that there is no meaning in evaluating the specificity score from right to left.
We do the opposite. First, we compare the leftmost column (ID) and only if the score is a draw we move to the one on the right and so on.

The value of the winning declaration is the "cascaded value".
The cascading value for the background property in the previous example is 'red'.

- Regarding the pseudo-class's specificity
  The :is(), :has(), and :not() pseudo-classes don’t add any specificity weight, making them an exception to this rule.
  But the parameters in these selectors do add specificity weight, which is dependent on parameters specificity weight.

```html
<p class="content content-last">Content in a paragraph.</p>
```

```css
:is(.content) {
  /* 0-1-0 */
  color: green;
}

:is(.content.content-last) {
  /* 0-2-0 */
  color: red;
}

:is(p) {
  /* 0-0-1 */
  color: blue;
}
```

### Universal Selector and Specificity

The universal selector selects all the elements on a html page and applies the same style to them, as long as there is not a more specific rule applied.

It is represented with the Asterisk(\*) symbol:

```css
*,
*::before,
*::after {
  box-sizing: border-box;
}
```

The above code dictates that padding and border should be included when calculating the width and height of every element in the page.

The universal selector becomes handy when we want to apply a CSS reset.
A CSS reset is a set of styles we apply in order to remove browser built-in styles.
Apart from manipulating the box-sizing model in the above example, a very common and useful case of using the universal selector for resetting CSS is the removal of default margin

```css
* {
  margin: 0;
}
```

The universal selector is also handy when we need to manage line heights.
The line-height controls the vertical spacing between each line of text in a paragraph.

```css
* {
  line-height: calc(1em + 0.5rem);
}
```

Regarding specificity, the universal selector holds no specificity value or more accurately a specificity value of (0,0,0), so :
\*.class { } and .class { } are the same.

## Inline style attribute

The highest specificity is given to inline styling, so it always takes precedence over internal or external css rules

```html
<p style="color: pink; background: black;" class="content content-last">
  Content in a paragraph.
</p>
```

```css
:is(.content) {
  /* 0-1-0 */
  color: green;
}

:is(.content.content-last) {
  /* 0-2-0 */
  color: red;
}

:is(p) {
  /* 0-0-1 */
  color: blue;
}
```

image

Now we see that the cascade ignores the external/internal css rules and applies the style attribute values in the html file.

## But what happens if selectors have the same specificity?

If there is a tie at this point, then the order of appearance is taken into account.
The last declaration in the code (top to bottom) will override all other declarations and will be applied.

```html
<p class="content content-last">Content in a paragraph.</p>
```

```css
p {
  color: blue;
}

p {
  color: green;
}
```

The paragraph will be written in green. The newest instance wins.

NOTE: It is considered best practice to rely more on specificity rather than on the order of appearance.

In the case of rearranging our code in the future, we won't mess up our styles.
Lets see an example:

```css
.my-button {
  background: beige;
}

[onclick] {
  background: yellow;
}
```

```html
<button
  class="my-button"
  onClick="parent.open('http://lambroshatzinikolaou.com/')"
>
  Click me
</button>
```

Onclick attribute fires on a mouse click on a specific button linking it to a specific webpage.
We want to style this button differently from the others.
The button’s background is yellow due to the equal specificity score (0-1-0) of both selectors.
We rely on the order of appearance to color the specific button yellow.
If we rearrange the code and the rules change order, the button may unintentionally become beige.
We can make our code rely more on specificity to achieve the same result without relying on the order of appearance.

```css
.my-button[onclick] {
  background: yellow;
}

.my-button {
  background: beige;
}
```

Now the mixed order is not a problem.

### Rely on order when using 3rd party stylesheets

When we use external 3rd party stylesheets, we need to rely on the order of appearance.

To overwrite styling from other CSS files, remember to include your CSS file after the ones you want to override.

Make make sure your custom stylesheet is placed AFTER these stylesheets in the head section.

image

In the example we have placed our custom stylesheet 'style.css' after the bootstrap and google fonts stylesheets.

```css
:root {
  /* colors */
  --cc-primary: #525fe1;
}

a {
  color: var(--cc-primary);
}
```

So now we can overwrite the default link color with one of our liking.
