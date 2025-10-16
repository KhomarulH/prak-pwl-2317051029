@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .btn-add {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-add:hover {
            background: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background: #4CAF50;
            color: white;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-edit {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-edit:hover {
            background-color: #0b7dda;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-delete:hover {
            background-color: #da190b;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>

    <div class="container">
        <h1>Daftar Mata Kuliah</h1>

        <a href="{{ route('matakuliah.create') }}" class="btn-add">+ Tambah Mata Kuliah</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mks as $mk)
                    <tr>
                        <td>{{ $mk->id }}</td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit', $mk->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="no-data">Belum ada data mata kuliah</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
