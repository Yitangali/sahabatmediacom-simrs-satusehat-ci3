<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Organization</title>
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
		input[type="number"],
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
		input[type="number"]:focus,
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

		.error {
			color: #dc3545;
			font-size: 0.85em;
			margin-top: 5px;
		}

		.form-row {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 15px;
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
			<h1>➕ Create Organization</h1>
		</header>

		<main>
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

		<form action="/index.php/organization_form/create" method="POST">
				<input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>" 
					   placeholder="Contoh: RS Mitra Sehat" required>
				<div class="help-text">Nama organisasi yang akan dibuat</div>
			</div>

			<div class="form-group">
				<label for="type_coding" class="required">Organization Type</label>
				<select id="type_coding" name="type_coding" required>
					<option value="">-- Pilih Tipe Organisasi --</option>
					<option value="prov">Provider/Rumah Sakit</option>
					<option value="dept">Department</option>
					<option value="team">Team</option>
					<option value="govt">Government</option>
					<option value="edu">Education</option>
					<option value="other">Other</option>
				</select>
				<div class="help-text">Tipe organisasi berdasarkan HL7 FHIR standard</div>
			</div>

			<!-- Optional Contact Information -->
			<h3 style="color: #333; margin: 30px 0 20px 0;">Informasi Kontak (Opsional)</h3>

			<div class="form-group">
				<label for="telecom_system">Telecom System</label>
				<select id="telecom_system" name="telecom_system">
					<option value="">-- Tidak Ada --</option>
					<option value="phone">Phone</option>
					<option value="fax">Fax</option>
					<option value="email">Email</option>
					<option value="pager">Pager</option>
					<option value="url">URL</option>
					<option value="sms">SMS</option>
					<option value="other">Other</option>
				</select>
				<div class="help-text">Tipe saluran komunikasi</div>
			</div>

			<div class="form-group">
				<label for="telecom_value">Telecom Value</label>
				<input type="text" id="telecom_value" name="telecom_value" 
					   placeholder="Contoh: +62-21-123456 atau email@example.com">
				<div class="help-text">Nilai kontak sesuai dengan tipe yang dipilih</div>
			</div>

			<!-- Optional Address -->
			<h3 style="color: #333; margin: 30px 0 20px 0;">Alamat (Opsional)</h3>

			<div class="form-group">
				<label for="address_line">Address Line</label>
				<input type="text" id="address_line" name="address_line" 
					   placeholder="Contoh: Jl. Merdeka No. 123">
			</div>

			<div class="form-row">
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" id="city" name="city" placeholder="Contoh: Jakarta">
				</div>
				<div class="form-group">
					<label for="postal_code">Postal Code</label>
					<input type="text" id="postal_code" name="postal_code" placeholder="Contoh: 12345">
				</div>
			</div>

			<!-- Buttons -->
			<div class="button-group">
				<button type="submit">Buat Organization</button>
				<a href="/index.php/organization_form" class="btn">Kembali ke Menu</a>
			</div>

		</form>
		</main>
	</div>
</body>
</html>
