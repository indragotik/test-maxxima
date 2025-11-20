<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Maxxima</title>
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
</head>

<body>

<div class="container mx-auto mt-10 mb-10 px-10">
    <table>
        <tr>
            <th class="px-2">
                <a href="{{ route('siswa.index') }}" class="text-blue-500 hover:text-blue-200">Siswa</a>
            </th>
            <th class="px-2">
                <a href="{{ route('mata-pelajaran.index') }}" class="text-blue-500 hover:text-blue-200">Mata Pelajaran</a>
            </th>
            <th class="px-2">
                <a href="{{ route('ujian.index') }}" class="text-blue-500 hover:text-blue-200">Ujian</a>
            </th>
            <th class="px-2">
                <a href="{{ route('peserta.index') }}" class="text-blue-500 hover:text-blue-200">Peserta</a>
            </th>
        </tr>
    </table>

    <div class="grid grid-cols-8 gap-4 mb-4 p-5 mt-20">
        <div class="col-span-4 mt-2">
            <h1 class="text-3xl font-bold">
                Daftar Siswa
            </h1>
        </div>
        <div class="col-span-4">
            <div class="flex justify-end">
                <a href="{{ route('siswa.create') }}"
                   class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                   id="add-siswa-btn">Add Siswa</a>
            </div>
        </div>
    </div>
    <div class="bg-white p-5 rounded shadow-sm">
        <!-- Notifikasi menggunakan flash session data -->
        @if (session('success'))
            <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NIS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($datas as $data)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->nis}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                  action="{{ route('siswa.destroy', $data) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                <a href="{{ route('siswa.show', $data) }}" id="{{ $data->id }}-edit-btn"
                                   class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">View</a>

                                <a href="{{ route('siswa.edit', $data) }}" id="{{ $data->id }}-edit-btn"
                                   class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                                <button type="submit"
                                        class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                        id="{{ $data->id }}-delete-btn">Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td class="text-center text-sm text-gray-900 px-6 py-4 whitespace-nowrap" colspan="6">
                            Data Empty
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="mt-3">
        {{ $datas->links() }}
    </div>
</div>

</body>

</html>
