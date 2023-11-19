@extends('Admin.index')

@section('admin.content')

<main id="main" class="main" >

    <section class="section m-5" >

        <div class="row" >
            <div class="col-lg-12" >
                <!-- Toggle Table Button -->
               

                <!-- Collapsible Table Section -->
                <div class="collapse" id="table-nav">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sold Products</h5>
                            <p>Add lightweight datatables to your project with using the <a
                                    href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                    DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                                wish to convert to a datatable</p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Payment Date</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                @if(!empty($soldProducts))
                                @foreach($soldProducts as $soldProduct)
                                <tr>
                                    <td>{{$soldProduct->id}}</td>
                                    <td>{{$soldProduct->product->name}}</td>
                                    <td>${{ $soldProduct->product->price }}</td>
                                    <td>{{ $soldProduct->payment->date }}</td>
                                    <td>{{ $soldProduct->payment->user->name }}</td>
                                    <td>{{ $soldProduct->payment->user->email }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

@endsection

<!-- ... Rest of your HTML ... -->

<script>
    $(document).ready(function () {
        // Initially, the table is in the main content area
        var tableInMainContent = true;

        // Function to move the table to the sidebar
        function moveToSidebar() {
            $('#sidebar').append($('#dataTable'));
            tableInMainContent = false;
        }
        function moveToSidebar() {
    $('#sidebar').append($('#dataTable'));
    $('#table-nav').collapse('hide');
    tableInMainContent = false;
}
        // Function to move the table back to the main content area
        function moveToMainContent() {
            $('#main .section').append($('#dataTable'));
            tableInMainContent = true;
        }

        // Toggle the table's location when the button is clicked
        $('#toggleTable').click(function () {
            if (tableInMainContent) {
                moveToSidebar();
            } else {
                moveToMainContent();
            }
        });
    });
</script>
