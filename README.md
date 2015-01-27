Fontis Composer Autoloader
==========================

Overview
--------

Allows Magento extensions to make use of Composer libraries using the existing
Composer autoloader, removing the need to manually install and require them in
code.

Installation
------------

1. Add the extension to your `composer.json` file

    ```
    composer require fontis/composer-autoloader
    ```

   Or edit your `composer.json` file directly and add this line to the
   "require" section:

    ```
    "fontis/composer-autoloader": "1.0.*"
    ```

2. Edit `app/etc/local.xml` and add the following XML. Modify the path to suit
   your installation, based on the location of your Composer vendor directory.

    ```
    <composer_autoloader>
        <path>{{basedir}}/vendor</path>
    </composer_autoloader>
    ````

   This should go inside `<config><global>` next to `<install>`, `<crypt>`,
   etc. The special values `{{basedir}}` and `{{libdir}}` will be replaced with
   the paths for the Magento base directory and the lib directory, respectively.

Known Issues
------------

* Does not work for scripts which call `Mage::app()` directly as the same
  events do not fire as for a frontend request. To get this working, you need
  to fire an event following the call to `Mage::app()` like so:

    ```
    Mage::app();
    Mage::dispatchEvent('add_new_autoloader');
    ```

Notes
-----

This extension makes use of the `controller_front_init_before` event dispatched
by Magento early in the bootstrap process to load the Composer autoloader (in
the `vendor/autoload.php` file).

Other events were investigated, notably `resource_get_tablename`, but these
are fired too early in the Magento startup for the event configuration to even
be loaded, thus meaning that the autoloader observer is never called.
