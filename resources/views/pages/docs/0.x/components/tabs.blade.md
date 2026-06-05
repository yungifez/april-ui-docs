---
view: components.docs-layout
title: Tabs
description: A set of layered sections of content—known as tab panels—that are displayed one at a time.
---

<x-component-preview component="previews.tabs-demo"></x-component-preview>

## Activation mode

When the `activationMode` is set to `manual`, the tab must be clicked to be activated, and is not activated on focus.

<x-component-preview component="previews.tabs-manual-demo"></x-component-preview>

<x-publish-command :views="[
    'tabs',
    'tabs-content',
    'tabs-trigger'
]" />
