<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div style="background-color: #f8d7da; color: #842029; padding: 12px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c2c7;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #374151;">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #374151;">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #374151;">Program Studi</label>
                        <input type="text" name="prodi" value="{{ old('prodi', $mahasiswa->prodi) }}" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #374151;">Email</label>
                        <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #374151;">Angkatan</label>
                        <input type="text" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" style="width: 100%; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>

                    <!-- Tombol Aksi -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                        <a href="{{ route('mahasiswa.index') }}" style="background-color: #6b7280; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold;">
                            Batal
                        </a>
                        <button type="submit" style="background-color: #2563eb; color: white; padding: 10px 24px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                            Update Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>