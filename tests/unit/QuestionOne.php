<?php

/**
 * Class QuestionOne
 */
class QuestionOne{

    /**
     * @var int
     */
    public $index=1;

    /**
     * @var string
     */
    public $final= '';

    /**
     * @var array
     */
    public $result = array() ;

    /**
     * @var array
     */
    public $arr = array(
        "key1"=>1,
        "key2"=>array(
            "key3"=>1,
            "key4"=>array(
                "key5"=>4
            )
        )
    );


    /**
     * @param array $att
     * @return string
     */
   public function getResult($att=array()){
        // $result = array() ;
        $lastElement = end($att);
        foreach($att as $key =>$attData){

            if(is_array($attData)){

                $val = $key ." ".$this->index;
                $this->result[]=$val;

                // echo($key ." ".$this->index."<br>");
                $this->index = $this->index+1;
                $this->getResult($attData);
            }else{
                $val = $key ." ".$this->index;

                $this->result[]=$val;
                // echo($key ." ".$this->index."<br>");
            }

            if($attData == $lastElement){
                $this->index = $this->index-1;
            }

        }

        //take a loop
        foreach($this->result as $res){
            $this->final = $this->final.$res.'\n';
        }

        // return the final result
        return $this->final;
    }

    



}


// $QuestionOne = new QuestionOne();
// $pp = $QuestionOne->getResult($QuestionOne->arr);
// var_dump($pp);

