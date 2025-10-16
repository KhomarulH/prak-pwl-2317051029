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

        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>

    <div class="container">
        <h1>Daftar Pengguna</h1>

        <a href="{{ route('users.create') }}" class="btn-add">+ Tambah Pengguna</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nim</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->nama_kelas }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="no-data">Belum ada data pengguna</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
