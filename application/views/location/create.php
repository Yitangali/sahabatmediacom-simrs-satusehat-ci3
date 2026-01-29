<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Location</title>
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

		textarea {
			resize: vertical;
			min-height: 100px;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>➕ Create Location</h1>
		</header>

		<main>
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

			<form action="/index.php/location_form/create" method="POST">

			<div class="form-group">
				<label for="name" class="required">Location Name</label>
				<input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>" 
					   placeholder="Contoh: Rumah Sakit Pusat" required>
				<div class="help-text">Masukkan nama lokasi</div>
			</div>

			<div class="form-group">
				<label for="status" class="required">Status</label>
				<select id="status" name="status" required>
					<option value="">-- Pilih Status --</option>
					<option value="active" <?php echo set_select('status', 'active'); ?>>Aktif</option>
					<option value="suspended" <?php echo set_select('status', 'suspended'); ?>>Ditangguhkan</option>
					<option value="inactive" <?php echo set_select('status', 'inactive'); ?>>Tidak Aktif</option>
				</select>
			</div>

			<div class="form-group">
				<label for="description">Description (Opsional)</label>
				<textarea id="description" name="description" placeholder="Deskripsi lokasi..."><?php echo set_value('description'); ?></textarea>
				<div class="help-text">Deskripsi detail tentang lokasi</div>
			</div>

			<div class="form-group">
				<label for="address">Address (Opsional)</label>
				<textarea id="address" name="address" placeholder="Jalan, No., Kota, Propinsi..."><?php echo set_value('address'); ?></textarea>
				<div class="help-text">Alamat lengkap lokasi</div>
			</div>

			<div class="form-group">
				<label for="phone">Phone (Opsional)</label>
				<input type="text" id="phone" name="phone" value="<?php echo set_value('phone'); ?>" 
					   placeholder="Contoh: +62-21-1234567">
				<div class="help-text">Nomor telepon lokasi</div>
			</div>

			<div class="button-group">
				<button type="submit">Buat Location</button>
				<a href="/index.php/location_form" class="btn">Kembali ke Menu</a>
			</div>

			</form>
		</main>
	</div>
</body>
</html>
