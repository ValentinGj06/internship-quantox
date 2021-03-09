<div class="col-md-3">
  <h1>REGISTER</h1>
  <form method="post" action="/register">
    <div class="mb-3">
      <select class="form-select me-2" aria-label="Default select example" name="userType" aria-describedby="userTypeError">
        <option selected hidden disabled>Select Your User Type</option>
        <?= $model->userTypeTree() ?>
      </select>
      <div id="userTypeError" class="form-text">
        <?php
          if(isset($model->errors['userType'])) {
            foreach ($model->errors['userType'] as $error) {
              echo $error."</br>";
            }
          }
        ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Your Email address</label>
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
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="nameError">
      <div id="nameError" class="form-text">
        <?php
          if(isset($model->errors['name'])) {
            foreach ($model->errors['name'] as $error) {
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
    <div class="mb-3">
      <label for="passwordConfirm" class="form-label">Repeat Password</label>
      <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" aria-describedby="passwordConfirmError">
      <div id="passwordConfirmError" class="form-text">
        <?php
          if(isset($model->errors['passwordConfirm'])) {
            foreach ($model->errors['passwordConfirm'] as $error) {
              echo $error."</br>";
            }
          }
        ?>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
