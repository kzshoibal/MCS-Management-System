# MCS-Management-System
MCS(Multi-Purpose Cooperative Society) Management System is an e-finance website which provides financial services through over the Internet, or any network, public or private.
Features:
1. Dynamic user role management
2. Financial contribution management. a) Regular Deposit, b) Deposit on Project
3. Project Management
4. Bank account management
5. Mailing system
6. System Backup
7. Reports



How to run:
1. Open command prompt or git:Bash from the directory you want to setup this project.
2. Run Command: git clone https://github.com/kzshoibal/MCS-Management-System.git
3. Run Command: cd MCS-Management-System
4. Run Command: Composer install
5. Run Command: cp .env.example .env
6. Run Command: php artisan key:generate
7. (Optional) Open .env change the DB_DATABASE to any other database name
8. Create a database(name: Laravel or given_database_name) in the mysql server
or Run command at mysql directory: mysql>create database database_name
9. Run command: php artisan storage:link
10. Run Command: php artisan migrate --seed
11. from Command prompt, Run Command: php artisan serve

* Use Valet for Mac/Windows If the image files dont show on the website.
