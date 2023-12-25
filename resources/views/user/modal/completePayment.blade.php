
<!-- Modal -->
<div id="pay_{{$pay->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document"><form action="{{route('user.complete.payment', $pay->id)}}" method="post">@csrf
<div class="modal-content">
<div class="modal-header">
<h5 id="exampleModalLabel" class="modal-title text-danger">Payment Complete</h5>
</div>
<div class="modal-body">Are you sure you want to complete your payment, this action will take you to a payment gateway where you pay the remaining Installmental <b/>
    <div>
        <h3 style="padding-top: 40px;">Payment Method</h3>
        <label>Local</label>
        <input required name="payment" type="radio" value="paystack" />
        <label>International</label>
        <input name="payment" type="radio" value="stripe" />
    </div>
</div>
<div class="modal-footer">

    <input name="course_id" type="hidden" value="{{$pay->course_id}}">
    <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
    <button class="btn btn-info btn-sm" name="second" type="submit">2nd Payment</button>
    <button class="btn btn-dark btn-sm" name="third" type="submit">3rd Payment</button> <button class="btn btn-success btn-sm" name="second_third" type="submit">2nd  & 3rd Payment</button></div>
</div>
</form></div>
</div>
