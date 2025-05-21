<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha del Visitante</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; }
        .campo { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center;  margin: auto; text-align: center;">
        <img src="{{ $uacmDataUri }}" alt="Icon S.A.R." style="width: 250px; padding-top: 5px;">
    </div>

    <h2>Ficha de Visitante</h2>

    <div style="display: flex; justify-content: center; align-items: center; margin: auto; text-align: center; flex-direction: column;">
        <div> <strong>Nombre:</strong> {{ $visitante->nombre . ' ' . $visitante->apellido_paterno . ' ' .$visitante->apellido_materno }}</div>
    </div>
    <br>
    @if($visitante->menor == 1)
        <div style="display: flex; justify-content: center; align-items: center;  margin: auto; text-align: center; flex-direction: column;">
            <div> <strong>Información:</strong> {{ $visitante->nombre . ' ' . $visitante->apellido_paterno . ' ' .$visitante->apellido_materno }} se encuentra acompañad@ por un menor de edad. </div>
        </div>
    @endif
    
    <br>
    
    <div style="display: flex; justify-content: center; align-items: center; margin: auto; text-align: center; flex-direction: column;">
        <div> <strong>Impresión:</strong> {{ $fecha }}</div>
    </div>
    <br>
    <div style="display: flex; justify-content: center; align-items: center; margin: auto; text-align: center; flex-direction: column;">
        <div> <img src="{{ $qrDataUri }}" alt="QR" width="150"></div>
    </div>

</body>
</html>
