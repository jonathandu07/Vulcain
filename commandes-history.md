symfony new Vulcain --full

symfony check:security
npm install --global yarn
composer require symfony/security-bundle
symfony server:ca:install
to have local server in https://
composer require --dev phpstan/phpstan
composer require symfony/webpack-encore-bundle
composer require stof/doctrine-extensions-bundle
composer require vich/uploader-bundle

Build database!

composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
php bin/console doctrine:database:create

symfony console make:user User
php bin/console make:entity
php bin/console make:migration
php bin/console doctrine:migrations:migrate

Create form
composer require symfony/form
php bin/console make:form
php bin/console make:registration-form
symfony console make:auth

 CRF protection
 composer require symfony/security-csrf

yarn install
yarn watch
yarn add watch

php bin/console security:hash-password

composer require --dev symfony/maker-bundle

php bin/console make:controller BrandNewController

create controller:
symfony console make:controller ConferenceController

registrationUser -> findAll()

update the database from entity modification:
php bin/console doctrine:schema:update --force

composer require symfony/translation

composer require --dev doctrine/doctrine-fixtures-bundle
php bin/console doctrine:fixtures:load --append

faire des test unitaires
php bin/phpunit

pour avoir des informations sur quel test le résultat se rapporte
php bin/phpunit --testdox

composer require --dev liip/test-fixtures-bundle

php bin/console doctrine:database:drop --force