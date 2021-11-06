
## About 

This is a test application for advertising campaigns built on Laravel and Vue js and built on docker using laradock. Below are the main features:

- Creatives - a module to manage campaign creatives
- Camapigns - a module to manage campaigns
- REST API - A restful api for managing campaigns


## Setup and Configuration

### project setup

- clone this repo `git clone https://github.com/arapmelly/eskimi-dashboard `
- navigate into the project directory `cd eskimi-dashboard`
- install composer dependencies ` composer install`
- setup env file `cp .env.example .env` 
- install node dependecies ` npm install `
- compile views `npm run dev`

### Laradock configuration

- Initialize laradock submodule ` git submodule init `
- fetch laradock files ` git submodule update `
- navigate to laradock folder `cd laradock`
- setup env file `cp .env.example .env`
- configure nginx port. the default is **80**. change to **8000** to avoid clashing with host port.
- configure mysql port. the default is **3306**. change to **3307** to avoid clashing with host port
- start the project containers **nginx**, **MySQL**, **redis**, **workspace** by running  ` sudo docker-compose up nginx mysql redis workspace`

### Database Configuration

- navigate into laradock folder `cd laradock`
- navigate into the mysql container. ` sudo docker-compose exec mysql bash `
- log into MySQL database ` mysql -u root -p` the default password is **secret**
- create your database ` create database eskimi; ` and exit from MySQL and from the bash

use the following in your project .env configuration
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=eskimi
DB_USERNAME=root
DB_PASSWORD=secret
```
Also add the timezone and currency setting in your .env as below.Please note this is your project .env and not laradock .env

```
TIMEZONE="Africa/Nairobi"
CURRENCY="USD"
```

### Running migrations and Test

- navigate into laradock folder ` cd laradock `
- navigate into the workspace container. ` sudo docker-compose exec workspace bash `
- run migrations `php artisan migrate `
- run tests `php artisan test `

**You can now access the project by visiting : http://localhost:8000**

## Tests


**Campaign Tests:**

    ✓ guest users cannot access campaigns list
    ✓ guest users cannot create campaigns
    ✓ auth users can view campaigns
    ✓ auth users can create campaigns

**Creatives Tests:**

    ✓ guest users cannot access creatives list
    ✓ guest users cannot create creatives
    ✓ auth users can view creatives
    ✓ auth users can create creatives

    
use the command below to run the tests.

`php artisan test`



## API Documentation

### Authentication
```
API Type: REST/JSON
HTTP Method: POST
Endpoint: /api/tokens/create 
```

#### Headers
```
Content-Type: Application/json
```

#### Request Parameters
```
{
	"email":"john.doe@gmail.com",
	"password":"jdoe@2021",
	"device":"postman"
}
```
#### Response

```
{
    "status":true,
    "data":{
        "token": "1|HzPzuMKB9lMPFtRTKjq1alRxWI2nBQgbgdJAHxnk"
    }
}
```

### List Campaigns
```
API Type: REST/JSON
HTTP Method: POST
Endpoint: /api/campaigns 
```
#### Headers
```
Content-Type: Application/json
Authorization: Bearer <token>
```


#### Response
```
{
    "status":"success",
    "data": [
        {
            "id": 1,
            "name": "Test campaign 3",
            "startDate": "2021-11-04",
            "endDate": "2021-11-06",
            "timezone": "Africa/Nairobi",
            "totalBudget": 1000,
            "dailyBudget": 100,
            "currency": "USD",
            "created_at": "2021-11-03T09:54:28.000000Z",
            "updated_at": "2021-11-03T09:54:28.000000Z",
            "creatives": [
                {
                    "id": 13,
                    "name": "Test one",
                    "fileUrl": "image/Sofb1xVmWzV52F7CPuccnxklMG6ExlQZQ1FpcM9n.png",
                    "created_at": "2021-11-02T05:25:35.000000Z",
                    "updated_at": "2021-11-02T05:25:35.000000Z",
                    "pivot": {
                        "campaign_id": 1,
                        "creative_id": 13
                    }
                }
            ]
        }
    ]
}
```

## Release Notes

Below are the release notes and versions

**Features:**

- v0.1.0 - Laradock setup and configuration
- v0.2.0 - Laravel Breeze and Inertia setup and configuration
- v0.3.0 - Creatives module
- v0.4.0 - Campaigns module
- v0.5.0 - Campaigns Creatives
- v0.6.0 - Campaigns API 
- v0.7.0 - Tests  

**Bugfixes:**
- v0.5.1 - campaign creative preview bug
- v0.6.1 - fixed upload creative bug

## License

This application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
