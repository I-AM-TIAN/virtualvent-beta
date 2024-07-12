<!DOCTYPE html>
<html>
<head>
    <title>Credenciales de Acceso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #004654;  /* Tono de azul oscuro */
            font-size: 24px;
            text-align: center;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .credentials {
            margin: 20px 0;
            padding: 15px;
            background-color: #e0f7f9;  /* Tono de verde azulado */
            border-left: 4px solid #004654;  /* Tono de azul oscuro */
        }
        .credentials strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Credenciales de Acceso</h1>
        <p>Su cuenta ha sido creada. Aquí están sus credenciales de acceso:</p>
        <div class="credentials">
            <p><strong>Correo Electrónico:</strong> {{ $email }}</p>
            <p><strong>Contraseña:</strong> {{ $password }}</p>
        </div>
        <p>Por favor, cambie su contraseña después de iniciar sesión por primera vez.</p>
    </div>
</body>
</html>