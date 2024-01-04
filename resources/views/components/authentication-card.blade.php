<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md py-2 bg-black bg-opacity-75 sm:rounded-lg">
        {{-- {{ $logo }} --}}
        <h1 class="title">
            Azylana<br>
            <small>the free browser game</small>
        </h1>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-green-50 bg-opacity-90 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
