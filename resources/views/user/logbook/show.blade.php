@extends('layouts.app')

@section('content')
    @php
        if ($logbook) {
            $day = $logbook->created_at->translatedFormat('l');
            $date = $logbook->created_at->translatedFormat('d M Y');
        }
    @endphp
    <div class="flex flex-col gap-4 bg-slate-700/70 p-8 rounded-xl">
        <div class="flex justify-between">
            <div class="text-slate-400">
                {{ $day }}, {{ $date }}.
            </div>
            <div class="flex gap-1 text-slate-400 font-semibold">
                <div class="hover:text-slate-300"><button id="updateLogbookButton" data-modal-toggle="updateLogbookModal"
                        type="button" class="underline">Edit</button></div>
                <div>·</div>
                <form action="{{ route('logbooks.destroy', $logbook->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="underline hover:text-slate-300">Hapus</button>
                </form>
            </div>
        </div>
        <div class="text-slate-200">
            {{ $logbook->description }}
        </div>
    </div>

    {{-- Update Modal --}}
    <div id="updateLogbookModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-slate-800 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-slate-300 dark:text-white">
                        Edit Logbook
                    </h3>
                    <button type="button"
                        class="text-slate-300 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="updateLogbookModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-slate-300 dark:text-white">Deskripsi</label>
                            <input type="text" name="name" id="name"
                                class="bg-slate-700 text-gray-900 border-none placeholder-slate-400 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Ex. Apple iMac 27&ldquo;">
                        </div>
                        <div>
                            <label for="brand"
                                class="block mb-2 text-sm font-medium text-slate-300 dark:text-white">Tanggal</label>
                            <input type="date" name="brand" id="brand"
                                class="bg-slate-700 borde-none text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-slate-400">
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-sky-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Update
                        </button>
                        <button type="button"
                            class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
