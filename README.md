# Distance
Sample repository for coding interview.

## Requirments
To make it simpler just php 7.3

please run 'composer install' command

## How to run
Make GET call
~~~
distance/{unit}/add/{first distance}/{first unit}/{second distance}/{second unit}
~~~

Example to Calculate 20 Meters + 20 Yards And output will be Yards
~~~
distance/Yards/add/20/Meters/20/Yards
~~~
(BTW if we would like to extend application to measure more than 2 params, I suggest to use parameters as json body)

BTW it is possible to run app in docker.
~~~
docker-compose up -d
~~~

## Tests

Run tests
```
$ vendor/bin/phpunit
```

Run tests with coverage (will be generated in coverage/ folder)
```
$ vendor/bin/phpunit --coverage-html=coverage
```

## Improvments

-add validation layer instead base on slim regexp values(error message is less clear)

-add more tests

-add injection for constructors, instead of inheritance the container

-improve swagger file
