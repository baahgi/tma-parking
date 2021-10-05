@if (session('success'))

    <div class="flex items-center mb-4" role="alert">
        <div class="w-full max-w-lg mx-auto overflow-hidden bg-gray-100 rounded-lg shadow">
            <div class="flex p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="pl-6">
                    <p class="font-semibold">Successfully Saved!</p>
                    <span class="text-sm text-gray-600">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    </div>

@endif

@if (session('error'))

<div class="flex items-center mb-4" role="alert">
    <div class="w-full max-w-lg mx-auto overflow-hidden bg-red-100 rounded-lg shadow">
        <div class="flex p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            <div class="pl-6">
                <p class="font-semibold">Error!</p>
                <span class="text-sm text-gray-600">{{ session('error') }}</span>
            </div>
        </div>
    </div>
</div>
@endif

