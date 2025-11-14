@extends('admin.layouts.app')

@section('title', 'Modifica Prodotto')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Modifica Prodotto</h1>
        <p class="mt-1 text-sm text-gray-600">Aggiorna le informazioni del prodotto</p>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div class="col-span-2 sm:col-span-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome Prodotto *</label>
                <input type="text" name="name" id="name" required value="{{ old('name', $product->name) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                <select name="category_id" id="category_id"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                    <option value="">Seleziona categoria</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Descrizione</label>
                <textarea name="description" id="description" rows="3"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="price" class="block text-sm font-medium text-gray-700">Prezzo *</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">€</span>
                    </div>
                    <input type="number" step="0.01" name="price" id="price" required value="{{ old('price', $product->price) }}"
                           class="block w-full pl-7 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="sale_price" class="block text-sm font-medium text-gray-700">Prezzo Scontato</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">€</span>
                    </div>
                    <input type="number" step="0.01" name="sale_price" id="sale_price" value="{{ old('sale_price', $product->sale_price) }}"
                           class="block w-full pl-7 border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                </div>
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="stock" class="block text-sm font-medium text-gray-700">Quantità Stock *</label>
                <input type="number" name="stock" id="stock" required value="{{ old('stock', $product->stock) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="image" class="block text-sm font-medium text-gray-700">URL Immagine</label>
                <input type="url" name="image" id="image" value="{{ old('image', $product->image) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
            </div>

            <div class="col-span-2">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Prodotto Attivo
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                               class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                            In Evidenza
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                Annulla
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                Salva Modifiche
            </button>
        </div>
    </form>
</div>
@endsection

