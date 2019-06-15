<?php

// use the following namespace
use PHPUnit\Framework\TestCase;


/**
 * Class SampleTest
 */
class SampleTest extends TestCase{

    /**
     * @var array
     * make an array
     */
    public $arrQ_1 = array(
        "key1"=>1,
        "key2"=>array(
            "key3"=>1,
            "key4"=>array(
                "key5"=>4
            )
        )
    );


    /**
     * Test with assertEquals for the question 1
     */
   public function testSampleQ1(){
       require 'QuestionOne.php';
       $Q_1 = new QuestionOne();
       $this->assertEquals(
           'key1 1\nkey2 1\nkey3 2\nkey4 2\nkey5 3\nkey1 1\nkey2 1\nkey3 2\nkey4 2\nkey5 3\nkey1 1\nkey2 1\nkey3 2\nkey4 2\nkey5 3\n',
           $Q_1->getResult($this->arrQ_1)
       );
    }

    /**
     * Test with assertEquals for the question 2
     */
    public function testSampleQ2(){
        require 'QuestionTwo.php';
        $Q_2 = new QuestionTwo();
        $Q_2->getResult($Q_2->arr);
        $this->assertEquals(
            'key1 1\nkey2 1\nkey3 2\nkey4 2\nkey5 3\nUser 3\nfirst_name 4\nlast_name 4\nfather 4\nfirst_name 5\nlast_name 5\nfather 5\n',
            $Q_2->finalResults()
        );
     }

    /**
     * Test with assertEquals for the question 3 and part 1
     */
     public function testSampleQ3_1(){
        require 'QuestionThree.php';
        $Q_3 = new QuestionThree();
        $this->assertEquals(
            '2',
            $Q_3->getTree(4,5)
        );
     }

    /**
     * Test with assertEquals for the question 3 and part 2
     */
     public function testSampleQ3_2(){
        // require 'QuestionThree.php';
        $Q_3 = new QuestionThree();
        $this->assertEquals(
            '1',
            $Q_3->getTree(8,7)
        );
     }


     /**
      * ALL DONE
      */


}
