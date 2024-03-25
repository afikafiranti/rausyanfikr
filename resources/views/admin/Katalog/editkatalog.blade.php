<main class="px-6 py-5"> <!-- Mengurangi padding horizontal dari 20px menjadi 6px -->
    <div id="editProductForm" class="flex justify-center">
        <form action="{{ route('admin.update', $buku->id) }}" method="POST" class="w-full max-w-md">
            <!-- Menambahkan class untuk membatasi lebar form -->
            @csrf
            @method('PUT')
            <div class="mb-4"> <!-- Menambahkan margin bottom pada setiap elemen input -->
                <label for="judul" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Judul
                    Buku</label>
                <input type="text" name="judul" id="judul" placeholder="{{ $buku->judul }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>
            <div class="mb-4">
                <label for="penulis" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Penulis
                    Buku</label>
                <input type="text" name="penulis" id="penulis" placeholder="{{ $buku->penulis }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>
            <div class="mb-4">
                <label for="tahun_terbit" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Tahun
                    Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" placeholder="{{ $buku->tahun_terbit }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>
            <div class="mb-4">
                <label for="halaman"
                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Halaman</label>
                <input type="number" name="halaman" id="halaman" placeholder="{{ $buku->halaman }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>
            <div class="mb-4">
                <label for="kategori"
                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select name="kategori" id="kategori"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Fiksi" {{ $buku->kategori === 'Fiksi' ? 'selected' : '' }}>Fiksi
                    </option>
                    <option value="Non-Fiksi" {{ $buku->kategori === 'Non-Fiksi' ? 'selected' : '' }}>
                        Non-Fiksi</option>
                    <option value="Komik" {{ $buku->kategori === 'Komik' ? 'selected' : '' }}>Komik
                    </option>
                    <!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div class="mb-4">
                <label for="isbn" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">No
                    ISBN</label>
                <input type="text" name="isbn" id="isbn" placeholder="{{ $buku->isbn }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    required="">
            </div>
            <div class="flex justify-center gap-4"> <!-- Mengubah posisi tombol ke tengah -->
                <button type="submit"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Ubah</button>
                <a href="{{ route('admin.index') }}"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-700 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</a>
            </div>
        </form>
    </div>
</main>
