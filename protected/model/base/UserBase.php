<?php
Doo::loadCore('db/DooModel');

class UserBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $user_id;

    /**
     * @var varchar Max length is 250.
     */
    public $login;

    /**
     * @var varchar Max length is 250.
     */
    public $password;

    /**
     * @var varchar Max length is 250.
     */
    public $firstname;

    /**
     * @var varchar Max length is 250.
     */
    public $lastname;

    /**
     * @var varchar Max length is 250.
     */
    public $email;

    /**
     * @var tinyint Max length is 1.
     */
    public $is_admin;

    public $_table = 'user';
    public $_primarykey = 'user_id';
    public $_fields = array('user_id','login','password','firstname','lastname','email','is_admin');

    public function getVRules() {
        return array(
                'user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'login' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'password' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'firstname' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'lastname' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'email' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'is_admin' => array(
                        array( 'integer' ),
                        array( 'maxlength', 1 ),
                        array( 'notnull' ),
                )
            );
    }

}