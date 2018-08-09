[![Build Status](https://travis-ci.org/negarinapp/passwords.svg?branch=master)](https://travis-ci.org/negarinapp/passwords)

# passwords
Save your sensitive data on your own server with your own privacy

## Install
(Usual Laravel application installatin)
1. Clone repository `git clone git@github.com:negarinapp/passwords.git`
2. Install dependencies `composer install`
3. Compile assets `npm run production` or `yarn run production`
4. Generate keys `php artian key:generate` and `php artisan jwt:secret`
5. (Optional) Set `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` in `.env` file
6. Create a new database and enter credentials in `.env` file
7. Migrate database `php artisan migrate`
