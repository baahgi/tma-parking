@extends('layouts.app')

@section('content')

@include('notifications')

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
@endsection

