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
                     Station Form
                  </h2>
               </div>
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              View Station
                           </h2>
                        
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                                <table id="example" class="display nowrap" style="width:100%">
                                   <thead>
                                     <tr>
                                       <th>Id</th>
                                       <th>Station Name</th>
                                       <th>Station Type</th>
                                       <th>Sender Name</th>
                                       <th>Medicine Small</th>
                                       <th>Medicine Large</th>
                                       <th>Sample Small</th>
                                       <th>Sample Large</th>
                                       <th>Carton Rate</th>
                                       <th>Weight</th>
                                       <th>Other</th>
                                       <th style="display:none;"></th>
                                       <th style="display:none;"></th>
                                       <th style="display:none;"></th>
                                       <th>Action</th>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <?php $serial = 0; ?>
                                     @foreach($price as $row)
                                     <?php $serial += 1; ?>
                                     <tr>
                                       <td>{{$row->pkg_id}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->station_type}}</td>
                                       <td>{{$row->name}}</td>
                                       <td>{{$row->medicine_small}}</td>
                                       <td>{{$row->medicine_large}}</td>
                                       <td>{{$row->sample_small}}</td>
                                       <td>{{$row->sample_large}}</td>
                                       <td>{{$row->ctn_rate}}</td>
                                       <td>{{$row->rate_kg}}</td>
                                       <td>{{$row->other}}</td>
                                       <td style="display:none;">{{$row->fk_sender_id}}</td>
                                       <td style="display:none;">{{$row->fk_station_id}}</td>
                                       <td style="display:none;">{{$row->fk_station_type}}</td>
                                       <td>
                                            <?php  if(!empty($edition) && $edition == 1) {?>
                                              <a href="<?php echo url('edit_sender_station/'.$row->pkg_id); ?>" id="showBox<?php echo $serial; ?>"><i class="fa fa-pencil"></i></a>
                                            <?php  } else{ ?>
                                              <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                                                <i class="fa fa-pencil"></i>
                                              </a>
                                            <?php  } ?>
                                            |||
                                            <?php if(!empty($deletion) && $deletion == 1){?>
                                              <a href="<?php echo url('remove_sender_station/'.$row->pkg_id); ?>" id="showBox2<?php echo $serial; ?>"><i class="fa fa-times"></i></a>
                                            <?php }else{ ?>
                                              <a href="" data-toggle="tooltip" title="You don't have enough permision for this action.">
                                                <i class="fa fa-times"></i>
                                              </a>
                                            <?php } ?>
                                          </td>
                                       </tr>
                                     
                                     @endforeach
                                   </tbody>
                                 </table>
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