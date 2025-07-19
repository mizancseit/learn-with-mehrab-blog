-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `laravel_test`;

-- Create user and grant privileges
CREATE USER IF NOT EXISTS 'laravel'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `laravel_test`.* TO 'laravel'@'%';
GRANT PROCESS ON *.* TO 'laravel'@'%';  -- Needed for Laravel migrations
FLUSH PRIVILEGES;
