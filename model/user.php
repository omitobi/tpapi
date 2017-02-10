<?php
namespace Model;
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 10.08.16
 * Time: 10:51
 */
class User
{
    /**
     * @var $domain
     */
    protected $domain;
    /**
     * @var $key
     */
    protected $key;
    /**
     * Models constructor.
     * @param $domain
     */
    public function __construct($domain = null){
        $this->domain = $domain;


    }

    public function get($token, $request_token)
    {
        if($token === $request_token)
        {
            return $token;
        }
        return $this;
    }

//$APIKey = new Models\APIKey();
//$User = new Models\User();

    public function User(){

    }
    public function APIKey(){

    }
}