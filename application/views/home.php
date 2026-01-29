<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SatuSehat FHIR Resource Management System</title>
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
			max-width: 1000px;
			margin: 0 auto;
		}

		header {
			text-align: center;
			color: white;
			margin-bottom: 50px;
			padding-top: 40px;
		}

		header h1 {
			font-size: 2.5em;
			margin-bottom: 10px;
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
		}

		header p {
			font-size: 1.1em;
			opacity: 0.9;
		}

		.resources-grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
			gap: 30px;
			margin-bottom: 40px;
		}

		.resource-card {
			background: white;
			border-radius: 10px;
			overflow: hidden;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
			transition: all 0.3s ease;
			cursor: pointer;
		}

		.resource-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
		}

		.resource-card-header {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			padding: 30px 20px;
			text-align: center;
		}

		.resource-card-header h2 {
			font-size: 1.8em;
			margin-bottom: 10px;
		}

		.resource-card-header p {
			font-size: 0.95em;
			opacity: 0.9;
		}

		.resource-card-body {
			padding: 25px 20px;
		}

		.resource-card-body p {
			color: #666;
			margin-bottom: 20px;
			line-height: 1.6;
		}

		.resource-card-body ul {
			list-style: none;
			margin-bottom: 25px;
		}

		.resource-card-body li {
			color: #555;
			padding: 8px 0;
			padding-left: 25px;
			position: relative;
		}

		.resource-card-body li:before {
			content: "✓";
			position: absolute;
			left: 0;
			color: #667eea;
			font-weight: bold;
		}

		.resource-card-footer {
			padding: 0 20px 20px 20px;
			display: flex;
			gap: 10px;
		}

		.btn-primary,
		.btn-secondary {
			flex: 1;
			padding: 12px 20px;
			border: none;
			border-radius: 5px;
			font-size: 0.95em;
			font-weight: 600;
			cursor: pointer;
			text-decoration: none;
			display: inline-block;
			text-align: center;
			transition: all 0.3s ease;
		}

		.btn-primary {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
		}

		.btn-primary:hover {
			transform: scale(1.02);
			box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
		}

		.btn-secondary {
			background-color: #e0e0e0;
			color: #333;
		}

		.btn-secondary:hover {
			background-color: #d0d0d0;
		}

		footer {
			text-align: center;
			color: white;
			padding-top: 30px;
			border-top: 1px solid rgba(255, 255, 255, 0.1);
			opacity: 0.8;
		}

		@media (max-width: 768px) {
			header h1 {
				font-size: 1.8em;
			}

			.resources-grid {
				grid-template-columns: 1fr;
				gap: 20px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>🏥 SatuSehat FHIR Management</h1>
			<p>Sistem Manajemen Resource FHIR Indonesia</p>
		</header>

		<div class="resources-grid">
			<!-- Organization Card -->
			<div class="resource-card">
				<div class="resource-card-header">
					<h2>🏢 Organization</h2>
					<p>Manajemen Data Organisasi</p>
				</div>
				<div class="resource-card-body">
					<p>Kelola data organisasi kesehatan sesuai standar FHIR</p>
					<ul>
						<li>Buat organisasi baru</li>
						<li>Cari berdasarkan ID</li>
						<li>Cari berdasarkan nama</li>
						<li>Cari organisasi induk</li>
						<li>Update data organisasi</li>
					</ul>
				</div>
				<div class="resource-card-footer">
					<a href="/index.php/organization_form" class="btn-primary">Akses Organization</a>
				</div>
			</div>

			<!-- Patient Card -->
			<div class="resource-card">
				<div class="resource-card-header">
					<h2>👤 Patient</h2>
					<p>Manajemen Data Pasien</p>
				</div>
				<div class="resource-card-body">
					<p>Kelola data pasien kesehatan sesuai standar FHIR</p>
					<ul>
						<li>Daftar pasien baru</li>
						<li>Cari berdasarkan ID</li>
						<li>Cari berdasarkan nama</li>
						<li>Update data pasien</li>
						<li>Informasi demografis lengkap</li>
					</ul>
				</div>
				<div class="resource-card-footer">
					<a href="/index.php/patient_form" class="btn-primary">Akses Patient</a>
				</div>
			</div>

			<!-- Location Card -->
			<div class="resource-card">
				<div class="resource-card-header">
					<h2>📍 Location</h2>
					<p>Manajemen Data Lokasi</p>
				</div>
				<div class="resource-card-body">
					<p>Kelola data lokasi kesehatan sesuai standar FHIR</p>
					<ul>
						<li>Daftarkan lokasi baru</li>
						<li>Cari berdasarkan ID</li>
						<li>Cari berdasarkan nama</li>
						<li>Update data lokasi</li>
						<li>Manajemen koordinat geografis</li>
					</ul>
				</div>
				<div class="resource-card-footer">
					<a href="/index.php/location_form" class="btn-primary">Akses Location</a>
				</div>
			</div>

			<!-- Practitioner Card -->
			<div class="resource-card">
				<div class="resource-card-header">
					<h2>👨‍⚕️ Practitioner</h2>
					<p>Manajemen Data Tenaga Medis</p>
				</div>
				<div class="resource-card-body">
					<p>Kelola data tenaga medis kesehatan sesuai standar FHIR</p>
					<ul>
						<li>Daftar tenaga medis baru</li>
						<li>Cari berdasarkan ID</li>
						<li>Cari berdasarkan nama</li>
						<li>Update data tenaga medis</li>
						<li>Manajemen informasi kontak</li>
					</ul>
				</div>
				<div class="resource-card-footer">
					<a href="/index.php/practitioner_form" class="btn-primary">Akses Practitioner</a>
				</div>
			</div>
		</div>

		<footer>
			<p>&copy; 2024 SatuSehat FHIR Resource Management System. All rights reserved.</p>
		</footer>
	</div>
</body>
</html>
