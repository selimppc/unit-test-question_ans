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


/**
 * Class QuestionTwo
 */
class QuestionTwo{

    /**
     * @var Person
     */
    public $person_a ;

    /**
     * @var Person
     */
    public $person_b ;

    /**
     * @var string
     */
    public $final= '';

    /**
     * @var array
     */
    public $result = array() ;

    /**
     * @var int
     */
    public $index=1;

    /**
     * @var array
     */
    public $arr ;


    /**
     * QuestionTwo constructor.
     */
    public function __construct()
    {
        $this->person_a = new Person('User','1',null);
        $this->person_b = new Person('User','2',$this->person_a);
        $this->arr = array(
            "key1"=>1,
            "key2"=>array(
                "key3"=>1,
                "key4"=>array(
                    "key5"=>4,
                    "User" =>$this->person_b
                )
            )
        );

    }

    /**
     * @param array $att
     */
    public function getResult($att=array()){

        //start from end
        $lastElement = end($att);

        //take a look / iteration
        foreach($att as $key =>$attData)
        {
            if(is_array($attData)){
                $val = $key ." ".$this->index;
                $this->result[]=$val;
    
                echo($key ." ".$this->index."<br>");
                $this->index = $this->index+1;
                $this->getResult($attData);
            }else{
                if(is_object($attData)){
    
                    $val = $key ." ".$this->index;
                    $this->result[]=$val;

                    echo($key ." ".$this->index."<br>");
                    $this->index = $this->index+1;
    
                    if(is_object($attData->father)){
                        foreach ($attData->father as $key_1=>$fData){
                            $val = $key_1 ." ".$this->index;
                            $this->result[]=$val;
                            echo($key_1.$this->index."<br>");
                        }
    
                        $this->index = $this->index+1;
                        $this->getResult($attData->father);
                    }else{
                        foreach ($attData->father as $key_1=>$fData){
                            $val = $key_1 ." ".$this->index;
                            $this->result[]=$val;
                            echo($key_1.$this->index."<br>");
                        }
                    }
    
                }else{
                    $result[$key]=$attData;

                    $val = $key ." ".$this->index;
                    $this->result[]=$val;
                    echo($key ." ".$this->index."<br>");
                }
            }

            //check array
            if(is_array($attData)){
                if($attData == $lastElement){
                    $this->index = $this->index-1;
                }
            }
    
        }
       
    }


    /**
     * @return string
     * Final Result
     */
    public function finalResults(){
        // var_dump($this->result);
        // exit;

        foreach($this->result as $res){
            // var_dump($res);
            $this->final = $this->final.$res.'\n';
        }

        // return $this->result;
        return $this->final;
    }

}

// $QuestionTwo = new QuestionTwo();
// $QuestionTwo->getResult($QuestionTwo->arr);
// $pp = $QuestionTwo->finalResults($QuestionTwo->arr);
// var_dump($pp);




?>
