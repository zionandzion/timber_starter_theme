Timber Starter Theme
====================

Starter theme using Timber and the components workflow

## Plugins

This theme automatically loads plugins that we use often, and recommends some plugins that will help with development and site performance. 

__Required:__ (must use for this theme)
- Advanced Custom Fields
- Pods
- Timber

__Optional__ (probably want these to make your life easier)
- Admin Menu Editor
- Yoast
- Contact Form 7
- W3 Total Cache*
- EWWW Image Optimizer

_* <sub>W3 Total Cache  cannot be made required because it should not be activated until theme development is complete. At launch, activate this plugin for some much-needed wordpress performance boosting.</sup>_

## Assets

This theme comes with the general structure we use nowadays, as well as a couple templates for less and javascript. 

- js/plugins/_template.js
  - Used for creating a new plugin or set of related functionality.
- less/globals/
  - Contains variables and project-specific mixins.
- less/objects/_template.less
  - Basic object template. Use when creating a new component in the project. Provides scope and media queries

## Includes

Not a ton in the includes/ folder. We use the GTM Plugin Activation class to load the plugins listed above, so we include that class in this folder. Feel free to stick any other php theme depencies you want in this folder and include them in the functions.php file. 

## Twig

Stick your twig templates, objects, and macros in /twig. Do with it what you will. Some basics are set up here but aren't required for this theme. 

## Codekit
Codekit is already configured. Install the theme, and drag the __theme__ folder into codekit. Do not drag the entire wordpress install into codekit. That will be a pain for everyone involved. Only drag the theme folder into codekit and everything will be ready to go. 
