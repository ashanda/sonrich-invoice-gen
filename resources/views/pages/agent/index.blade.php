@extends('layouts.app')

@section('content')
<div class="content">
    
        <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header">
                    <h4 class="card-title">All Invoices</h4>
                    <a href="{{ route('invoice.create') }}" class="btn btn-primary mb-2">Add Invoice</a>
                    <form action="{{ route('invoice.index') }}" method="GET" id="filter-form">
                      <div class="row">
                          <!-- Date Range Picker -->
                          <div class="col-md-3">
                              <label for="start_date">Start Date:</label>
                              <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request()->start_date }}">
                          </div>
                          <div class="col-md-3">
                              <label for="end_date">End Date:</label>
                              <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request()->end_date }}">
                          </div>
                          <!-- Company Dropdown -->
                          <div class="col-md-3">
                              <label for="company">Company:</label>
                              <select name="company" id="company" class="form-control">
                                  <option value="">Select Company</option>
                                  @foreach ($companies as $company)
                                      <option value="{{ $company->id }}" {{ request()->company == $company->id ? 'selected' : '' }}>
                                          {{ $company->company_name }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group  mt-3">
                              <button type="submit" class="btn btn-primary">Filter</button>
                              <a href="{{ route('invoice.all') }}" class="btn btn-warning">Reset</a>
                          </div>
                          </div>
                      </div>
                      
                      
                  </form>
                  </div>
                


                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="dataTable" class="table">
                        <thead class=" text-primary">
                          <tr><th>
                            Invoice Number
                          </th>
                          <th>
                            Company
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
                                  {{ $invoice->companies->company_name }}
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




