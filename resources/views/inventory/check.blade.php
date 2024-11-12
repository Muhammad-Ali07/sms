@if(!empty($select))
@foreach($select as $row)
<option value="{{$row->id}}">{{$row->PackingName}}</option>
@endforeach
@endif




@if(!empty($garagecategory))
@foreach($garagecategory as $rowpro)
<option value="{{$rowpro->id}}">{{$rowpro->Des}}</option>
@endforeach
@endif



@if(!empty($pro))
@foreach($pro as $rowpro)
<option id="drop2" value="{{$rowpro->id}}">{{$rowpro->Des}}</option>
@endforeach
@endif





@if(!empty($remainamount))
 <label for="regular-form-2" class="form-label">Privious Balance</label>
<input id="balance" name="balance" onkeyup="calc()" value="{{$remainamount->Amount}}" readonly type="number" class="form-control" >
@endif
