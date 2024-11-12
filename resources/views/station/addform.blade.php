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
            <form method="post" action="{{route('save-edit-process')}}"> 
               @csrf
            <div class="grid">
               <div class="intro-y flex items-center mt-12">
                  <h2 class="text-lg font-medium mr-auto">
                     Station Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                            Edit Station
                           </h2>
                          
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                               <div class="grid grid-cols-12 gap-2">
                                   
                                    <div class="col-span-6">
                                 <label for="regular-form-2" class="form-label">Station Name</label>
                                 <input id="regular-form-2" type="text" value="{{$editstation->name}}"  class="form-control" placeholder="Enter Name in English" name="name">
                              </div>
                              
                                 <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Station Type</label>
                                    <select id="regular-form-2" class="form-control" name="StationTypes">
                                    <option>Please Select</option>
                                    <option @if(!empty($editstation)) @if(trim($editstation->station_type_name)=='Domestic') {{'selected'}} @endif @endif value="Domestic"> Domestic</option>
                                    <option @if(!empty($editstation)) @if(trim($editstation->station_type_name) =='Export') {{'selected'}} @endif @endif  value="Export"> Export</option>
                                    </select>
                                 </div>
                                

                          

                              </div>

                            
                            <div class="mt-2 grid grid-cols-12 gap-2 positon-relative phoneDivbar">
                                <div class="col-span-12">
                                    <div class="mt-2">
                                       <label for="regular-form-5" class="form-label">Phone</label>  
                                       
                                        @if(!empty($editstation->phones))
                                            @php $phones = explode(',',$editstation->phones) @endphp
                                            @foreach($phones as $contact)   
                                            <input id="regular-form-5" type="text" class="form-control" value="{{$contact}}"   placeholder="Enter Phone" name="phones[]">
                                            
                                            @endforeach
                                        @endif
                                       
                                        <input id="regular-form-5" type="text" class="form-control" placeholder="Enter Phone" name="phones[]">
                                             <button class="btn btn-primary mt-5 AddMorePhone">Add More</button>
                                    </div>
                                 </div>
                            </div>
                            
                             
                              
                                        
                                        
                                            
                        
                              
                              <div class="mt-2 grid grid-cols-12 gap-2 positon-relative-textarea phoneDivAddress_stat">
                                 <div class="col-span-12">
                                    <div class="mt-2">
                                       <label for="regular-form-6" class="form-label">Address</label>
                                     
                                    @if(!empty($editstation->address))
                                    @php $addresses = explode(',',$editstation->address) @endphp
                                       @foreach($addresses as $address)   
                                            <textarea id="regular-form-6" class="form-control" placeholder="Enter Address" name="address[]">{{$address}}</textarea>
                                            
                                        @endforeach
                                    @endif
                                      <textarea id="regular-form-6" class="form-control" placeholder="Enter Address" name="address[]"></textarea>
                                             <button class="btn btn-primary mt-5 AddMoreAddress_stat">Add More</button>
                                             
                                    </div>
                                   
                                
                                 </div>
                              </div>
                              
                              
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
            <input type="hidden" name="station_id" value="{{$editstation->id}}"/> 
            <div class="btn btn-primary mt-5"> <button type="submit"> Submit </button> </div>
            <div class="btn btn-primary mt-5" id="Reset">
                Reset
            </div>
            </form>
         </div>
        </div>
@endsection
