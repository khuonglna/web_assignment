<!-- <?php include('test_process.php') ?> -->
<?php include('./controllers/exam_controller.php') ?>
<div class="container content">
    <h1 id="category"> Category</h1>
    <h2 id="difficulty"> Difficulty</h2>
    <div class="container">
        <div>
            <?php
                $examController = new ExamController();
                echo $examController->getQuestionList(2,2); 
            ?>
        </div>
    </div>
    
    
</div>