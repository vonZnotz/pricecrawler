# price crawler

## Prepare the database

Copy the Database "data.db" from "fixture" to "var" and fill it with the data you want.

## Run docker selenium chrome

    $ docker run -d -p 4444:4444 -p 5900:5900 --shm-size="2g" selenium/standalone-chrome:4.0.0-rc-1-prerelease-20210713

If you want to see what happens, use vnc like...

    $ vncviewer 127.0.0.1:5900

## import

Import the sources from sites as you configured.

    $ php bin/console app:import-sites <provider>

The importer gets all source of the webpages with stats "new" for the given provider of all, if no provider was given.