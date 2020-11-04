<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

  <div class="container">
    <form>
      <div class="row justify-content-md-center">
        <div class="col col-3 text-center"> 
          <h5>Category:</h5>
          <select class="custom-select custom-select-sm" name="category" id="category" required>
            <option value=""></option>
            <option value="khoi">Khoi</option>
            <option value="khuong">Khuong</option>
            <option value="quyen">Quyen</option>
            <option value="thu">Thu</option>
            <option value="ta">ta</option>
          </select>
        </div>
        
        <div class="col col-3 text-center"> 
          <h5>Difficulty:</h5>
          <select class="custom-select custom-select-sm" name="difficulty" id="difficulty">
            <option value=""></option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
          </select>
        </div>
      </div>

      <br>

      <div class="row justify-content-md-center">
        <input type="submit" value="Edit">
      </div>
    </form>

    
  </div>
</html>