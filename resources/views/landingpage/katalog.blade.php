<section id="katalog">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto pt-24 pb-10 p-4">
        <div class=" border bg-white py-2 rounded-xl lg:px-5 px-4 min-w-80  shadow-xl ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($bukus as $buku)
                    <a href="#"
                        class="flex flex-col items-center g-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl min-w-[300px] lg:min-w-96 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        @if ($buku->sampul)
                            <img class="object-cover w-full rounded-t-lg h-52 md:h-auto md:w-40 md:rounded-none md:rounded-s-lg"
                                src="{{ asset('images/' . $buku->sampul) }}" alt="{{ $buku->judul }}">
                        @else
                            <p>Gambar tidak tersedia</p>
                        @endif

                        <div class="p-4 leading-normal text-sm">
                            <table class="text-left  ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-1 " colspan="3"> <b
                                                class="font-bold uppercase"> {{ $buku->judul }}</b>
                                            <br> <i class=" text-sm font-extralight">{{ $buku->penulis }}</i>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium py-1">Halaman</td>
                                        <td class=" py-1">&nbsp;:&nbsp; </td>
                                        <td class=" py-1">{{ $buku->halaman }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium py-1">Tahun Terbit </td>
                                        <td class=" py-1">&nbsp;:&nbsp;</td>
                                        <td class=" py-1">{{ $buku->tahun_terbit }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium py-1">No. ISBN</td>
                                        <td class=" py-1">&nbsp;:&nbsp;</td>
                                        <td class=" py-1">{{ $buku->isbn }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    {{-- pagination --}}
    <div class=" flex items-center justify-center pb-10">
        <nav aria-label="Page navigation example">
            <ul class="flex items-center -space-x-px h-8 text-sm">
                <!-- Tombol Previous -->
                @if ($bukus->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $bukus->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                        </a>
                    </li>
                @endif

                <!-- Tautan Halaman -->
                @foreach ($bukus as $buku)
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $bukus->currentPage() == $loop->iteration ? 'text-blue-700 bg-blue-300' : '' }}">
                            {{ $loop->iteration }}
                        </a>
                    </li>
                @endforeach

                <!-- Tombol Next -->
                @if ($bukus->hasMorePages())
                    <li>
                        <a href="{{ $bukus->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 rounded-e-lg  leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li>
                        <span
                            class="flex items-center justify-center px-3 h-8  rounded-e-lg leading-tight text-gray-500 bg-white border border-gray-300 cursor-not-allowed">
                            <span class="sr-only">Next</span>
                            <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>

    </div>

</section>
