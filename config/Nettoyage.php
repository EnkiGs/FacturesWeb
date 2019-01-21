<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 18/12/18
 * Time: 11:25
 */

class Nettoyage
{
    public static function nettoyerString($s){
        return filter_var($s,FILTER_SANITIZE_STRING);
    }
}