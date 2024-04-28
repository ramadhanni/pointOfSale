<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Point of Sales</title>
    <link rel="stylesheet" href="/asset/css/test.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container ">
        <div class="row p-3">
            <div class="col-6" >
                <div class="row row-cols-3 gap-3 ">
                    @foreach($produk as $item)
                    <div class="div-invoice p-0 bg-white rounded-3" style="width: 200px; height: 225px; cursor: pointer;" onclick="addToInvoice('{{ $item->id }}', '{{ $item->nama_produk }}', '{{ $item->harga }}')">
                        <img class="rounded-3 product-img" src="{{ asset('storage/img/' . $item->foto_produk) }}" data-id="{{ $item->id }}" style="width: 100%; height: 175px; margin-top:auto" alt="...">
                        <h5 class="text-center m-3">{{ $item->nama_produk }}</h5>
                    </div>
                    @endforeach


                    <div class="p-0 bg-white rounded-3" style="width: 200px; height: 225px;">
                        <button type="button" class="btn btn-primary fw-bold m-0" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">
                        <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Data Gallery Baru
                        </button>
                    </div>
                    <div class="modal fade modal-dialog-scrollable" id="modalTambah" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('test.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="kategori" class="form-label">Kategori</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="kategori"
                                                    name="kategori" placeholder="contoh: Makanan" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="nama_kategori" class="form-label">Nama</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nama_produk"
                                                    name="nama_produk" placeholder="contoh: Ayam Bakar" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="foto_produk" class="form-label">Foto</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="foto_produk" name="foto_produk"
                                                    accept="image/*" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="harga" class="form-label">harga</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="harga"
                                                    name="harga" placeholder="contoh: 10000" required>
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="kategori" class="form-label">Kategori</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <select name="kategori" class="form-control" id="kategori" required>
                                                    <option value="sertifikat">Sertifikat</option>
                                                    <option value="kegiatan">Kegiatan</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <label for="summernote" class="form-label">Caption Kegiatan</label>
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea id="summernote" name="caption_kegiatan" class="form-control"></textarea>
                                            </div>
                                        </div> --}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-2">
                <div class="row gap-3">
                    <div class="p-0 bg-white rounded-3" style="width: 200px; height: 225px;" data-kategori="minuman">
                        <img class="rounded-3" src="/asset/img/makanan.jpeg"  style="width: 100%; height: 175px; margin-top:auto"  alt="...">
                            <h5 class="text-center m-3">Makanan</h5>
                    </div>

                    <div class="p-0 bg-white rounded-3" style="width: 200px; height: 225px;">
                        <img class="rounded-3" src="/asset/img/minuman.jpeg"  style="width: 100%; height: 175px; margin-top:auto"  alt="...">
                            <h5 class="text-center m-3">Minuman</h5>
                    </div>
                    {{-- <div class="p-0 bg-white rounded-3" style="width: 200px; height: 225px;">
                        <img class="rounded-3" src="/asset/img/Nasi Goreng.jpeg"  style="width: 100%; height: 175px; margin-top:auto"  alt="...">
                            <h5 class="text-center m-3">Nasi Goreng</h5>
                    </div>
                    <div class="p-0 bg-white rounded-3" style="width: 200px; height: 225px;">
                        <img class="rounded-3" src="/asset/img/Nasi Goreng.jpeg"  style="width: 100%; height: 175px; margin-top:auto"  alt="...">
                            <h5 class="text-center m-3">Nasi Goreng</h5>
                    </div> --}}
                </div>
            </div>
            <div class="col-4 bg-white" style="height: auto;">
                <div class="row row-cols-1 ">
                    <div class="col" style="background-color: #E9EBEC">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto w-100">
                                <div class="row align-items-center">
                                    <div class="col-auto w-25 text-center" style="background-color: #989fb9">
                                        <i class="bi bi-person-circle fs-1 bg-blue " style="color: #495DA7" ></i>
                                        <p style="color: #495DA7">Customer</p>
                                    </div>
                                    <div class="col-auto fs-4 w-50 fw-bold text-center">
                                        New Customer
                                    </div>
                                    <div class="col-auto w-25 text-center" style="background-color: #989fb9">
                                        <i class="bi bi-list-check fs-1" style="color: #495DA7" ></i>
                                        <p>Pricing List</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col border-bottom border-5 text-center justify-content-center">
                        <div class="dropdown-center">
                            <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dine in
                            </button>
                            <ul class="dropdown-menu text-center" style="margin-left: auto; margin-right: auto;">
                                <li><a class="dropdown-item" href="#">Dine In</a></li>
                                <li><a class="dropdown-item" href="#">Take Away</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col">
                        {{-- <div class="row row-cols-1 text-center">
                            <div class="dine-in border border-1 justify-content-center" style="height: 50px;">
                                <select class="form-select w-25" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Dine in</option>
                                    <option value="2">Take away</option>
                                </select>
                            </div>
                            <div class=" p-0 border border-1">
                                <div class="col bg-warning mt-0 ">
                                    <div class="row justify-content-evenly ">
                                        <div class="col-4 border border-light text-start" style="padding-left: 0px;">number</div>
                                        <div class="col-4 border border-light text-end" style="padding-right: 0px;">view</div>
                                    </div>
                                </div>
                                <div class="col bg-white mt-0">
                                    <div class="row justify-content-evenly">
                                        <div class="col-6 bg-info">Pilihan</div>
                                        <div class="col-2 bg-warning">Qty</div>
                                        <div class="col-4 bg-danger">jumlah</div>
                                    </div>
                                    <div class="row justify-content-evenly">
                                        <div class="col-6 bg-info">Pilihan</div>
                                        <div class="col-2 bg-warning">Qty</div>
                                        <div class="col-4 bg-danger">jumlah</div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear border border-1" style="height: 50px;"> clear sale</div>
                            <div class="border border-1 " style="height: 35px;"> </div>
                        </div> --}}
                        {{-- <table class="table table-borderless">
                            <tr>
                                <td class="w-75" style="color: #495DA7" >
                                    1
                                </td>
                                <td></td>
                                <td class="w-25" style="color: #495DA7">
                                    View Table
                                </td>
                            </tr>
                        </table> --}}
                        <div class="row mt-2 m-0 ">
                            <div class="col-8">
                                <label for="id_pembelian" class="form-label">1</label>
                            </div>
                            <div class="col-4">
                                <label for="id_pembelian" class="form-label">View Table</label>
                            </div>
                        </div>
                        <table id="invoice-table" class="table table-borderless">
                            <tbody >
                                <tr>
                                    <td class="w-75">
                                        Nama_produk
                                    </td>
                                    <td></td>
                                    <td class="w-25">
                                        Harga
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="w-75">Sub-Total :</td>
                                    <td></td>
                                    <td class="w-25" id="subtotal">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td class="w-75">Total :</td>
                                    <td></td>
                                    <td class="w-25" id="total">Rp. 0</td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <table id="invoice-table" class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="w-75" style="color: #495DA7">No.</td>
                                    <td>Nama Produk</td>
                                    <td class="w-25" style="color: #495DA7">Harga</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="w-75">Sub-Total :</td>
                                    <td></td>
                                    <td class="w-25" id="subtotal">Rp. 0</td>
                                </tr>
                                <tr>
                                    <td class="w-75">Total :</td>
                                    <td></td>
                                    <td class="w-25" id="total">Rp. 0</td>
                                </tr>
                            </tfoot>
                        </table> --}}
                    </div>
                    <div id="clear-sale-btn" class="text-center fw-light  border-bottom border-top border-5 pb-2 pt-2" style="color: #d3d5dd; cursor: pointer;">
                        Clear Sale
                    </div>
                    <div class="col p-0 pt-4">
                        <div class="row row-cols-1 w-100 m-0">
                            <div class="d-flex gap-1 p-0">
                                <div id="save-bill-btn" class="flex-grow-1 fs-2 text-center" style="margin-top: 0; background-color:#E3E6F3" onclick="saveBill()">Save Bill</div>
                                <div class="flex-grow-1 fs-2 text-center" style="margin-top: 0; background-color:#E3E6F3">Print Bill</div>
                            </div>
                            {{-- <div class="d-flex  justify-content-center align-items-center  fs-1" style="background-color: #495DA7"; >Change Rp 145.000</div> --}}
                            <div class="d-flex justify-content-center align-items-center   " style="background-color: #495DA7; color: white;">
                                <div class="p-2 fs-1 border-end border-3 m-0" >
                                    <i class="bi bi-clipboard-check"></i>
                                </div>
                                <div class="p-2 flex-grow-1 m-0 fs-3" id="total">Charge Rp 0</div>
                                {{-- <div class="p-2">Third flex item</div> --}}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let invoiceItems = [];

        function addToInvoice(id, namaProduk, harga) {
            let exists = false;
            for (let i = 0; i < invoiceItems.length; i++) {
                if (invoiceItems[i].id === id) {
                    exists = true;
                    invoiceItems[i].jumlah++;
                    break;
                }
            }
            if (!exists) {
                invoiceItems.push({ id: id, nama: namaProduk, harga: harga, jumlah: 1 });
            }
            renderInvoice();
        }

        function renderInvoice() {
        let subtotal = 0;
        let tableBody = document.querySelector('#invoice-table tbody');
        let tableFoot = document.querySelector('#invoice-table tfoot');
        tableFoot.innerHTML = ''; // Kosongkan tfoot agar tidak ditampilkan dua kali

        // Kosongkan isi tbody dengan menghapus semua child element
        while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
        }

        invoiceItems.forEach((item, index) => {
            // Buat baris baru hanya untuk item baru yang ditambahkan
            let newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="w-75">${item.nama}</td>
                <td>x${item.jumlah}</td>
                <td class="w-25">Rp. ${item.harga * item.jumlah}</td>
            `;
            tableBody.appendChild(newRow);

            // Hitung subtotal
            subtotal += item.harga * item.jumlah;
        });

        // Tambahkan baris subtotal dan total ke tfoot
        let subtotalRow = document.createElement('tr');
        subtotalRow.innerHTML = `
            <td class="w-75">Sub-Total :</td>
            <td></td>
            <td class="w-25" id="subtotal">Rp. ${subtotal}</td>
        `;
        tableFoot.appendChild(subtotalRow);

        let totalElement = document.getElementById('total');
    totalElement.textContent = `Charge Rp ${subtotal.toLocaleString()}`;


        let totalRow = document.createElement('tr');
        totalRow.innerHTML = `
            <td class="w-75">Total :</td>
            <td></td>
            <td class="w-25" id="total">Rp. ${subtotal}</td>
        `;
        tableFoot.appendChild(totalRow);
    }

    // untuk Clear data sale
    document.querySelector('#clear-sale-btn').addEventListener('click', function(){
        invoiceItems.length = 0;

        renderInvoice();
    });

    function saveBill() {
        // Mengirimkan data invoiceItems ke server
        $.ajax({
            url: '/simpan-pesanan',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Sertakan token CSRF
            },
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // Sertakan token CSRF
                pesanan: invoiceItems // Menggunakan nama yang berbeda untuk membedakan dari data sebelumnya
            },
            success: function(response) {
                // Menampilkan pesan sukses atau melakukan tindakan lain setelah penyimpanan berhasil
                alert('Pesanan berhasil disimpan.');
                // Atau lakukan sesuatu seperti membersihkan keranjang belanja atau mengarahkan pengguna ke halaman lain
            },
            error: function(xhr, status, error) {
                // Menangani kesalahan jika penyimpanan gagal
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menyimpan pesanan.');
            }
        });
    }

    // Fungsi untuk menyaring item berdasarkan kategori saat diklik
    function filterByCategory(category) {
        // Dapatkan semua elemen dengan data-kategori yang sesuai
        let items = document.querySelectorAll(`[data-kategori="${category}"]`);

        // Sembunyikan semua elemen
        items.forEach(item => {
            item.style.display = 'none';
        });

        // Tampilkan elemen dengan data-kategori yang sesuai
        items.forEach(item => {
            item.style.display = 'block';
        });
    }

    // Tambahkan event listener ke setiap elemen kategori untuk memicu fungsi penyaringan saat diklik
    let kategoriButtons = document.querySelectorAll('.kategori-button');
    kategoriButtons.forEach(button => {
        button.addEventListener('click', function() {
            let category = this.getAttribute('data-kategori');
            filterByCategory(category);
        });
    });

    </script>

</body>
</html>
