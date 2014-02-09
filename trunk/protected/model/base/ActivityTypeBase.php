<?php
Doo::loadCore('db/DooModel');

class ActivityTypeBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $activity_type_id;

    /**
     * @var varchar Max length is 250.
     */
    public $activity_type_name;

    /**
     * @var text
     */
    public $activity_type_description;

    public $_table = 'activity_type';
    public $_primarykey = 'activity_type_id';
    public $_fields = array('activity_type_id','activity_type_name','activity_type_description');

    public function getVRules() {
        return array(
                'activity_type_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'activity_type_name' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'activity_type_description' => array(
                        array( 'notnull' ),
                )
            );
    }

}