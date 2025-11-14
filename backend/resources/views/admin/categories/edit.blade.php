@extends('admin.layouts.app')

@section('title', 'Modifica Categoria')
@section('page-title', 'Modifica Categoria')
@section('page-subtitle', 'Aggiorna le informazioni della categoria')

@section('content')
<form action="{{ route('admin.categories.update', $category) }}" method="POST" class="max-w-2xl">
    @csrf
    @method('PUT')

    <div class="glass-effect rounded-2xl p-6 space-y-6">
        <h3 class="text-lg font-bold text-white flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-accent-primary/20 flex items-center justify-center">
                <i class="fas fa-tag text-accent-primary"></i>
            </div>
            Informazioni Categoria
        </h3>

        <!-- Name -->
        <div>
            <label class="block text-sm font-semibold text-gray-300 mb-2">
                Nome Categoria *
            </label>
            <input type="text" 
                   name="name" 
                   value="{{ old('name', $category->name) }}"
                   required
                   class="w-full px-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                   placeholder="es. Abbigliamento">
            @error('name')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-sm font-semibold text-gray-300 mb-2">
                Slug (URL) *
            </label>
            <input type="text" 
                   name="slug" 
                   value="{{ old('slug', $category->slug) }}"
                   required
                   class="w-full px-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                   placeholder="es. abbigliamento">
            @error('slug')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-semibold text-gray-300 mb-2">
                Descrizione
            </label>
            <textarea name="description" 
                      rows="4"
                      class="w-full px-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all resize-none"
                      placeholder="Descrivi la categoria...">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Product Count Info -->
        <div class="p-4 rounded-xl bg-dark-hover">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                    <i class="fas fa-cube text-blue-400"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold text-white">{{ $category->products_count }} Prodotti</p>
                    <p class="text-xs text-gray-400">Associati a questa categoria</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" 
                    class="flex-1 flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
                <i class="fas fa-save"></i>
                <span>Salva Modifiche</span>
            </button>
            
            <a href="{{ route('admin.categories.index') }}" 
               class="flex-1 flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-dark-hover text-white font-semibold hover:bg-dark-border transition-all">
                <i class="fas fa-times"></i>
                <span>Annulla</span>
            </a>
        </div>

        <!-- Delete Section -->
        @if($category->products_count == 0)
            <div class="pt-4 border-t border-dark-border">
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Sei sicuro di voler eliminare questa categoria?')"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 font-semibold hover:bg-red-500/20 transition-all">
                        <i class="fas fa-trash"></i>
                        <span>Elimina Categoria</span>
                    </button>
                </form>
            </div>
        @else
            <div class="p-4 rounded-xl bg-yellow-500/10 border border-yellow-500/30">
                <div class="flex items-center gap-3">
                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                    <p class="text-sm text-yellow-400">
                        Non puoi eliminare questa categoria perché contiene {{ $category->products_count }} prodotti.
                    </p>
                </div>
            </div>
        @endif
    </div>
</form>
@endsection
