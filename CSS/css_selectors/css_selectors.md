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
A Class selector is meant to be reusable and can be applied to more than one elements.

Example:

```css
.heading {
  font-weight: bold;
  color: blue;
}
```

### Attribute Selectors

[//]: # "https://developer.mozilla.org/en-US/docs/Web/CSS/Attribute_selectors"

With an attribute selector we select all elements that have this specific attribute.

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

### Type Selectors

CSS Type selectors are used to match all element nodes of a given name.

Example:

```css
small {
  font-weight: bold;
  color: blue;
}
```

## CSS Cascade

The 'C' in CSS abbreviation stands for “Cascade”. This fact highlights the importance of the Cascade in CSS.
The cascade is an algorithm.

Its purpose is to resolve conflicts when applying multiple CSS rules to the same HTML element.

```css
h1 {
  font-weight: normal;
  color: blue;
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

A declaration for a certain style property can appear several times in the same stylesheet, as we saw in our example, or in more than one stylesheet, or even in more than one source. The Cascade resolves conflicts that may arise as a result.

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
  color: blue;
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

# Specificity

Conflicts resolved with the !important label is not the most popular nor the ideal scenario.
Most of the time, all the conflicting declarations will have the exact same importance.
In this case the cascade resolves the conflicts by comparing the specificity of the declaration selectors.
The declaration with the highest specificity prevails.
In order to calculate specificity the algorithm uses a specificity score. The highest the score, the highest the specificity.

The specificity algorithm is a three-column value with each column representing different weight of importance and different type of selector. All three types of selectors - ID, Class, Type - are represented in the columns with each column in the left weight more than the one on its right.

Example of specificity:

```css
#hero-section a.btn {
  background-color: blue;
}
// Specificity: (1, 1, 1)
```

Here each type of selector is represented once, so each respective column gets 1 point.
Lets see how conflicts are resolved with the use of the specificity algorithm:

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

Here the first rule is the winner, since it gets more points at the third column.
The div element node added to the 'hero-section' id makes all the difference.
It adds a second point in the type selector (third) column.
But this only matters because the score at the other two columns is a draw.
If this wasn't the case the third column would be irrelevant and the number of type selectors wouldn't made a difference.

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

And now the winner is the second rule since it gets two points in the second column thanks to the 'btn-link' class.
The fact that the third column type selectors in the first rule are five doesn't matter.
It wouldn't make any difference if a hundred type selectors were denoted in the rule.
From the example it is obvious that there is no meaning in evaluate the specificity score from right to left.
We do the opposite. First we compare the leftmost column and only if the score is a draw we move to the one on the right.

The value of the winning declaration is called the cascaded value.

But what happens if selectors have the same specificity?
