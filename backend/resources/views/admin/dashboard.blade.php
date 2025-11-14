@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Panoramica generale del tuo e-commerce')

@section('content')
<div class="space-y-6">
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Products -->
        <div class="glass-effect rounded-2xl p-6 hover-glow cursor-pointer group animate-slide-in">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-box text-2xl text-blue-400"></i>
                </div>
                <span class="text-xs font-semibold text-gray-400 bg-dark-hover px-3 py-1 rounded-full">+12%</span>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['total_products'] }}</h3>
            <p class="text-sm text-gray-400">Prodotti Totali</p>
            <div class="mt-4 flex items-center gap-2 text-xs text-blue-400">
                <i class="fas fa-arrow-up"></i>
                <span>In crescita</span>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="glass-effect rounded-2xl p-6 hover-glow cursor-pointer group animate-slide-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-accent-primary/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-shopping-cart text-2xl text-accent-primary"></i>
                </div>
                <span class="text-xs font-semibold text-gray-400 bg-dark-hover px-3 py-1 rounded-full">Oggi</span>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['total_orders'] }}</h3>
            <p class="text-sm text-gray-400">Ordini Totali</p>
            <div class="mt-4 flex items-center gap-2 text-xs text-accent-primary">
                <i class="fas fa-clock"></i>
                <span>{{ $stats['pending_orders'] }} in attesa</span>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="glass-effect rounded-2xl p-6 hover-glow cursor-pointer group animate-slide-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-euro-sign text-2xl text-purple-400"></i>
                </div>
                <span class="text-xs font-semibold text-gray-400 bg-dark-hover px-3 py-1 rounded-full">+8%</span>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">€{{ number_format($stats['total_revenue'], 2) }}</h3>
            <p class="text-sm text-gray-400">Fatturato Totale</p>
            <div class="mt-4 flex items-center gap-2 text-xs text-purple-400">
                <i class="fas fa-chart-line"></i>
                <span>Trend positivo</span>
            </div>
        </div>

        <!-- Categories -->
        <div class="glass-effect rounded-2xl p-6 hover-glow cursor-pointer group animate-slide-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i class="fas fa-tags text-2xl text-orange-400"></i>
                </div>
                <span class="text-xs font-semibold text-gray-400 bg-dark-hover px-3 py-1 rounded-full">Attive</span>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">{{ $stats['total_categories'] }}</h3>
            <p class="text-sm text-gray-400">Categorie</p>
            <div class="mt-4 flex items-center gap-2 text-xs text-orange-400">
                <i class="fas fa-check-circle"></i>
                <span>Tutte attive</span>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Orders -->
        <div class="lg:col-span-2 glass-effect rounded-2xl p-6 animate-slide-in" style="animation-delay: 0.4s">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-white">Ordini Recenti</h3>
                    <p class="text-sm text-gray-400">Ultimi 5 ordini ricevuti</p>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="text-sm text-accent-primary hover:text-accent-hover flex items-center gap-2">
                    <span>Vedi tutti</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="space-y-3">
                @forelse($recent_orders as $order)
                    <div class="flex items-center justify-between p-4 rounded-xl bg-dark-hover hover:bg-dark-border transition-all cursor-pointer group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-accent-primary to-accent-hover flex items-center justify-center text-dark-bg font-bold">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-white">{{ $order->order_number }}</p>
                                <p class="text-sm text-gray-400">{{ $order->customer_name }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="text-right">
                                <p class="font-bold text-accent-primary">€{{ number_format($order->total, 2) }}</p>
                                <p class="text-xs text-gray-400">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $order->status === 'pending' ? 'bg-yellow-500/20 text-yellow-400' : '' }}
                                {{ $order->status === 'processing' ? 'bg-blue-500/20 text-blue-400' : '' }}
                                {{ $order->status === 'shipped' ? 'bg-purple-500/20 text-purple-400' : '' }}
                                {{ $order->status === 'delivered' ? 'bg-green-500/20 text-green-400' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-500/20 text-red-400' : '' }}
                            ">
                                {{ ucfirst($order->status) }}
                            </span>
                            <i class="fas fa-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors"></i>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="w-16 h-16 rounded-full bg-dark-hover flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shopping-cart text-2xl text-gray-600"></i>
                        </div>
                        <p class="text-gray-400">Nessun ordine ancora</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="space-y-6 animate-slide-in" style="animation-delay: 0.5s">
            <!-- Top Products -->
            <div class="glass-effect rounded-2xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-white">Top Prodotti</h3>
                    <i class="fas fa-fire text-orange-400"></i>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-accent-primary"></div>
                        <span class="text-sm text-gray-400 flex-1">T-Shirt Fitness Pro</span>
                        <span class="text-sm font-semibold text-white">50</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-blue-400"></div>
                        <span class="text-sm text-gray-400 flex-1">Proteine Whey 1kg</span>
                        <span class="text-sm font-semibold text-white">42</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-purple-400"></div>
                        <span class="text-sm text-gray-400 flex-1">Manubri 2x5kg</span>
                        <span class="text-sm font-semibold text-white">35</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="glass-effect rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-4">Azioni Rapide</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.products.create') }}" 
                       class="flex items-center gap-3 p-3 rounded-xl bg-dark-hover hover:bg-accent-primary/10 hover:border-accent-primary/30 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-accent-primary/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-plus text-accent-primary"></i>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-white">Nuovo Prodotto</span>
                    </a>
                    <a href="{{ route('admin.categories.create') }}" 
                       class="flex items-center gap-3 p-3 rounded-xl bg-dark-hover hover:bg-accent-primary/10 hover:border-accent-primary/30 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tag text-blue-400"></i>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-white">Nuova Categoria</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" 
                       class="flex items-center gap-3 p-3 rounded-xl bg-dark-hover hover:bg-accent-primary/10 hover:border-accent-primary/30 border border-transparent transition-all group">
                        <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-list text-purple-400"></i>
                        </div>
                        <span class="text-sm text-gray-300 group-hover:text-white">Vedi Ordini</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
