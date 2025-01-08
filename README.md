# laravel-tasks-api


## API documenetation

| Method   | Route          | Description                      | Body                                  |
|----------|----------------|----------------------------------|---------------------------------------|
| POST     | api/login         | Log in as user                   | `{ "email": "string", "password": "string" }` |
| POST     | api/register      | Register a new user             | `{ "name": "string", "email": "string", "password": "string" }` |
| GET      | api/tasks         | Retrieve all tasks        | N/A                                   |
| POST     | api/tasks         | Create a new task               | `{ "title": "string" }` |
| PUT      | api/tasks/{task}  | Update an existing task         | `{ "title": "string", "is_completed": "true" }` |



## Setup (using Docker)

- Clone the repository

```bash
git clone https://github.com/mrbasel/laravel-tasks-api
```

- Install dependencies

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

- Create the .env file and set the database fields as appropiate (eg. DB_DATABASE, DB_USERNAME)

```bash
cp .env.example .env
```

- Start the app

```bash
./vendor/bin/sail up
```

- Generate app key

```bash
./vendor/bin/sail artisan key:generate
```

- Run migrations

```bash

./vendor/bin/sail artisan migrate
```

- Run seeder

```bash
./vendor/bin/sail artisan db:seed
```

## Postman

To test the routes in Postman, you can import `laravel-task-api.postman_collection.json` into Postman to get the collection with all the requests