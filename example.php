<?php

## Simple command-line script to show examples

require "./api.php";

$config = array(
    'user' => 'bigdatacashrpc',
    'pass' => '--password--',
    'host' => '127.0.0.1',
    'port' => '55413' );

// create client conncetion
$bdcash = new Bdcash( $config );


// create a new address
$address = $bdcash->get_address( 'name' );
print( "Address: $address \n" );

// list accounts in wallet
print_r( $bdcash->list_accounts() );

// get balance in wallet
print( "name: " . $bdcash->get_balance( 'name' ) );

// move money from accounts in wallet
// moves from 'name2' to account 'name'
$bdcash->move( 'name2', 'name', 10000 );

// send money externally (withdraw)
// send from account to external address
$bdcash->send( 'name', '8U6tjT9keTxpKBixzwujsX9w9AKL6J6LJe', 100 );

