<?php
Doo::loadCore('db/DooModel');

class ActivityBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $activity_id;

    /**
     * @var int Max length is 11.
     */
    public $activity_type_id;

    /**
     * @var int Max length is 11.
     */
    public $user_id;

    /**
     * @var varchar Max length is 250.
     */
    public $title;

    /**
     * @var varchar Max length is 250.
     */
    public $description;

    /**
     * @var date
     */
    public $end_date;

    /**
     * @var text
     */
    public $commentary;

    public $_table = 'activity';
    public $_primarykey = 'activity_id';
    public $_fields = array('activity_id','activity_type_id','user_id','title','description','end_date','commentary');

    public function getVRules() {
        return array(
                'activity_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'activity_type_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'title' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'end_date' => array(
                        array( 'date' ),
                        array( 'notnull' ),
                ),

                'commentary' => array(
                        array( 'notnull' ),
                )
            );
    }

}