@extends('layouts.app')

@section('content')

@include('notifications')

<div class="flex flex-col md:flex-row">

    <div class="w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow">
        <div class="px-6 py-4">
            <div class="text-3xl font-bold text-center text-gray-700">Checkout</div>
            <div class="mt-1 text-center text-gray-600">{{$parking->consignmentno}}</div>
            <form action="{{ route('parking.update') }}" method="POST">
                @csrf
                @method('patch')

                <div class="w-full mt-4">
                    <div class="">

                    </div>

                    <table class="min-w-full">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                style="text-align: start">
                                item
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                style="text-align: start">
                                Data
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white">
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Vehicle number
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-100 whitespace-no-wrap bg-gray-800 border-b border-gray-200">
                                        {{$parking->vehicle_no}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Checkin
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-100 whitespace-no-wrap bg-gray-800 border-b border-gray-200">
                                        {{$parking->checkin}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        CheckOut
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-100 whitespace-no-wrap bg-gray-800 border-b border-gray-200">
                                        {{ $checkout_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Hours
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-100 whitespace-no-wrap bg-gray-800 border-b border-gray-200">
                                        {{ $hours_spent }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        Amount (GHS)
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-100 whitespace-no-wrap bg-gray-800 border-b border-gray-200">
                                        {{ $amount }}
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <input type="text" name="current_time" value="{{$checkout_time}}"  hidden>
                <input type="text" name="amount" value="{{$amount}}"  hidden>
                <input type="text" name="hours" value="{{$hours_spent}}"  hidden>
                <input type="text" name="consignmentno" value="{{$parking->consignmentno}}"  hidden>

                <div class="mt-6">
                    @if (!$parking->checkout)
                        <button type="submit"
                                class="px-8 py-2 text-white bg-gray-700 rounded hover:bg-gray-600 focus:outline-none">
                            Checkout
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>


    @if ($parking->checkout)
        <div class="mt- md:ml-6 md:mt-0">
            <div id="checkoutprint" class="w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow ">
                <div class="px-6 py-4">
                    <div class="text-xl font-bold text-center text-gray-700">TMA PARKING</div>
                    <div class="mt-1 text-sm text-center text-gray-600">Powered by Techmaxx</div>

                        <div class="w-full mt-2">
                            {{-- <div class="flex justify-center">
                                <svg id="barcode"></svg>
                            </div> --}}

                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-3 py-1 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        item
                                    </th>
                                    <th class="px-3 py-1 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                        style="text-align: start">
                                        Data
                                    </th>

                                </tr>
                                </thead>

                                <tbody class="bg-white">
                                        <tr>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                Vehicle number :
                                            </td>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                {{$parking->vehicle_no}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                Checkin :
                                            </td>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                {{$parking->checkin}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                CheckOut :
                                            </td>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                {{ $checkout_time }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                Hours :
                                            </td>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                {{ $hours_spent }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                Amount (GHS) :
                                            </td>
                                            <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                                {{ $amount }}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>

                <div class="flex justify-center mx-auto mt-4">
                    <button onclick="printReceipt({{$parking->consignmentno}})"
                            class="flex items-center px-6 py-2 text-white bg-green-700 rounded hover:bg-green-600 focus:outline-none">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Print
                    </button>
                </div>
        </div>
    @endif



</div>

@push('scripts')

<script src="{{asset('js/JsBarcode.all.min.js')}}"></script>
<script type="text/javascript">

        function printReceipt(consignmentno){
            const url = location.protocol + "//" + location.host;
            var myWindow = window.open(`${url}/parking/checkout/print/${consignmentno}`, "Print Recipt", "width=600,height=600");
        }


    // function PrintDiv() {

    //     var divContents = document.getElementById("checkoutprint").innerHTML;
    //     var printWindow = window.open('', '', 'height=600,width=600');
    //     printWindow.document.write('<html><head><title> checkout print</title>');
    //     printWindow.document.write('</head><body >');
    //     printWindow.document.write('<link rel="stylesheet" href="/css/app.css" type="text/css" />');
    //     printWindow.document.write(divContents);
    //     printWindow.document.write('</body></html>');
    //     printWindow.document.close();

    // }

    // var url = <?php echo json_encode($parking->consignmentno) ?>;
    //   JsBarcode("#barcode", url, {
    //     height: 60,
    //     width:1.5,
    //   });

</script>

@endpush

@endsection
