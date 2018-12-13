# fortnite
Fortnite API wrapper for PHP

## Installation
Include the API class into your project.You will need an API key from https://fortniteapi.com/

## USAGE
Use your API key in curl_get() function to make your first call!

### Get Leaderboards
```php
$data = API::leaderboards(100,0,'kills');
$data = API::leaderboards(100,0,'wins');
$data = API::leaderboards(100,0,'matches');
$data = API::leaderboards(100,0,'score');
