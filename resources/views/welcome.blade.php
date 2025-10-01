<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Meu Sistema</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Bem-vindo</h2>

        <!-- Formulário de Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">E-mail</label>
                <input id="email" type="email" name="email" required autofocus
                       class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Senha</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Lembrar-me -->
            <div class="flex items-center mb-4">
                <input id="remember" type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-600">Lembrar-me</label>
            </div>

            <!-- Botão -->
            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
                Entrar
            </button>
        </form>

        <!-- Links extras -->
        <div class="mt-6 text-center">
            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Esqueci minha senha</a>
        </div>
    </div>

</body>
</html>

