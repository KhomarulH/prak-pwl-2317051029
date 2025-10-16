@extends('layouts.app')

@section('content')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: border-color 0.3s;
            font-size: 15px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .btn-submit {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: #45a049;
        }

        .btn-back {
            display: inline-block;
            margin-top: 15px;
            text-align: center;
            background: #888;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #666;
        }
    </style>

    <div class="container">
        <h1>{{ isset($mk) ? 'Edit Mata Kuliah' : 'Buat Mata Kuliah Baru' }}</h1>

        <form action="{{ isset($mk) ? route('matakuliah.update', $mk->id) : route('matakuliah.store') }}" method="POST">
            @csrf
            @if(isset($mk))
                @method('PUT')
            @endif

            <label for="nama_mk">Nama Mata Kuliah</label>
            <input type="text" id="nama_mk" name="nama_mk" value="{{ old('nama_mk', $mk->nama_mk ?? '') }}" required>

            <label for="sks">SKS</label>
            <input type="number" id="sks" name="sks" value="{{ old('sks', $mk->sks ?? '') }}" required>

            <button type="submit" class="btn-submit">
                {{ isset($mk) ? 'Update' : 'Simpan' }}
            </button>
        </form>

        <a href="{{ route('matakuliah.index') }}" class="btn-back">Kembali</a>
    </div>
@endsection
