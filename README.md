# Encora/Duplicate-products

Duplicate products with command line utility.

## Composer install

- `composer config repositories.reponame vcs https://github.com/vashy89/duplicate-products`
- `composer require encora/duplicate-products`

## Composer uninstall

- `composer remove encora/duplicate-products`

## Preview will be added

![command](/readme-images/command.png "command")


## Settings

- Option `no settings require`

## Known issues

- **Issues will be here .. Hopfuly not**\
  Woirk in Progress

## Developer informations
- Vashishtha Chauhan

### Install module
1. Run `composer require encora/duplicate-products`
2. Run `php bin/magento setup:upgrade`
3. Run `php bin/magento setup:di:compile`
4. Run `php bin/magento s:s:d en_US`
5. Run `php bin/magento c:c`

### Uninstall module
1. Run `composer remove encora/duplicate-products`
2. Run `php bin/magento setup:di:compile`
3. Run `php bin/magento s:s:d en_US`
4. Run `php bin/magento c:c`

### Additional developer notes
Reference URL `Make sure simple products has 'new' product attribute`
