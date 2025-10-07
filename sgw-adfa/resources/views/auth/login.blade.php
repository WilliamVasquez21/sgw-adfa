<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ADFA</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="flex bg-white shadow-lg rounded-lg overflow-hidden w-[900px] max-w-full">
        <div class="w-1/2">
            <img src="{{ asset('img/Cancha.jpg') }}" alt="Imagen de fondo" class="h-full w-full object-cover">
        </div>

        <div class="w-1/2 p-8 flex flex-col justify-center items-center bg-white">
            <div class="mb-6">
                <img src="{{ asset('img/im.png') }}" alt="ADFA Logo" class="w-48 mx-auto">
            </div>
            <form action="#" method="POST" class="w-full max-w-sm">
                @csrf
                <div class="mb-4">
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Usuario" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-4 relative">
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Contraseña" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="button" class="absolute right-3 top-2.5">
                        👁
                    </button>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-blue-800 text-white py-2 rounded-lg hover:bg-blue-900 transition">
                    Iniciar sesión
                </button>
            </form>
        </div>
    </div>

</body>
</html>
