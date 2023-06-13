@extends('layouts.app')

@section('content')
<div class="content">
    
        <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header">
                    <h4 class="card-title">All Invoices</h4>
                    
                  </div>
                


                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table">
                        <thead class=" text-primary">
                          <tr><th>
                            Invoice Number
                          </th>
                          <th>
                            Customer Name
                          </th>
                          <th>
                            Customer Address
                          </th>
                          
                          <th>
                            Customer Contact
                          </th>
                          
                          <th>
                            Deliver Department
                          </th>
                          
                          <th>
                            Update Date
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </tr></thead>
                        <tbody>
                            @foreach ( $invoices as $invoice)
                            <tr>
                                <td>
                                  {{ $invoice->invoice_no }}
                                </td>
                                <td>
                                    {{ $invoice->customer_name }}
                                </td>
                                <td>
                                    {{ $invoice->customer_address }}<br />
                                    {{ $invoice->customer_district }}
                                </td>
                                <td>
                                    {{ $invoice->mobile_no1 }}<br />
                                    {{ $invoice->mobile_no2 }}<br />
                                </td>
                                
                                
                                <td>
                                    {{ $invoice->deliver_departmet_checked }}
                                </td>
                                
                                <td>
                                  {{ $invoice->updated_at }}
                                 </td>
                                <td class="text-right">
                                    @if ($invoice->deliver_departmet_checked == "printed")
                                        All Ready Printed
                                    @else
                                    <form action="{{ route('deliver.update', $invoice->id) }}" method="POST" class="invoiceForm">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" id="saveButton" data-confirm-save="true" class="btn btn-primary mb-2">Print</button>
                                   
                                </form>
                                    @endif
                                   
                                </td>
                              </tr>
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#saveButton').on('click', function(e) {
          e.preventDefault();
      
          Swal.fire({
            title: 'Confirm Print',
            text: 'Are you sure you want to print?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, print it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $('.invoiceForm').submit(); // Submit the form
            }
          });
        });
     
        // Page refresh after 5 seconds
        setTimeout(function() {
            location.reload();
        }, 5000);
    });
      </script>
      

@endsection




