<?php

/**
 * Project : bigdatacash-php library
 * Summary : A basic php library to talk with bigdatacashd
 *
 * Original Source  : https://github.com/mkaz/php-doge
 * Source  : https://github.com/wpstudio/bigdatacash-php
 *
 * Original Author  : Marcus Kazmierczak (@mkaz)
 * Author  :  Benjamin Bradley (wpstudio)
 * License : GPL vv
 */

require_once dirname(  __FILE__ ) . '/jsonRPCClient.php';

class Bdcash  {

    private $client;

    /**
     * Create client to conncet on init
     * @param $config array of parameters $host, $port, $user, $pass
     */

    function __construct( $config ) {

        $connect_string = sprintf( 'http://%s:%s@%s:%s/',
            $config['user'],
            $config['pass'],
            $config['host'],
            $config['port'] );

        // internal client to use for connection
        $this->client = new jsonRPCClient( $connect_string );
    }


    /**
     * Creates or Retrievs a bigdatacash address for a account name
     * An account is just a string used as key to identify account,
     * A bigdatacash address is return which can receive coins
     *
     * @param string $account some string used as key to account
     * @return string bigdatacash address
     */
    function get_address( $account ) {
        return $this->client->getaccountaddress( $account );
    }


    /**
     * Given a bigdatacash address returns the account name
     *
     * @param string $address bigdatacash addresss
     * @return string account name key
     */
    function get_account( $address ) {
        return $this->client->getaccount( $address );
    }


    /**
     * Create new address for account, recommended to include
     * account name for further API use.
     *
     * @param string $account account name
     * @return string bigdatacash address
     */
    function get_new_address( $account='' ) {
        return $this->client->getnewaddress( $account );
    }


    /**
     * Get list of all accounts on in this bigdatacashd wallet
     *
     * @return array strings of account => balance
     */
    function list_accounts() {
        return $this->client->listaccounts();
    }


    /**
     * Associate bigdatacash address to account string
     *
     * @param string $address bigdatacash address
     * @param string $account account string
     */
    function set_account( $address, $account ) {
        return $this->client->setaccount($address, $account);
    }


    /**
     * Get balance for given account
     *
     * @param string $account account name
     * @return float account balance
     */
    function get_balance( $account, $minconf=1 ) {
        return $this->client->getbalance( $account, $minconf );
    }


    /**
     * Get details of transaction
     */
     function get_transaction( $txid ) {
        return $this->client->gettransaction( $txid );
     }

    /**
     * Move coins from one account on wallet to another
     * Both accounts are local to this bigdatacashd instance
     *
     * @param string $account_from account moving from
     * @param string $account_to account moving to
     * @param float $amount amount of coins to move
     * @return
     */
    function move( $account_from, $account_to, $amount ) {
        return $this->client->move( $account_from, $account_to, $amount );
    }


    /**
     * Send coins to any bigdatacash Address
     *
     * @param string $account account sending coins from
     * @param string $to_address bigdatacash address sending to
     * @param float $amount amount of coins to send
     * @return string txid
     */
    function send( $account, $to_address, $amount ) {
        $txid = $this->client->sendfrom( $account, $to_address, $amount );
        return $txid;
    }

    /**
     * Pull Coin Mining Information from bigdatacash community
     *
     * Get current block number, current difficulty, current network hash rate
     */
     function get_mining_info(){
         return $this->client->getmininginfo();
     }
     function get_coin_info(){
     	return $this->client->getinfo();
     }

     /**
      * Returns the transaction history of a specific bigdatacash account
      *
      * @param string $account account pulling transaction history
      */
      function list_transactions ( $account ) {
          return $this->client->listtransactions($account);
      }

     /**
      * Validate Address
      */
      function validate_address( $address ) {
		return $this->client->validateaddress($address);
	}
}
