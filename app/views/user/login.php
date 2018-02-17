<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="row">
	<div class="col-md-6 mx-auto">
		<div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
			<h2>Login</h2>
			<form action="<?php echo URLROOT; ?>/user/login" method="post">
				<div class="form-group">
					<label for="name">roll number:</label>
					<input type="text" name="roll_no" class="form-control form-control-lg <?php echo ((!empty($data['roll_no_err'])) ? 'is-invalid' : ''); ?>" value="<?php echo $data['roll_no']; ?>">
					<span class="invalid-feedback"><?php echo $data['roll_no_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="password" class="form-control form-control-lg <?php echo ((!empty($data['password_err'])) ? 'is-invalid' : ''); ?>" value="<?php echo $data['password']; ?>">
					<span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
				</div>
				<div class="row">
					<div class="col">
						<input type="submit" value="login" class="btn btn-success btn-block">
					</div>
					<div class="col">
						<a href="<?php echo URLROOT; ?>/user/register" class="btn btn-light btn-block">dont have an account? register</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

