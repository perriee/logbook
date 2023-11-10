@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4">
        @foreach ($logbooks as $logbook)
            @php
                if ($logbook) {
                    $day = $logbook->created_at->translatedFormat('l');
                    $date = $logbook->created_at->translatedFormat('d M Y');
                }
            @endphp
            <div class="flex flex-col p-8 rounded-xl bg-slate-700/70 gap-3">
                <div class="text-slate-400">
                    {{ $day }}, {{ $date }}.
                </div>
                <div class="text-slate-200">
                    {{ Str::limit($logbook->description, 200) }}
                </div>
                <div class="flex justify-end">
                    <span><a href="{{ route('logbooks.show', $logbook->id) }}"
                            class="text-sky-500 font-semibold">Selengkapnya</a></span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {!! $logbooks->links('pagination::tailwind') !!}
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

        @if (Session::get('store_success'))
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menambah Logbook',
                background: '#22c55e'
            })
        @elseif (Session::get('destroy_success'))
            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menghapus Logbook',
                background: '#dc2626'
            })
        @endif
    </script>
@endpush
