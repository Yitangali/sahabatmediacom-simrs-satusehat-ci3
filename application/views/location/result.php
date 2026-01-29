<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>API Response</title>
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
		}

		main {
			padding: 30px;
		}

		.response-status {
			padding: 15px;
			border-radius: 5px;
			margin-bottom: 20px;
		}

		.response-success {
			background-color: #d4edda;
			color: #155724;
			border: 1px solid #c3e6cb;
		}

		.response-error {
			background-color: #f8d7da;
			color: #721c24;
			border: 1px solid #f5c6cb;
		}

		.code-block {
			background-color: #f5f5f5;
			border: 1px solid #ddd;
			border-radius: 5px;
			padding: 15px;
			overflow-x: auto;
			margin-bottom: 20px;
		}

		.code-block pre {
			margin: 0;
			font-family: 'Courier New', monospace;
			font-size: 0.9em;
			line-height: 1.5;
			color: #333;
		}

		.button-group {
			display: flex;
			gap: 10px;
			margin-top: 20px;
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
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>📊 API Response</h1>
		</header>

		<main>
			<?php if ($result): ?>
				<?php if ($result['success']): ?>
					<div class="response-status response-success">
						<strong>✓ Success!</strong> <?php echo $result['message']; ?>
						<?php if (isset($result['timestamp'])): ?>
							<br><small>Timestamp: <?php echo $result['timestamp']; ?></small>
						<?php endif; ?>
					</div>
				<?php else: ?>
					<div class="response-status response-error">
						<strong>✗ Error!</strong> <?php echo $result['message']; ?>
						<?php if (isset($result['error_code'])): ?>
							<br><small>Error Code: <?php echo $result['error_code']; ?></small>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if (isset($result['data'])): ?>
					<h2>Response Data:</h2>
					<div class="code-block">
						<pre><?php echo htmlspecialchars(json_encode($result['data'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8'); ?></pre>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="button-group">
				<a href="/index.php/location_form" class="btn btn-primary">Kembali ke Menu Location</a>
				<a href="/" class="btn btn-secondary">Kembali ke Menu Utama</a>
			</div>
		</main>
	</div>
</body>
</html>
