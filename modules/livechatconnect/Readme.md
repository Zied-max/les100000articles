# LiveChat module for PrestaShop

## Getting Started

As PrestoShop pay a lot of attention to their coding standards, make sure that you follow all the steps below.

### Prerequisites

Start with implementing [PrestaShop coding standards](https://devdocs.prestashop.com/1.7/development/coding-standards/) in your IDE. The repository contains the [`.editorconfig`](./.editorconfig) file however, it's not enough.

If you are using WebStorm/PHPStorm feel free to set PHP Syntax based on Symfony2 framework and use this [XML config for AirBnb JavaScript Coding Style](https://gist.github.com/mentos1386/aa18c110dc272514d592ec27e98128be).

Now clone te repository, enter it in terminal and run the following command to set up the pre-commit hook.  

```bash
$ php .githooks/install.php
```

### Installing

To install all project dependencies you need to enter [`livechatconnect`](./livechatconnect) directory and run `composer install` like below:

```bash
$ cd livechatconnect/
$ composer install
```

Congratulations! You are ready to go :tada:

**Note**: To run project you need **PHP5**. If you want to use `phpbrew` you can setup this tool (and install correct PHP version) by running script:
```bash
./setup_homebrew.sh
```
