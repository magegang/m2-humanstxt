# Add a humans.txt to your Magento

This module enables you to add a humans.txt to your Magento application.

## Setup

```
# Install the module package with Composer

composer require magegang/module-humans

# Launch standard Magento commands

bin/magento mo:en Magegang_Humans
bin/magento se:up
bin/magento ca:cl
```

## Configuration

* Go to `Store > Configuration > Magegang > Humans`
* Add your humans content
* Save the config
* Clear the config cache

## Requirements

* Magento 2
* PHP >= 8

## Maintainers

* [ronangr1](https://github.com/ronangr1)

## Support

If you have any problems using this module, please open an issue [here](https://github.com/magegang/m2-humans/issues/new).
