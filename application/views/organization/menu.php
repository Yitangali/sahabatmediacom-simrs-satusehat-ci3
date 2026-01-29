<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo isset($page_title) ? $page_title : 'SatuSehat FHIR' ?></title>
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
			max-width: 1200px;
			margin: 0 auto;
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
			overflow: hidden;
		}

		header {
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			padding: 40px 20px;
			text-align: center;
		}

		header h1 {
			font-size: 2.5em;
			margin-bottom: 10px;
		}

		header p {
			font-size: 1.1em;
			opacity: 0.9;
		}

		main {
			padding: 40px 20px;
		}

		.menu-container {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
			gap: 20px;
			margin-top: 30px;
		}

		.menu-card {
			background: white;
			border: 2px solid #e0e0e0;
			border-radius: 8px;
			padding: 25px;
			text-align: center;
			transition: all 0.3s ease;
			cursor: pointer;
		}

		.menu-card:hover {
			border-color: #667eea;
			box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
			transform: translateY(-5px);
		}

		.menu-card i {
			font-size: 3em;
			margin-bottom: 15px;
			color: #667eea;
		}

		.menu-card h3 {
			color: #333;
			margin-bottom: 10px;
			font-size: 1.2em;
		}

		.menu-card p {
			color: #666;
			font-size: 0.95em;
			margin-bottom: 20px;
		}

		.menu-card a {
			display: inline-block;
			background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
			color: white;
			padding: 12px 30px;
			border-radius: 5px;
			text-decoration: none;
			font-weight: 600;
			transition: transform 0.3s ease;
		}

		.menu-card a:hover {
			transform: scale(1.05);
		}

		footer {
			background-color: #f5f5f5;
			padding: 20px;
			text-align: center;
			color: #666;
			border-top: 1px solid #e0e0e0;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>🏥 SatuSehat FHIR</h1>
			<p>Organization Management System</p>
		</header>

		<main>
			<h2 style="color: #333; margin-bottom: 20px;">Pilih Operasi yang Ingin Dilakukan</h2>

			<div class="menu-container">
				<!-- Create Organization -->
				<div class="menu-card">
					<div style="font-size: 2em; margin-bottom: 15px;">➕</div>
					<h3>Create Organization</h3>
					<p>Buat data organisasi baru di sistem SatuSehat</p>
					<a href="/index.php/organization_form/create">Mulai</a>
				</div>

				<!-- Get Organization by ID -->
				<div class="menu-card">
					<div style="font-size: 2em; margin-bottom: 15px;">🔍</div>
					<h3>Get by ID</h3>
					<p>Cari organisasi berdasarkan ID</p>
					<a href="/index.php/organization_form/get_by_id">Mulai</a>
				</div>

				<!-- Get Organization by Name -->
				<div class="menu-card">
					<div style="font-size: 2em; margin-bottom: 15px;">📝</div>
					<h3>Get by Name</h3>
					<p>Cari organisasi berdasarkan nama</p>
					<a href="/index.php/organization_form/get_by_name">Mulai</a>
				</div>

				<!-- Get Organization by PartOf -->
				<div class="menu-card">
					<div style="font-size: 2em; margin-bottom: 15px;">🏢</div>
					<h3>Get by Parent Organization</h3>
					<p>Cari organisasi berdasarkan organisasi induk</p>
					<a href="/index.php/organization_form/get_by_partof">Mulai</a>
				</div>

				<!-- Update Organization -->
				<div class="menu-card">
					<div style="font-size: 2em; margin-bottom: 15px;">✏️</div>
					<h3>Update Organization</h3>
					<p>Perbarui data organisasi yang sudah ada</p>
					<a href="/index.php/organization_form/update">Mulai</a>
				</div>
			</div>
		</main>

		<footer>
			<p>&copy; 2026 SatuSehat FHIR System | Organization Management</p>
			<p style="margin-top: 10px;">
				<a href="/" style="color: inherit; text-decoration: underline;">Kembali ke Menu Utama</a>
			</p>
		</footer>
	</div>
</body>
</html>
