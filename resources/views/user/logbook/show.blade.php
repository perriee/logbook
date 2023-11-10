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
                <form action="{{ route('logbooks.update', $logbook->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-slate-300 dark:text-white">Deskripsi</label>
                        <textarea id="description" name="description" rows="8"
                            class="block focus:ring-0 border-none p-2.5 w-full text-base text-slate-300 bg-slate-700 rounded-lg placeholder-slate-400"
                            placeholder="Bagaimana kegiatan kamu hari ini?">{{ $logbook->description }}</textarea>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-sky-500 hover:bg-sky-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            color: 'white',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        })

        @if ($message = Session::get('update_success'))
            Toast.fire({
                icon: 'success',
                title: '{{ $message }}',
                background: '#22c55e'
            })
        @endif
    </script>
@endpush
