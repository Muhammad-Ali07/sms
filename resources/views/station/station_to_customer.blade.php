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
             <form method="post" action="{{route('add-customer-station-process')}}">
                @csrf
                  <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                  <input type="hidden" id="id" name="id" <?php if(isset($record[0]->pkg_id)){ echo isset($record[0]->pkg_id)?' value="'.$record[0]->pkg_id.'" ':' '; }?> />
                  <div class="grid">
                     <div class="intro-y flex items-center mt-12">
                        <h2 class="text-lg font-medium mr-auto">
                           Customer Station
                        </h2>
                     </div>
               
               <div class="grid grid-cols-12 gap-6 mt-5">
                  <div class="intro-y col-span-12 lg:col-span-12">
                     <!-- BEGIN: Input -->
                     <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                           <h2 class="font-medium text-base mr-auto">
                              Add Station To Sender
                           </h2>
                          
                        </div>
                        <div id="input" class="p-5">
                           <div class="preview">
                              
                              <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12">
                                    <label for="regular-form-1" class="form-label">Select Sender : </label>
                                   <select class="form-control col-md-7 col-xs-12" id="sender" name="sender">
                                     <option>Select a Sender</option>
                                     @foreach($sender as $customer)
                                     <option value="{{$customer->id}}" <?php if(isset($record[0]->fk_sender_id)){if($record[0]->fk_sender_id == $customer->id){echo 'selected';}}?>>{{$customer->name}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                              </div>

                              <div class="mt-2">
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select Station Type : </label>

                                   <div class="col-md-8 col-sm-8 col-xs-12">
                                      <select class="form-control col-md-7 col-xs-12" id="stationType" name="stationType">
                                        <option value="0">Select a Station Type</option>
                                        @foreach($station_type as $cities)
                                        <option value="{{$cities->station_type_id}}" <?php if(isset($record[0]->fk_station_type)){if($record[0]->fk_station_type == $cities->station_type_id){echo 'selected';}}?>>{{$cities->station_type}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                              </div>

                              <div class="mt-2">
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Select a Station:</span>
                                 </label>
                                 <div class="col-md-8 col-sm-8 col-xs-12">
                                   <select class="form-control col-md-7 col-xs-12" id="station" name="station">
                                     <option>Select a Station</option>
                                     @foreach($stations as $station)
                                     <option value="{{$station->id}}"> {{$station->name}}</option>
                                     @endforeach
                                   </select>
                                 </div>
                              </div>


                              <div class="mt-2">
                                  <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Date
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input value={{date("d-m-Y")}} type="text" placeholder="DD-MM-YYYY" <?php echo isset($record[0]->Date)?' value="'.$record[0]->Date.'" ':' '?>name="date" id="datepicker" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="mt-2">
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Medicine Small&nbsp;:</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="msmall" id="msmall" <?php if(isset($record[0]->medicine_small)){ echo isset($record[0]->medicine_small)?' value="'.$record[0]->medicine_small.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                                   
                                
                              <div class="mt-2">
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Medicine large&nbsp;:
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="mlarge" id="mlarge" <?php if(isset($record[0]->medicine_large)){ echo isset($record[0]->medicine_large)?' value="'.$record[0]->medicine_large.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="mt-2">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">Sample Small&nbsp;:
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="ssmall" id="ssmall" <?php if(isset($record[0]->sample_small)){ echo isset($record[0]->sample_small)?' value="'.$record[0]->sample_small.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="mt-2">
                                <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Sample large&nbsp;:
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="slarge" id="slarge" <?php if(isset($record[0]->sample_large)){ echo isset($record[0]->sample_large)?' value="'.$record[0]->sample_large.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="mt-2">
                                <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Ctn_Rate&nbsp;:
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="ctn_rate" id="ctn_rate" <?php if(isset($record[0]->ctn_rate)){ echo isset($record[0]->ctn_rate)?' value="'.$record[0]->ctn_rate.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>

                              <div class="mt-2">
                                 <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Rate/&nbsp;Kg&nbsp;:
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="rate_kg" id="rate_kg" placeholder="Weight" <?php if(isset($record[0]->rate_kg)){ echo isset($record[0]->rate_kg)?' value="'.$record[0]->rate_kg.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>


                               <div class="mt-2">
                                <label class="form-label col-md-4 col-sm-4 col-xs-12" for="first-name">Other Rate&nbsp;:
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                  <input type="text" name="otherRate" id="otherRate" placeholder="" <?php if(isset($record[0]->other)){ echo isset($record[0]->other)?' value="'.$record[0]->other.'" ':' '; }?> class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <br/><br/>
                              <?php if(isset($record[0]->pkg_id)){ ?>
                               <input type="submit" id="update" name="updatedata" class="btn btn-primary" value="Update">
                             <?php }else{ ?>
                               <input type="submit" name="insertdata" class="btn btn-success" value="Add Station" >
                             <?php } ?>
                           </div>
                        </div>
                     </div>
                     <!-- END: Input -->
                     <!-- BEGIN: Input Sizing -->
                  </div>
                   
               </div>
            </div>
             </form>
         </div>
          
        </div>
@endsection