<!DOCTYPE html>
<html>
<body>
    <div class="container h-100 content">
        <div class="row justify-content-center align-items-center h-100" >
            <div class="col-4 align-items-center">
            <div class="card shadow-lg" >
            <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Staff details</h4>
                <hr>
                <form method="post" action="">
                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-cog"></i> </span>
                    </div>
                     <input name="staffname" class="form-control" placeholder="Staffname" type="text"> 
                </div> 
                </div> 
                <?php echo "<p class='text-danger text-center h6'></p>" ?> 

                <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-key"></i> </span>
                    </div>
                    <input name="staffpass" class="form-control" placeholder="********" type="password">
                </div> 
                </div> 
                <?php echo "<p class='text-danger text-center h6'></p>" ?> 
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Add staff  </button>
                </div> 
                </form>
            </article>
            </div>
            </div>
        </div>
    </div>