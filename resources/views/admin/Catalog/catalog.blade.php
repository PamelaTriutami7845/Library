@extends('layouts.admin')
@section('header', 'Catalog')

@section('content')
    <div class="">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <a href="catalogs/create" class="btn btn-sm btn-primary pull-right">Create New
                                    Catalog</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>name</th>
                                            <th>total book</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($catalog as $key => $catalogs)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $catalogs->name }}</td>
                                                <td>{{ count($catalogs->books) }}</td>
                                                <td>
                                                    {{ dateformat($catalogs->Created_at) }}
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <a href="{{ url('catalogs/' . $catalogs->id . '/edit') }}"
                                                            class="btn btn-warning btn-sm mr-2">Edit</a>
                                                        <form action="{{ url('catalogs/' . $catalogs->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger btn-sm mr-2"
                                                                value="delete" onclick="confirm('Are you sure?')">
                                                            @method('delete')
                                                            @csrf
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
