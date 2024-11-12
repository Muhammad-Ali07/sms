@extends('layouts.master')
@section('body')
    main
@endsection
@section('main-content')


 @include('includes.mobile-nav')
 <div class="flex">

      <!-- BEGIN: Side Menu -->
      @include('includes.side-nav') 
              <div class="content">
            <!-- BEGIN: Top Bar -->
             @include('includes.top-bar')
            <!-- END: Top Bar -->

            
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                   Tracking Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                         
                         <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                             Tracking Search
                           </h2>
             </div>
             <form method="post" action="{{route('track.challan')}}">   
               
               @csrf
               <div class="grid grid-cols-12 gap-2 mt-2 positon-relative senderForm">
                                    </div></form>
            
                       
                        
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                         Add Record
                           </h2>
                         
                        </div>
                        <div id="input" class="p-5">
                            <form method="post" @if(!empty($query)) action="{{route('edit-tracking-process')}}" @else  action="{{route('add-tracking-process')}}" @endif>
                            @csrf
                           <div class="preview">
                               @if(!empty($query)) <input type="hidden" name="form_id" value="{{$query->id}}"> @endif
                               <div class="grid grid-cols-12 gap-6 mt-5">
                                    <div class="col-span-4 mt-2">
                                    <label for="regular-form-6" class="form-label">Select Builty</label>
                                    @if(empty($query))
                                       <select type="text" id="builty_id" class="form-control" name="bilty_id">
                                             <option>Select Bilty</option>
                                             @foreach($builties as $b)
                                             <option value="{{$b->builty_id}}">{{$b->builty_id}}</option>
                                             @endforeach
                                        </select>
                                     @else
                                        <input type="text" name="builty_id" readonly class="form-control" value="{{isset($query->builty_id)? $query->builty_id : ''}}">
                                     @endif
                                 </div>

                                 <script>
                                 
                                    // Listen for change event on builty_id select box
                                    $('#builty_id').on('change', function() {
                                        var builty_id = $(this).val();  // Get selected builty_id value
                                
                                        if (builty_id) {
                                            $.ajax({
                                                url: '/fetch-builty-details',  // URL to send the AJAX request
                                                type: 'GET',
                                                data: { builty_id: builty_id },  // Send the builty_id to the server
                                                success: function(response) {
                                                    // Handle the response data (this could be builty details)
                                                    console.log(response); // Log the response for debugging
                                                    var data = response.data;
                                                    $('#builty_date').val(data.date ? data.date.split('-').reverse().join('-') : ''); // Format to dd-mm-yyyy
                                                    $('#computer_no').val(data.computerno);
                                                    $('#rfq_no').val(data.job_inquiry_code);
                                                    
                                                    // Add more fields as needed
                                                },
                                                error: function(xhr) {
                                                    console.error('Error fetching data:', xhr.responseText);
                                                }
                                            });
                                        }
                                    });
                                </script>
                                <div class="col-span-4 mt-2">
                                    <label for="builty_date" class="form-label">Date</label>
                                    <input id="builty_date" readonly type="date" 
                                    @if(isset($query)) value="{{isset($query->builty_date) ? $query->builty_date : ''}}" @endif
                                    class="form-control" name="builty_date" type="date" value="{{date('Y-m-d')}}">
                                </div>
                                
                                <div class="col-span-4 mt-2">
                                    <label for="computer_no" class="form-label">Job No</label>
                                    <input id="computer_no" 
                                    @if(isset($query)) value="{{isset($query->computer_no) ? $query->computer_no : ''}}" @endif
                                    readonly type="text" class="form-control" name="computer_no">
                                </div>
                                
                                <div class="col-span-4 mt-2">
                                    <label for="rfq_no" class="form-label">RFQ No</label>
                                    <input id="rfq_no" readonly 
                                    @if(isset($query)) value="{{isset($query->rfq_no) ? $query->rfq_no : ''}}" @endif
                                    type="text" class="form-control" name="rfq_no">
                                </div>
                                <div class="col-span-4 mt-2">
                                    <label for="regular-form-6" class="form-label">Status</label>
	                                <select type="text" id="regular-form-6" class="form-control"  placeholder="Enter Address" name="status">
    		                             <option>select Status</option>
    		                                @foreach($status as $value)
    		                                 <option value="{{$value->status}}"  @if(!empty($query) && $value->status == $query->status) selected @endif > {{$value->status}}</option>
    		                                 @endforeach
    		                           </select>
                                 </div>
                               </div>
                              
                              <button class="btn btn-primary mt-5">Submit</button>
                              <div class="btn btn-primary mt-5" id="Reset">Reset</div>
                           </div>
                           </form>
                        </div>
                              @if(empty($query))
                              <div id="input" class="p-5">
                                   <div class="preview">
                                      <table id="tracking_table" class="display nowrap" style="width:100%">
                                         <thead>
                                            <tr>
                                                <th>S.No #</th>
                                               <th>Bilty Date</th>
                                               <th>Bilty.No #</th>
                                                <!--<th>RFQ No</th>-->
                                               <th>Status</th>

                                               <th>Action</th>
                                            </tr>
                                         </thead>
                                         <tbody>
                                                 @php   
                                                    $sr = 1;
                                                 @endphp
                                             @foreach($data as $row)
                                                 @if(isset($row->builty_id) && $row->builty_id != null)
                                                    <tr>
                                                        <td>{{$sr}}</td>
                                                        <td>{{isset($row->builty_date) ? $row->builty_date :''}}</td>
                                                        <td><b>{{isset($row->builty_id) ? $row->builty_id :''}}</b></td>
                                                        <!--<td><b>{{isset($row->rfq_no) ? $row->rfq_no :''}}</b></td>-->
                                                        <td class="clickable-td" style="cursor: pointer;">{{isset($row->status) ? $row->status :''}}</td>
                                                        <td>
                                                            <a title="edit" class="btn btn-secondary" href="{{ route('edit-tracking', ['id' => $row->id]) }}">
                                                               <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a onclick="return confirm('Are you sure you want to delete this tracking?');" title="Delete" class="btn btn-secondary" href="{{ route('delete-tracking', ['id' => $row->id]) }}">
                                                               <i class="fa fa-times"></i>
                                                            </a>
                                                         </td>
                                                    </tr>                 
                                                    @php
                                                        $sr++;
                                                    @endphp
                                                @endif
                                              @endforeach 
                                         </tbody>
                                         <tfoot>
                                         <tr>
                                              <th>S.No #</th>
                                               <th>Bilty Date</th>
                                               <th>Builty.No #</th>
                                                <!--<th>RFQ No</th>-->
                                               <th>Status</th>
                                               <th>Action</th>
                                            </tr>
                                         </tfoot>
                                      </table>
                                      
                                   </div>
                            </div>
                            @endif
   
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
            
         </div>

        </div>
@endsection
@section('script')
@endsection
@section('scripts')
@endsection