## Laravel Query Extra
![Packagist](https://img.shields.io/packagist/dt/rakibdevs/laravel-query-extra)
[![GitHub stars](https://img.shields.io/github/stars/rakibdevs/laravel-query-extra)](https://github.com/rakibdevs/laravel-query-extra/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/rakibdevs/laravel-query-extra)](https://github.com/rakibdevs/laravel-query-extra/network)
[![GitHub issues](https://img.shields.io/github/issues/rakibdevs/laravel-query-extra)](https://github.com/rakibdevs/laravel-query-extra/issues)
[![GitHub license](https://img.shields.io/github/license/rakibdevs/laravel-query-extra)](https://github.com/rakibdevs/laravel-query-extra/blob/master/LICENSE)

 Run complex SQL queries from API requests such as update different conditional records in a single query.



## Installation

Install the package through [Composer](http://getcomposer.org).
On the command line:

```
composer require rakibdevs/laravel-query-extra

```


## Configuration 
If Laravel > 7, no need to add provider

Add the following to your `providers` array in `config/app.php`:

```php
'providers' => [
    // ...
    RakibDevs\QueryExtra\QueryExtraServiceProvider::class,
];


```

## Usage
Suppose we need to update `categories` table when cat_id 3 then cat_name will be 'Category 3' and cat_id 4   then cat_name will be 'Category 4' and so on...

To update multiple records in a single query,

```php

$arrr = array(
	    array(
		'data' => array(
		    'cat_name' => 'Category 3', // column name
	            'status' => 1 		// column name
		),
		'keyval' => 3 	// column value for whereKey() condition
	    ),
	    array(
		'data' => array(
		    'cat_name' => 'Category 2', // column name
	            'status' => 1 		// column name
		),
		'keyval' => 2 	// column value for whereKey() condition
	    ),
	    array(
	        .......................
	        .......................
	);
```

```php
use RakibDevs\QueryExtra\QueryExtra;


(new QueryExtra)
    ->table('categories') // add table name
    ->whereKey('cat_id')  // key which apply the condition
    ->bulkup($arrr);      // updated array


```

Note: 'data' of all items must have same columns.


## License

Laravel Open Weather API is licensed under [The MIT License (MIT)](LICENSE).
