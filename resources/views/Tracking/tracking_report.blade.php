 <table id="examples">
                                  
                                  <thead>
                                      <tr>

                                            <th>S.No #</th>
                                            <th>Station</th>
                                            <th>Date</th>
                                            <th>Truck</th>
                                            <th>Status</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                   
                                    @foreach ($track as $key => $row )

                                    <tr>
                                    
                                           <td>{{++$key}}</td>
                                           <td>{{$row->name}}</td>
                                            <td>{{$row->Tracking_Date}}</td>
                                            <td>{{$row->Tracking_Truck_no}}</td>
                                            <td>{{$row->status}}</td>
                                    
                                    </tr>
                                    @endforeach

                                  </tbody>
                                  </table>
                                  
                                  <style>
                                      table tr {
                                          border:1px solid #000;
                                      }
                                      
                                      table tr td{
                                          text-align:left;
                                          border:1px solid #000;
                                      }
                                      
                                      table {
                                          position: relative;
                                          width:100%;
                                          border-collapse: collapse;
                                          /*border:1px solid #000;*/
                                      }
                                      
                                      table tr th {
                                           text-align:left;
                                           border:1px solid #000;
                                      }
                                      
                                  </style>