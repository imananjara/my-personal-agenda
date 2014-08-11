<?php
Doo::loadCore('db/DooModel');

class TaskBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $task_id;

    /**
     * @var int Max length is 11.
     */
    public $activity_id;

    /**
     * @var varchar Max length is 255.
     */
    public $title;

    /**
     * @var int Max length is 4.
     */
    public $percent_done;

    public $_table = 'task';
    public $_primarykey = 'task_id';
    public $_fields = array('task_id','activity_id','title','percent_done');

    public function getVRules() {
        return array(
                'task_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'activity_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'title' => array(
                        array( 'maxlength', 255 ),
                        array( 'notnull' ),
                ),

                'percent_done' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                )
            );
    }

}