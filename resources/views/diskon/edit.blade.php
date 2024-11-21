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
                        <h2 class="content-header-title float-start mb-0">Edit Data Diskon</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                </div>
            </div>
        </div>

        <div class="content-body">
            <form action="{{ route('diskon.update', $diskon->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Add PUT method for update request -->

                <div class="col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="nama_diskon">Nama Diskon</label>
                        <input type="text" class="form-control" id="nama_diskon" name="nama_diskon"
                            value="{{ old('nama_diskon"', $diskon->nama_diskon) }}" placeholder="Nama Diskon">
                    </div>
                </div>


                <div class="col-xl-4 col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label" for="persentase_diskon">Persentase Diskon</label>
                        <input type="integer" class="form-control" id="persentase_diskon" name="persentase_diskon"
                            value="{{ old('persentase_diskon"', $diskon->persentase_diskon) }}"
                            placeholder="Persentase Diskon">
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-12">
                    <a href="{{ route('diskon.index') }}" class="btn btn-secondary mt-2">Back</a>
                    <button class="btn btn-primary mt-2" type="submit">Update</button>
                </div>
            </form>
        </div>

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
