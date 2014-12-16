Timber Starter Theme
====================

Starter theme using Timber and the components workflow

## Plugins

This theme automatically loads plugins that we use often, and recommends some plugins that will help with development and site performance. 

__Required:__
- Advanced Custom Fields
- Pods
- Timber

__Optional__
- Admin Menu Editor
- Yoast
- Contact Form 7
- W3 Total Cache*
- EWWW Image Optimizer

_* <sub><sup>W3 Total Cache  cannot be made required because it should not be activated until theme development is complete. At launch, activate this plugin for some much-needed wordpress performance boosting.</sub></sup>_

## Assets

This theme comes with the general structure we use nowadays, as well as a couple templates for less and javascript. 

- js/plugins/_template.js
  - Used for creating a new plugin or set of related functionality.
- less/globals/
  - Contains variables and project-specific mixins.
- less/objects/_template.less
  - Basic object template. Use when creating a new component in the project. Provides scope and media queries

## includes/

Not a ton in here, we use the GTM Plugin Activation class to load the plugins listed above, so we include that class in this folder. Feel free to stick any other php theme depencies you want in this folder and include them in the functions.php file. 

## twig/

Stick your twig templates, objects, and macros in here. Do with it what you will. Some basics are set up here but aren't required to keep. 
