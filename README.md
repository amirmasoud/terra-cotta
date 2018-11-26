[![Build Status](https://travis-ci.org/negarinapp/passwords.svg?branch=master)](https://travis-ci.org/negarinapp/passwords)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/negarinapp/passwords/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/negarinapp/passwords/?branch=master)

# passwords
Save your sensitive data on your own server with your own privacy

![screencapture](docs/screencapture.png)

## Install with Docker

```
# Run the app
docker-compose up -d

# Access the container
docker-compose exec app /bin/sh

# Stop & Delete everything
docker-compose down -v
```

Default admin: Email: `admin@admin.com`, Password: `123456`


## Manual Install
(Usual Laravel application installatin)
1. Clone repository `git clone git@github.com:negarinapp/passwords.git`
2. Install dependencies `composer install`
3. Compile assets `npm run production` or `yarn run production`
4. Generate keys `php artisan key:generate` and `php artisan jwt:secret`
5. (Optional) Set `GITHUB_CLIENT_ID` and `GITHUB_CLIENT_SECRET` in `.env` file to enable GitHub OAuth
6. Create a new database and enter credentials in `.env` file
7. Migrate database `php artisan migrate`
8. Create new admin: `php artisan add:admin [email] [password]`
