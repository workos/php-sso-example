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
1. The example app looks for the following environment variables:
    - WORKOS_API_KEY - The WorkOS API key can be found [here](https://dashboard.workos.com/api-keys).
    - WORKOS_PROJECT_ID - The WorkOS Project ID is specific to SSO and can be found [here](https://dashboard.workos.com/sso/configuration)

1. Follow the instructions [here](https://docs.workos.com/sso/auth-flow) on setting up an SSO connection. The redirect URL for the example app if used as is will be http://localhost:8000/auth/callback.

## Running the app
Use the following command to run the app:
```bash
php -S localhost:8000 router.php
```

Once running, navigate to the following URL for a demonstration on the SSO workflow: http://localhost:8000.