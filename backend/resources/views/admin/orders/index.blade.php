@extends('admin.layouts.app')

@section('title', 'Ordini')
@section('page-title', 'Gestione Ordini')
@section('page-subtitle', 'Visualizza e gestisci tutti gli ordini ricevuti')

@section('content')
<div class="space-y-6">
    
    <!-- Header Actions -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <!-- Filter by Status -->
            <form method="GET" class="flex items-center gap-2">
                <select name="status" 
                        onchange="this.form.submit()"
                        class="px-4 py-2.5 rounded-xl bg-dark-card border border-dark-border text-white focus:border-accent-primary focus:outline-none transition-all">
                    <option value="">Tutti gli stati</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>In Attesa</option>
                    <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>In Elaborazione</option>
                    <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Spedito</option>
                    <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Consegnato</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Annullato</option>
                </select>
            </form>
        </div>

        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-400">{{ $orders->total() }} ordini totali</span>
        </div>
    </div>

    <!-- Orders List -->
    <div class="glass-effect rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-dark-border">
                <thead>
                    <tr class="bg-dark-hover">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            N° Ordine
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Cliente
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Totale
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Stato
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Pagamento
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Data
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Azioni
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-dark-border">
                    @forelse($orders as $order)
                    <tr class="hover:bg-dark-hover transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full 
                                    {{ $order->status === 'pending' ? 'bg-yellow-400' : '' }}
                                    {{ $order->status === 'processing' ? 'bg-blue-400' : '' }}
                                    {{ $order->status === 'shipped' ? 'bg-purple-400' : '' }}
                                    {{ $order->status === 'delivered' ? 'bg-green-400' : '' }}
                                    {{ $order->status === 'cancelled' ? 'bg-red-400' : '' }}
                                "></div>
                                <span class="text-sm font-semibold text-white">{{ $order->order_number }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                                <div class="text-sm font-semibold text-white">{{ $order->customer_name }}</div>
                                <div class="text-xs text-gray-400">{{ $order->customer_email }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-lg font-bold text-accent-primary">€{{ number_format($order->total, 2) }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $order->status === 'pending' ? 'bg-yellow-500/20 text-yellow-400' : '' }}
                                {{ $order->status === 'processing' ? 'bg-blue-500/20 text-blue-400' : '' }}
                                {{ $order->status === 'shipped' ? 'bg-purple-500/20 text-purple-400' : '' }}
                                {{ $order->status === 'delivered' ? 'bg-green-500/20 text-green-400' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-500/20 text-red-400' : '' }}
                            ">
                                {{ $order->status === 'pending' ? 'In Attesa' : '' }}
                                {{ $order->status === 'processing' ? 'In Elaborazione' : '' }}
                                {{ $order->status === 'shipped' ? 'Spedito' : '' }}
                                {{ $order->status === 'delivered' ? 'Consegnato' : '' }}
                                {{ $order->status === 'cancelled' ? 'Annullato' : '' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $order->payment_status === 'pending' ? 'bg-yellow-500/20 text-yellow-400' : '' }}
                                {{ $order->payment_status === 'paid' ? 'bg-green-500/20 text-green-400' : '' }}
                                {{ $order->payment_status === 'failed' ? 'bg-red-500/20 text-red-400' : '' }}
                                {{ $order->payment_status === 'refunded' ? 'bg-gray-500/20 text-gray-400' : '' }}
                            ">
                                {{ $order->payment_status === 'pending' ? 'In Attesa' : '' }}
                                {{ $order->payment_status === 'paid' ? 'Pagato' : '' }}
                                {{ $order->payment_status === 'failed' ? 'Fallito' : '' }}
                                {{ $order->payment_status === 'refunded' ? 'Rimborsato' : '' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <a href="{{ route('admin.orders.show', $order) }}" 
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-accent-primary/10 text-accent-primary hover:bg-accent-primary/20 transition-all">
                                <i class="fas fa-eye"></i>
                                <span>Vedi</span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="w-16 h-16 rounded-full bg-dark-hover flex items-center justify-center">
                                    <i class="fas fa-shopping-cart text-3xl text-gray-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white mb-1">Nessun ordine trovato</h3>
                                    <p class="text-sm text-gray-400">Non ci sono ordini con i filtri selezionati</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($orders->hasPages())
            <div class="flex items-center justify-between px-6 py-4 border-t border-dark-border">
                <div class="text-sm text-gray-400">
                    Mostrando <span class="text-white font-semibold">{{ $orders->firstItem() }}</span> - 
                    <span class="text-white font-semibold">{{ $orders->lastItem() }}</span> di 
                    <span class="text-white font-semibold">{{ $orders->total() }}</span> ordini
                </div>
                
                <div class="flex items-center gap-2">
                    @if($orders->onFirstPage())
                        <span class="px-4 py-2 rounded-lg bg-dark-hover text-gray-600 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $orders->previousPageUrl() }}" 
                           class="px-4 py-2 rounded-lg bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary transition-all">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @foreach($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                        <a href="{{ $url }}" 
                           class="px-4 py-2 rounded-lg transition-all {{ $page == $orders->currentPage() ? 'bg-gradient-to-r from-accent-primary to-accent-hover text-dark-bg font-semibold' : 'bg-dark-hover hover:bg-accent-primary/20 hover:text-accent-primary' }}">
                            {{ $page }}
                        </a>
                    @endforeach

                    @if($orders->hasMorePages())
                        <a href="{{ $orders->nextPageUrl() }}" 
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

</div>
@endsection
