@extends('admin.layouts.app')

@section('title', 'Nuovo Prodotto')
@section('page-title', 'Nuovo Prodotto')
@section('page-subtitle', 'Aggiungi un nuovo prodotto al catalogo')

@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Info Card -->
            <div class="glass-effect rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-accent-primary/20 flex items-center justify-center">
                        <i class="fas fa-info-circle text-accent-primary"></i>
                    </div>
                    Informazioni Base
                </h3>

                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            Nome Prodotto *
                        </label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name') }}"
                               required
                               class="w-full px-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                               placeholder="es. T-Shirt Fitness Pro">
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
                               placeholder="es. t-shirt-fitness-pro">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            Immagine Prodotto
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="image" 
                                   id="image"
                                   accept=".png,.webp"
                                   class="hidden"
                                   onchange="previewImage(event)">
                            <label for="image" 
                                   class="flex items-center justify-center gap-3 w-full px-4 py-8 rounded-xl bg-dark-card border-2 border-dashed border-dark-border hover:border-accent-primary cursor-pointer transition-all group">
                                <div id="preview-container" class="text-center">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-600 group-hover:text-accent-primary transition-colors mb-3"></i>
                                    <p class="text-sm text-gray-400 group-hover:text-gray-300">
                                        <span class="font-semibold text-accent-primary">Clicca per caricare</span> o trascina qui
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">PNG o WEBP (max 1.5MB)</p>
                                </div>
                            </label>
                        </div>
                        @error('image')
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
                                  placeholder="Descrivi il prodotto...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Pricing Card -->
            <div class="glass-effect rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-purple-500/20 flex items-center justify-center">
                        <i class="fas fa-euro-sign text-purple-400"></i>
                    </div>
                    Prezzi e Magazzino
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            Prezzo *
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">€</span>
                            <input type="number" 
                                   name="price" 
                                   value="{{ old('price') }}"
                                   step="0.01"
                                   required
                                   class="w-full pl-8 pr-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                                   placeholder="0.00">
                        </div>
                        @error('price')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sale Price -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            Prezzo Scontato
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">€</span>
                            <input type="number" 
                                   name="sale_price" 
                                   value="{{ old('sale_price') }}"
                                   step="0.01"
                                   class="w-full pl-8 pr-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                                   placeholder="0.00">
                        </div>
                        @error('sale_price')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            Giacenza *
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">
                                <i class="fas fa-cube"></i>
                            </span>
                            <input type="number" 
                                   name="stock" 
                                   value="{{ old('stock', 0) }}"
                                   required
                                   class="w-full pl-10 pr-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white placeholder-gray-500 focus:border-accent-primary focus:outline-none transition-all"
                                   placeholder="0">
                        </div>
                        @error('stock')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Category & Status Card -->
            <div class="glass-effect rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center">
                        <i class="fas fa-cog text-blue-400"></i>
                    </div>
                    Impostazioni
                </h3>

                <div class="space-y-4">
                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">
                            Categoria
                        </label>
                        <select name="category_id" 
                                class="w-full px-4 py-3 rounded-xl bg-dark-card border border-dark-border text-white focus:border-accent-primary focus:outline-none transition-all">
                            <option value="">Nessuna categoria</option>
                            
                            @php
                                $parentCategories = \App\Models\Category::whereNull('parent_id')->with('children')->get();
                            @endphp
                            
                            @foreach($parentCategories as $parent)
                                <optgroup label="{{ $parent->name }}">
                                    @if($parent->children->count() > 0)
                                        @foreach($parent->children as $child)
                                            <option value="{{ $child->id }}" {{ old('category_id') == $child->id ? 'selected' : '' }}>
                                                └ {{ $child->name }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="{{ $parent->id }}" {{ old('category_id') == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endif
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="flex items-center justify-between p-4 rounded-xl bg-dark-hover">
                        <div>
                            <p class="text-sm font-semibold text-white">Prodotto Attivo</p>
                            <p class="text-xs text-gray-400">Visibile nel catalogo</p>
                        </div>
                        <input type="checkbox" 
                               name="is_active" 
                               value="1"
                               {{ old('is_active', true) ? 'checked' : '' }}
                               class="w-12 h-6 appearance-none bg-dark-border rounded-full relative cursor-pointer transition-all
                                      checked:bg-accent-primary
                                      before:content-[''] before:absolute before:w-5 before:h-5 before:rounded-full before:bg-white before:top-0.5 before:left-0.5 before:transition-all
                                      checked:before:left-6">
                    </div>

                    <!-- Featured Status -->
                    <div class="flex items-center justify-between p-4 rounded-xl bg-dark-hover">
                        <div>
                            <p class="text-sm font-semibold text-white">In Evidenza</p>
                            <p class="text-xs text-gray-400">Mostra in homepage</p>
                        </div>
                        <input type="checkbox" 
                               name="is_featured" 
                               value="1"
                               {{ old('is_featured') ? 'checked' : '' }}
                               class="w-12 h-6 appearance-none bg-dark-border rounded-full relative cursor-pointer transition-all
                                      checked:bg-accent-primary
                                      before:content-[''] before:absolute before:w-5 before:h-5 before:rounded-full before:bg-white before:top-0.5 before:left-0.5 before:transition-all
                                      checked:before:left-6">
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="glass-effect rounded-2xl p-6">
                <div class="space-y-3">
                    <button type="submit" 
                            class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold hover:shadow-lg hover:shadow-accent-primary/30 transition-all">
                        <i class="fas fa-save"></i>
                        <span>Salva Prodotto</span>
                    </button>
                    
                    <a href="{{ route('admin.products.index') }}" 
                       class="w-full flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-dark-hover text-white font-semibold hover:bg-dark-border transition-all">
                        <i class="fas fa-times"></i>
                        <span>Annulla</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
function previewImage(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('preview-container');
    
    if (file) {
        // Check file size (1.5MB = 1572864 bytes)
        if (file.size > 1572864) {
            alert('Il file è troppo grande! Max 1.5MB');
            event.target.value = '';
            return;
        }
        
        // Check file type
        if (!['image/png', 'image/webp'].includes(file.type)) {
            alert('Formato non supportato! Usa PNG o WEBP');
            event.target.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewContainer.innerHTML = `
                <div class="relative inline-block">
                    <img src="${e.target.result}" class="w-32 h-32 object-cover rounded-xl border-2 border-accent-primary">
                    <div class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-accent-primary flex items-center justify-center">
                        <i class="fas fa-check text-dark-bg text-xs"></i>
                    </div>
                </div>
                <p class="text-sm text-accent-primary mt-2 font-semibold">${file.name}</p>
                <p class="text-xs text-gray-400">${(file.size / 1024).toFixed(2)} KB</p>
            `;
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
