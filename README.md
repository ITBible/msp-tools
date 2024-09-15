## About MSP Tools

MSP Tools is a group of tooling that I've found useful that I've made for my work. This toolset is not an exact copy of what we're using at the company I work for however the ideas I've came up with for work I've wanted to share a similar set of tools with the MSP community. I will slowly add more features over time.

This group of tools is not limited to MSPs but this was the main focus. I'm sure this readme is not completely up-to-date so let me know if I've missed anything.

## Installation
### Requirements
    - PHP
    - Node
    - Composer
### Install
Navigate to your project folder, run `composer install` then run `php artisan migrate` and `npm run production` and thats all there is to it. Once you've migrated the database you can also run `php artisan msp:create-user` and create your first user account.

### Variables
`APP_LOGO_URL` defines the location of the header image via full url.

`PASTE_URL` this defines what subdomain paste lives on as this is sepearted from your normal url. (e.g. if your domain is hub.itbible.org your paste could be paste.itbible.org or paste.hub.itbible.org).

`PASTE_EXPIRE_HOURS` defines how many hours you want to keep pastes in your database.

`PASTE_REQUIRE_TICKET` allows you to turn off the requirement of the ticket number when the user submits a paste.

## The Community
IT Bible was founded as a community of people that love technology. Please visit [our website](https://itbible.org) and join our community.

## Security Vulnerabilities

If you discover a security vulnerability within MSP Tools, please send an e-mail to [WizardTux](mailto:connor@itbible.org) All security vulnerabilities will be promptly addressed.

## License

MSP Tools is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
