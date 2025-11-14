@extends('admin.layouts.app')

@section('title', 'Categorie')
@section('page-title', 'Gestione Categorie')
@section('page-subtitle', 'Organizza i tuoi prodotti in categorie')

@section('content')
<div class="space-y-6">
    
    <!-- Header Actions -->
    <div class="flex items-center justify-end">
        <a href="{{ route('admin.categories.create') }}" 
           class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
            <i class="fas fa-plus"></i>
            <span>Nuova Categoria</span>
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <div class="glass-effect rounded-2xl p-6 hover-glow cursor-pointer group animate-slide-in">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-accent-primary/20 to-accent-primary/10 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-tag text-2xl text-accent-primary"></i>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-400">
                        <i class="fas fa-cube mr-1"></i>
                        {{ $category->products_count }} prodotti
                    </span>
                </div>

                <!-- Content -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-white mb-2">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-400 line-clamp-2 min-h-[40px]">
                        {{ $category->description ?? 'Nessuna descrizione' }}
                    </p>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-between pt-4 border-t border-dark-border">
                    <span class="text-xs text-gray-500 font-mono">{{ $category->slug }}</span>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" 
                           class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-400 hover:bg-blue-500/20 transition-all">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if($category->products_count == 0)
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Sei sicuro di voler eliminare questa categoria?')"
                                        class="w-8 h-8 rounded-lg bg-red-500/10 flex items-center justify-center text-red-400 hover:bg-red-500/20 transition-all">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @else
                            <button type="button" 
                                    disabled
                                    title="Non puoi eliminare una categoria con prodotti"
                                    class="w-8 h-8 rounded-lg bg-gray-500/10 flex items-center justify-center text-gray-600 cursor-not-allowed">
                                <i class="fas fa-trash"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="glass-effect rounded-2xl p-12 text-center">
                    <div class="w-20 h-20 rounded-full bg-dark-hover flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tags text-4xl text-gray-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Nessuna categoria ancora</h3>
                    <p class="text-gray-400 mb-6">Inizia a organizzare i tuoi prodotti creando categorie</p>
                    <a href="{{ route('admin.categories.create') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
                        <i class="fas fa-plus"></i>
                        <span>Crea la prima categoria</span>
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($categories->hasPages())
        <div class="flex items-center justify-between glass-effect rounded-xl p-4">
            <div class="text-sm text-gray-400">
                Mostrando <span class="text-white font-semibold">{{ $categories->firstItem() }}</span> - 
                <span class="text-white font-semibold">{{ $categories->lastItem() }}</span> di 
                <span class="text-white font-semibold">{{ $categories->total() }}</span> categorie
            </div>
            
            <div class="flex items-center gap-2">
                @if($categories->onFirstPage())
                    <span class="px-4 py-2 rounded-lg bg-dark-hover text-gray-600 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $categories->previousPageUrl() }}" 
                       class="px-4 py-2 rounded-lg bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary transition-all">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                @foreach($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                    <a href="{{ $url }}" 
                       class="px-4 py-2 rounded-lg transition-all {{ $page == $categories->currentPage() ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' : 'bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary' }}">
                        {{ $page }}
                    </a>
                @endforeach

                @if($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}" 
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
