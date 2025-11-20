<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New Ujian</title>
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
    <div class="grid grid-cols-8 gap-4 p-5">
        <div class="col-span-4 mt-2">
            <h1 class="text-3xl font-bold">
                Create New Ujian
            </h1>
        </div>
        <div class="col-span-4">

        </div>
    </div>
    <div class="bg-white p-5 rounded shadow-sm">
        <form action="{{ route('ujian.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="name">Nama</label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="nama_ujian" value="{{ old('nama_ujian') }}" required>

                <!-- error message untuk name -->
                @error('nama_ujian')
                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="code">Mata Pelajaran</label>
                <select 
                    name="id_mata_pelajaran" 
                    id="id_mata_pelajaran" 
                    aria-placeholder="Pilih"
                    class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    "
                    required>
                    <?php foreach ($mataPelajaran as $mapel) { ?>
                    <option value="{{ $mapel->id }}">{{ $mapel->mata_pelajaran }}</option>
                    <?php } ?>
                </select>

                <!-- error message untuk code -->
                @error('id_mata_pelajaran')
                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="price">Tanggal</label>
                <input type="text" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded-full
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " name="tanggal" value="{{ old('tanggal') }}" required>

                <!-- error message untuk price -->
                @error('tanggal')
                <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Save
                </button>
                <a href="{{ route('ujian.index') }}"
                   class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">back</a>
            </div>

        </form>

    </div>

</div>

</body>

</html>
