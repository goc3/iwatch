<?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach ?>
        </div>
        <?php endif; ?>
        
            <form action="" method="post" enctype="multipart/form-data">
        
          <div class="mb-3">
          </div>
          <label>Movie title*</label>
            <input type="text" name="title" class="form-control" value="<?php echo $title ?>" style="width: 450px">
          </div>
          <label>Movie description</label>
            <input type="text" name="description" class="form-control" value="<?php echo $description ?>" style="width: 750px">
          </div>
          <label>Movie genre*</label>
            <input type="text" name="genre" class="form-control" value="<?php echo $genre ?>" style="width: 250px">
          </div>
          <label>Release year</label>
            <input type="text" name="year" class="form-control" value="<?php echo $year ?>"style="width: 100px">
          </div>
          <label>Movie director</label>
            <input type="text" class="form-control" name="director" value="<?php echo $director ?>" class="form-control" style="width: 450px">
          </div>
          <label>Movie duration (minutes)</label>
            <input type="number" name="duration" value="<?php echo $duration ?>" class="form-control" style="width: 100px">
          </div>
          <label>Have you already watched this movie? <b>Yes/No</b></label>
            <input type="text" class="form-control" name="w_status" value="<?php echo $w_status ?>" class="form-control" style="width: 100px">
          </div>
          <br>  
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
          