@extends('layouts.app')

@section('content')


    <div class="mt-12">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-medium">Parkings <span class="text-xs text-gray-600">for today</span></h2>

            <a href="{{route('parking.checkin')}}"
                class="flex items-center justify-between px-4 py-2 text-gray-300 bg-gray-800 rounded-lg"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                Add New
            </a>

        </div>
        <div class="mt-4">
            <div class="flex flex-col">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6">
                    <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Consignmentno
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Vehicle no
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Checkin
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Checkout
                                </th>

                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($parkings as $parking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{$parking->consignmentno}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{$parking->vehicle_no}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            {{$parking->checkin}}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{$parking->checkout ?? ''}}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex justify-between">
                                                @if ($parking->checkout)
                                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">{{''}}</a>
                                                @else
                                                    <a href="{{ route('parking.checkout', $parking->consignmentno) }}" class="text-indigo-600 hover:text-indigo-900">Checkout</a>
                                                @endif

                                                @if (!$parking->checkout)
                                                <button onclick="printReceipt({{$parking->consignmentno}})"
                                                    class="flex items-center justify-center px-2 py-1 ml-2 text-white bg-blue-700 rounded hover:bg-blue-600 focus:outline-none">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                    </svg>

                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $parkings->links('custompagination') }}
                </div>
            </div>
        </div>
    </div>


@push('scripts')
    <script>
        function printReceipt(consignmentno){
            const url = location.protocol + "//" + location.host;
            var myWindow = window.open(`${url}/parking/checkin/print/${consignmentno}`, "Print Recipt", "width=600,height=600");
        }
    </script>
@endpush

@endsection
