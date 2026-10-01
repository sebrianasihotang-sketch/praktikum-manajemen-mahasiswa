<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Pesan Sukses -->
                @if (session('success'))
                    <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #badbcc;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tombol Tambah Mahasiswa (Gunakan strtolower agar tidak terpengaruh huruf besar/kecil) -->
                @if (strtolower(Auth::user()->role ?? '') === 'admin')
                    <div style="margin-bottom: 20px;">
                        <a href="{{ route('mahasiswa.create') }}" 
                           style="background-color: #2563eb; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            + Tambah Data Mahasiswa
                        </a>
                    </div>
                @endif

                <!-- Tabel Data Mahasiswa -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">NAMA</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">PRODI</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">EMAIL</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ANGKATAN</th>
                                @if (strtolower(Auth::user()->role ?? '') === 'admin')
                                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">AKSI</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($mahasiswas as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nim }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->prodi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->angkatan }}</td>
                                    @if (strtolower(Auth::user()->role ?? '') === 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
                                            <a href="{{ route('mahasiswa.edit', $item->id) }}" style="color: #2563eb; font-weight: bold; margin-right: 12px; text-decoration: none;">Edit</a>
                                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="color: #dc2626; font-weight: bold; background: none; border: none; cursor: pointer;">Hapus</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ strtolower(Auth::user()->role ?? '') === 'admin' ? 6 : 5 }}" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>