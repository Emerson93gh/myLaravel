<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-gray-100">
                    {{-- {{ __("Lista de Ventas") }} --}}
                    <h2 class="text-2xl text-center font-bold">
                        Lista de Ventas
                    </h2>
                </div>

                <div class="mt-4 -mb-3">
                    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25 p-6 text-gray-900 dark:text-gray-100">
                        <div class="relative rounded-xl overflow-auto">
                            <div class="shadow-sm overflow-hidden my-8">
                                <table class="border-collapse table-auto w-full text-sm">
                                    <thead>
                                        <tr>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                #</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                No. Factura</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                Agencia</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                Lista de Productos</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                Descuentos</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                Total</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                Vendedor</th>
                                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-center">
                                                Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class=" dark:bg-slate-800">
                                        @forelse ($sales as $sale)
                                        {{-- @dd($sale) --}}
                                            <tr>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400" scope="row">
                                                    {{$sale->id}} </td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    {{$sale->ticket_number}}</td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    {{$sale->agency}}</td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    {{$sale->products}}</td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    {{$sale->discount}}</td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    {{$sale->total}}</td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-50 dark:text-slate-50" scope="row">
                                                    {{$sale->vendor_code}}</td>
                                                <td class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    Edit - Delete</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td scope="row" colspan="8" class="text-center border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                    NO HAY REGISTROS!
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
