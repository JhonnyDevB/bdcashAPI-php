bdcashAPI-php
=============

A basic PHP library for interacting with bigdatacash daemon - https://api.bigdatacash.org

I plan to expand upon the end points of the API.  Right now accounts and movement of coins is working.

*Notes:* You can follow along (and suggest... please do) which API endpoints I work on next.  Head to the [issues area](https://github.com/bdcashdev/bdcashAPI-php/issues) to contribute or to see what upcoming endpoints will be added to this api.


## Requirements

Requires **bigdatacashd** to already be installed and running on your local server or reachable by your server.

Get Bigdatacash source from: https://github.com/bdcashdev/BigdataCash/releases


## Usage:

Example use, see examples.php for more

```
require "./api.php";

$config = array(
    'user' => 'bdcashrpc',
    'pass' => '--password--',
    'host' => '127.0.0.1',
    'port' => '55413' );

// create client conncetion
$bdcash = new Bdcash( $config );

// create a new address
$address = $bdcash->get_address( 'name' );
print( $address );

// check balance
print( "name: " . $bdcash->get_balance( 'name' ) );

// send money externally (withdraw)
$bdcash->send( 'name', 'BU6tjT9keTxpKBixzwujsX9w9AKL6J6LJe', 100 );

```


