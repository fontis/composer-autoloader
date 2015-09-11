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
    "fontis/composer-autoloader": "2.0.*"
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

Notes
-----

This extension makes use of the `resource_get_tablename` event, which is the
very first event dispatched by Magento during the bootstrap process. The only
place you can have event configuration for this event is in an XML file in
app/etc, which is how this module works.

In order to make this work in command line scripts, we also put a file in
app/code/community that overrides Varien_Profiler. This file just requires the
original version, then loads the global event configuration. This is necessary
because of the differences in bootstrapping Magento manually from the command
line versus how Magento does it for web requests.

This is an improvement over v1 of this extension, where you had to manually
dispatch an event after bootstrapping Magento to ensure the composer autoloader
was required.
