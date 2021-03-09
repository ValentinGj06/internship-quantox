<div class="col-md-3">
  <h1>LOGIN</h1>
  <form method="post" action="/login">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailError">
      <div id="emailError" class="form-text">
        <?php
          if(isset($model->errors['email'])) {
            foreach ($model->errors['email'] as $error) {
              echo $error."</br>";
            }
          }
        ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordError">
      <div id="passwordError" class="form-text">
        <?php
          if(isset($model->errors['password'])) {
            foreach ($model->errors['password'] as $error) {
              echo $error."</br>";
            }
          }
        ?>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>