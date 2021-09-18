<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <!-- ? Google Fonts -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

   <!-- ? Bootstrap Bundle -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/iconly/bold.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
   <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
   <div id="app">
      <div id="sidebar" class="active">
         <div class="sidebar-wrapper active">
            <div class="sidebar-header">
               <div class="d-flex justify-content-between">
                  <div class="logo">
                     <a href="/dashboard">Mahasiswa</a>
                  </div>
                  <div class="toggler">
                     <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                  </div>
               </div>
            </div>
            <div class="sidebar-menu">
               <ul class="menu">
                  <li class="sidebar-title">Menu</li>

                  <li class="sidebar-item">
                     <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                     </a>
                  </li>

                  <li class="sidebar-item  has-sub active">
                     <a href="#" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Data</span>
                     </a>
                     <ul class="submenu ">
                        <li class="submenu-item ">
                           <a href="/dashboard/mahasiswa">Mahasiswa</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
         </div>
      </div>
      <div id="main">
         <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
               <i class="bi bi-justify fs-3"></i>
            </a>
         </header>

         <div class="page-heading">
            <h3>Data Mahasiswa</h3>
         </div>
         <div class="page-content">
            <section class="section">
               <div class="row" id="table-head">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header">
                           <button class="btn btn-primary" data-bs-target="#add-form" data-bs-toggle="modal"
                              id="add-btn">Tambah</button>
                        </div>
                        <!-- ? Buat Alert -->
                        <div class="card-body" id="alert-wrapper">
                        </div>
                        <div class="table-responsive">
                           <table class="table mb-0">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>NAMA</th>
                                    <th>TTL</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>ACTION</th>
                                 </tr>
                              </thead>
                              <tbody id="table-mahasiswa">
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>

   <!-- ? Modal Edit -->
   <div class="modal fade text-left" id="edit-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header bg-warning">
               <h4 class="modal-title white" id="myModalLabel33">Edit Data</h4>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
               </button>
            </div>
            <form action="#" id="form-edit">
               <input required type="hidden" name="id">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="nama">Nama: </label>
                     <input required type="text" placeholder="Nama..." class="form-control" id="nama1" name="nama">
                  </div>
                  <div class="form-group">
                     <label for="tempat-lahir">Tempat Lahir: </label>
                     <input required type="text" placeholder="Tempat Lahir..." class="form-control" id="tempat-lahir1"
                        name="tempat_lahir">
                  </div>
                  <div class="form-group">
                     <label for="tanggal-lahir">Tanggal Lahir: </label>
                     <input required type="date" placeholder="Tanggal Lahir" class="form-control" id="tanggal-lahir1"
                        name="tgl_lahir">
                  </div>
                  <div class="form-group">
                     <label>Jenis Kelamin: </label>
                     <div class="form-check">
                        <input required class="form-check-input" type="radio" name="jk" id="laki-laki1" value=1>
                        <label class="form-check-label" for="laki-laki1">Laki-Laki</label>
                     </div>
                     <div class="form-check">
                        <input required class="form-check-input" type="radio" name="jk" id="perempuan1" value=2>
                        <label class="form-check-label" for="perempuan1">Perempuan</label>
                     </div>
                  </div>
                  <div class="form-group mb-3">
                     <label for="alamat" class="form-label">Alamat</label>
                     <textarea required class="form-control" id="alamat1" rows="3" name="alamat"></textarea>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                     <span class="d-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-warning ml-1">
                     <span class="d-block">Edit</span>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- ? Modal Tambah -->
   <div class="modal fade text-left" id="add-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header bg-primary">
               <h4 class="modal-title white" id="myModalLabel33">Tambah Data</h4>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
               </button>
            </div>
            <form action="#" id="form-tambah">
               <div class="modal-body">
                  <div class="form-group">
                     <label for="nama">Nama: </label>
                     <input required type="text" placeholder="Nama..." class="form-control" id="nama" name="nama">
                  </div>
                  <div class="form-group">
                     <label for="tempat-lahir">Tempat Lahir: </label>
                     <input required type="text" placeholder="Tempat Lahir..." class="form-control" id="tempat-lahir"
                        name="tempat_lahir">
                  </div>
                  <div class="form-group">
                     <label for="tanggal-lahir">Tanggal Lahir: </label>
                     <input required type="date" placeholder="Tanggal Lahir" class="form-control" id="tanggal-lahir"
                        name="tgl_lahir">
                  </div>
                  <div class="form-group">
                     <label>Jenis Kelamin: </label>
                     <div class="form-check">
                        <input required class="form-check-input" type="radio" name="jk" id="laki-laki" value=1>
                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                     </div>
                     <div class="form-check">
                        <input required class="form-check-input" type="radio" name="jk" id="perempuan" value=2>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                     </div>
                  </div>
                  <div class="form-group mb-3">
                     <label for="alamat" class="form-label">Alamat</label>
                     <textarea required class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                     <span class="d-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                     <span class="d-block">Tambah</span>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- ? Modal Hapus -->
   <div class="modal fade text-left" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <hapus id=0 />
            <div class="modal-header bg-danger">
               <h5 class="modal-title white" id="myModalLabel120">
                  Hapus Data
               </h5>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
               </button>
            </div>
            <div class="modal-body">
               Apakah kamu yakin ingin menghapus data dari `mahasiswa`? Data yang dihapus tidak akan bisa dikembalikan!
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Close</span>
               </button>
               <button type="button" class="btn btn-danger ml-1" id="confirm-hapus">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Accept</span>
               </button>
            </div>
         </div>
      </div>
   </div>
   <div class="loader-wrapper">
      <div class="lds-dual-ring"></div>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('js/main.js') }}"></script>

   <script>
      //   Get Loader
      const loaderWrapper = document.querySelector('.loader-wrapper');
      // Document Ready
      document.addEventListener("DOMContentLoaded", function () {

         // Tampil Data Mahasiswa
         getDataMahasiswa();

         // form-tambah Submit
         document.getElementById("form-tambah").addEventListener("submit", function (e) {
            e.preventDefault();
            loaderWrapper.classList.add('show');

            var url = "{{URL('api/mahasiswa')}}";

            var formTambah = document.getElementById('form-tambah');

            axios.post(url, {
                  _token: "{{ csrf_token() }}",
                  nama: formTambah.nama.value,
                  tempat_lahir: formTambah.tempat_lahir.value,
                  tgl_lahir: formTambah.tgl_lahir.value,
                  jk: formTambah.jk.value,
                  alamat: formTambah.alamat.value
               })
               .then(function (response) {
                  getDataMahasiswa();
                  setAlert("Data berhasil ditambahkan!", "success", "check-circle")
                  formTambah.reset();
                  $("#add-form").modal('hide');
               })
               .catch(function (error) {
                  loaderWrapper.classList.remove('show');
                  setAlert("Data gagal ditambahkan!", "danger", "excel")
                  console.log(error);
               });
         });

         // form-edit Submit
         document.getElementById("form-edit").addEventListener("submit", function (e) {
            e.preventDefault();
            loaderWrapper.classList.add('show');

            var formEdit = document.getElementById('form-edit');
            var url = "{{ URL('api/mahasiswa') }}/" + formEdit.id.value;

            axios.put(url, {
                  _token: "{{ csrf_token() }}",
                  nama: formEdit.nama.value,
                  tempat_lahir: formEdit.tempat_lahir.value,
                  tgl_lahir: formEdit.tgl_lahir.value,
                  jk: formEdit.jk.value,
                  alamat: formEdit.alamat.value
               })
               .then(function (response) {
                  getDataMahasiswa();
                  setAlert("Data berhasil diedit!", "success", "check-circle")
                  $("#edit-form").modal('hide');
               })
               .catch(function (error) {
                  loaderWrapper.classList.remove('show');
                  setAlert("Data gagal diedit!", "danger", "excel")
                  console.log(error);
               });
         });

         // Action Confirm Hapus
         document.getElementById("confirm-hapus").addEventListener("click", function (e) {
            var id = document.getElementsByTagName("hapus")[0].getAttribute('id');
            var url = "{{URL('api/mahasiswa')}}/" + id;
            loaderWrapper.classList.add('show');
            axios.delete(url);
            getDataMahasiswa();
            setAlert("Data berhasil dihapus!", "success", "excel")
            $("#delete-data").modal('hide');
         });

      });

      function getDataMahasiswa() {
         var url = "{{URL('api/mahasiswa')}}";

         axios.get(url).then(function (response) {
               // handle success
               let mahasiswa = response.data;

               if (mahasiswa.data.length > 0) {
                  var resultData = mahasiswa.data;
                  var bodyData = '';

                  resultData.forEach((row) => {
                     var editUrl = url + '/' + row.id + "/edit";

                     bodyData += '<tr>'
                     bodyData += '<td>' + row.nama + '</td><td>' + row.ttl + '</td><td>' + row.jk + '</td>' +
                        '<td>' + row.alamat + '</td>' +
                        '<td><button class="btn btn-warning btn-edit" data-id="' + row.id +
                        '" data-bs-target="#edit-form" data-bs-toggle="modal">Edit</button>' +
                        '<button class="btn btn-danger btn-hapus" data-id="' + row.id +
                        '" data-bs-target="#delete-data" data-bs-toggle="modal">Hapus</button></td>';
                     bodyData += '</tr>';
                  });

                  document.getElementById("table-mahasiswa").innerHTML = bodyData;

                  //   Remove Loader
                  loaderWrapper.classList.remove('show');

                  // Tombol Hapus
                  var hapusBtn = document.querySelectorAll(".btn-hapus");

                  for (var i = 0; i < hapusBtn.length; i++) {
                     hapusBtn[i].addEventListener('click', function (event) {

                        // set data id yg ingin dihapus
                        var id = event.target.getAttribute('data-id');
                        document.getElementsByTagName("hapus")[0].setAttribute("id", id);
                     });
                  }

                  // Tombol Edit
                  var editBtn = document.querySelectorAll(".btn-edit");

                  for (var i = 0; i < editBtn.length; i++) {
                     editBtn[i].addEventListener('click', function (event) {
                        loaderWrapper.classList.add('show');

                        var id = event.target.getAttribute('data-id');
                        var url = "{{URL('api/mahasiswa')}}/" + id + "/edit";

                        axios.get(url).then(function (response) {
                              let mahasiswa = response.data;

                              var formEdit = document.getElementById('form-edit');

                              formEdit.id.value = mahasiswa.data.id;
                              formEdit.nama.value = mahasiswa.data.nama;
                              formEdit.tempat_lahir.value = mahasiswa.data.tempat_lahir;
                              formEdit.tgl_lahir.value = mahasiswa.data.tgl_lahir;
                              formEdit.jk.value = mahasiswa.data.jk;
                              formEdit.alamat.value = mahasiswa.data.alamat;

                              //   Remove Loader
                              loaderWrapper.classList.remove('show');
                           })
                           .catch(function (error) {
                              //   Remove Loader
                              loaderWrapper.classList.remove('show');
                              // handle error
                              console.log(error);
                           });
                     });
                  }

               } else {
                  document.getElementById("table-mahasiswa").innerHTML = 'Data kosong';
                  //   Remove Loader
                  loaderWrapper.classList.remove('show');
               }
            })
            .catch(function (error) {
               //   Remove Loader
               loaderWrapper.classList.remove('show');
               // handle error
               console.log(error);
            });
      }

      //  For alert
      function setAlert(message, type, icon) {
         document.querySelector('#alert-wrapper').innerHTML =
            `<div class="alert alert-${type} alert-dismissible show fade"><i class="bi bi-${icon}"></i> ${message}.<button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button></div>`
      }
   </script>
</body>

</html>