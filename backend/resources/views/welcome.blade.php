<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aura Gym - Backend API</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .container {
            max-width: 800px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            color: #333;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }
        .status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #10b981;
            color: white;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .status::before {
            content: '';
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .section {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
            border-left: 4px solid #667eea;
        }
        .section h2 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #667eea;
        }
        .endpoint {
            display: flex;
            align-items: center;
            padding: 12px;
            margin: 8px 0;
            background: white;
            border-radius: 8px;
            font-family: 'Monaco', 'Courier New', monospace;
            font-size: 0.9rem;
        }
        .method {
            padding: 4px 12px;
            border-radius: 4px;
            font-weight: bold;
            margin-right: 12px;
            font-size: 0.75rem;
        }
        .get { background: #10b981; color: white; }
        .post { background: #3b82f6; color: white; }
        .put { background: #f59e0b; color: white; }
        .delete { background: #ef4444; color: white; }
        .credentials {
            background: #fef3c7;
            border-left-color: #f59e0b;
            padding: 20px;
            border-radius: 12px;
        }
        .credentials h3 {
            color: #f59e0b;
            margin-bottom: 10px;
        }
        .cred-item {
            display: flex;
            gap: 10px;
            margin: 8px 0;
            font-family: 'Monaco', monospace;
        }
        .cred-label {
            font-weight: bold;
            color: #92400e;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-top: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e5e7eb;
            color: #666;
        }
        a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏋️ Aura Gym Backend API</h1>
        <p class="subtitle">Sistema di gestione e-commerce palestra</p>
        
        <div class="status">
            Server Online
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">{{ $productsCount }}</div>
                <div class="stat-label">Prodotti</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $categoriesCount }}</div>
                <div class="stat-label">Categorie</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $ordersCount }}</div>
                <div class="stat-label">Ordini</div>
            </div>
        </div>

        <div class="section credentials">
            <h3>🔐 Credenziali Super Admin</h3>
            <div class="cred-item">
                <span class="cred-label">Email:</span>
                <span>admin@auragym.com</span>
            </div>
            <div class="cred-item">
                <span class="cred-label">Password:</span>
                <span>Admin123!</span>
            </div>
        </div>

        <div class="section">
            <h2>📡 API Endpoints Pubblici</h2>
            <div class="endpoint">
                <span class="method get">GET</span>
                <span>/api/products</span>
            </div>
            <div class="endpoint">
                <span class="method get">GET</span>
                <span>/api/categories</span>
            </div>
            <div class="endpoint">
                <span class="method post">POST</span>
                <span>/api/orders</span>
            </div>
        </div>

        <div class="section">
            <h2>🔒 API Endpoints Protetti</h2>
            <p style="color: #666; margin-bottom: 12px; font-size: 0.9rem;">
                Richiedono autenticazione token Sanctum
            </p>
            <div class="endpoint">
                <span class="method post">POST</span>
                <span>/api/products</span>
            </div>
            <div class="endpoint">
                <span class="method put">PUT</span>
                <span>/api/products/{id}</span>
            </div>
            <div class="endpoint">
                <span class="method delete">DELETE</span>
                <span>/api/products/{id}</span>
            </div>
            <div class="endpoint">
                <span class="method get">GET</span>
                <span>/api/orders</span>
            </div>
        </div>

        <div class="footer">
            <p>📚 <a href="https://github.com/MarcoMarella/Aura-Gym-Front" target="_blank">Documentazione GitHub</a></p>
            <p style="margin-top: 10px; font-size: 0.85rem;">
                Laravel {{ app()->version() }} • Aura Gym v1.0.0
            </p>
        </div>
    </div>
</body>
</html>
