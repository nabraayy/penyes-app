


    

    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sorteo del Carafal</title>
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">
       
 

        
<style>
            body {
                font-family: 'Caveat', sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                background-image: url('https://img.freepik.com/vector-premium/patron-costuras-ilustracion-toros-color-negro-estilo-arte-linea-sobre-fondo-blanco_460232-1948.jpg');
            }
            .nav-links {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
                gap: 20px;
                justify-content: center;
            }
    
            .nav-item {
                display: inline;
            }
    
            .nav-link {
                text-decoration: none;
                color: #000000;
                font-weight: bold;
                font-size: 16px;
            }
    
            .nav-link:hover {
                color: #A9A9A9;
            }
            .header {
                display: flex;
                color:white;
                align-items: center;
                justify-content: space-between;
                background-color:rgb(113, 0, 0);
                background-size: contain; 
                padding: 10px 20px;
                border-bottom: 1px solid #050505;
            }
    
            .header .logo img {
                max-width: 100px; 
                max-height: 100px; 
                border-radius: 10%; 
                box-shadow: 0 8px 12px rgba(4, 3, 3, 0.1); 
                transition: transform 0.3s ease; 
            }
    
            .header h1 {
                font-size: 24px;
                font-weight: 500;
            }
            .navbar {
            display: flex;
            justify-content: center;
            gap: 15px;
            background-color: rgb(5, 90, 0);
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: rgb(0, 114, 0);
        }

        .navbar .request-status {
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
        }
        .request-status.pending {
            background-color: orange;
        }

        .request-status.accepted {
            background-color: green;
        }

        .request-status.rejected {
            background-color: red;
        }
            .content {
                margin: 20px;
                padding: 20px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
    
            h2 {
                text-align: center;
                font-size: 30px;
                margin-bottom: 20px;
            }
    
            
    
            .participants-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        .participants-table th, .participants-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
    
        .participants-table th {
            background-color:rgb(0, 135, 34);
            color: white;
        }
    
        .participants-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .participants-table tr:hover {
            background-color: #ddd;
        }
    
            .grid-container {
                display: grid;
                grid-template-columns: repeat(9, 1fr);
                grid-template-rows: repeat(6, 150px);
                gap: 20px;
                justify-items: center;
                align-items: center;
                margin-top: 20px;
            }
    
            .grid-item {
                width: 100px;
                height: 100px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color:rgb(115, 0, 0);
                color:white;
                border: 1px solid #ddd;
                font-weight: bold;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: background-color 0.3s ease, transform 0.3s ease;
            }
    
            .grid-item:hover {
                background-color:rgb(0, 82, 10);
                transform: scale(1.05);
            }
    
            .button-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }
    
            .sort-button, .back-button {
                padding: 10px 20px;
                background-color:rgb(137, 0, 0); /* Azul */
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
                transition: background-color 0.3s ease;
                text-align: center;
                margin: 5px;
                width: 200px;
            }
    
            .sort-button:hover, .back-button:hover {
                background-color:rgb(1, 114, 6);
            }
            .logout-button{
                font-family: 'Caveat', cursive;
                border-radius:4px;
                background-color:rgb(0, 103, 14);
                color:white;
                border: none;
                text-align: center;
                font-size: 18px;
                transition: all 0.5s;
                cursor: pointer;
                margin: 10px;
            }
            .logout-button span{
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }
            .logout-button span:after{
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }
            .logout-button:hover span{
                padding-right: 25px;
            }
            .logout-button:hover span:after{
                opacity: 1;
                 right: 0;
            }
            
    .btn-primary {
        font-family: 'Caveat', cursive; 
        padding: 10px 20px;
        background-color: rgb(1, 114, 6); 
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
        text-align: center;
        margin: 5px;
        width: 200px; 
        border: none; 
    }
    
    .btn-primary:hover {
        background-color:rgb(137, 0, 0) ;
        transform: scale(1.05);
    }
    .grid-item {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgb(115, 0, 0); /* Rojo */
    color: white;
    border: 1px solid #ddd;
    font-weight: bold;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.5s ease-in-out, transform 0.3s ease;
}

    .grid-item.occupied {
        background-color: rgb(0, 135, 34); /* Verde cuando tiene nombre */
        transform: scale(1.05);
    }

    .grid-item p {
        font-size: 14px;
        text-align: center;
        margin: 0;
    }

    
</style>
    </head>
    <body>
        
    <header class="header">
        <div class="logo">
            <img src="{{asset('img/log.jpg')}}" alt="Logo">
        </div>
        <nav class="home">
            <ul class="nav-links">
                @auth
                <li class="nav-item user-name">{{ Auth::user()->name }}</li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button"><span>Logout</span></button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
    </header>
    @if(auth()->user()->role_id == \App\Models\Role::USER)
    <div class="navbar">
        @auth
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('user.listado') }}">Listado de Peñas</a>
            <a href="{{ route('user.request') }}">Solicitar Unión a Peña</a>
            <a href="{{ route('admin.lottery') }}">Ver Sorteo</a>
            <a href="{{ route('user.profile') }}">Perfil</a>
            <?php $request=auth()->user()->requests->last(); ?>
            @if(!is_null($request))
                <div class="request-status 
                    {{ $request->status == 'pending' ? 'pending' : '' }}
                    {{ $request->status == 'accepted' ? 'accepted' : '' }}
                    {{ $request->status == 'rejected' ? 'rejected' : '' }}">
                    Solicitud {{ $request->status == 'pending' ? 'Pendiente' : ($request->status == 'accepted' ? 'Aceptada' : 'Rechazada') }}
                </div>
            @else
                <div class="request-status">No tienes solicitudes pendientes</div>
            @endif
        @endauth
    </div>
    @endif
    <div class="content">
        <h2>Participantes en el Sorteo</h2>
       
            <div class="button-container">
            @if(auth()->user()->role_id == \App\Models\Role::ADMIN)
                <a href="{{ route('admin.dashboard') }}" class="back-button">Volver al Panel de Admin</a>
            @else
                <a href="{{ route('user.dashboard') }}" class="back-button">Volver a Mi Perfil</a>
            @endif
        </div>
    
        <div id="app" data-participantes='@json($penyas->pluck("name"))' data-role="{{ auth()->user()->role_id }}"></div>

        @if(isset($penyas) && $penyas->count() > 0)
        <table class="participants-table">
            <thead>
                <tr>
                    <th>Nombre de la Peña</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyas as $penya)
                    <tr>
                        <td>{{ $penya->name }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tbody>
                <div class="bg-blue-300 " id="app"></div>
            </tbody>
        </table>
        @else
            <p>No hay participantes en el sorteo.</p>
        @endif
    
       
       
        @if(auth()->user() && auth()->user()->role_id == \App\Models\Role::ADMIN)
           
        @endif
    
    </div>
    
    </div>
    
    
    
    </body>
   
    </html>
@viteReactRefresh
@vite('resources/js/app.jsx')
            