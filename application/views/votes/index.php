<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4 mt-4" style="color: #2D2C73;"><b>SPADA</b>assesment</h1>
                                </div>
                                <div class="text-center" id="intro">
                                    <h1 class="h4 mb-4 mt-4" style="color: red;"><b>HALLO!</b> I'm....</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('register-user'); ?>">
                                    <div class="form-group" id="user-type">
                                        <input type="radio" name="user-type" id="user-type-dosen" value="dosen" class="pl-7" onclick="showLecturerForm()">
                                        <label for="user-type-dosen">
                                            <h3 class="h5 mb-4 mt-4" style="color: #2D2C73;"><b>Dosen</b></h3>
                                        </label>

                                        <input type="radio" name="user-type" id="user-type-mhs" value="mhs" onclick="showStudentForm()">
                                        <label for="user-type-mhs">
                                            <h3 class="h5 mb-4 mt-4" style="color: #2D2C73;"><b>Mahasiswa</b></h3>
                                        </label>
                                    </div>
                                    <div id="student-form" style="display: none;">
                                        <div class="form-group text-dark">
                                            <input type="text" class="form-control form-control-user" id="student-name" name="student-name" placeholder="Masukkan Name" value="<?= set_value('student-name'); ?>">
                                        </div>
                                        <div class="form-group text-dark">
                                            <input type="text" class="form-control form-control-user" id="student-nim" name="student-nim" placeholder="Masukkan NIM" value="<?= set_value('student-nim'); ?>">
                                        </div>
                                        <span class="text-dark">Program Studi</span>
                                        <div class="form-group text-dark mx-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="program-studi" id="program-studi-ilkom" value="ilkom">
                                                <label class="form-check-label" for="program-studi-ilkom">Ilmu Komputer</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="program-studi" id="program-studi-pilkom" value="pilkom">
                                                <label class="form-check-label" for="program-studi-pilkom">Pendidikan Ilmu Komputer</label>
                                            </div>
                                        </div>
                                        <span class="text-dark">Angkatan</span>
                                        <div class="form-group text-dark mx-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="angkatan" id="angkatan-2019" value="2019">
                                                <label class="form-check-label" for="angkatan-2019">2019</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="angkatan" id="angkatan-2020" value="2020">
                                                <label class="form-check-label" for="angkatan-2020">2020</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="angkatan" id="angkatan-2021" value="2021">
                                                <label class="form-check-label" for="angkatan-2021">2021</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="angkatan" id="angkatan-2022" value="2022">
                                                <label class="form-check-label" for="angkatan-2022">2022</label>
                                            </div>
                                        </div>
                                        <span class="text-dark">Jenis Kelamin</span>
                                        <div class="form-group text-dark mx-4">
                                            <div class="form-check mb-2 mt-2">
                                                <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin-laki" value="1">
                                                <label class="form-check-label" for="jenis-kelamin-laki">laki-laki</label>
                                            </div>
                                            <div class="form-check mb-2 mt-2">
                                                <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin-perempuan" value="2">
                                                <label class="form-check-label" for="jenis-kelamin-perempuan">perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dosen-form" style="display: none;">
                                        <div class="form-group text-dark mx-4">
                                            <input type="text" class="form-control form-control-user" id="dosen-name" name="dosen-name" placeholder="Masukkan Name" value="<?= set_value('dosen-name'); ?>">
                                        </div>
                                        <span class="text-dark">Mengajar Program Studi</span>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="program-studi" id="program-studi-ilkom" value="ilkom">
                                                <label class="form-check-label" for="program-studi-ilkom">Ilmu Komputer</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="program-studi" id="program-studi-pilkom" value="pilkom">
                                                <label class="form-check-label" for="program-studi-pilkom">Pendidikan Ilmu Komputer</label>
                                            </div>
                                        </div>
                                        <span class="text-dark">Lama Mengajar</span>
                                        <div class="form-group text-dark mx-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="time-teaching" id="time-teaching-2" value="2">
                                                <label class="form-check-label" for="time-teaching-2">0-2 tahun</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="time-teaching" id="time-teaching-5" value="5">
                                                <label class="form-check-label" for="time-teaching-5">2-5 tahun</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="time-teaching" id="time-teaching-6" value="6">
                                                <label class="form-check-label" for="time-teaching-6">>5 tahun</label>
                                            </div>
                                        </div>
                                        <span class="text-dark">Jenis Kelamin</span>
                                        <div class="form-group text-dark mx-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin-laki" value="1">
                                                <label class="form-check-label" for="jenis-kelamin-laki">laki-laki</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin-perempuan" value="2">
                                                <label class="form-check-label" for="jenis-kelamin-perempuan">perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TODO Change Submit Icon -->
                                    <button type="submit" id="submitButton" class="btn btn-user btn-block text-light" style="font-size:15px; background-color: #2D2C73;display: none;">
                                        <b>Login</b>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    function showLecturerForm() {
        var lecturerModal = document.getElementById('dosen-form');
        var studentModal = document.getElementById('student-form');
        var introTag = document.getElementById('intro');
        var submitButton = document.getElementById('submitButton');
        var userTypeDiv = document.getElementById('user-type');


        if (lecturerModal !== null) {
            lecturerModal.style.display = 'block';
            introTag.style.display = 'none';
            submitButton.style.display = 'block';
            userTypeDiv.style.display = 'none';
        }

        if (studentModal !== null) {
            studentModal.style.display = 'none';
        }
    }

    function showStudentForm() {
        var lecturerModal = document.getElementById('dosen-form');
        var studentModal = document.getElementById('student-form');
        var introTag = document.getElementById('intro');
        var submitButton = document.getElementById('submitButton');
        var userTypeDiv = document.getElementById('user-type');

        if (lecturerModal !== null) {
            lecturerModal.style.display = 'none';
        }

        if (studentModal !== null) {
            studentModal.style.display = 'block';
            introTag.style.display = 'none';
            submitButton.style.display = 'block';
            userTypeDiv.style.display = 'none';
        }
    }
</script>