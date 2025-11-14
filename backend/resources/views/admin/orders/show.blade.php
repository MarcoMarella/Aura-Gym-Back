@extends('admin.layouts.app')

@section('title', 'Dettaglio Ordine')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Ordine {{ $order->order_number }}</h1>
            <p class="mt-1 text-sm text-gray-600">Dettagli completi dell'ordine</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
            <i class="fas fa-arrow-left mr-2"></i> Torna alla lista
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Dettagli Ordine -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Informazioni Cliente -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">
                    <i class="fas fa-user mr-2"></i> Informazioni Cliente
                </h3>
                <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nome</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Telefono</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $order->customer_phone ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Indirizzo di Spedizione -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">
                    <i class="fas fa-shipping-fast mr-2"></i> Indirizzo di Spedizione
                </h3>
                <div class="text-sm text-gray-900">
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_zip }} {{ $order->shipping_city }}</p>
                    @if($order->shipping_state)
                    <p>{{ $order->shipping_state }}</p>
                    @endif
                    <p>{{ $order->shipping_country }}</p>
                </div>
            </div>

            <!-- Prodotti Ordinati -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">
                        <i class="fas fa-box mr-2"></i> Prodotti
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prodotto</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Prezzo</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Quantità</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Totale</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($order->items as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $item->product_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                                    € {{ number_format($item->price, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right font-semibold">
                                    € {{ number_format($item->subtotal, 2, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm font-medium text-gray-900 text-right">Subtotale</td>
                                <td class="px-6 py-3 text-sm text-gray-900 text-right">€ {{ number_format($order->subtotal, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm font-medium text-gray-900 text-right">Spedizione</td>
                                <td class="px-6 py-3 text-sm text-gray-900 text-right">€ {{ number_format($order->shipping_cost, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-sm font-medium text-gray-900 text-right">IVA (22%)</td>
                                <td class="px-6 py-3 text-sm text-gray-900 text-right">€ {{ number_format($order->tax, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-lg font-bold text-gray-900 text-right">TOTALE</td>
                                <td class="px-6 py-3 text-lg font-bold text-gray-900 text-right">€ {{ number_format($order->total, 2, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            @if($order->notes)
            <!-- Note -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">
                    <i class="fas fa-sticky-note mr-2"></i> Note
                </h3>
                <p class="text-sm text-gray-900">{{ $order->notes }}</p>
            </div>
            @endif
        </div>

        <!-- Sidebar Azioni -->
        <div class="lg:col-span-1">
            <!-- Stato Ordine -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Aggiorna Stato</h3>
                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Stato Ordine</label>
                            <select name="status" id="status" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>In Attesa</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>In Elaborazione</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Spedito</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Consegnato</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Annullato</option>
                            </select>
                        </div>

                        <div>
                            <label for="payment_status" class="block text-sm font-medium text-gray-700">Stato Pagamento</label>
                            <select name="payment_status" id="payment_status" required
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>In Attesa</option>
                                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Pagato</option>
                                <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Fallito</option>
                                <option value="refunded" {{ $order->payment_status == 'refunded' ? 'selected' : '' }}>Rimborsato</option>
                            </select>
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Note</label>
                            <textarea name="notes" id="notes" rows="3"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-purple-500 focus:border-purple-500">{{ $order->notes }}</textarea>
                        </div>

                        <button type="submit" class="w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-save mr-2"></i> Salva Modifiche
                        </button>
                    </div>
                </form>
            </div>

            <!-- Info Ordine -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informazioni</h3>
                <dl class="space-y-3">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Data Ordine</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    @if($order->payment_method)
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Metodo di Pagamento</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $order->payment_method }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            <!-- Elimina Ordine -->
            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo ordine? Lo stock dei prodotti sarà ripristinato.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                    <i class="fas fa-trash mr-2"></i> Elimina Ordine
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

