@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/datatables/jquery.datatables.css')}}">
<link rel="stylesheet" href="{{asset('css/datatables/buttons.datatables.min.css')}}">
    <style>
        		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568; 			/*text-gray-700*/
			padding-left: 1rem; 		/*pl-4*/
			padding-right: 1rem; 		/*pl-4*/
			padding-top: .5rem; 		/*pl-2*/
			padding-bottom: .5rem; 		/*pl-2*/
			line-height: 1.25; 			/*leading-tight*/
			border-width: 2px; 			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7; 		/*border-gray-200*/
			background-color: #edf2f7; 	/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;	/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button		{
			font-weight: 700;				/*font-bold*/
			border-radius: .25rem;			/*rounded*/
			border: 1px solid transparent;	/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current	{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
			color: #fff !important;				/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
			font-weight: 700;					/*font-bold*/
			border-radius: .25rem;				/*rounded*/
			background: #667eea !important;		/*bg-indigo-500*/
			border: 1px solid transparent;		/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important; /*bg-indigo-500*/
		}

    </style>
@endpush
@section('content')


    <div class="mt-12">
        <h2 class="text-2xl font-medium">Report</h2>
            <form class="flex" action="{{ route('report.datewise') }}" method="POST">
                @csrf
                <div class="w-full mt-4">
                    <input type="text"
                            value=""
                            id="datepickerfrom"
                            name="from"
                            placeholder="from"
                        class="block px-4 py-3 text-gray-700 placeholder-gray-500 bg-gray-100 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-white"/>

                </div>

                <div class="w-full mt-4 ml-2">
                    <input type="text"
                            value=""
                            id="datepickerto"
                            name="to"
                            placeholder="to"
                        class="block px-4 py-3 text-gray-700 placeholder-gray-500 bg-gray-100 border border-gray-300 rounded appearance-none focus:outline-none focus:bg-white"/>
                </div>

                <div class="w-full mt-4 ml-4">
                        <button type="submit"
                        class="px-4 py-3 text-white bg-gray-700 rounded hover:bg-gray-600 focus:outline-none">
                            Submit
                        </button>
                </div>
            </form>


        <div class="mt-8">
            <div class="flex flex-col">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6">
                    <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table id="dataTable" class="min-w-full">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    #
                                </th>
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
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Hours
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Amount
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($parkings as $parking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{$loop->index + 1}}
                                        </td>
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
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{$parking->hours ?? ''}}
                                        </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{$parking->amount ?? ''}}
                                        </span>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@push('scripts')

<script src="{{asset('js/datatables/jquery.min.js')}}"></script>
<script src="{{asset('js/datatables/jquery.datatables.js')}}"></script>
<script src="{{asset('js/datatables/datatables.buttons.min.js')}}"></script>
<script src="{{asset('js/datatables/pdfmaker.js')}}"></script>
<script src="{{asset('js/datatables/jszip.min.js')}}"></script>
<script src="{{asset('js/datatables/buttons.html5.min.js')}}"></script>

<script>
    var picker1 = new Pikaday({ field: document.getElementById('datepickerfrom'), format: 'MM/DD/YYYY', defaultDate: new Date(), setDefaultDate:true});
    var picker2 = new Pikaday({ field: document.getElementById('datepickerto'), format: 'MM/DD/YYYY', defaultDate: new Date(), setDefaultDate:true});

    $(document).ready(function () {
        $('#dataTable').DataTable({
            pageLength: 25,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel',
            ]
        })
        .columns.adjust()
		.responsive.recalc();

    });

</script>
@endpush

@endsection
