<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Data Pemeriksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 text-sm" role="alert">
                            <p class="font-bold">Sukses!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="mb-4" style="border: none; border-bottom: none;"> <!-- Menghilangkan garis -->
                        <a href="{{ route('examiners.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Pemeriksa Baru
                        </a>
                    </div>
                    <form action="{{ route('examiners.index') }}" method="GET" class="flex-grow mr-4">
                        <div class="flex">
                            <input type="text" name="search" placeholder="Cari nama pasien..." value="{{ request('search') }}" class="flex-grow px-3 py-2 text-sm border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 text-sm rounded-r-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Cari</button>
                        </div>
                        @if($examiners->isEmpty() && request('search'))
                            <div class="mt-4 text-red-500">Data tidak ada</div>
                        @endif
                    </form>
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-blue-800 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-blue-800 uppercase tracking-wider">Jabatan</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-blue-800 uppercase tracking-wider">Alamat</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-blue-800 uppercase tracking-wider">No. Telepon</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-red-800 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200"></tbody>
                            @foreach($examiners as $examiner)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $examiner->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $examiner->jabatan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Illuminate\Support\Str::limit($examiner->address, 30, '...') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $examiner->phone_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('examiners.show', $examiner->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('examiners.edit', $examiner->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('examiners.destroy', $examiner->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
</x-app-layout>