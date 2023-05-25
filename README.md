# Drupal 10 module development

## Good tutorials
- General: https://www.youtube.com/playlist?list=PLtaXuX0nEZk9MKY_ClWcPkGtOEGyLTyCO
- Module/plugin development: https://www.youtube.com/playlist?list=PLhA-DDDbk7VclKyM0AhZOYmSFuT78FI44
- Module/plugin development: https://www.youtube.com/playlist?list=PLpVC00PAQQxFNDfiXn6LH1gOLllGS3hhl
- Publish: https://www.youtube.com/watch?v=bCZ8xNq-tWk

## Official Docs
- Hooks: https://api.drupal.org/api/drupal/core%21core.api.php/group/hooks/10

## Support
- Discord: https://discord.me/drupal (Or join via group ID: 66HbQ42T)
- Forum: https://www.drupal.org/forum
- Slack: https://www.drupal.org/community/contributor-guide/reference-information/talk/tools/slack > https://www.drupal.org/join-slack > drupal.slack.com

## Installation
- https://www.drupal.org/project/drupal/releases/10.0.0
- Windows: https://www.youtube.com/watch?v=0BzHYvG_zqk
- Mac: https://www.youtube.com/watch?v=rOHsSyIJ7s4
	- https://www.drupal.org/docs/develop/local-server-setup/mac-os-development-environment/howto-create-a-local-environment

`composer create-project drupal/recommended-project:10.0.0 "install-dir"`

Setup DB

- Install: http://localhost/drupal/web/core/install.php
- Backoffice: http://localhost/drupal/web/admin
- Front: http://localhost/drupal/web

# Some basic theory

## Module vs Plugin  

https://www.drupal.org/forum/support/post-installation/2016-10-12/noob-question-whats-the-difference-between-modules

## Drupal vs WP comparison

|   WP   | Drupal |
|--------|--------|
|  Post  | Article|
|  Page  |  Page  |
| Custom post type (Can be enabled via code but often done by using that plugin) | Content type (inbuilt) |

## WP

| Taxonomy | Term |
|----------|------|
| Category | eg: category1, category2, ... |
| Custom Taxonomy (eg: Subject) | eg: maths, english, ... |

## Drupal

| Taxonomy | Term |
|----------|------|
| Category | eg: category1, category2, ... |
| *Vocabulary* (eg: Subject) | eg: maths, english, ... |

## Module/Plugin Basics

Drupal CMS core files are in `web/core`  
The core Modules and their Plugins are in `web/core/modules`  
For example: see how the Block module corresponds between the code and the backoffice:  

![](/Illustrations/core_block_module.png)

However, don’t edit those core files.  

## The most simple custom module

See how the custom module corresponds between the code and the backoffice

![](/Illustrations/simple_custom_module.png)

## How published modules are installed from “Marketplace“ in real life

Take the “devel“ module for example

![](/Illustrations/marketplace_devel.png)

Copy the link

![](/Illustrations/install_module.png)

## Database

- When an article is added, the DB table `node_field_data` will get a new entry.
- Any attached file/image cause a new row to be added into tables: `file_managed` and `file_usage`. The image URL is at `file_managed.url`
- Module configurations are saved into the `config` folder, like below

![](/Illustrations/key_db_tables.png)

## Debug

![](/Illustrations/debug_options.png)

Logging is also an option: `\Drupal::logger('Type')->error('Message');`

Then you can see the log in the table at `{domain}/web/admin/reports/dblog`

## Clear cache

In Drupal, while developing modules, you need to clear this very often. Recall during setup we were encouraged to have OPCache (https://www.php.net/manual/en/book.opcache.php)

To clear all cache: Go to `{domain}/web/admin/config/development/performance` and clear the button named "Clear all caches".
