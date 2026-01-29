<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Patient</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			min-height: 100vh;
			padding: 20px;
		}

		.container {
			max-width: 600px;
			margin: 0 auto;
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
			overflow: hidden;
		}

		header {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			padding: 30px 20px;
			text-align: center;
		}

		header h1 {
			font-size: 1.8em;
		}

		main {
			padding: 30px;
		}

		.form-group {
			margin-bottom: 20px;
		}

		label {
			display: block;
			margin-bottom: 8px;
			color: #333;
			font-weight: 600;
			font-size: 0.95em;
		}

		input[type="text"],
		input[type="email"],
		input[type="date"],
		select,
		textarea {
			width: 100%;
			padding: 12px;
			border: 2px solid #e0e0e0;
			border-radius: 5px;
			font-size: 1em;
			font-family: inherit;
			transition: border-color 0.3s ease;
		}

		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="date"]:focus,
		select:focus,
		textarea:focus {
			outline: none;
			border-color: #667eea;
			box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
		}

		.required::after {
			content: "*";
			color: red;
			margin-left: 5px;
		}

		.help-text {
			font-size: 0.85em;
			color: #666;
			margin-top: 5px;
		}

		.button-group {
			display: flex;
			gap: 10px;
			margin-top: 30px;
		}

		button,
		a.btn {
			flex: 1;
			padding: 12px 20px;
			border: none;
			border-radius: 5px;
			font-size: 1em;
			font-weight: 600;
			cursor: pointer;
			text-decoration: none;
			display: inline-block;
			text-align: center;
			transition: all 0.3s ease;
		}

		button[type="submit"] {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
		}

		button[type="submit"]:hover {
			transform: translateY(-2px);
			box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
		}

		a.btn {
			background-color: #e0e0e0;
			color: #333;
		}

		a.btn:hover {
			background-color: #d0d0d0;
		}

		.alert {
			padding: 15px;
			margin-bottom: 20px;
			border-radius: 5px;
		}

		.alert-danger {
			background-color: #f8d7da;
			color: #721c24;
			border: 1px solid #f5c6cb;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>✏️ Update Patient</h1>
		</header>

		<main>
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

			<form action="/index.php/patient_form/update" method="POST">

			<div class="form-group">
				<label for="patient_id" class="required">Patient ID</label>
				<input type="text" id="patient_id" name="patient_id" value="<?php echo set_value('patient_id'); ?>" 
					   placeholder="Contoh: pat-12345" required>
				<div class="help-text">Masukkan ID pasien yang ingin diperbarui</div>
			</div>

			<div class="form-group">
				<label for="given_name" class="required">Given Name (Nama Depan)</label>
				<input type="text" id="given_name" name="given_name" value="<?php echo set_value('given_name'); ?>" 
					   placeholder="Contoh: Muhammad" required>
				<div class="help-text">Masukkan nama depan pasien</div>
			</div>

			<div class="form-group">
				<label for="family_name" class="required">Family Name (Nama Keluarga)</label>
				<input type="text" id="family_name" name="family_name" value="<?php echo set_value('family_name'); ?>" 
					   placeholder="Contoh: Idris" required>
				<div class="help-text">Masukkan nama keluarga pasien</div>
			</div>

			<div class="form-group">
				<label for="birth_date" class="required">Birth Date (Tanggal Lahir)</label>
				<input type="date" id="birth_date" name="birth_date" value="<?php echo set_value('birth_date'); ?>" required>
				<div class="help-text">Format: YYYY-MM-DD</div>
			</div>

			<div class="form-group">
				<label for="gender" class="required">Gender (Jenis Kelamin)</label>
				<select id="gender" name="gender" required>
					<option value="">-- Pilih Jenis Kelamin --</option>
					<option value="male" <?php echo set_select('gender', 'male'); ?>>Laki-laki (Male)</option>
					<option value="female" <?php echo set_select('gender', 'female'); ?>>Perempuan (Female)</option>
					<option value="other" <?php echo set_select('gender', 'other'); ?>>Lainnya (Other)</option>
					<option value="unknown" <?php echo set_select('gender', 'unknown'); ?>>Tidak Diketahui (Unknown)</option>
				</select>
			</div>

			<div class="form-group">
				<label for="telecom_system">Telecom System (Opsional)</label>
				<select id="telecom_system" name="telecom_system">
					<option value="">-- Pilih Tipe Kontak --</option>
					<option value="phone" <?php echo set_select('telecom_system', 'phone'); ?>>Telepon</option>
					<option value="email" <?php echo set_select('telecom_system', 'email'); ?>>Email</option>
					<option value="fax" <?php echo set_select('telecom_system', 'fax'); ?>>Fax</option>
					<option value="sms" <?php echo set_select('telecom_system', 'sms'); ?>>SMS</option>
				</select>
			</div>

			<div class="form-group">
				<label for="telecom_value">Telecom Value (Opsional)</label>
				<input type="text" id="telecom_value" name="telecom_value" value="<?php echo set_value('telecom_value'); ?>" 
					   placeholder="Contoh: 08123456789 atau email@example.com">
				<div class="help-text">Masukkan nomor telepon atau email jika ada</div>
			</div>

			<div class="button-group">
				<button type="submit">Update Patient</button>
				<a href="/index.php/patient_form" class="btn">Kembali ke Menu</a>
			</div>

			</form>
		</main>
	</div>
</body>
</html>
