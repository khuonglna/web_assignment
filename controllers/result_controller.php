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
                $categoryList = array();
                $data2 = $resultModel -> getCategory();
                while ($row = mysqli_fetch_assoc($data2)) {
                    $categoryList[] = $row['c_name'];
                }
                return [$resultList, $categoryList];
            }
        }

        
        public function getRanking() {
            $resultModel = new ResultModel();
            $data = $resultModel->getResultGroupByUser();
            $resultList = array();

            // ALL - TIME
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
                $resultList['all_time'][] = array (
                    "username" => $row["username"],
                    "level" => $row["s_level"],
                    "score" => $row["s_score"],
                );
            }

            // LAST MONTH 
            $data1 = $resultModel->getResultLastMonth();
            while ($row = mysqli_fetch_assoc($data1)) {
                if ($row["s_level"] == 1){
                    $row["s_level"] = 'Easy';
                }
                if ($row["s_level"] == 2){
                    $row["s_level"] = 'Medium';
                }
                if ($row["s_level"] == 3){
                    $row["s_level"] = 'Hard';
                }
                $resultList['last_month'][] = array (
                    "username" => $row["username"],
                    "level" => $row["s_level"],
                    "score" => $row["s_score"],
                );
            }

            // LAST MONTH 
            $data1 = $resultModel->getResultLastWeek();
            while ($row = mysqli_fetch_assoc($data1)) {
                if ($row["s_level"] == 1){
                    $row["s_level"] = 'Easy';
                }
                if ($row["s_level"] == 2){
                    $row["s_level"] = 'Medium';
                }
                if ($row["s_level"] == 3){
                    $row["s_level"] = 'Hard';
                }
                $resultList['last_week'][] = array (
                    "username" => $row["username"],
                    "level" => $row["s_level"],
                    "score" => $row["s_score"],
                );
            }

            // HARD LEVEL 
            $data2 = $resultModel->getLevelResult(3);
            while ($row = mysqli_fetch_assoc($data2)) {
                $resultList['hard'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // MED LEVEL 
            $data3 = $resultModel->getLevelResult(2);
            while ($row = mysqli_fetch_assoc($data3)) {
                $resultList['medium'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // EASY LEVEL 
            $data4 = $resultModel->getLevelResult(1);
            while ($row = mysqli_fetch_assoc($data4)) {
                $resultList['easy'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // FAMILY
            $data5 = $resultModel->getCategoryResult('Family');
            while ($row = mysqli_fetch_assoc($data5)) {
                $resultList['Family'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // TENSE 
            $data6 = $resultModel->getCategoryResult('Tense');
            while ($row = mysqli_fetch_assoc($data6)) {
                $resultList['Tense'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // Animal
            $data7 = $resultModel->getCategoryResult('Animal');
            while ($row = mysqli_fetch_assoc($data7)) {
                $resultList['Animal'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // Country 
            $data8 = $resultModel->getCategoryResult('Country');
            while ($row = mysqli_fetch_assoc($data8)) {
                $resultList['Country'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            // Science
            $data9 = $resultModel->getCategoryResult('Science');
            while ($row = mysqli_fetch_assoc($data9)) {
                $resultList['Science'][] = array (
                    "username" => $row["username"],
                    "score" => $row["total_score"],
                );
            }

            return $resultList;
        }
	} 
?>

