# How to use this app

1. **Install dependencies**  
   `composer u` - for php modules  
   `npm i` - for js modules
2. **Run docker**  
   `docker compose build` - build  
   `docker compose up -d` - up services
3. **Go to docker fpm container**  
   `docker ps | grep laravel_task_fpm`  
   copy id (first column)  
   `docker exec -it <id> bash` - go to php fpm container  
   `cd /var/www/laravel-code-example`
4. **Generate laravel key**  
   `php artisan key:generate`
5. **Migrate**  
   `php artisan migrate`
6. **Seed db**  
   `php artisan db:seed`
7. App is available on http://localhost:8098

