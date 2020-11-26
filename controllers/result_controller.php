<?php 
    session_start();
	require_once('../models/result.php');
    class ResultController
	{
		public function getUserResult() {
            $username = $_SESSION["username"];
            if ($username != ''){
                $resultModel = new ResultModel();
                $data = $resultModel->getUserResult($username);
                if (mysqli_num_rows($data) == 0) {
                    return NULL;
                }
                $resultList = array();
                while ($row = mysqli_fetch_assoc($data)) {
                    if ($row["s_level"] == 1){
                        $row["s_level"] = 'Easy';
                    }
                    if ($row["s_level"] == 2){
                        $row["s_level"] = 'Medium';
                    }
                    if ($row["s_level"] == 3){
                        $row["s_level"] = 'Hard';
                    }
                    $resultList[] = array (
                        "category" => $row["c_name"],
                        "level" => $row["s_level"],
                        "score" => $row["s_score"],
                        "time" => $row["s_date"]
                    );
                }
                return $resultList;
            }
        }
        
        public function getRanking() {
            $resultModel = new ResultModel();
            $data = $resultModel->getResultGroupByUser();
            $resultList = array();
            while ($row = mysqli_fetch_assoc($data)) {
                if ($row["s_level"] == 1){
                    $row["s_level"] = 'Easy';
                }
                if ($row["s_level"] == 2){
                    $row["s_level"] = 'Medium';
                }
                if ($row["s_level"] == 3){
                    $row["s_level"] = 'Hard';
                }
                $resultList[] = array (
                    "username" => $row["username"],
                    "level" => $row["s_level"],
                    "score" => $row["s_score"],
                );
            }
            return $resultList;
        }
	} 
?>

