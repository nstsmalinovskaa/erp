## Installation

1. Install dependencies:
```
composer install

npm install
```
2. Copy the **.env.example file** to **.env**. 

3. The project is packaged in Docker. Run:
```
docker-compose up -d
```
4. Run migrations and seed the database::
```
docker exec -it project_app  bash
php artisan migrate
php artisan db:seed
```
5. Compile and run the front-end assets:
```
npm run dev
```
6. Run the queue worker for notifications:
```
php artisan queue:work
```
The application will be available at <http://localhost:8076>.

##### Notification
When creating a product, a notification is sent to the email specified in the configuration **(config('products.email'))**.

MailPit, an email testing tool for notifications, is available at <http://localhost:8025>.

##### Permissions
The user role is specified in the settings **(config('products.role'))**.
