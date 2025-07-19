-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `laravel_test`;

-- Create user and grant privileges
CREATE USER IF NOT EXISTS 'laravel_user'@'%' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON `laravel_test`.* TO 'laravel_user'@'%';
GRANT PROCESS ON *.* TO 'laravel_user'@'%';  -- Needed for Laravel migrations
FLUSH PRIVILEGES;