<div>
    <div class="container">
        <div class="section-title pb-5">
            <h2>Event</h2>
            <h3>Fatured <span>Event</span></h3>
            <p>Join our featured upcoming event to catch up with investor, startup, or talent.</p>
        </div>
        {{-- ini adalah bagian dari list event --}}
        <div class="row">
            <div class="col-lg-3">
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm {{$eventAll ? 'active' : ''}}" wire:click="back">All Event</button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm {{$eventHarian ? 'active' : ''}}" wire:click="goToToday">Event Hari ini</button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm {{$monthActive ? 'active' : ''}}"wire:click="getBulanIni">{{$month}}</button></div>
                    <div class="shadow p-2 mb-2 bg-white rounded"><button type="button" class="btn btn-outline-secondary btn-lg btn-block btn-sm {{$nextMonthActive ? 'active' : ''}}" wire:click="getBulanDepan">{{$NextMonth}}</button></div>
            </div>
            <div class="col-lg-9">
                @if ($eventAll)
                <livewire:event-all></livewire:event-all>
                @endif
                @if ($eventHarian)
                <livewire:event-today></livewire:event-today>
                @endif
                @if ($monthActive)
                    <livewire:event-month></livewire:event-month>
                @endif
                @if ($nextMonthActive)
                    <livewire:event-next-month></livewire:event-next-month>
                @endif
            </div>
        </div>
    </div>
</div>
