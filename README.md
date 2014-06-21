To host this project locally ([PHP-5.4 or better required](http://us3.php.net/manual/en/features.commandline.webserver.php)), run:

    php -S localhost:8080 -t static app.php

You can also pass temporary environment values to a local webserver:

    LEGACY_DB_PASSWORD=P455W0RD php -S localhost:8080 -t static app.php

To spin up a new copy of this application on an OpenShift-powered cloud, use the [`rhc` command line tool](http://rubygems.org/gems/rhc):

    rhc app create dbtest php-5.4 --from-code=https://github.com/ryanj/php-addon-cart-test.git

Visit the resulting application url to check it's initial state.  The DB connection strings should all read: `UNAVAILABLE`

Load an add-on cartridge:

    rhc cartridge add mysql -a dbtest

Then, restart your webserver in order to read the new cart-provided DB connection strings:

    rhc app restart dbtest

Reload your web browser to see the result.

## License
This code is dedicated to the public domain to the maximum extent permitted by applicable law, pursuant to CC0 (http://creativecommons.org/publicdomain/zero/1.0/)
