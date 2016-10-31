# CenterPoint Wordpress Site

### CSS/JS

This site is using SASS as a CSS Pre-Processor.  The implementation of SASS has been taken a step furthur by making use of the [SMACSS Model](https://smacss.com/) put forth by [Jonathan Snook](https://snook.ca/). The structure of this setup can be found in /wp-content/themes/centerpoint/scss/smacss.

[Compass](http://compass-style.org/) is being used for compiling the SASS files. The compass config file lives at wp-content/themes/centerpoint/scss/config.rb.  Download compass and run `compass watch` from the scss folder to continously watch for changes. Configuration, such as minification, can be controlled in the compass config file.

Bootstrap is being used only for use of the grid. The full bootstrap library is not being pulled in, only the necessary files to use the grid framework.  This is pulled in with all other sass imports in the `main.style.scss` file in the `scss` directory.

All javascript in the site is written in objects in the `main.js` file in the root `js` directory.  The objects encapsulate modular functionality and are initialized inside of a jquery ready function.  Comments in the unminified version will help developers to quickly get where they need to.  I am using [Uglify](https://github.com/mishoo/UglifyJS) for js minification, compression and variable replacement.  You can download Uglify over npm with `npm install uglify-js -g` and then compress and mangle variable with `uglifyjs main.js -c -m -o main.min.js` from `js` directory.

### Wordpress

The site uses Wordpress 4.6.1 for content management.  Wordpress is being leveraged here soley for managing content, plugins have been limited to 1 (see below) to increase security and optimization.

The only plugin on the site is [Advanced Custom Fields](https://www.advancedcustomfields.com/) by [Elliot Condon](http://www.elliotcondon.com/).  The plugin is being used to create PHP fields for a cleaner, more user-friendly handling of content.  The plugin's admin interface is not being used, but rather the ACF fields are written in the `functions.php` file.

##### Wordpress Leverage/Structure of the site:

* All page content is handled using the ACF fields mentioned above. These fields are rendered based on page template or for a specific page. Templates included are:
    * Module Builder: an example of this is the homepage.  Pages can be built out by selecting this template in the 'page attributes' section when adding a page. With this method, you can use Flexible Content fields to build out pages with any combination of the modules included in this template. In theory, you could use this flexible template to build out 100's of pages in the future with any combination of the available modules.
    * Product Modules: this template also was built with a flexible, modular approach. A handful of modules exist in this template that you can build out future product pages with.
    * The Company template is a strict template for the 'Who We Are' page.  This page was left as an admin template in the event that another page could be added in the future that could make use of this template.
    * The remaining templates are strict, page-specific wordpress templates and the ACF fields used on these are individual to that page and implemented for more user-friendly content management.
* A Custom Post Type 'Employee' is being used for managing the company bios and employee categorization.  As employees are added to this section, they will automatically be added to the 'Who we are' page and placed in team section to which category they are assigned. When adding an employee, there is also a custom field for 'Employee Order'.  Adding a numeric value to this field is a custom way to order the employees on the 'What We Do' page. Employee single pages are pulled in via Ajax in a modal (see object `AjaxModal` object in `main.js` file)  on the 'What We Do' page.
* The main menu in the header is generated dynamically from the theme's admin section and can be edited by going to `appearance -> themes -> CenterPoint -> customize -> menus -> main nav` in the Wordpress admin
* All css/js files are added properly using Wordpress `wp_enqueue_scripts`
