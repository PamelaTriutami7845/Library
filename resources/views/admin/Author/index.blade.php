@extends('layouts.admin')
@section('header', 'Author')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

    <div class="" id="controller">
        <div class="">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#" @click="addData()" data-target="#modal-default" data-toggle="modal"
                                        class="btn btn-sm btn-primary pull-right">Create New
                                        Author</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>phone number</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($authors as $key => $Author)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $Author->name }}</td>
                                                    <td>{{ $Author->email }}</td>
                                                    <td>{{ $Author->phone_number }}</td>
                                                    <td>{{ $Author->address }}</td>
                                                    <td>
                                                        {{ date('D/d/M/Y') }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-row">
                                                            <a href="#" class="btn btn-warning btn-sm mr-2"
                                                                @click="editData ({{ $Author }}) ">Edit</a>
                                                            <a href="#" class="btn btn-danger btn-sm mr-2"
                                                                @click="deleteData ({{ $Author->id }}) ">delete</a>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </section>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="POST" autocomplete="off" @submit="submitForm($event,data.id)">
                        <input type="hidden" name="_method" value="PUT" name="put" id="put" v-if="editStatus">
                        {{ csrf_field() }}
                        {{-- {{ method_field('PUT') }} --}}
                        <div class="modal-header">
                            <h4 class="modal-title">Author</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                    :value="data.name" required>
                            </div>


                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" :value="data.email"
                                    placeholder="Enter email" required>
                            </div>


                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                    placeholder="Enter phone number" :value="data.phone_number" required>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" :value="data.address"
                                    placeholder="Enter address "required>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

@section('js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script type="text/javascript">
        let actionUrl = '{{ url('authors') }}';
        let apiUrl = '{{ url('api/authors') }}';
        let columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            }, {
                data: 'name',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'email',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'phone_number',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'address',
                class: 'text-center',
                orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    return `<a href="#" class="btn btn-warning btn-sm mr-2" onclick="controller.editData(event,${meta.row}) ">Edit</a>
                    <a href="#" class="btn btn-warning btn-sm mr-2" onclick="controller.deleteData(event,${data.id}) ">Delete</a>`
                },
                orderable: false,
                width: '200px',
                class: 'text-center'
            }
        ];
        let controller = new Vue({
            el: '#controller',
            data: {
                datas: [],
                data: {},
                anggota: {},
                actionUrl,
                apiUrl,
                editStatus: false
            },
            mounted: function() {
                this.dataTable();
            },
            methods: {
                dataTable() {
                    const _this = this;
                    _this.table = $('#dataTable').DataTable({
                        ajax: {
                            url: _this.apiUrl,
                            type: "GET",

                        },
                        columns: columns
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData() {
                    this.data = {};
                    this.editStatus = false;
                    $('#modal-default').modal();

                },
                editData(event, row) {
                    this.data = this.datas[row];
                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(event, id) {
                    if (confirm("are you sure?")) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE',
                        }).then(response => {
                            alert('Data has been removed');
                        });
                    }
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;

                    axios.post(actionUrl, new FormData($(event.target)[0])).then(
                        response => {
                            $('#modal-default').modal('hide');
                            _this.table.ajax.reload();
                        })
                },
            }
        })
    </script>
    {{-- <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('Author') }}',
                editStatus: false
            },
            mounted: function() {

            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('Author') }}';
                    this.editStatus = false;
                    $('#modal-default').modal();

                },
                editData(data) {
                    // console.log(data);
                    this.data = data;

                    this.actionUrl = '{{ url('Author') }}' + '/' + data.id;
                    console.log(this.data);
                    console.log(this.actionUrl);

                    this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(data) {
                    this.actionUrl = '{{ url('Author') }}' + '/' + data.id;
                    if (confirm("are you sure?")) {
                        // axios.post(console.log(this.actionUrl));
                        axios.post(this.actionUrl, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        });
                    }
                }
            }
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $("#dataTable").DataTable();
            // $('#example2').DataTable({
            //   "paging": true,
            //   "lengthChange": false,
            //   "searching": false,
            //   "ordering": true,
            //   "info": true,
            //   "autoWidth": false,
            //   "responsive": true,
            // });
        });
    </script> --}}
@endsection
@endsection
