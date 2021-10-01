@extends('layouts.app')

@section('content')

    <div class="w-full mx-auto">
        <div>
            <!-- Card stats -->
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 md:w-1/3">
                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                                    <h5 class="text-xs font-bold text-gray-500 uppercase">
                                        TODAY'S CHECKIN
                                    </h5>
                                    <span class="text-xl font-semibold text-gray-800">
                          {{$todaysCheckin}}
                        </span>
                                </div>
                                <div class="relative flex-initial w-auto px-2">
                                    <div
                                            class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-orange-500 rounded-full shadow-lg">
                                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">
                      {{-- <span class="mr-2 text-red-500">
                        <i class="fas fa-arrow-down"></i> 3.48%
                      </span> --}}
                                <span class="whitespace-no-wrap">
                        Total No. of checkins today
                      </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/3">
                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                                    <h5 class="text-xs font-bold text-gray-500 uppercase">
                                        TODSY'S CHECKOUT
                                    </h5>
                                    <span class="text-xl font-semibold text-gray-800">
                          {{$todaysCheckout}}
                        </span>
                                </div>
                                <div class="relative flex-initial w-auto px-2">
                                    <div
                                            class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-pink-500 rounded-full shadow-lg">
                                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">
                      {{-- <span class="mr-2 text-orange-500">
                        <i class="fas fa-arrow-down"></i> 1.10%
                      </span> --}}
                                <span class="whitespace-no-wrap">
                                Total No. of checkouts today
                      </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/3">
                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white rounded shadow-lg xl:mb-0">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative flex-1 flex-grow w-full max-w-full pr-4">
                                    <h5 class="text-xs font-bold text-gray-500 uppercase">
                                        TODAY'S TOTAL
                                    </h5>
                                    <span class="text-xl font-semibold text-gray-800">
                          {{$todaysTotal}}
                        </span>
                                </div>
                                <div class="relative flex-initial w-auto px-2">
                                    <div
                                            class="inline-flex items-center justify-center w-12 h-12 p-3 text-center text-white bg-blue-500 rounded-full shadow-lg">
                                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                             stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                            <path
                                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-500">
                      {{-- <span class="mr-2 text-green-500">
                        <i class="fas fa-arrow-up"></i> 12%
                      </span> --}}
                                <span class="whitespace-no-wrap">
                        Total amount in today
                      </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">
        <h2 class="text-2xl font-medium">Tables</h2>
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
                                    Name
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Title
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Role
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                 alt=""/>
                                        </div>
                                        <div class="mx-2">
                                            <div class="text-sm font-medium leading-5 text-gray-900">Jone Doe</div>
                                            <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    Software Engineer
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                          class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    Active
                                  </span>
                                </td>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    Owner
                                </td>
                                <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                 alt=""/>
                                        </div>
                                        <div class="mx-2">
                                            <div class="text-sm font-medium leading-5 text-gray-900">Jone Doe</div>
                                            <div class="text-sm leading-5 text-gray-500">bernardlane@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    Actor
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                          class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                    Active
                                  </span>
                                </td>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    Owner
                                </td>
                                <td class="px-6 py-4 text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
