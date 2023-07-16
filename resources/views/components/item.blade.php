<div class="card book mb-2 me-2">
    <div class="book-img bg-light p-2 d-flex justify-content-between">
        <span class="@if ($item->qty <= 10) text-danger @endif">{{ $item->qty }}</span>
        <span>{{ config('enums.item_status')[$item->status] }}</span>
        @if ($user->id == $item->user_id || in_array($user->role, ['super-admin', 'admin']))
            <div>
                <a class="text-secondary" href="{{ route('items.edit', $item->id) }}" class="edit-btn"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a class="text-secondary delete-btn" data-type="المنتج" href="{{ route('item.delete', $item->id) }}"
                    class="delete-btn"><i class="fa-solid fa-trash"></i></a>
            </div>
        @endif

    </div>
    <div class="card-body text-center">
        <img class="card-img" src="{{$item->image}}" alt="" srcset="">
        <h5 class="card-title">{{ $item->title }} </h5>
        <p class="card-text">{{ $item->notes }}</p>
        @if ($item->qty)
            <button class="btn ctm-btn delivery-btn" data-bs-toggle="modal" data-bs-target="#deliveryItemModal"
                data-item-id="{{ $item->id }}">بيع</button>
        @endif
    </div>
</div>
