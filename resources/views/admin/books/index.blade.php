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
                                        book</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>isbn</th>
                                                <th>title</th>
                                                <th>year</th>
                                                <th>publisher</th>
                                                <th>author</th>
                                                <th>catalog</th>
                                                <th>qty</th>
                                                <th>price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
                        <input type="hidden" name="_method" value="PUT" name="put" id="put" v-if="editStatus"
                            readonly>
                        {{ csrf_field() }}
                        {{-- {{ method_field('PUT') }} --}}
                        <div class="modal-header">
                            <h4 class="modal-title">Book</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label>isbn</label>
                                <input type="text" class="form-control" name="isbn" placeholder="Enter isbn"
                                    :value="data.isbn" required>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title"
                                    :value="data.title" required>
                            </div>


                            <div class="form-group">
                                <label>qty</label>
                                <input type="text" class="form-control" name="qty" :value="data.qty"
                                    placeholder="Enter qty" required>
                            </div>


                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control" name="year" placeholder="Enter year"
                                    :value="data.year" required>
                            </div>
                            <div class="form-group">
                                <label>price</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter price"
                                    :value="data.price" required>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control" id="publisher">
                                    @foreach ($publisher as $publishers)
                                        <option value="{{ $publishers->id }}"
                                            :selected="data.publisher_id == {{ $publishers->id }}">
                                            {{ $publishers->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Author</label>
                                <select name="author_id" class="form-control" id="author">
                                    @foreach ($author as $authors)
                                        <option value="{{ $authors->id }}"
                                            :selected="data.author_id == {{ $authors->id }}">
                                            {{ $authors->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control" id="catalog" id="Catalogs">
                                    @foreach ($Catalog as $Catalogs)
                                        <option value="{{ $Catalogs->id }}"
                                            :selected="data.catalog_id == {{ $Catalogs->id }}">
                                            {{ $Catalogs->name }}</option>
                                    @endforeach
                                </select>
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
        let actionUrl = '{{ url('books') }}';
        let apiUrl = '{{ url('api/books') }}';

        let columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true
            }, {
                data: 'isbn',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'title',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'year',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'publisher_id',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'author_id',
                class: 'text-center',
                orderable: true,

            },
            {
                data: 'catalog_id',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'qty',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'price',
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

        //console.log(columns);

        let controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                // search: '',
                datas: [],
                actionUrl,
                apiUrl,
                // book: {},
                // books: [],
                editStatus: false
            },
            mounted: function() {
                this.dataTable();
            },
            methods: {
                dataTable() {
                    const _this = this;
                    _this.table = $('#dataTable').DataTable({
                        // columnDefs: [{
                        //     "defaultContent": "-",
                        //     "targets": "_all"
                        // }],
                        ajax: {
                            url: _this.apiUrl,
                            type: "GET",
                            // dataSrc: ""
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
                // numberWithSpaces(x) {
                //     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                // },
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
            },
            computed: {
                filteredList() {
                    return this.books.filter(book => {
                        return book.title.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }
        })
    </script>
@endsection
@endsection
