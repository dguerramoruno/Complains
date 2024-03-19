<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DENUNCIA</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap (puedes usar la CDN o descargarlo) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo gris claro */
        }
        .container {
            margin-top: 20px;
        }
        .custom-table {
            background-color: #ffffff; /* Fondo blanco */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra */
            font-size: 18px; /* Tamaño de fuente */
            margin-bottom: 20px;
        }
        .custom-table th, .custom-table td {
            background-color: #e9ecef; /* Fondo gris claro para celdas */
            border: 1px solid #dee2e6; /* Bordes de celdas */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .mt-20{
            margin-top:3rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Denuncia Registrada</h1>
        </div>

        <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Interno:</strong>
                            {{ $data['intern'] }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $data['type'] }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcio:</strong>
                            {{ $data['descripcio'] }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $data['archivo'] }}
                        </div>
                        <div class="form-group">
                            <strong>Testigos:</strong>
                            {{ $data['testigos'] }}
                        </div>
                        <div class="form-group mt-20">
                            <strong>Resolucion:</strong>
                            {{ $data['observaciones'] }}
                        </div>
                        <div class="form-group">
                            <strong>Gestionado:</strong>
                            {{ $data['updated'] }}
                        </div>

                    </div>
        <div class="footer">
            <p>Esta denuncia ha sido gestionada por La Casa de las Webs.</p>
        </div>
    </div>
    <!-- Agrega el enlace al archivo JS de Bootstrap (opcional, pero a menudo necesario para algunas funcionalidades de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>