<!DOCTYPE html>
<html lang="it" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Aura Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#0a0a0a',
                            card: '#141414',
                            hover: '#1a1a1a',
                            border: '#2a2a2a',
                        },
                        accent: {
                            primary: '#84cc16',
                            hover: '#65a30d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .glass-effect {
            background: rgba(20, 20, 20, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(132, 204, 22, 0.1);
        }
    </style>
</head>
<body class="bg-dark-bg min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-accent-primary/5 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-accent-primary/5 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md animate-fade-in">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-accent-primary to-accent-hover flex items-center justify-center mx-auto mb-4 shadow-lg shadow-accent-primary/30">
                <i class="fas fa-dumbbell text-4xl text-dark-bg"></i>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">AURA GYM</h1>
            <p class="text-gray-400">Pannello Amministrativo</p>
        </div>

        <!-- Login Form -->
        <div class="glass-effect rounded-2xl p-8 shadow-2xl">
            <h2 class="text-2xl font-bold text-white mb-6">Benvenuto! 👋</h2>
            
            @if($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-red-500/20 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-red-400">Errore di accesso</p>
                            <p class="text-sm text-red-400/80">{{ $errors->first() }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </div>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required
                               autofocus
                               class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                               placeholder="admin@auragym.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500"></i>
                        </div>
                        <input type="password" 
                               name="password" 
                               required
                               class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" 
                               name="remember"
                               class="w-5 h-5 rounded bg-dark-card border-dark-border text-accent-primary focus:ring-2 focus:ring-accent-primary focus:ring-offset-0 focus:ring-offset-dark-bg cursor-pointer">
                        <span class="text-sm text-gray-400 group-hover:text-gray-300">Ricordami</span>
                    </label>
                    
                    <a href="#" class="text-sm text-accent-primary hover:text-accent-hover transition-colors">
                        Password dimenticata?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-bold text-lg hover:shadow-lg hover:shadow-accent-primary/30 transition-all transform hover:scale-[1.02]">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Accedi</span>
                </button>
            </form>
        </div>

        <!-- Credentials Info -->
        <div class="mt-6 p-4 rounded-xl bg-dark-card/50 border border-dark-border">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-accent-primary/10 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-info-circle text-accent-primary"></i>
                </div>
                <div class="text-sm">
                    <p class="font-semibold text-white mb-1">Credenziali di Default</p>
                    <p class="text-gray-400 mb-2">Email: <span class="text-accent-primary font-mono">admin@auragym.com</span></p>
                    <p class="text-gray-400">Password: <span class="text-accent-primary font-mono">Admin123!</span></p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-500">
            <p>© 2025 Aura Gym. Tutti i diritti riservati.</p>
        </div>
    </div>

</body>
</html>
