# Hold My Beer - Documentation

Docs for Laravel, Bootstrap3 and jQuery can be found at laravel.com, getbootstrap.com and jquery.com respectively.


## Requirements
For Laravel setup you'll need composer, which can be found at getcomposer.org.
For server requirements, see the Laravel documentation at laravel.com.


## Setup

### Clone
To clone the repository, run:
> git clone https://github.com/nissafors/holdmybeer.git

### Install Dependencies
Navigate to the app root directory and run:
> composer install

### Database Setup
Hold My Beer is tested to work on MySQL, but may work on other databases as well. Provide the credentials in
a file called .env in the base directory. You can use the .env.example file as a template. To create the
tables, navigate to the app root directory and run:
> php artisan migrate

### Server Setup
Point the document root to the public/ folder. If you need another setup, see Javascript Base URL below.

### Javascript Base URL
The hmb.js file in public/js/ has a global variable called URL_ROOT that should be commented out on most
setups. If you for some reason need another document root in your development setup, edit this variable
accordingly.


## The Creator
Not implemented. A roadmap is available in the README.md file.


## The Guide
Not implemented. A roadmap is available in the README.md file.


## The Taster
Not implemented. A roadmap is available in the README.md file.


## Ingredient Manager
The public/js/hmb.js file is responsible for populating tables and forms and submitting creates, updates and
deletes to the controllers. It utilizes a few markup properties documented here. For more information see
function documentation and comments in the code.

### Classes
* can-have-error             - A div nesting label and input/select/etc elements that needs to be able to show
                               validation messages. Should be combined with a data-error property.
* ingman-add-ingredient      - Elements with this class will open an #edit-[resource]-form when clicked.
* ingredient-edit-form       - See #edit-[resource]-form.
* nullable                   - AJAX populated selects that need a 'none' option.

### IDs
* edit-[resource]-form       - Form to create/edit a certain resource. It should also have a data-resource
                               and an .ingredient-edit-form.
* edit-[resource]-modal      - Main div in a modal containing a form to create/edit a certain resource.
* ingman-[resource]          - Main div in a tab body containing actions related to a resource.
* ingman-[resource]-tab      - An a element that triggers the corresponding .ingman-[resource] tab to appear
* ingman-[resource]-tbody    - An empty tbody element that will be filled with data by the updateTable()
                               function using data from getTableData(). That function must be updated
                               for each new ingman-[resource]-tbody added.

### Properties
* data-error                 - Resource that can generate a validation error message, see .can-have-error.
* data-resource              - Resource name.

### CRUD for a resource
1. Make a form with .ingredient-edit-form and a data-resource="[resource]".
2. Create a resource controller with index, store, update and destroy methods and add routes to it.
3. Add a table that has an empty tbody element with #ingman-[resource]-tbody.
4. Add switch cases in the getFormData() and getTableData() functions in the public/js/hmb.js file.
5. Add a switch case to the tab change event handler in public/js/hmb.js.

## AJAX auto-populating select
0: In the view; add a data-resource="[resource]" property (optionally with .nullable) to the select.
1: Either add a call to populateNextSelect() or add a handler that calls populateSelects() in public/js/hmb.js.


## More to come
The documentation will be continually updated as development progresses. Stay tuned!