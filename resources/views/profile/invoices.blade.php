@extends('layouts.app')

@section('main-content')
<section class="py-2 bg-blueGray-50">
    <div class="container px-4 mx-auto">
        <div class="pt-14 px-8 pb-12 bg-white rounded-5xl">
            <div class="flex flex-wrap mb-8 justify-between items-center">
                <div class="w-full md:w-auto mb-10 md:mb-0">
                    <h3 class="text-3xl font-heading font-medium leading-10">
                        Sales Invoices
                    </h3>
                </div>
            </div>
            <div class="overflow-x-auto">
                <div class="inline-block w-full min-w-max overflow-hidden">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="pb-8 text-sm text-body text-left text-opacity-40 font-heading font-semibold uppercase">
                                    Product
                                </th>
                                <th class="pb-8 text-sm text-body text-center text-opacity-40 font-heading font-semibold uppercase">
                                    Ammount
                                </th>
                                <th class="pb-8 text-sm text-body text-center text-opacity-40 font-heading font-semibold uppercase">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr style="border-radius: 4px;">
                                    <td class="p-0">
                                        <div class="{{ $loop->iteration % 2 == 0 ? 'flex items-center pl-4 pr-4 h-20 bg-blueGray-50 border-l border-t border-b border-gray-100 bg-gray-50 rounded-tl-2xl rounded-bl-2xl' : 'flex items-center pl-4 pr-4 h-20' }}">
                                            <div class="flex items-center">
                                                <img class="mr-4 h-10" src="/placeholder-icon4.png" alt="">
                                                <div class="flex-shrink-1">
                                                    <h4 class="font-heading font-medium mt-2 leading-4 text-xl">
                                                        # {{ $invoice['invoice_id'] ?? 'N/A' }}
                                                    </h4>
                                                    <div class="text-sm mt-3 text-darkBlueGray-400 leading-3">
                                                        {{ \Carbon\Carbon::parse($invoice['invoice_date'])->format('MMM DD yyyy : hh:mm A') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="{{ $loop->iteration % 2 == 0 ? 'flex items-center justify-center p-5 h-20 text-center bg-blueGray-50 border-t border-b border-gray-100 bg-gray-50' : 'flex items-center justify-center p-5 h-20 text-center' }}">
                                            <span class="font-heading text-darkBlueGray-400 text-lg">
                                                $ {{ $invoice['invoice_amount'] ?? '0.00' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <div class="{{ $loop->iteration % 2 == 0 ? 'flex items-center justify-center p-5 h-20 text-center bg-blueGray-50 border-t border-b border-r border-gray-100 bg-gray-50 rounded-tr-2xl rounded-br-2xl' : 'flex items-center justify-center p-5 h-20 text-center' }}">
                                            <span class="py-1 px-3 text-sm text-green-900 font-medium bg-green-200 rounded-full">
                                                {{ $invoice['invoice_paid'] ? 'Paid' : 'Unpaid' }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
