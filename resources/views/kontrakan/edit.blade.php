<!DOCTYPE html>

<!-- BEGIN: Body-->

<!-- BEGIN: Header-->
@include('layouts.header')
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
@include('layouts.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Kontrakan</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Basic Inputs start -->
            <form action="{{ route('kontrakan.update', $kontrakan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Edit Data Kontrakan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label class="form-label" for="kategori_kontrakan_id">Kategori Kontrakan</label>
                                            <select class="form-select" id="kategori_kontrakan_id" name="kategori_kontrakan_id">
                                                <option value="" disabled>Pilih Kategori</option>
                                                @foreach ($kategori_kontrakan as $kategori)
                                                    <option value="{{ $kategori->id }}" 
                                                        @if($kontrakan->kategori_kontrakan_id == $kategori->id) selected @endif>
                                                        {{ $kategori->kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <label for="image" class="form-label">Foto Kontrakan</label>
                                            <input class="form-control" type="file" id="image" name="image" placeholder="Pilih Gambar Kontrakan">
                                            @if ($kontrakan->image)
                                                <img src="{{ asset('storage/public/posts/' . $kontrakan->image) }}" class="img-fluid mt-2" alt="Image Kontrakan">
                                            @endif
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kontrakan->nama }}" placeholder="Nama Kontrakan">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $kontrakan->deskripsi }}" placeholder="Deskripsi">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $kontrakan->alamat }}" placeholder="Alamat">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="harga">Harga</label>
                                                <input type="text" class="form-control" id="harga" name="harga" value="{{ $kontrakan->harga }}" placeholder="Harga">
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12">
                                            <a href="{{ route('kontrakan.index') }}" class="btn btn-secondary mt-2">Back</a>
                                            <button class="btn btn-primary mt-2" type="submit">Update Kontrakan</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <!-- Basic Inputs end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- BEGIN: Footer-->
@include('layouts.footer')
<!-- END: Footer-->

</body>
<!-- END: Body-->

</html>
