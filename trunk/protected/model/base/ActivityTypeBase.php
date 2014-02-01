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
    public $name;

    /**
     * @var text
     */
    public $description;

    public $_table = 'activity_type';
    public $_primarykey = 'activity_type_id';
    public $_fields = array('activity_type_id','name','description');

    public function getVRules() {
        return array(
                'activity_type_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'notnull' ),
                )
            );
    }

}