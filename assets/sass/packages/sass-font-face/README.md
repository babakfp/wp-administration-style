# SASS Font Face
SASS for CSS `@font-face`. Write 5 lines instead of 300 lines.
**[Demo SCSS File](https://github.com/babakfp/sass-font-face/blob/master/demo/index.scss)**

## Introduction
Instead of writing a long [CSS @font-face at-rule](https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face), you can write a simple sass mixin to do the all work for you.

## Example
```scss
@use "<path>/sass-font-face" as *;

@include font-face((
  font-family: "Sans Serif",
  suffix: eot woff2 woff ttf svg,
  weight: (
    thin 100,
    extralight 200,
    light 300,
    regular 400,
    medium 500,
    semibold 600,
    bold 700,
    extrabold 800,
    black 900,
  ),
  url: "../fonts/sans-serif-WEIGHT.SUFFIX",
  display: block,
));

```