# WordPress Widget Boilerplate

The WordPress Widget Boilerplate serves as a foundation off of which to build your WordPress widgets using modern tools such as [Composer](https://getcomposer.org/) and an object-oriented approach all of which is documented in [this series of posts](https://tommcfarlin.com/tag/wordpress-widgets-api/).

## Features

* The Widget Boilerplate is fully-based on the WordPress [Widget API](http://codex.wordpress.org/Widgets_API)
* Uses [PHPDoc](http://en.wikipedia.org/wiki/PHPDoc) conventions for easily following the code.
* Uses Composer to handle linting and code quality tools before committing it to a repository.
* Uses a strict file organization scheme to make sure the assets are easily maintainable.

## Usage

The WordPress Widget Boilerplate is ready to activate as-is (and it includes a sample widget with a title, content, and checkbox).

1. Copy the `wordpress-widget-boilerplate` directory into your `wp-content/plugins` directory
2. Navigate to the "Plugins" dashboard page
3. Locate the menu item that reads "TODO"
4. Click on "Activate"

The purpose of having a working widget is to give you an idea as to where certain things belong. Further, the idea is to fork the existing code and make it your own for your own project.

It's organized in such a way that lends itself to unit testing, a higher level of cohesion, a lower level of coupling. It also uses features of the object-oriented paradigm to provide better organization of code base and features of PHP such as namespaces and type hinting.

## Author Information

The WordPress Widget Boilerplate was originally started and is maintained by [Tom McFarlin](https://twitter.com/tommcfarlin/).

The project is open-source and receives contributions from awesome WordPress Developers throughout the world.
