  <div class="card text-white shadow rounded">
      <h6 class="card-header bg-primary">{{ $Message ?? 'kosong'}}</h6>
      <div class="card-body">
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Pencarian" aria-label="Recipient's username"
                  aria-describedby="button-addon2" wire:model="{{$search ?? ''}}">
          </div>
      </div>
  </div>
