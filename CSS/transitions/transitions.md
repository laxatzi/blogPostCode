# Introduction to CSS Transitions

Unlike print media, the internet is a dynamic medium. Elements are not neceserily static. They can bounce or rotate. Menus can drop down. Colors can change values. The best way to achieve any of these is with CSS transitions. With transitions we can control animations' duration and speed.

They enable us to make property changes occurring smoothly and gradually over a certain duration on time, enhancing the interactivity of a page and user experience.

The following is the CSS syntax for transitions:

div {
transition: <property> <duration> <timing-function> <delay>;
}

property: The CSS property to apply the transition to (e.g., width, background-color).
duration: The time needed for the transition to be fully executed (e.g., 0.5s, 200ms).
timing-function: The transition’s speed curve options (e.g., ease, linear, ease-in-out…)
delay: The amount of time to delay before beginning the transition (e.g., 0s, 1s).

Example:

```css
.button {
  background-color: blue;
  transition: background-color 0.3s ease-in-out;
}

.button:hover {
  background-color: red;
}
```

Here, when the user hovers over the .button element, the background color smoothly changes from blue to red over a duration of 0.3 seconds.

## Understanding Transition Properties

Transitions are done with the transition-\* family of properties.

By using the sub-properties below, we can manipulate each component of the transition.

### transition-property

[The transition-property property specifies which properties to transition.](https://developer.mozilla.org/en-US/docs/Web/CSS/transition-property)

#### Syntax:

```css
transition-property: property1, property2, ...;
```

property1, property2, ...: Specify the CSS properties that the transition should be applied to. We can list more than one properties by using commas

#### Common Use-cases:

1. Single Property Transition:

```css
button {
  background-color: hsl(180, 50%, 50%);
  border: 0;
  color: white;
  font-size: 1rem;
  padding: 0.3em 1em;
  border-radius: 1em;
  transition-property: background-color;
  transition-duration: 1s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  color: yellow;
}
```

Only the background-color property will transition over 1 second when it changes.

2. Multiple Properties Transition:

```css
button {
  background-color: hsl(180, 50%, 50%);
  border: 0;
  color: white;
  font-size: 1rem;
  padding: 0.3em 1em;
  border: 2px solid;
  border-color: darkgrey;
  border-radius: 1em;
  transition-property: background-color, color;
  transition-duration: 2s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  color: yellow;
  border-color: yellow;
}
```

Here, both color and background-color properties will transition for 1s.

3. All Properties Transition:

```css
button {
  background-color: hsl(180, 50%, 50%);
  border: 0;
  color: white;
  font-size: 1rem;
  padding: 0.3em 1em;
  border: 2px solid;
  border-color: darkgrey;
  border-radius: 1em;
  transition-property: all;
  transition-duration: 1s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  color: yellow;
  border-color: yellow;
}
```

In this case, the special keyword all, which is the default transition-property value, will transition any properties that change (in our case: background-color, color, border-color).

### transition-duration

The transition-duration transition sub-property, determines how long a transition animation lasts.

The default value is set to 0s, indicating that there will be no animation.

````css
 button {
  background-color: hsl(180, 50%, 50%);
  border: 0;
  color: white;
  font-size: 1rem;
  padding: 0.3em 1em;
  border: 2px solid;
  border-color: darkgrey;
  border-radius: 1em;
  transition-property: all;
  transition-duration: 1s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  color: yellow;
  border-color: yellow;
}
```
In the example, the transition-duration property indicates that the transition will last for 1 second.
````
