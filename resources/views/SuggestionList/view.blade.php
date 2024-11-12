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
                   
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Suggestion List
                           </h2>
                        </div>
                          <!--    <form method="Post" action="{{route('get-suggest-data')}}">
                                 @csrf

                        <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Customer Name</label>
                                    <select id="regular-form-2" class="form-control" name="suggestname">
                                    <option>Please Select customer</option>
                                   @foreach($listcustom as $listvalue)
                                   
                                    <option value="{{$listvalue->id}}">{{$listvalue->suggest_name}}</option>
                                  @endforeach
                                    </select>
                                 </div>
                                 <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Station</label>
                                    <select id="regular-form-2" class="form-control" name="suggeststation">
                                    <option>Please Select station</option>
                                   @foreach($row as $colum)
                                  
                                    <option value="{{$colum->id}}">{{$colum->name}}</option>
                                  @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="btn btn-danger mt-5"> <button type="submit"> Filter </button> </div>
            
                        </div>


                          </form>-->


 <div id="input" class="p-5">
  <div class="preview">
     @if(empty($getdata))
 <table id="examplesss" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                    <th>ID</th>
                                       <th>Name</th>
                                        <th>Date</th>
                                       <th>Labour</th>
                                       <th>Station</th>
                                       <th>Package</th>
                                       <th>Freight</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($list as $values)
                                    <?php
 $row=DB::table('now_station')->where('id',$values->suggest_station)->first();
 $data=DB::table('now_packages')->where('id',$values->suggest_package)->first();
 
?>
                                   <tr>
                                   <td>{{$values->id}}</td>
                                       <td>{{$values->suggest_name}}</td>
                                       <td>{{$values->suggest_date}}</td>
                                       <td>{{$values->Labour_suggest}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$data->packagename}}</td>
                                       <td>{{$values->suggest_freight}}</td>
                                       <td> 
                                       <a href="{{route('edit-suggest',['id'=>$values->id])}}" >Edit</a>   
                                       <a href="{{route('delete-suggest',['id'=>$values->id])}}">Delete</a></td>

                        
                                          </tr>
                                          @endforeach
                                                         </tbody>
                                 <tfoot>
                                   <tr>
                                   <th>ID</th>
                                       <th>Name</th>
                                       <th>Date</th>
                                       <th>labour</th>
                                       <th>station</th>
                                       <th>package</th>
                                       <th>Freight</th>
                                       <th>Action</th>
                                    </tr>
                                 </tfoot>
                              </table>



                              @else

                              <table id="examples" class="display nowrap" style="width:100%">
                                 <thead>
                                    <tr>
                                    <th>ID</th>
                                       <th>Name</th>
                                        <th>Date</th>
                                       <th>Labour</th>
                                       <th>Station</th>
                                       <th>Package</th>
                                       <th>Freight</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($getdata as $values)
                                    <?php
 $row=DB::table('now_station')->where('id',$values->suggest_station)->first();
 $data=DB::table('now_packages')->where('id',$values->suggest_package)->first();
 
?>
                                   <tr>
                                   <td>{{$values->id}}</td>
                                       <td>{{$values->suggest_name}}</td>
                                       <td>{{$values->suggest_date}}</td>
                                       <td>{{$values->Labour_suggest}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$data->packagename}}</td>
                                       <td>{{$values->suggest_freight}}</td>
                                       <td> 
                                       <a href="{{route('edit-suggest',['id'=>$values->id])}}" >Edit</a>   
                                       <a href="{{route('delete-suggest',['id'=>$values->id])}}">Delete</a></td>

                        
                                          </tr>
                                          @endforeach
                                                         </tbody>
                                 <tfoot>
                                   <tr>
                                   <th>ID</th>
                                       <th>Name</th>
                                       <th>Date</th>
                                       <th>labour</th>
                                       <th>station</th>
                                       <th>package</th>
                                       <th>Freight</th>
                                       <th>Action</th>
                                    </tr>
                                 </tfoot>
                              </table>

                              @endif
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
               </div>
            </div>
         </div>
           
        </div>
@endsection