<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Detail Pemeriksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">{{ $examiner->name }}</h3>
                    <p><strong>Jabatan:</strong> {{ $examiner->jabatan }}</p>
                    <p><strong>Alamat:</strong> {{ $examiner->address }}</p>
                    <p><strong>Nomor Telepon:</strong> {{ $examiner->phone_number }}</p>
                    <a href="{{ route('examiners.index') }}" class="mt-4 inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded">
                        Kembali ke Daftar Pemeriksa
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>