# Requirements:

PHP >= 8.0.12
MariaDB >= 10.6

# Installation:

1. Clone the project repository using the command "git clone git@github.com:ftrucco01/clickbus_challenge.git"

2. Download and install the Symfony CLI on your system using the command "wget https://get.symfony.com/cli/installer -O - | bash"

3. Install the project dependencies using the command "composer install"

4. Create the database using the command "php bin/console doctrine:database:create"

5. Create the table in the database using the command "php bin/console doctrine:schema:update --force"

6. Start the Symfony built-in web server using the command "symfony server:start" in the root directory of the project.

Note: Make sure all requirements have been installed correctly before proceeding with the installation. Additionally, you may need to adjust the commands according to your operating system and environment configuration.