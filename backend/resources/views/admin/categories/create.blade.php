@extends('admin.layouts.app')

@section('title', 'Nuova Categoria')
@section('page-title', 'Nuova Categoria')
@section('page-subtitle', 'Crea una nuova categoria per organizzare i prodotti')

@section('content')
<form action="{{ route('admin.categories.store') }}" method="POST" class="max-w-2xl">
    @csrf

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
                   value="{{ old('name') }}"
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
                   value="{{ old('slug') }}"
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
                      placeholder="Descrivi la categoria...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-3 pt-4">
            <button type="submit" 
                    class="flex-1 flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
                <i class="fas fa-save"></i>
                <span>Crea Categoria</span>
            </button>
            
            <a href="{{ route('admin.categories.index') }}" 
               class="flex-1 flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-dark-hover text-white font-semibold hover:bg-dark-border transition-all">
                <i class="fas fa-times"></i>
                <span>Annulla</span>
            </a>
        </div>
    </div>
</form>
@endsection
