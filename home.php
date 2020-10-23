<!DOCTYPE html>
<html>

  <head>

  </head>


  <style>
    .home-container {
      display: grid;
      grid-template-rows: 10% 90%;
    }

    .greeting {
      padding-bottom: 0px;
      text-align: center;
      font-size: 50px;
      font-weight: bold;
    }

    .intro-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
    }

    .description {
      margin: auto;
      height: 60%;
      width: 95%;
      font-size: 30px;
    }

    .home-image {
      background-image: url("./images/test_img.jpg");
      margin: auto;
      height: 60%;
      width: 95%; 
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
   

  <body>
  <div class="home-container">
    <div>
      <p class="greeting">Welcome to our online English test </p>
    </div>
    <div class="intro-container"> 
    
      <div class="home-image">
      </div>

      <div class="description">
        We are here to help you learn and improve your English.<br>
        We have lots of exam with different topics and levels for you to test your English.<br>
        Click "Test" to do the exam now!
      </div>
    </div>
  </div>
  </body>
</html>