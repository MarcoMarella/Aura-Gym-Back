@extends('admin.layouts.app')

@section('title', 'Prodotti')
@section('page-title', 'Gestione Prodotti')
@section('page-subtitle', 'Visualizza e gestisci tutti i prodotti del tuo catalogo')

@section('content')
<div class="space-y-6">
    
    <!-- Header Actions -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <!-- Search -->
            <div class="relative">
                <input type="text" 
                       placeholder="Cerca prodotti..." 
                       class="w-80 pl-10 pr-4 py-2.5 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
            </div>
            
            <!-- Filter -->
            <select class="px-4 py-2.5 rounded-xl bg-dark-card border border-dark-border text-white focus:border-accent-primary focus:outline-none transition-all">
                <option>Tutte le categorie</option>
                <option>Abbigliamento</option>
                <option>Integratori</option>
                <option>Accessori</option>
            </select>
        </div>

        <a href="{{ route('admin.products.create') }}" 
           class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
            <i class="fas fa-plus"></i>
            <span>Nuovo Prodotto</span>
        </a>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="glass-effect rounded-2xl overflow-hidden group hover-glow cursor-pointer animate-slide-in">
                <!-- Product Image -->
                <div class="relative h-48 bg-gradient-to-br from-dark-hover to-dark-card flex items-center justify-center overflow-hidden">
                    @if($product->image && $product->image != '')
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <!-- Icona maglia lime per prodotti senza foto -->
                        <div class="relative w-full h-full flex items-center justify-center">
                            <svg class="w-32 h-32 text-accent-primary opacity-30 group-hover:opacity-50 transition-all duration-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 3a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V3zM3 3a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H4a1 1 0 01-1-1V3zm6 10.5V9.618a4.553 4.553 0 002 .882v3h2V10.5a4.553 4.553 0 002-.882v3.882h2V8.618c.826-.518 1.5-1.265 1.95-2.168.088-.177.23-.445.43-.895A1 1 0 0120.764 5H3.236a1 1 0 00-.908 1.418c.2.45.342.718.43.895.45.903 1.124 1.65 1.95 2.168V13.5h2V10.5a4.553 4.553 0 002 .882v3h2V11.382a4.553 4.553 0 002-.882v3.882zM5 16a1 1 0 00-1 1v3a3 3 0 003 3h10a3 3 0 003-3v-3a1 1 0 00-1-1H5z"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-16 h-16 rounded-full bg-dark-bg/80 backdrop-blur-sm flex items-center justify-center">
                                    <i class="fas fa-image text-2xl text-gray-600"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Stock Badge -->
                    <div class="absolute top-3 right-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-md
                            {{ $product->stock > 10 ? 'bg-green-500/20 text-green-400 border border-green-500/30' : '' }}
                            {{ $product->stock > 0 && $product->stock <= 10 ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : '' }}
                            {{ $product->stock <= 0 ? 'bg-red-500/20 text-red-400 border border-red-500/30' : '' }}
                        ">
                            <i class="fas fa-cube mr-1"></i>
                            {{ $product->stock }}
                        </span>
                    </div>

                    <!-- Featured Badge -->
                    @if($product->is_featured)
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-md bg-accent-primary/20 text-accent-primary border border-accent-primary/30">
                                <i class="fas fa-star mr-1"></i>
                                In evidenza
                            </span>
                        </div>
                    @endif

                    <!-- Quick Actions Overlay -->
                    <div class="absolute inset-0 bg-dark-bg/80 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}" 
                           class="w-10 h-10 rounded-lg bg-blue-500 flex items-center justify-center hover:bg-blue-600 transition-all">
                            <i class="fas fa-edit text-white"></i>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Sei sicuro di voler eliminare questo prodotto?')"
                                    class="w-10 h-10 rounded-lg bg-red-500 flex items-center justify-center hover:bg-red-600 transition-all">
                                <i class="fas fa-trash text-white"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="p-4">
                    <!-- Category -->
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs text-gray-500">
                            <i class="fas fa-tag mr-1"></i>
                            {{ $product->category->name ?? 'Nessuna' }}
                        </span>
                    </div>

                    <!-- Name -->
                    <h3 class="text-lg font-bold text-white mb-2 line-clamp-1">
                        {{ $product->name }}
                    </h3>

                    <!-- Description -->
                    <p class="text-sm text-gray-400 mb-4 line-clamp-2 min-h-[40px]">
                        {{ $product->description }}
                    </p>

                    <!-- Price & Actions -->
                    <div class="flex items-center justify-between">
                        <div>
                            @if($product->sale_price)
                                <div class="flex items-baseline gap-2">
                                    <span class="text-2xl font-bold text-accent-primary">€{{ number_format($product->sale_price, 2) }}</span>
                                    <span class="text-sm text-gray-500 line-through">€{{ number_format($product->price, 2) }}</span>
                                </div>
                            @else
                                <span class="text-2xl font-bold text-accent-primary">€{{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        
                        <!-- Status Toggle -->
                        <div class="flex items-center gap-2">
                            <input type="checkbox" 
                                   {{ $product->is_active ? 'checked' : '' }}
                                   class="w-10 h-5 appearance-none bg-dark-border rounded-full relative cursor-pointer transition-all
                                          checked:bg-accent-primary
                                          before:content-[''] before:absolute before:w-4 before:h-4 before:rounded-full before:bg-white before:top-0.5 before:left-0.5 before:transition-all
                                          checked:before:left-5"
                                   onchange="this.form.submit()">
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="glass-effect rounded-2xl p-12 text-center">
                    <div class="w-20 h-20 rounded-full bg-dark-hover flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box text-4xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Nessun prodotto ancora</h3>
                    <p class="text-gray-400 mb-6">Inizia ad aggiungere prodotti al tuo catalogo</p>
                    <a href="{{ route('admin.products.create') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
                        <i class="fas fa-plus"></i>
                        <span>Crea il primo prodotto</span>
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($products->hasPages())
        <div class="flex items-center justify-between glass-effect rounded-xl p-4">
            <div class="text-sm text-gray-400">
                Mostrando <span class="text-white font-semibold">{{ $products->firstItem() }}</span> - 
                <span class="text-white font-semibold">{{ $products->lastItem() }}</span> di 
                <span class="text-white font-semibold">{{ $products->total() }}</span> prodotti
            </div>
            
            <div class="flex items-center gap-2">
                @if($products->onFirstPage())
                    <span class="px-4 py-2 rounded-lg bg-dark-hover text-gray-600 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" 
                       class="px-4 py-2 rounded-lg bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary transition-all">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <a href="{{ $url }}" 
                       class="px-4 py-2 rounded-lg transition-all {{ $page == $products->currentPage() ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' : 'bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary' }}">
                        {{ $page }}
                    </a>
                @endforeach

                @if($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" 
                       class="px-4 py-2 rounded-lg bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary transition-all">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="px-4 py-2 rounded-lg bg-dark-hover text-gray-600 cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </div>
        </div>
    @endif

</div>
@endsection
