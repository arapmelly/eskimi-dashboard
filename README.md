
## About 

This is a test application for advertising campaigns built on Laravel and Vue js and built on docker using laradock. Below are the main features:

- Creatives - a module to manage campaign creatives
- Camapigns - a module to manage campaigns
- REST API - A restful api for managing campaigns


## Setup and Configuration



## API Documentation

### Authentication

API Type: REST/JSON
HTTP Method: POST
Endpoint: /api/tokens/create 

#### Headers
Content-Type: Application/json

#### Request Parameters

{
	"email":"john.doe@gmail.com",
	"password":"jdoe@2021",
	"device":"postman"
}

#### Response

{
    "status":true,
    "data":{
        "token": "1|HzPzuMKB9lMPFtRTKjq1alRxWI2nBQgbgdJAHxnk"
    }
}


### List Campaigns

API Type: REST/JSON
HTTP Method: POST
Endpoint: /api/campaigns 

#### Headers
Content-Type: Application/json
Authorization: Bearer <token>


#### Response

{
    "status": true,
    "message":"success",
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
                },
                {
                    "id": 21,
                    "name": "Test Image",
                    "fileUrl": "http://localhost:8000/storage/images/Ljw1SwtAFzBO7a1mnBFUhkqluP7wYgCK4AjtMKNr.jpg",
                    "created_at": "2021-11-02T07:08:55.000000Z",
                    "updated_at": "2021-11-02T07:08:55.000000Z",
                    "pivot": {
                        "campaign_id": 1,
                        "creative_id": 21
                    }
                }
            ]
        }
    ]
}


## Release Notes

Below are the release notes and versions

Features:

- v0.1.0 - Laradock setup and configuration
- v0.2.0 - Laravel Breeze and Inertia setup and configuration
- v0.3.0 - Creatives module
- v0.4.0 - Campaigns module
- v0.5.0 - Campaigns Creatives
- v0.6.0 - Campaigns API 

Bugfixes:
- v0.5.1 - campaign creative preview bug

## License

This application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
