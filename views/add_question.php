<!DOCTYPE html>
<html>

<head>
    <script src="views/js/add_question_view.js"></script>
</head>

<body>
  <div class="container content">
    <form id="addForm" class="form-group" method="post" action=""> 
      <div class="row justify-content-md-center">
        <div class="col col-3 text-center"> 
          <h5>Category:</h5>
          <select onchange="openForm()" class="custom-select custom-select-sm" name="category" id="category" required>
            <option value=""></option>
            <option value="1">Tense</option>
            <option value="2">Family</option>

          </select>
        </div>
        
        <div class="col col-3 text-center"> 
          <h5>Level:</h5>
          <select onchange="openForm()" class="custom-select custom-select-sm" name="level" id="level" required>
            <option value=""></option>
            <option value="1">Easy</option>
            <option value="2">Medium</option>
            <option value="3">Hard</option>
          </select>
        </div>
      </div>
      <br><br>

      <div id="questionForm" style="display:none;">
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th scope="col">Question</th>
              <th scope="col">Answer</th>
              <th scope="col">Correct</th>
            </tr>
          </thead>

          <tbody>
              <tr>
                <td rowspan="4">
                  <input style="border:none;" type="text" id="question" name="question" placeholder="New question..."> 
                </td>
              </tr>

              <tr>
                <td>
                  <input style="border:none;" type="text" id="answer1" name="answer1" placeholder="Answer 1..."> 
                </td>
                <td class="text-center">
                  <input type="radio" value="1" name="correct" checked="checked"> 
                </td>
              </tr>

              <tr>
                <td>
                  <input style="border:none;" type="text" id="answer2" name="answer2" placeholder="Answer 2..."> 
                </td>
                <td class="text-center">
                  <input type="radio" value="2" name="correct"> 
                </td>
              </tr>

              <tr>
                <td>
                  <input style="border:none;" type="text" id="answer3" name="answer3" placeholder="Answer 3..."> 
                </td>
                <td class="text-center">
                  <input type="radio" value="3" name="correct"> 
                </td>
              </tr>
          </tbody>
        </table>

        <input type="button" class="btn btn-primary btn-block" value="Add Question" onclick="submitForm()">
      </div>
      <br>

      <div class="alert alert-danger" role="alert" id="error" style="display:none;">
        Please fill all the information!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </form>
  </div>
</body>
</html>