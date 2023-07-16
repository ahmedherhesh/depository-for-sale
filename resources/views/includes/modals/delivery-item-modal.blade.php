<div class="modal fade mt-5" id="deliveryItemModal" tabindex="-1" aria-labelledby="deliveryItemModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mb-2">بيع منتج</h4>
                <form action="{{ route('delivery') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" id="item_id">
                    <div class="mb-2">
                        <label for="customer_name" class="form-label">اسم المستلم</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                            autocomplete="off" value="{{ old('customer_name') }}">
                        @if ($errors->has('customer_name'))
                            <span class="text-danger text-direction-rtl">{{ $errors->first('customer_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="customer_phone" class="form-label">رقم الموبايل</label>
                        <input type="number" class="form-control" id="customer_phone" name="customer_phone"
                            autocomplete="off" value="{{ old('customer_phone') }}">
                        @if ($errors->has('customer_phone'))
                            <span class="text-danger text-direction-rtl">{{ $errors->first('customer_phone') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="notes" class="form-label">ملاحظات</label>
                        <textarea class="form-control" id="notes" name="notes">{{ old('title') }}</textarea>
                        @if ($errors->has('notes'))
                            <span class="text-danger text-direction-rtl">{{ $errors->first('notes') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="qty" class="form-label">الكمية</label>
                        <input type="number" class="form-control" id="qty" name="qty" autocomplete="off"
                            value="{{ old('qty') }}">
                        @if ($errors->has('qty'))
                            <span class="text-danger text-direction-rtl">{{ $errors->first('qty') }}</span>
                        @endif
                    </div>
                    <div class="mb-2">
                        <label for="discount" class="form-label">الخصم</label>
                        <input type="number" class="form-control" id="discount" name="discount" autocomplete="off"
                            value="{{ old('discount') }}">
                        @if ($errors->has('discount'))
                            <span class="text-danger text-direction-rtl">{{ $errors->first('discount') }}</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button class="btn ctm-btn mt-3">بيع</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
