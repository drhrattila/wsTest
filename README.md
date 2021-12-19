## How to install & run

I suppose You have PHP8.0 and composer installed on your system.
The first step is that we have to install the necessary packages:

```
$ composer install -o 
```

If everything is installed successfully, You are able to run the tests: \
(It will generate a HTML coverage output in to the "coverage" folder) \
(Just open coverage/index.html)
```
$ ./runsTests.sh 
```

... and the script itself:
```
$ php get_fulfillable_orders.php '{"1":8,"2":4,"3":5}' 
```
