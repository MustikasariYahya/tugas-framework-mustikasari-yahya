<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Riwayat Transaksi Saya</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left">No</th>
                            <th class="px-3 py-2 text-left">No. Invoice</th>
                            <th class="px-3 py-2 text-left">Tanggal</th>
                            <th class="px-3 py-2 text-right">Item</th>
                            <th class="px-3 py-2 text-right">Total</th>
                            <th class="px-3 py-2 text-right">Bayar</th>
                            <th class="px-3 py-2 text-right">Kembali</th>
                            <th class="px-3 py-2"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($transactions as $trx)
                            <tr>
                                <td class="px-3 py-2 text-gray-500">
                                    {{ $loop->iteration + ($transactions->currentPage() - 1) * $transactions->perPage() }}
                                </td>
                                <td class="px-3 py-2">{{ $trx->invoice_number }}</td>
                                <td class="px-3 py-2">{{ $trx->created_at->format('d M Y H:i') }}</td>
                                <td class="px-3 py-2 text-right">{{ $trx->details_count }}</td>
                                <td class="px-3 py-2 text-right">Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
                                <td class="px-3 py-2 text-right">Rp{{ number_format($trx->pay, 0, ',', '.') }}</td>
                                <td class="px-3 py-2 text-right">Rp{{ number_format($trx->change, 0, ',', '.') }}</td>
                                <td class="px-3 py-2 text-right">
                                    <a href="{{ route('pos.struk', $trx) }}" class="text-indigo-600 hover:text-indigo-900">Struk</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-3 py-6 text-center text-gray-500">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $transactions->links() }}
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>