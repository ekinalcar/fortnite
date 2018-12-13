# Fortnite
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
```
### Get Challenges
```php
$data = API::getChallenges('season7');
```
### Get Store
```php
$data = API::store('en');
```
### Get Upcoming
```php
$data = API::upcoming('en');
```
### Get News
```php
$data = API::news('br','en');
```
### Get PVE Info
```php
$data = API::pveInfo();
```
### Get Patch Notes
```php
$data = API::patchNotes();
```
### Get Server Status
```php
$data = API::news('br','en');
```
### Get Weapons
```php
$data = API::getWeapons();
```
### Get Player ID by username
```php
$data = API::getPlayerId($username);
```
### Get Player Stats
```php
$data = API::getPlayerStats($user_id,$platform);
```



