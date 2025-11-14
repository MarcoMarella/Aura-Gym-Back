@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-600">Benvenuto nel pannello di amministrazione</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-md bg-purple-500 p-3">
                            <i class="fas fa-box text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Prodotti</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $products }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-md bg-blue-500 p-3">
                            <i class="fas fa-tags text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Categorie</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $categories }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-md bg-green-500 p-3">
                            <i class="fas fa-shopping-cart text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Ordini Totali</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $orders }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-md bg-yellow-500 p-3">
                            <i class="fas fa-clock text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">In Attesa</dt>
                            <dd class="text-3xl font-semibold text-gray-900">{{ $pending_orders }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Card -->
    <div class="bg-gradient-to-r from-purple-600 to-blue-500 overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-euro-sign text-white text-4xl"></i>
                </div>
                <div class="ml-5">
                    <dl>
                        <dt class="text-sm font-medium text-purple-100">Fatturato Totale</dt>
                        <dd class="text-4xl font-bold text-white">€ {{ number_format($total_revenue, 2, ',', '.') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Ordini Recenti</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">N° Ordine</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Totale</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stato</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Azioni</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($recent_orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $order->order_number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $order->customer_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                            € {{ number_format($order->total, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'processing' => 'bg-blue-100 text-blue-800',
                                    'shipped' => 'bg-purple-100 text-purple-800',
                                    'delivered' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800',
                                ];
                                $statusLabels = [
                                    'pending' => 'In Attesa',
                                    'processing' => 'In Elaborazione',
                                    'shipped' => 'Spedito',
                                    'delivered' => 'Consegnato',
                                    'cancelled' => 'Annullato',
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusLabels[$order->status] ?? $order->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-purple-600 hover:text-purple-900">
                                <i class="fas fa-eye"></i> Vedi
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Nessun ordine recente
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <a href="{{ route('admin.products.create') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow text-center">
            <div class="text-purple-600 text-4xl mb-2">
                <i class="fas fa-plus-circle"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Nuovo Prodotto</h3>
        </a>
        <a href="{{ route('admin.products.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow text-center">
            <div class="text-blue-600 text-4xl mb-2">
                <i class="fas fa-boxes"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Gestisci Prodotti</h3>
        </a>
        <a href="{{ route('admin.orders.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition-shadow text-center">
            <div class="text-green-600 text-4xl mb-2">
                <i class="fas fa-list"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Vedi Tutti gli Ordini</h3>
        </a>
    </div>
</div>
@endsection

