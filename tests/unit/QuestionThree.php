<?php

/**
 * Class QuestionThree
 */
class QuestionThree{
    /**
     * @var array
     */
    public $tree = array();

    /**
     * @var int
     */
    public $nodes = 9;

    /**
     * @var array
     */
    public $common1= array();

    /**
     * @var array
     */
    public $common2= array();

    /**
     * QuestionThree constructor.
     * Set all node here
     */
    public function __construct()
    {
        $this->tree[1][2] = 1;
        $this->tree[1][3] = 1;
        $this->tree[2][4] = 1;
        $this->tree[2][5] = 1;
        $this->tree[3][6] = 1;
        $this->tree[3][7] = 1;
        $this->tree[4][8] = 1;
        $this->tree[4][9] = 1;
    }


    /**
     * @param $node1
     * @param $node2
     * @return array|int
     */
    public function  getTree($node1, $node2){
        if( isset($this->tree[$node1][$node2]) && $this->tree[$node1][$node2] == 1){
            return $node1;
        }elseif(isset($this->tree[$node2][$node1]) && $this->tree[$node2][$node1] == 1){
            return $node2;
        }else{
            $prnt_1 = $this->getCommonParent($node1, $node2);
            return $prnt_1;


        }
    }

    /**
     * @param $node1
     * @param $node2
     * @return array|int
     */
    public function getCommonParent($node1, $node2){

            $prnt_1 = $this->getParent($node1);
            $prnt_2 = $this->getParent($node2);

            if($prnt_1 == $prnt_2){
                return $prnt_1;
            }else{
                 $this->getParents($node1,1);
                $this->getParents($node2);
                 $result = array_intersect($this->common1,$this->common2);
                 if(count($result)>0){

                     foreach ($result as $data){


                         if(!is_null($data)){
                             return $data;
                         }

                     }
                 }
                 return $result;
            }
    }

    /**
     * @param $node
     * @param null $pr_1
     */
    public function getParents($node, $pr_1 = null){
        $arr = array();

        if(!is_null($pr_1)){
            for($i=1;$i<=$this->nodes;$i++){
                if(isset($this->tree[$i][$node]) && $this->tree[$i][$node] == 1){
                    $this->common1[] = $i;
                    $this->getParents($i,1);
                }else{
                    continue;
                }

            }
        }else{

            for($i=1;$i<=$this->nodes;$i++){
                if(isset($this->tree[$i][$node]) && $this->tree[$i][$node] == 1){
                    $this->common2[] = $i;
                    $this->getParents($i);
                }else{
                    continue;
                }

            }

        }



    }


    /**
     * @param $parent
     * @return int
     */
    public function getParent($parent){
        for($i=1;$i<=$this->nodes;$i++){
            if( isset($this->tree[$i][$parent]) && $this->tree[$i][$parent] == 1){
                return $i;
            }else{
//                $this->tree[$i][$parent];
            }

        }
    }
}



$obj = new QuestionThree();

$val = $obj->getTree(4,5);


echo $val;





?>
