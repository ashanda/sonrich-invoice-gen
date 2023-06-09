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
                      <table class="table">
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
                            Amount
                          </th>
                          <th>
                            Acoount Department
                          </th>
                          <th>
                            Deliver Department
                          </th>
                          <th>
                            Create Date
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
                                    {{ $invoice->amount }}
                                </td>
                                <td>
                                    {{ $invoice->account_departmet_checked }}
                                </td>
                                <td>
                                    {{ $invoice->deliver_departmet_checked }}
                                </td>
                                <td>
                                  {{ $invoice->created_at }}
                                </td>
                                <td>
                                  {{ $invoice->updated_at }}
                                 </td>
                                <td class="text-right">
                                    <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-success mb-2">show</a>
                                    <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-primary mb-2">Edit</a>
                                   
                                    <a href="{{ route('invoice.destroy', $invoice->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                      
                                      
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

@endsection




