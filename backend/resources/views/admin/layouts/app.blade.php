<!DOCTYPE html>
<html lang="it" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Aura Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        [x-cloak] { display: none !important; }
        
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .glass-effect {
            background: rgba(20, 20, 20, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(132, 204, 22, 0.1);
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(132, 204, 22, 0.3);
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #84cc16 0%, #65a30d 100%);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #84cc16;
        }
    </style>
</head>
<body class="bg-dark-bg text-gray-100 font-sans antialiased" x-data="{ sidebarOpen: true }">
    
    <!-- Sidebar -->
    <aside 
        x-cloak
        :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="sidebar-transition fixed left-0 top-0 h-full bg-dark-card border-r border-dark-border z-50 flex flex-col"
    >
        <!-- Logo -->
        <div class="h-16 flex items-center justify-between px-4 border-b border-dark-border">
            <div x-show="sidebarOpen" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-accent-primary to-accent-hover flex items-center justify-center">
                    <i class="fas fa-dumbbell text-dark-bg text-lg"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-white">AURA GYM</h1>
                    <p class="text-xs text-gray-400">Admin Panel</p>
                </div>
            </div>
            <button 
                @click="sidebarOpen = !sidebarOpen"
                class="p-2 rounded-lg hover:bg-dark-hover text-gray-400 hover:text-accent-primary transition-all"
            >
                <i class="fas" :class="sidebarOpen ? 'fa-bars' : 'fa-bars'"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group
                      {{ request()->routeIs('admin.dashboard') 
                          ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' 
                          : 'text-gray-400 hover:bg-dark-hover hover:text-white' }}"
            >
                <i class="fas fa-chart-line text-lg w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-sm">Dashboard</span>
            </a>

            <!-- Products -->
            <a href="{{ route('admin.products.index') }}" 
               class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group
                      {{ request()->routeIs('admin.products.*') 
                          ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' 
                          : 'text-gray-400 hover:bg-dark-hover hover:text-white' }}"
            >
                <i class="fas fa-box text-lg w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-sm">Prodotti</span>
            </a>

            <!-- Categories -->
            <a href="{{ route('admin.categories.index') }}" 
               class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group
                      {{ request()->routeIs('admin.categories.*') 
                          ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' 
                          : 'text-gray-400 hover:bg-dark-hover hover:text-white' }}"
            >
                <i class="fas fa-tags text-lg w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-sm">Categorie</span>
            </a>

            <!-- Orders -->
            <a href="{{ route('admin.orders.index') }}" 
               class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group
                      {{ request()->routeIs('admin.orders.*') 
                          ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' 
                          : 'text-gray-400 hover:bg-dark-hover hover:text-white' }}"
            >
                <i class="fas fa-shopping-cart text-lg w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-sm">Ordini</span>
            </a>

            <!-- Divider -->
            <div class="border-t border-dark-border my-4"></div>

            <!-- Settings -->
            <a href="#" 
               class="flex items-center gap-3 px-3 py-3 rounded-xl text-gray-400 hover:bg-dark-hover hover:text-white transition-all"
            >
                <i class="fas fa-cog text-lg w-5 text-center"></i>
                <span x-show="sidebarOpen" class="text-sm">Impostazioni</span>
            </a>
        </nav>

        <!-- User Profile -->
        <div class="border-t border-dark-border p-3">
            <div class="flex items-center gap-3 px-3 py-2">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-accent-primary to-accent-hover flex items-center justify-center text-dark-bg font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div x-show="sidebarOpen" class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}" x-show="sidebarOpen" class="mt-2">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-red-400 hover:bg-red-500/10 transition-all">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main 
        :class="sidebarOpen ? 'ml-64' : 'ml-20'"
        class="sidebar-transition min-h-screen"
    >
        <!-- Top Bar -->
        <header class="h-16 glass-effect sticky top-0 z-40 flex items-center justify-between px-6">
            <div>
                <h2 class="text-xl font-bold text-white">@yield('page-title', 'Dashboard')</h2>
                <p class="text-sm text-gray-400">@yield('page-subtitle', 'Benvenuto nel pannello admin')</p>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Notifications -->
                <button class="relative p-2 rounded-lg hover:bg-dark-hover text-gray-400 hover:text-accent-primary transition-all">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-accent-primary rounded-full"></span>
                </button>
                
                <!-- Time -->
                <div class="hidden md:flex items-center gap-2 text-sm text-gray-400">
                    <i class="far fa-clock"></i>
                    <span id="current-time"></span>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-6">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl glass-effect border-accent-primary/30 animate-slide-in">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-accent-primary/20 flex items-center justify-center">
                            <i class="fas fa-check text-accent-primary"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Operazione completata!</p>
                            <p class="text-sm text-gray-400">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl glass-effect border-red-500/30 animate-slide-in">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-red-500/20 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Errore</p>
                            <p class="text-sm text-gray-400">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script>
        // Update time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('it-IT', { hour: '2-digit', minute: '2-digit' });
            const timeElement = document.getElementById('current-time');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }
        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>
</html>
