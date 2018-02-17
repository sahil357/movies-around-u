<?php require APPROOT . '/views/inc/header.php'; ?>
<br>
<div class="row">
	<div class="col-md-6 mx-auto">
		<div class="card card-body bg-light mt-5">
			<h2>Create An Account</h2>
			<p>Please fill out this form to register with us</p>
			<form action="<?php echo URLROOT; ?>/user/register" method="post">
				<div class="form-group">
					<label for="fname">Fname: <sup>*</sup></label>
					<input type="text" name="fname" class="form-control form-control-lg <?php echo(!empty($data['fname_err'])) ? ('is-invalid' ): (''); ?>" value="<?php echo $data['fname']; ?>">
					<span class="invalid-feedback"><?php echo $data['fname_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="lname">lname: <sup>*</sup></label>
					<input type="text" name="lname" class="form-control form-control-lg <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>">
					<span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="gender">gender: <sup>*</sup></label>
					<input type="text" name="gender" class="form-control form-control-lg <?php echo (!empty($data['gender_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['gender']; ?>">
					<span class="invalid-feedback"><?php echo $data['gender_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="roll_no">roll number: <sup>*</sup></label>
					<input type="text" name="roll_no" class="form-control form-control-lg <?php echo (!empty($data['roll_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['roll_no']; ?>">
					<span class="invalid-feedback"><?php echo $data['roll_no_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="hostel">Hostel: <sup>*</sup></label>
					<input type="text" name="hostel_name" class="form-control form-control-lg <?php echo (!empty($data['hostel_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['hostel_name']; ?>">
					<label for="hostel_block">Block: <sup>*</sup></label>
					<input type="text" name="hostel_block" class="form-control form-control-lg <?php echo (!empty($data['hostel_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['hostel_block']; ?>">
					<label for="room_no">Room number: <sup>*</sup></label>
					<input type="interger" name="room_no" class="form-control form-control-lg <?php echo (!empty($data['hostel_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['room_no']; ?>">
					<span class="invalid-feedback"><?php echo $data['hostel_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="email">Email: <sup>*</sup></label>
					<input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
					<span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="password">Password: <sup>*</sup></label>
					<input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
					<span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
				</div>
				<div class="form-group">
					<label for="password">Confirm Password: <sup>*</sup></label>
					<input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
					<span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
				</div>

				<div class="row">
					<div class="col">
						<input type="submit" value="Register" class="btn btn-success btn-block">
					</div>
					<div class="col">
						<a href="<?php echo URLROOT; ?>/user/login" class="btn btn-light btn-block">Have an account? Login</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>