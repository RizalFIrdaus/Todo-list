<div>
    <div class="todo-in p-10 w-full">
        <form class="flex items-center" wire:submit.prevent='store' method="POST" >
            <label for="voice-search" class="sr-only">Add list..</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa-solid fa-list"></i>
                </div>
                <input type="text" id="voice-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Add list.." wire:model='title' >
                <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg aria-hidden="true"
                        class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add
            </button>
        </form>
        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
    
    </div>
    <div class="px-10 py-5">
        <div class="todo-app w-full max-h-[520px] overflow-auto">
            @foreach ($todo as $data)
                <div 
                    class="flex my-5 items-center justify-between p-4 m-4 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="max-w-2xl">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->tittle }}</h5>
                        {{-- <p class="font-normal text-slate-400 dark:text-gray-400">{{ $data->subtitle }}  --}}
                        </p>
                    </div>
                    <div wire:click.prevent='destroy({{ $data->id }})'>
                        <i class="fa-solid fa-trash text-red-500 shadow-md cursor-pointer hover:text-slate-800" ></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
