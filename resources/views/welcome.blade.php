<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                background-color: #070707;
                color: white;
                font-family: "Nunito", sans-serif;
            }

            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
            }

            .button-root {
                padding: 8px;
                font-size: 12px;
                border: none;
                border-radius: 50px;
                margin-right: 8px;
                cursor: pointer;
            }

            .select {
                background-color: white;
                color: #070707;
            }

            .no-select {
                background-color: #1E1E1E;
                color: #cdcdcd;
            }

            .new-product {
                padding: 10px;
                font-size: 15px;
                border: none;
                border-radius: 50px;
                cursor: pointer;
                background-color: #1DB954;
                color: #070707;
            }
            
        </style> 
        
    </head>
    <body>
        <header>
            <div>
                <button class="button-root select">Productos</button>
                <button class="button-root no-select">Articulos</button>
            </div>

            <button class="new-product">Nuevo producto</button>
        </header> 

        
    </body>
</html>
