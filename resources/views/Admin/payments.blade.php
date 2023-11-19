@extends('Admin.index')

@section('content')
    <h1>Payments</h1>

    <div class="table-responsive table datatable">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Name</th> <!-- New column for user's name -->
                    <th>Email</th> <!-- New column for user's email -->
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="payment-row" data-toggle="modal" data-target="#paymentModal" data-payment-id="{{ $payment->id }}">
                        <td>{{ $payment->id }}</td>
                        <td>${{ $payment->amount }}</td>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ $payment->user->name }}</td> <!-- Display user's name in a separate column -->
                        <td>{{ $payment->user->email }}</td> <!-- Display user's email in a separate column -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Payment Details Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Payment details will be displayed here -->
                    <div id="paymentDetails"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // Handle modal opening and data population
            $('.payment-row').click(function () {
                var paymentId = $(this).data('payment-id');

                // You can fetch payment details using AJAX and populate the modal content here
                // For this example, we'll display a simple message
                var modalContent = '<p>Payment ID: ' + paymentId + '</p>';

                $('#paymentDetails').html(modalContent);
            });
        });
    </script>
@endpush
