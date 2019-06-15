<?php

/**
 * Class Person
 */
class Person{

    /**
     * @var
     */
    public $first_name;
    /**
     * @var
     */
    public $last_name;
    /**
     * @var
     */
    public $father;


    /**
     * Person constructor.
     * @param $first_name
     * @param $last_name
     * @param $father
     */
    public function __construct($first_name, $last_name, $father)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->father = $father;

    }
}




?>
