@extends('layouts.app')

@section('content')

@include('layouts.partials.notifications')


    @if ($parking)

        <div class="flex justify-center mx-auto mb-4">
            <p class="px-8 py-2 mr-2 bg-gray-100">{{$parking->vehicle_no}}</p>
            <button onclick="printReceipt({{$parking->consignmentno}})"
                    class="flex items-center px-6 py-2 text-white bg-green-700 rounded hover:bg-green-600 focus:outline-none">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Print
            </button>
        </div>
    @endif


    <div class="flex items-center min-h-screen">
        <div class="w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow">
            <div class="px-6 py-4">
                <div class="text-3xl font-bold text-center text-gray-700">Checkin</div>
                <div class="mt-1 text-xl font-bold text-center text-gray-600">Welcome Back</div>
                <div class="mt-1 text-center text-gray-600">Adding new Vehicle</div>
                <form action="{{ route('parking.store') }}" method="POST">
                    @csrf
                    <div class="w-full mt-4">
                        <input type="text" name="vehicle_no" placeholder="vehicle number"
                               class="block w-full px-4 py-3 mt-2 text-gray-700 placeholder-gray-500 bg-gray-100 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-white"/>
                        @error('vehicle_no')
                        <p class="mt-4 text-xs text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="w-full mt-4">
                        <input type="text" name="consignmentno" readonly
                                value="{{ Date('ymd').rand(100000, 999999) }}"
                               class="block w-full px-4 py-3 mt-2 text-gray-700 placeholder-gray-500 bg-gray-100 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-white"/>
                        @error('consignmentno')
                        <p class="mt-4 text-xs text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="mt-6 ">
                        <button type="submit"
                                class="px-8 py-2 text-white bg-gray-700 rounded hover:bg-gray-600 focus:outline-none">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            function printReceipt(consignmentno){
                const url = location.protocol + "//" + location.host;
                var myWindow = window.open(`${url}/parking/checkout/print/${consignmentno}`, "Print Recipt", "width=600,height=600");
            }
        </script>
    @endpush
@endsection

