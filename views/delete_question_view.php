<!DOCTYPE html>
<html>

<head>
    <script src="views/js/delete_question_view.js"></script>
</head>

<body onload="onEnterEvent()">
  <div class="container content">
    <form id="deleteForm" class="form-group"> 
      <div class="row justify-content-md-center">
        <div class="col col-3 text-center"> 
          <h5>Category:</h5>
          <select onchange="openQuestionList()" class="custom-select custom-select-sm" name="category" id="category" required>
            <option value=""></option>
            <option value="1">Family</option>
            <option value="2">Tense</option>

          </select>
        </div>
        
        <div class="col col-3 text-center"> 
          <h5>Level:</h5>
          <select onchange="openQuestionList()" class="custom-select custom-select-sm" name="level" id="level" required>
            <option value=""></option>
            <option value="1">Easy</option>
            <option value="2">Medium</option>
            <option value="3">Hard</option>
          </select>
        </div>
      </div>
      <br>
      
      <!-- <div class="row justify-content-md-center">
        <div col col-2>
          <input type="button" id="btn" class="btn btn-primary btn-block" value="Show" onclick="getQuestionList()">
        </div>
      </div> -->

      <div id="questionForm" style="display:none;">
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th scope="col">Question</th>
              <th scope="col">Answer</th>
            </tr>
          </thead>

          <tbody id="questions">
          </tbody>
        </table>

        <input type="button" id="btn" class="btn btn-primary btn-block" value="Detele All Selected Questions" onclick="submitForm()">
      </div>
      <br>

      <div class="alert alert-danger" role="alert" id="missing" style="display:none;">
        Please fill all the information!!!
        <button type="button" class="close" aria-label="Close" onclick="closeMissingError()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="alert alert-success" role="alert" id="success" style="display:none;">
        Add successfully!
        <button type="button" class="close" aria-label="Close" onclick="closeAddSuccess()">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>

      <div class="alert alert-danger" role="alert" id="error" style="display:none;">
        Failed to add question!!!
        <button type="button" class="close" aria-label="Close" onclick="closeAddError()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <p id="demo"></p>
    </form>
  </div>
</body>
</html>