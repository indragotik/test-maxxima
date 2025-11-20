<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Siswa Detail {{ $data->name }}</title>
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
        </tr>
    </table>
    <div class="grid grid-cols-8 gap-4 mb-4 p-5">
        <div class="col-span-4 mt-2">
            <h1 class="text-3xl font-bold">
                Siswa Detail {{ $data->name }}
            </h1>

        </div>
    </div>
    <div class="bg-white p-5 rounded shadow-sm">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Nama Siswa
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->name}}
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        NIS
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->nis }}
                    </td>
                </tr>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Alamat
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->nis }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    <a href="{{ route('siswa.index') }}"
       class="mt-3 inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full ">back</a>
    <a href="{{ route('siswa.edit', $data) }}"
       class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full"
       id="edit-siswa-btn">Edit Siswa</a>

</div>

</body>

</html>
