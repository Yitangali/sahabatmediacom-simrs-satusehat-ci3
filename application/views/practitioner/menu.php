<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Practitioner Management</title>
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
			max-width: 900px;
			margin: 0 auto;
		}

		header {
			background: white;
			padding: 20px;
			border-radius: 10px 10px 0 0;
			margin-bottom: 0;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
		}

		header h1 {
			color: #333;
			margin-bottom: 5px;
		}

		header p {
			color: #666;
			font-size: 0.95em;
		}

		.menu-grid {
			background: white;
			padding: 30px;
			border-radius: 0 0 10px 10px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
			gap: 20px;
		}

		.menu-card {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			border-radius: 8px;
			padding: 20px;
			color: white;
			text-decoration: none;
			transition: all 0.3s ease;
			cursor: pointer;
			text-align: center;
		}

		.menu-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
		}

		.menu-card h3 {
			font-size: 1.3em;
			margin-bottom: 10px;
		}

		.menu-card p {
			font-size: 0.9em;
			opacity: 0.9;
			line-height: 1.5;
		}

		.menu-back {
			background: #e0e0e0;
			color: #333;
			margin-top: 20px;
		}

		.menu-back:hover {
			background: #d0d0d0;
		}

		a {
			text-decoration: none;
			color: inherit;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>👨‍⚕️ Practitioner Management</h1>
			<p>Kelola data tenaga medis sesuai standar SatuSehat FHIR</p>
		</header>

		<div class="menu-grid">
			<a href="/index.php/practitioner_form/create" class="menu-card">
				<h3>➕ Tambah Tenaga Medis</h3>
				<p>Daftar tenaga medis baru ke sistem</p>
			</a>

			<a href="/index.php/practitioner_form/get_by_id" class="menu-card">
				<h3>🔍 Cari by ID</h3>
				<p>Cari tenaga medis berdasarkan ID</p>
			</a>

			<a href="/index.php/practitioner_form/get_by_name" class="menu-card">
				<h3>📝 Cari by Nama</h3>
				<p>Cari tenaga medis berdasarkan nama</p>
			</a>

			<a href="/index.php/practitioner_form/update" class="menu-card">
				<h3>✏️ Update Tenaga Medis</h3>
				<p>Perbarui data tenaga medis yang sudah terdaftar</p>
			</a>

			<a href="/" class="menu-card menu-back">
				<h3>🏠 Kembali ke Menu Utama</h3>
				<p>Pilih resource FHIR lainnya</p>
			</a>
		</div>
	</div>
</body>
</html>
