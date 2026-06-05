---
view: components.docs-layout
title: Button
description: Displays a button.
---
<x-component-preview component="previews.button-demo"></x-component-preview>

## Button Link
The examples below also work with the button link component, which just uses an `a` tag under the hood 
<x-component-preview component="previews.button-link-component-demo"></x-component-preview>

## Variant examples
The button component comes in multiple variants

### Default
<x-component-preview component="previews.button-demo"></x-component-preview>

---
### Secondary
<x-component-preview component="previews.button-secondary-demo"></x-component-preview>

---
### Destructive
<x-component-preview component="previews.button-destructive-demo"></x-component-preview>

---
### Outline
<x-component-preview component="previews.button-outline-demo"></x-component-preview>

---
### Ghost
<x-component-preview component="previews.button-ghost-demo"></x-component-preview>

---
### Link
<x-component-preview component="previews.button-link-demo"></x-component-preview>

You can also use the none variant and style the button yourself

## Size examples
The button component comes in multiple sizes

<x-callout>Note that these examples use the font awesome icon library</x-callout>

---
### Default
<x-component-preview component="previews.button-demo"></x-component-preview>

---
### Icon
<x-component-preview component="previews.button-icon-demo"></x-component-preview>

---
### Small
<x-component-preview component="previews.button-small-demo"></x-component-preview>

---
### Large
<x-component-preview component="previews.button-large-demo"></x-component-preview>


<x-publish-command :views="['button', 'button-link']"/>
