<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 06/05/2017
 * Time: 21:00
 */

namespace Tests;


class Tester
{
    use \Helpers;

    public function test()
    {
        try{

            return doTester();
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}