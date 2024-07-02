# Introduction to CSS Transitions

Unlike print media, the internet is a dynamic medium. Page components are not necessarily static. They can bounce or rotate. Menus can drop down. Colors can change values.
In the real world nothing happens in an instant.
Things don’t magically appear or vanish.
Our brains perceive changes in the status of things by observing their movement.
So changes in the web should also follow a similar pattern of gradual movement.
The best way to achieve this is with CSS transitions.
With transitions we can control animations' duration and speed.
We can make property changes occurring smoothly and gradually over a certain period of time, making pages interactive and improving user experience.

The following is the CSS syntax for transitions:

div {
transition: <property> <duration> <timing-function> <delay>;
}

property: The CSS property to apply the transition to (e.g., height, margin).
duration: The time needed for the transition to be fully executed (e.g., 0.4s, 300ms).
timing-function: The transition’s speed curve options (e.g., jump-start, linear, ease-in…)
delay: The amount of time to delay before beginning the transition (e.g., 0s, .5s).

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

Transitions use the transition-\* family of properties.

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
  transition-duration: 0.4s;
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
  transition-duration: 0.4s;
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
  transition-duration: 0.4s;
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
  transition-duration: .4s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  color: yellow;
  border-color: yellow;
}
```
In the example, the transition-duration property indicates that the transition will last for 400 milliseconds.
````

Adjusting the speed of transitions help users to better comprehend UI changes.
Transition duration is not a one size fits all metric.
A slower animation (600ms) will feel tedious to most users when it is repeated multiple times, such as in a contextual menu. Most people will notice micro-animations of around 250ms, but they won’t feel like they’re waiting for them.
On the other hand, for an element that doesn’t require immediate attention, a lengthy transition, like a bounce, would be fine.

### transition-delay

With transition-delay, we can define a waiting period before the transition starts after the property value changes.

When a link has a transition delay of 0.5 s, the change won’t start until half a second after the mouse hovers over it.

A practical example of how transition-delay works is in the case of a dropdown menu.
The dropdown will only stay open if we keep hovering over it.

If we move the mouse diagonally to select a child, the menu will close due to our cursor being off limits.

```html
<body>
<h2>Dropdown Menu</h2>
<p>Move the mouse over the Dropdown menu item to open the dropdown menu.</p>

<ul class="dropdown">
  <li class="menu-item"><a>Menu Item</a></li>
  <li class="menu-item"><a>Menu Item</a></li>

  <li class="menu-item"><a>Menu Item</a></li>
  <li class="dropbtn">Dropdown &#9658;
    <ul style="padding: 0;" class="dropdown-content">
      <li><a href="#">Link 1</a></li>
      <li><a href="#">Link 2</a></li>
      <li><a href="#">Link 3</a></li>
    <ul>
  </li>
</div>
</body>
```

```css
.dropbtn,
.menu-item {
  padding: 16px;
  font-size: 16px;
  cursor: pointer;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  display: flex;
  width: 150px;
  opacity: 1;
  transition: opacity 100ms;
  transition-delay: 0ms;
}

.dropbtn:hover,
.menu-item:hover {
  background-color: #f3f3f3;
}

.dropdown {
  position: relative;
  display: flex;
  flex-direction: column;
}

.dropdown li {
  list-style: none;
}

.dropdown-content {
  opacity: 0;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  left: 232px;
  bottom: 0;
  transition: opacity 150ms;
  transition-delay: 400ms;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropbtn:hover .dropdown-content {
  opacity: 1;
  transition: opacity 150ms;
  transition-delay: 0ms;
}
```

In the example we manage to fix this by delaying the transition.
If the user moves their mouse outside of .dropbtn, nothing happens for 400ms.

If the mouse goes back into the element within that 400ms timeframe, the transition is canceled.

Once 400ms pass, the transition starts as expected.

### Transitioning two or more properties

If we want to apply two different transitions to two different properties, add multiple transition rules with commas between them.

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
  transition-property: border-color, background-color;
  transition-duration: 0.4s;
  transition-delay: 0.2s, 0.6s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  border-color: yellow;
}
```

When transition-delay is set to a negative time offset, the transition will start immediately but will appear to have started at the specified offset.

The transition will seem to start in the middle of its play cycle.

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
  transition-property: border-color, background-color;
  transition-duration: 0.4s;
  transition-delay: 0.2s, -0.2s;
}

button:hover {
  background-color: hsl(0, 50%, 50%);
  border-color: yellow;
}
```

Here, using transition-duration: .4s; transition-delay: -0.2s will cause the transition to jump one second into the play cycle before continuing.

When using a negative transition-delay value, we can achieve a more concise transition experience by shortening its perceived duration.

### transition-timing-function

By using the [transition-timing-function CSS property](https://developer.mozilla.org/en-US/docs/Web/CSS/transition-timing-function), we can control speed during the transition.

We can affect what kind of transition effect we'd like to achieve by using several keyword values such as linear, ease-in, and ease-out.
A linear transition moves at a steady pace, while ease-in and ease-out, accelerates, and decelerates respectively. These are just few of the available transition function values.[https://developer.mozilla.org/en-US/docs/Web/CSS/transition-timing-function#values]

```css
.container {
  position: relative;
  height: 25px;
}
.box {
  position: absolute;
  left: 0;
  height: 25px;
  width: 25px;
  border-radius: 50%;
  background-color: hsl(0, 80%, 50%);
  transition: all 1s linear;
}
.container:hover .box {
  left: 200px;
}
```

```html
<body>
  <div class="container">
    <div class="box"></div>
  </div>
</body>
```

When we run this example, a small red circle appears in the top left corner of the page. When

we hover over the container, the box transitions to the right. Pay attention to how it moves in

in a consistent pace.

We can edit to see how different timing functions behave. We can try ease-in (transition: all 1s ease-in) or ease-out (transition: all 1s ease-out).

These keyword values are sufficient for carrying out most tasks but sometimes we need more control.

We can achieve this by defining our own timing functions.

#### Cubic Bezier Curves

A [Cubic Bezier Curve](https://developer.mozilla.org/en-US/docs/Web/CSS/easing-function#cubic_b%C3%A9zier_easing_function) is a curved line defined by four numbers. This line defines the easing of a web component's movement.
We've seen that there are available to us predefined Cubic Bezier Curves like ease-in and ease-out, but we can insert our preferred values as well.

```css
transition-timing-function: cubic-bezier(0.47, 1.22, 0.72, 0.35);
transition-duration: 1.5s;
```

In the example we use the cubic-bezier keyword with a parenthesis. In there we define four points that actually represent the coordinates on a X and Y Axis.
We can represent the animation-timing-function value on our example, on a X and Y axis graph as follow:

(image)

If we add the two properties in our previous example we notice the red circle start accelerating, then almost stops, and then accelerates again.

This ισ our own custom movement. If we'd like to use a predefined one, like ease-in what we would actually used would be a cubic-bezier with predefined coords.

Ease-in is the equivalent of:

```css
transition-timing-function: cubic-bezier(0.42, 0, 1, 1);
```

The x axis depicts the transition’s duration. The y-axis represents the rate at which the transition occurs.
Curves are defined with the x and y axes spanning from 0 to 1.

The coordinates for the bottom-left corner are 0, 0 and for the top-right is 1, 1.

### Best Practices

#### Transition Duration

In most cases movement shouldn't last too long. Transitions should be quick, but not too short to be missed.
As a rule of thumb, single transitions work best within the 150–500 millisecond range (0.15 to 0.5 seconds).

Bear in mind that the code’s technical duration is less important compared to how the transition feels.
The start of a transition with a very slow ease-in may not be noticeable right away, although technically transition delay may be set to nil.

#### Movement affects UX

Movement is essential for creating the desired feel and branding of your website or web app.

For example, in the case of something important that should be known about immediately, speed and obviousness would be a priority.

If the situation is extremely crucial, we can use a stronger physical gesture, like shaking,in order to communicate how important the thing is.

So it is best practice to always question whether the movement communicates the desired feeling effectively.

#### Make UI components more natural

In the real world, it’s very rare for any type of movement to immediately accelerate or come to a sudden halt.

When an animation appears odd, it’s probably because it starts or finishes suddenly, without a natural flow.

It’s considered best practice to include a touch of easing in and out to our cubic-bezier curves, even if it’s subtle.

This slight easing can make the difference in achieving a smooth transition.

```html
<body>
  <div class="container">
    <div class="ball red-ball"></div>
    <div class="ball blue-ball"></div>
  </div>
</body>
```

```css
.container {
  position: relative;
  height: 25px;
}
.ball {
  position: absolute;
  left: 0;
  height: 25px;
  width: 25px;
  border-radius: 50%;
  transition-duration: 1s;
  transition-property: all;
}
/* sudden end*/
.red-ball {
  top: 0;
  background-color: hsl(0, 80%, 50%);
  transition-timing-function: cubic-bezier(0.68, 0.53, 0.265, 1.55);
}
/* smooth end */
.blue-ball {
  top: 30px;
  background-color: hsl(240, 100%, 25%);
  transition-timing-function: cubic-bezier(0.5, 0.53, 0.14, 1);
}

.container:hover .ball {
  left: 200px;
}
```

We notice that the first circle (red) ends abruptly, which is not ideal.

The custom curve of the first one (blue) provides a smoother ease in and out.

#### Regarding Transitions it’s usually best to be modest rather than exaggerated.

Excessive movement can often make things look worst rather than better.

When it comes to CSS transitions, it’s best to be moderate rather than excessive.

```html
<div class="demo">
  <div class="container container1">Red Box</div>

  <div class="container container2">Blue Box</div>
</div>
```

```css
body {
  margin: 0;
  padding: 10px;
  font-family: "Arial", sans-serif;
}

.demo {
  display: flex;
}

.container {
  width: 100%;
  max-width: 30rem;
  margin: 0 1rem;
  border: 1px solid black;
  padding: 0.5rem;
  font-size: 1rem;
}

.box {
  text-align: left;
  padding: 2rem;
  background: skyblue;
  animation-name: fade_in;
  opacity: 0;
}

.container1 {
  background: red;
  color: white;
}

.container1:hover {
  transform: scale(1.03);
  transition: all 0.5s ease-in;
}

.container2:hover {
  transform: scale(1.03);
  transition: all 0.15s ease;
}

.container2 {
  color: white;
  background: skyblue;
  animation: fade_in_2 3s cubic-bezier(0.14, 0.18, 0.16, 1.02) infinite;
}
```

In the example the transition in the red box lasts a few milliseconds more than it should be adequate.
The scaling on hover feels weird. Compare with the blue box where the transition last just .15s and feels more natural.
Excessive action can be worse than taking no action.
There is a point at which the transition is just adequate and from there we should go no further.

#### Don't be too generic

Browser built-in curves like ease-in, ease, and linear, are very convenient but also too generic giving UIs a predictable and identical look.

It is a good practice to take some time to experiment and play around with cubic-bezier, making subtle but meaningful tweaks.
VS Code’s autocomplete for cubic-bezier curves is great, offering a broad range of options.
(image)
