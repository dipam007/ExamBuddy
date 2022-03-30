<!-- ADD Question -->
    <!-- <div class="addQuestion">
        <h2 class="heading">Add New Question</h2>
        <form method="POST" action="addQuestion.php">
            Question : <br><input type="text" id="name" name="question"><br>
            Option1 : <br><input type="text" id="temail" name="option1"><br>
            Option2 : <br><input type="text" id="mobile" name="option2"><br>
            Option3 : <br><input type="text" id="password" name="option3"><br>
            Option4 : <br><input type="text" id="confirm-password" name="option4"><br>
            Correct Option : <br><select id="cars" name="correctOption">
                                <option></option>
                                <option value="option1">option1</option>
                                <option value="option2">option2</option>
                                <option value="option3">option3</option>
                                <option value="option4">option4</option>
                             </select><br><br>
            Question Tag : <br><input type="text" id="mobile" name="questionTag"><br><br>
            <div class="btn"> <button type="submit" id="addBtn" name="submit">Add Question</button> </div>
        </form>
    </div> -->

    <!-- div.addQuestion{
    /* position: fixed; */
    /* right: 18.5%; */
    /* top: 10%; */
    margin-left:25%;
    width: 50%;
    padding: 0 10px 20px 10px;
    border: 3px solid #73AD21;
    background-color: lightblue;
    font-family: "Trirong", serif;
} -->


<?php

if(isset($_POST['submit']))
{
    include '../config.php';

    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correctOption = $_POST['correctOption'];
    $questionTag = $_POST['questionTag'];

    if($question!=NULL && $option1!=NULL && $option2!=NULL && $option3!=NULL && $option4!=NULL && $correctOption!=NULL && $questionTag!=NULL){

        $sql = "INSERT INTO quiz (question,option1,option2,option3,option4,correctOption,questionTag) values 
                ('{$question}','{$option1}','{$option2}','{$option3}','{$option4}','{$correctOption}','{$questionTag}')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            header("location:admin.php?$msg=QuestionAddedSuccessfully");
        }
        else{
            header("location:admin.php?$msg=Error");
        }
    }
    else{
        header("location:admin.php?$msg=Do Not Enter Null data!!!");
    }

}
else{
    header("location:admin.php?$msg=Submit-Error");
}
