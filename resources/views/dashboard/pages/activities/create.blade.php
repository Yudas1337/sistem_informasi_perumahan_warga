@extends('dashboard.layouts.main')
@section('content')
    <div class="blog-edit-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="mt-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <!-- Form -->
                        <form id="create-activities" action="{{ route('manage-activities.store') }}" class="mt-2"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-title">Judul Kegiatan <small
                                                class="text-danger">*</small>
                                        </label>
                                        <input name="title" type="text" id="blog-edit-title" class="form-control"
                                            value="{{ old('title') }}" placeholder="Lomba 17 Agustus"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-category">Kategori Kegiatan <small
                                                class="text-danger">*</small></label>
                                        <select name="categories_id" id="blog-edit-category" class="form-select">
                                            <option value="">--Pilih Kategori--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('categories_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-slug">Deskripsi Kegiatan <small
                                                class="text-danger">*</small></label>
                                        <input name="description" type="text" id="blog-edit-slug" class="form-control"
                                            value="{{ old('description') }}" placeholder="Kegiatan Lomba 17 Agustus"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-slug">Lokasi Kegiatan <small
                                                class="text-danger">*</small></label>
                                        <input name="location" type="text" id="blog-edit-slug" class="form-control"
                                            value="{{ old('location') }}" placeholder="Lapangan besar"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-slug">Tanggal Pelaksanaan <small
                                                class="text-danger">*</small></label>
                                        <input name="date" type="datetime-local" id="blog-edit-slug" class="form-control"
                                            value="{{ old('date') }}" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Isi Acara Kegiatan <small
                                                class="text-danger">*</small></label>
                                        <div id="blog-editor-wrapper">
                                            <div id="blog-editor-container">
                                                <div class="editor">
                                                    <textarea type="text" id="activities-content" name="content" autocomplete="off" hidden>{{ old('content') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">Foto Kegiatan</h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <img src="{{ asset('storage/activity_images/no-image.png') }}"
                                                id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170"
                                                height="110" alt="Blog Featured Image" />
                                            <div class="featured-info">
                                                <small class="text-danger">Ekstensi gambar: jpg/png/jpeg
                                                    <br> Ukuran file: 2 Mb
                                                </small>
                                                <p class="my-50">
                                                    <a href="#" id="blog-image-text"></a>
                                                </p>
                                                <div class="d-inline-block">
                                                    <input type="file" id="blogCustomFile" accept="image/*"
                                                        name="thumbnail" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1">Tambah Kegiatan</button>
                                    <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                </div>
                            </div>
                        </form>
                        <!--/ Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
