<?php
Doo::loadCore('db/DooModel');

class NoteBase extends DooModel{

    /**
     * @var int Max length is 11.
     */
    public $note_id;

    /**
     * @var varchar Max length is 250.
     */
    public $title;

    /**
     * @var text
     */
    public $full_content;

    /**
     * @var int Max length is 11.
     */
    public $user_id;

    public $_table = 'note';
    public $_primarykey = 'note_id';
    public $_fields = array('note_id','title','full_content','user_id');

    public function getVRules() {
        return array(
                'note_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'title' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'full_content' => array(
                        array( 'notnull' ),
                ),

                'user_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}