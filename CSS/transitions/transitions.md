# Introduction to CSS Transitions

Unlike print media, the internet is a dynamic medium. Page components are not necessarily static. They can bounce or rotate. Menus can drop down. Colors can change values.
In the real world nothing happens in an instant.
Things don’t magically appear or vanish.
Our brains perceive changes in the position of things by observing their movement.
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

When a button has a transition delay of 0.5 s, the change won’t start until half a second after the mouse hovers over it.

#### Syntax

```css
button {
  transition-delay: 3s;
}
```

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

The bottom-left corner is 0, 0; the top-right is 1, 1.

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
