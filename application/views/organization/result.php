<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo isset($page_title) ? $page_title : 'Result'; ?></title>
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
			margin-bottom: 10px;
		}

		header p {
			font-size: 1em;
			opacity: 0.9;
		}

		main {
			padding: 30px;
		}

		.alert {
			padding: 20px;
			margin-bottom: 30px;
			border-radius: 5px;
			border-left: 5px solid;
		}

		.alert-success {
			background-color: #d4edda;
			color: #155724;
			border-left-color: #28a745;
		}

		.alert-danger {
			background-color: #f8d7da;
			color: #721c24;
			border-left-color: #dc3545;
		}

		.alert h4 {
			margin-bottom: 10px;
		}

		.response-box {
			background-color: #f8f9fa;
			border: 1px solid #dee2e6;
			border-radius: 5px;
			padding: 20px;
			margin-bottom: 20px;
			overflow-x: auto;
		}

		.response-box pre {
			margin: 0;
			font-family: 'Courier New', monospace;
			font-size: 0.9em;
			color: #333;
			white-space: pre-wrap;
			word-wrap: break-word;
		}

		.response-title {
			font-size: 1.1em;
			color: #333;
			font-weight: 600;
			margin-bottom: 10px;
		}

		.button-group {
			display: flex;
			gap: 10px;
			margin-top: 30px;
		}

		a.btn {
			flex: 1;
			padding: 12px 20px;
			border: none;
			border-radius: 5px;
			font-size: 1em;
			font-weight: 600;
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
			transform: translateY(-2px);
			box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
		}

		.btn-secondary {
			background-color: #e0e0e0;
			color: #333;
		}

		.btn-secondary:hover {
			background-color: #d0d0d0;
		}

		.info-section {
			background-color: #f0f4f8;
			border-left: 4px solid #667eea;
			padding: 15px;
			margin-bottom: 20px;
			border-radius: 3px;
		}

		.info-section strong {
			color: #333;
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
			<h1><?php echo isset($success) && $success ? '✅ Success' : '❌ Error'; ?></h1>
			<p><?php echo isset($operation) ? $operation : 'Operation Result'; ?></p>
		</header>

		<main>
			<?php if (isset($success) && $success): ?>
				<div class="alert alert-success">
					<h4>🎉 Request Berhasil Diproses!</h4>
					<p>Response dari server SatuSehat telah diterima.</p>
				</div>
			<?php else: ?>
				<div class="alert alert-danger">
					<h4>⚠️ Terjadi Kesalahan</h4>
					<p><?php echo isset($error_message) ? htmlspecialchars($error_message) : 'Unknown error occurred'; ?></p>
				</div>
			<?php endif; ?>

			<?php if (isset($org_id)): ?>
				<div class="info-section">
					<strong>Organization ID:</strong> <?php echo htmlspecialchars($org_id); ?>
				</div>
			<?php endif; ?>

			<?php if (isset($org_name)): ?>
				<div class="info-section">
					<strong>Organization Name:</strong> <?php echo htmlspecialchars($org_name); ?>
				</div>
			<?php endif; ?>

			<?php if (isset($partof_id)): ?>
				<div class="info-section">
					<strong>Parent Organization ID:</strong> <?php echo htmlspecialchars($partof_id); ?>
				</div>
			<?php endif; ?>

			<?php if (isset($result)): ?>
				<div class="response-box">
					<div class="response-title">📋 Response dari Server:</div>
					<pre><?php 
						if (is_array($result) || is_object($result)) {
							echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
						} else {
							echo htmlspecialchars($result);
						}
					?></pre>
				</div>
			<?php endif; ?>

			<div class="button-group">
				<a href="/index.php/organization_form" class="btn btn-primary">Kembali ke Menu</a>
				<a href="<?php echo $_SERVER['HTTP_REFERER'] ?? '/index.php/organization_form'; ?>" class="btn btn-secondary">Kembali ke Form</a>
			</div>
		</main>

		<footer>
			<p>&copy; 2026 SatuSehat FHIR System | Organization Management</p>
		</footer>
	</div>
</body>
</html>
