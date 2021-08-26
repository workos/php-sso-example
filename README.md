# php-sso-example
An example PHP app demonstrating SSO with the [WorkOS PHP SDK](https://github.com/workos-inc/workos-php).

## Dependencies
Composer - [Link](https://getcomposer.org/)

## Setup
1. Clone the repo and install the dependencies by running the following:
    ```bash
    git clone git@github.com:workos-inc/php-sso-example
    composer i
    ```
1. Update lines 13 & 14 of the router.php file with your WorkOS API Key and WorkOS Client ID

1. Follow the instructions [here](https://docs.workos.com/sso/auth-flow) on setting up an SSO connection. The redirect URL for the example app if used as is will be http://localhost:8000/auth/callback.

## Running the app
Use the following command to run the app:
```bash
php -S localhost:8000 router.php
```

Once running, navigate to the following URL for a demonstration on the SSO workflow: http://localhost:8000.
