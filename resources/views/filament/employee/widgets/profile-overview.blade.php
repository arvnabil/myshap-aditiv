<x-filament-widgets::widget>
    <x-filament::section style="box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5);background-size: contain;background: url(https://images.pexels.com/photos/1097930/pexels-photo-1097930.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1)">
        <script>
    // login page only
    if ($('#sapaan').length > 0) {
        let date = new Date();
        date.toLocaleString('en-US', {
            timeZone: "Asia/Jakarta"
        });
        let jam = date.getHours();
        let pesan = '';
        if (jam >= 19) {
            pesan = 'Selamat Malam';
        } else if (jam >= 15) {
            pesan = 'Selamat Sore';
        } else if (jam >= 10) {
            pesan = 'Selamat Siang';
        } else if (jam >= 0) {
            pesan = 'Selamat Pagi';
        }
        console.log(pesan);
        $('#sapaan').html(pesan);
    }
</script>
         <!-- Author card -->
    <div
        class="relative w-full max-w-xxl max-h-full flex flex-col items-start space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6 border-gray-400 dark:border-gray-400 rounded-lg">

        <div class="w-full flex justify-center sm:justify-start sm:w-auto">
            @if (auth()->user()->avatar === null)
            <img class="object-cover w-20 h-20 mt-3 mr-3 rounded-full" src="https://eu.ui-avatars.com/api/?name={{ auth()->user()->name }}=250">
            @else
            <img class="object-cover w-20 h-20 mt-3 mr-3 rounded-full" src="{{ url("storage/" . auth()->user()->avatar) }}">
            @endif
        </div>

        <div class="w-full sm:w-auto flex flex-col items-center sm:items-start">

            <p class="text-white font-display mb-2 text-2xl font-semibold dark:text-gray-200" itemprop="author">
                <span class="mb-2 display-4 font-weight-bold" id="sapaan">{{ __('Selamat Datang') }}</span>, {{ auth()->user()->employee->full_name }}
            </p>

            <div class="mb-4 md:text-lg text-white">
                <p class="flex">
                    <span class="pe-1">Departement:</span>
                    <x-filament::badge color="info">
                        {{ auth()->user()->employee->position->departement->name }}
                    </x-filament::badge>
                </p>
            </div>
            <div class="mb-4 md:text-lg text-white">
                <p class="flex">
                    <span class="pe-1">Position:</span>
                    <x-filament::badge color="info">
                        {{ auth()->user()->employee->position->name }}
                    </x-filament::badge>
                </p>
            </div>

            <div class="flex gap-4">

                {{-- <a title="youtube url" href="https://www.youtube.com/@mcqmate" target="_blank"
                    rel="noopener noreferrer">
                    <svg class="h-6 w-6 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M20.5949 4.45999C21.5421 4.71353 22.2865 5.45785 22.54 6.40501C22.9982 8.12001 23 11.7004 23 11.7004C23 11.7004 23 15.2807 22.54 16.9957C22.2865 17.9429 21.5421 18.6872 20.5949 18.9407C18.88 19.4007 12 19.4007 12 19.4007C12 19.4007 5.12001 19.4007 3.405 18.9407C2.45785 18.6872 1.71353 17.9429 1.45999 16.9957C1 15.2807 1 11.7004 1 11.7004C1 11.7004 1 8.12001 1.45999 6.40501C1.71353 5.45785 2.45785 4.71353 3.405 4.45999C5.12001 4 12 4 12 4C12 4 18.88 4 20.5949 4.45999ZM15.5134 11.7007L9.79788 15.0003V8.40101L15.5134 11.7007Z"
                            stroke="currentColor" stroke-linejoin="round"></path>
                    </svg>
                </a>

                <a title="website url" href="https://mcqmate.com/" target="_blank" rel="noopener noreferrer">
                    <svg class="h-6 w-6 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418">
                        </path>
                    </svg>
                </a> --}}
            </div>
        </div>

    </div>
    </x-filament::section>
</x-filament-widgets::widget>
