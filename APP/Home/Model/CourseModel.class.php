<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/24
 * Time: 15:26
 */
namespace Home\Model;
use \Think\Model;
class CourseModel extends Model
{
    public function checkAnswer(){
        session_start();
        $stu_id=$_SESSION['stu_id'];
        $id=$_GET["id"];
        $type=$_GET["type"];
        $answer=$_GET['answer'];
        $opp=$_GET["opportunity"];
        if($id!=null){
            $contition['id']=$id;
            switch($type){
                case 1:{
                    $solve=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanswer");
                    if($solve!=null&&$answer!=null){
                        if($answer==$solve[0]){
                            $analy=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanalysis");
                            $result=$this->updateStuAnswer($opp,$id,0,$stu_id);
                            return array(
                                "status"=>0,
                                "msg"=>"回答正确",
                                "analy"=>$analy
                            );
                        }elseif($opp==1){
                            $analy=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanalysis");
                            $result=$this->updateStuAnswer($opp-1,$id,1,$stu_id);
                            return array(
                                "status"=>1,
                                "msg"=>"回答错误",
                                "analy"=>$analy
                            );
                        }else{
                            return array(
                                "status"=>2,
                                "msg"=>"回答错误",
                            );
                        }
                    }
                }
                case 2:{
                    $solve=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanswer");
                    $answer1=implode("-",$answer);
                    if($solve!=null&&$answer!=null){
                        if($answer1==$solve){
                            $analy=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanalysis");
                            $result=$this->updateStuAnswer($opp,$id,0,$stu_id);
                            return array(
                                "status"=>0,
                                "msg"=>"回答正确",
                                "analy"=>$analy
                            );
                        }elseif($opp==1){
                            $analy=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanalysis");
                            $result=$this->updateStuAnswer($opp-1,$id,1,$stu_id);
                            return array(
                                "status"=>1,
                                "msg"=>"回答错误",
                                "analy"=>$analy
                            );
                        }if($opp==2){
                            return array(
                                "status"=>2,
                                "msg"=>"回答错误",
                            );
                        }
                    }
                }
                case 3:{
                    $solve=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvoptions");
                    if($solve!=null){
                        $solves=explode("///",$solve);
                        if($solves!=null&&$answer!=null){
                            $size=count($answer);
                            $res=array();
                            for($i=0;$i<$size;$i++){
                                $index=strpos($solves[$i],$answer[$i]);
                                if($index!==false){
                                  $res[$i]=0;
                                }else{
                                    $res[$i]=1;
                                }
                            }
                            $size1=count($res);
                            for($j=0;$j<$size1;$j++){
                                if($res[$j]==1){
                                    if($opp==1){
                                        $analy=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanalysis");
                                        $result=$this->updateStuAnswer($opp-1,$id,1,$stu_id);
                                        return array(
                                            "status"=>1,
                                            "msg"=>"回答错误",
                                            "analy"=>$analy
                                        );
                                    }else{
                                        return array(
                                            "status"=>2,
                                            "msg"=>"回答错误",
                                        );
                                    }
                                }
                            }
                            if($j==$size1){
                                $analy=$this->table(C('DB_PREFIX').'ctest')->where($contition)->getField("cvanalysis");
                                $result=$this->updateStuAnswer($opp,$id,0,$stu_id);
                                var_dump($result);
                                return array(
                                    "status"=>0,
                                    "msg"=>"回答正确",
                                    "analy"=>$analy
                                );
                            }
                        }
                    }

                }
            }
        }

    }
    public function updateStuAnswer($account,$ctest_id,$flag,$stu_id){
        return $this->execute("insert into wike_stu_ctest(stu_id,flag,ctest_id,account) VALUES( '$stu_id',$flag,$ctest_id,$account)");
    }
    public function getTimePoint($id,$chid,$cid){
        if($id!=null){
            session_start();
            $stu_id=$_SESSION['stu_id'];
            $contition['cvideo_id']=$id;
            $status=$this->table(C('DB_PREFIX')."stu_chapter")->where("cvideo_id=$id")->getField("status");
            $hasStatus=false;
            if(!isset($status)){
                $this->execute("insert into wike_stu_chapter(stu_id,status,chid,cid,cvideo_id) values('$stu_id',1,$chid,$cid,$id)");
            }
            $result=$this->table(C('DB_PREFIX').'ctest')->where($contition)->select();
            if($result!=null){
                return array(
                    "status"=>0,
                    "data"=>$result
                );
            }else{
                return array(
                  "status"=>1
                );
            }
        }else{
            return array(
                "status"=>1
            );
        }
    }

}