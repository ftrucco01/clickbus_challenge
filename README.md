#  Code challenge for ClickBus company

Objective: Create a currency converter using a public API that converts 1 USD or PLN to MXN, EUR, SGD, RUB, CAD, JPY, and GBP. The API used is from https://rapidapi.com/apininjas/api/currency-converter-by-api-ninjas (registration required).

Requirements:

- A form on the first screen where the user can select the base currency and click "Convert"

- Upon clicking "Convert", asynchronous API requests should be made for each currency

- The results of each conversion should be listed on the screen and saved to a database (minimum fields: amount, from_currency, to_currency, created_at)

- Additional screen with conversion history (authentication not required)

- Functional testing for the conversion history screen

- Technologies used: php Symfony, jquery, bootstrap, mariadb/mysql

- Public repository on GitHub with precise instructions on how to run the project locally. The project should load correctly after a clean installation.

# Requirements:

1. PHP >= 8.0.12
2. MariaDB >= 10.6

# Installation:

1. Clone the project repository using the command "git clone git@github.com:ftrucco01/clickbus_challenge.git"

2. Download and install the Symfony CLI on your system using the command "wget https://get.symfony.com/cli/installer -O - | bash"

3. Install the project dependencies using the command "composer install"

4. Create the database using the command "php bin/console doctrine:database:create"

5. Create the table in the database using the command "php bin/console doctrine:schema:update --force"

6. Start the Symfony built-in web server using the command "symfony server:start" in the root directory of the project.

Note: Make sure all requirements have been installed correctly before proceeding with the installation. Additionally, you may need to adjust the commands according to your operating system and environment configuration.

# Video demo

Video demo available: https://github.com/ftrucco01/clickbus_challenge/blob/main/public/video_demo.webm
