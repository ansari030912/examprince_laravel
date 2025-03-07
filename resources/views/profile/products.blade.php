@extends('layouts.app')

@section('main-content')
<section class="py-8 bg-gray-50 ">
  <div class="container px-4 mx-auto">
    <div class="pt-12 pb-12 rounded-5xl">
      <h1 class="mb-8 font-bold text-5xl text-center">Products</h1>

      @if(empty($products) || count($products) == 0)
         <p class="mb-8 font-bold text-red-500 text-center text-3xl">
           There is not purchase products
         </p>
      @else
         @foreach($products as $row)
           <div class="border-2 border-gray-200 mb-4 rounded-xl bg-white p-4" style="padding: 16px; margin-bottom: 8px;">
             <!-- Vendor name and product details -->
             <div class="flex flex-col md:flex-row justify-between items-center">
               <div class="md:w-2/3">
                 <p class="text-blue-500 lg:text-xl font-bold">
                   {{ $row['product_vendor'] ?? $row['product_type_detail'] }}
                   @if($row['product_code'] !== "Unlimited Test Engine Access" && $row['product_code'] !== "Unlimited PDF Access")
                     - {{ $row['product_code'] }}
                   @endif
                 </p>
                 <p class="text-green-500 lg:text-lg font-bold">
                   {{ $row['product_name'] ?? '' }}
                 </p>
                 <p class="text-red-500 text-sm font-semibold">
                   @if($row['product_code'] !== "Unlimited Test Engine Access" && $row['product_code'] !== "Unlimited PDF Access")
                     {{ $row['product_type_detail'] }}
                   @endif
                 </p>
               </div>
               <!-- Status and Expiry Date -->
               <div class="md:w-1/3 flex flex-col md:flex-row md:justify-between items-center my-4">
                 <p class="font-bold text-center" style="color: {{ $row['product_expired'] ? 'red' : 'green' }}">
                   {{ $row['product_expired'] ? 'Expired' : 'Active' }}
                 </p>
                 <p class="font-semibold text-gray-600 text-center">
                   {{ \Carbon\Carbon::parse($row['product_expiry_date'])->format('M d Y : h:i A') }}
                 </p>
               </div>
             </div>
             <!-- Action Buttons -->
             <div class="flex flex-wrap md:flex-row gap-2 mt-4">
               @if(isset($row['product_access']))
                 @foreach($row['product_access'] as $product)
                   @if($product['type'] === "download_pdf")
                     <a href="https://certsgang.com{{ $product['url'] }}"
                        class="flex justify-center bg-green-600 font-bold text-white py-2 px-4 rounded"
                        title="Download Premium PDF File">
                        <!-- SVG icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mr-2" viewBox="0 0 24 24">
                          <g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path stroke-dasharray="20" stroke-dashoffset="20" d="M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5">
                              <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="20;0"/>
                            </path>
                            <path stroke-dasharray="16" stroke-dashoffset="16" d="M6 19h12">
                              <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="16;0"/>
                            </path>
                          </g>
                        </svg>
                        Download PDF
                     </a>
                   @elseif($product['type'] === "te_access")
                     <a href="{{ url('/te-access/'.$product['prams']['payment_id'].'/'.$product['prams']['exam_id'].'/'.$product['prams']['rel_id']) }}"
                        class="flex justify-center bg-yellow-400 text-white font-bold py-2 px-4 rounded"
                        title="Test Engine Access">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mr-2" viewBox="0 0 24 24">
                          <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M15.68 5.348a2.95 2.95 0 0 0-2.953 2.946 2.95 2.95 0 0 0 2.954 2.945 2.95 2.95 0 0 0 2.954-2.945 2.95 2.95 0 0 0-2.954-2.946m-1.453 2.946a1.45 1.45 0 0 1 1.454-1.446c.806 0 1.454.65 1.454 1.446a1.45 1.45 0 0 1-1.454 1.445 1.45 1.45 0 0 1-1.454-1.445"/>
                          </g>
                        </svg>
                        Test Engine Access
                     </a>
                   @elseif($product['type'] === "sc_access")
                     <a href="{{ url('/sc-access/'.$product['prams']['payment_id'].'/'.$product['prams']['exam_id']) }}"
                        class="flex justify-center bg-red-600 font-bold text-white text-sm py-2 px-4 rounded"
                        title="Start Training Course">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-2" viewBox="0 0 2048 2048">
                          <path fill="currentColor" d="M1760 1590q66 33 119 81t90 107t58 128t21 142h-128q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149h-128q0-73 20-142t58-128t91-107t119-81q-75-54-117-135t-43-175q0-79 30-149t82-122t122-83t150-30q79 0 149 30t122 82t83 123t30 149q0 94-42 175t-118 135m-224-54q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m-512 80q-32 37-58 77t-46 86q-53-55-128-85t-152-30H256V384H128v1408h787q-14 31-23 63t-15 65H0V256h256V128h384q88 0 169 27t151 81q69-54 150-81t170-27h384v128h256v640q-58-57-128-95V384h-128v369q-32-9-64-13t-64-4V256h-256q-70 0-136 24t-120 71zm-128-13V351q-54-46-120-70t-136-25H384v1280h256q67 0 132 17t124 50"/>
                        </svg>
                        Start Training Course
                     </a>
                   @elseif($product['type'] === "unlimited_te_access")
                     <a href="{{ url('/unlimited-te-access/'.$product['prams']['payment_id'].'/'.$product['prams']['rel_id']) }}"
                        class="flex justify-center bg-yellow-400 font-bold text-white py-2 px-4 rounded"
                        title="Unlimited Test Engine Access">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-2" viewBox="0 0 16 16">
                          <path d="M2 2h12v12H2z" fill="none"/>
                          <path fill="white" d="M8 1l7 7-7 7-7-7z"/>
                        </svg>
                        Unlimited TE Access
                     </a>
                   @elseif($product['type'] === "unlimited_pdf_access")
                     <a href="{{ url('/unlimited-pdf-access/'.$product['prams']['payment_id'].'/'.$product['prams']['rel_id']) }}"
                        class="flex justify-center bg-green-600 font-bold text-white py-2 px-4 rounded"
                        title="Unlimited PDF Access">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="mr-2" viewBox="0 0 16 16">
                          <path d="M2 2h12v12H2z" fill="none"/>
                          <path fill="white" d="M8 1l7 7-7 7-7-7z"/>
                        </svg>
                        Unlimited PDF Access
                     </a>
                   @endif
                 @endforeach
               @endif
             </div>
           </div>
         @endforeach
      @endif
    </div>
  </div>
</section>
@endsection
