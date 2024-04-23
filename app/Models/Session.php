<?php

namespace App\Models;

abstract class Session {
    
    private static $session;
    
    public static function startSession(){
        Session::$session = \Config\Services::session();
    }
   
    public static function initUserSession($idUser) {
        Session::startSession();
        Session::setSessionData("idUser", $idUser);
    }

    public static function initAdminSession($idAdmin) {
        Session::startSession();
        Session::setSessionData("idAdmin", $idAdmin);
    }
    
    public static function destructSession() {
        Session::$session->destroy();
    }

    public static function verifyUserSession() : bool {
        if(!isset(Session::$session)){
            return false;
        }
        elseif(Session::getSessionData('idUser') === NULL){
            Session::destructSession();
            return false;
        }
        else{
            return true;
        }
    }

    public static function verifyAdminSession() : bool {
        if(!isset(Session::$session)){
            return false;
        }
        elseif(Session::getSessionData('idAdmin') === NULL){
            Session::destructSession();
            return false;
        }
        else{
            return true;
        }
    }

    public static function getSessionData($idChamp = ''){
        return Session::$session->get($idChamp);
    }

    public static function setSessionData($idChamp, $value = ""){
        if(is_array($idChamp)){
            Session::$session->set($idChamp);
        }
        elseif(!empty ($value)){
            Session::$session->set($idChamp, $value);
        }
        else{
            return false;
        }

    }
    
    public static function removeSessionData($idChamp){
        if(!Session::hasSessionData($idChamp)){
            Session::$session->remove($idChamp);
        }
        else{
            return false;
        }
    }
}
