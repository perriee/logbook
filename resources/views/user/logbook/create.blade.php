@extends('layouts.app')

@section('content')
    <section class="dark:bg-gray-900">
        <div class="mx-auto">
            <h2 class="mb-4 text-xl font-semibold text-slate-300">Tambah Logbook</h2>
            <form action="{{ route('logbooks.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <textarea id="description" name="description" rows="8"
                            class="block focus:ring-0 p-2.5 w-full text-base text-slate-300 bg-slate-700 rounded-lg placeholder-slate-400 @error('description') !border-2 !border-red-600 @else border-none @enderror"
                            placeholder="Bagaimana kegiatan kamu hari ini?"></textarea>
                    </div>
                    @error('description')
                       <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-base font-medium text-center text-white bg-sky-500 hover:bg-sky-600 rounded-lg">
                    Tambah
                </button>
            </form>
        </div>
    </section>
@endsection
