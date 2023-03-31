# Data CRUD

## About project
Simple Data CRUD website using Laravel.<br/>

### Authentication 
Use console interface to authenticate. Use the following command.
```
php artisan app:login --username=username --password=password
```
Command returns the PAT (Personal access token).

### Pages

There are 3 pages in website: <br/>

1. Data list page
2. Data create page
3. Data update page

### List page
In this page every data card has expandable HTML list.
There is delete button in each card to delete data form db.

### Create page 
There is create form in this page. In "Personal access token" field paste PAT from console login command.
To "Json data" field write valid json data. Click to "Create" button to create data.

### Update page
Update form has 3 fields. To "Personal Access Token" field paste tour PAT from console login command.
To "Id" field write valid id of data. To "Code" field write valid php code which modifies "$data" object variable. For example:
```
$data->list->sublist[0] = 9;
$data->list2[2] = 12;
```


## Installation
Copy the .env.example file and paste it as .env

Edit .env configuration file

```
DB_CONNECTION=mysql
DB_HOST=db_host
DB_PORT=db_port
DB_DATABASE=database_name
DB_USERNAME=user
DB_PASSWORD=password
```
Run the following command update app cache

```
php artisan config:cache
```

Run the following command to start laravel server

```
php artisan serve
```

Also run the following command in another terminal
```
npm run dev
```

## Deployment

Nginx configuration file example

```
server {
    listen 80;

    server_name _ your_domain www.your_domain; <-- EDIT

    access_log  off;
    return 301 https://$host$request_uri;
}
server {
    listen 443 ssl;

    server_name your_domain.com www.your_domain.com; <-- EDIT
    root /path/to/project/public; <-- EDIT

    ssl_certificate /etc/ssl/your_bundle.crt; <-- EDIT
    ssl_certificate_key /etc/ssl/your_private.key; <-- EDIT

    if ($host != "your_domain") { <-- EDIT
        return 404;
    }

    index index.php;

    charset utf-8;

    location / {
        limit_req zone=one burst=5;
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
