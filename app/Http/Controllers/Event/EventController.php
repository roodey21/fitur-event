<?php

namespace App\Http\Controllers\Event;

use Auth;
use App\{Event, Priority, Tenant};
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\{QueryBuilder, AllowedFilter};

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(request()->has('filter')){
            if(array_key_exists('between', $request->filter)){
                $test = request()->filter['between'];
                $exp = explode(',', $test);
            }else{
                $exp = null;
            }

            if(array_key_exists('title', $request->filter)){
                $title = request()->filter['title'];
            }else{
                $title = null;
            }
        }else{
            $exp = null;
            $title = null;
        }

        $priority = Priority::orderBy('name', 'ASC')->get();
        $event = QueryBuilder::for(Event::class)
            ->allowedFilters([
                AllowedFilter::partial('title'),
                AllowedFilter::exact('priority', 'priority_id'),
                AllowedFilter::exact('publish', 'publish'),
                AllowedFilter::scope('between', 'dateBetween'),
            ])
            ->latest()->paginate();
        return view('event.index', compact('event', 'priority', 'exp', 'title'));
    }

    public function indexMentor(Request $request)
    {
        if(request()->has('filter')){
            if(array_key_exists('between', $request->filter)){
                $test = request()->filter['between'];
                $exp = explode(',', $test);
            }else{
                $exp = null;
            }

            if(array_key_exists('title', $request->filter)){
                $title = request()->filter['title'];
            }else{
                $title = null;
            }
        }else{
            $exp = null;
            $title = null;
        }

        $priority = Priority::orderBy('name', 'ASC')->get();
        $event = QueryBuilder::for(Event::class)
            ->allowedFilters([
                AllowedFilter::partial('title'),
                AllowedFilter::exact('priority', 'priority_id'),
                AllowedFilter::exact('publish', 'publish'),
                AllowedFilter::scope('between', 'dateBetween'),
            ])->where('inkubator_id', '=', Auth::user()->inkubator_id)
            ->latest()->paginate();       
        return view('event.index', compact('event', 'priority', 'exp', 'title'));
    }

    public function indexTenant(Request $request)
    {

        $tenant = Tenant::where('user_id', auth()->user()->id)->first();
        $event = Event::where([
            ['inkubator_id', '=', Auth::user()->inkubator_id],
            ['priority_id', '=', $tenant->priority_id],
            ['publish', '=', 1]
        ])->latest()->paginate();

        return view('/event/index', compact('event'));
    }

    public function calendar()
    {
        $priority = Priority::all();
        $event = Event::all();
        return view('event.calendar', compact('event', 'priority'));
    }

    public function calendarMentor()
    {
        $event = Event::where('inkubator_id', '=', Auth::user()->inkubator_id)->get();
        return view('event.calendar', compact('event'));
    }

    public function calendarTenant()
    {
        $tenant = Tenant::where('user_id', auth()->user()->id)->first();
        $event = Event::where([
            ['inkubator_id', '=', Auth::user()->inkubator_id],
            ['priority_id', '=', $tenant->priority_id],
            ['publish', '=', 1]
        ])->get();
        return view('event.calendar', compact('event'));
    }


    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    public function store(EventRequest $request)
    {
        $attr = $request->all();

        $slug = \Str::slug(request('title'));
        $attr['slug'] = $slug;
        $attr['author_id'] = Auth::user()->id;
        $attr['inkubator_id'] = Auth::user()->inkubator_id;

        $foto = request()->file('foto');
        $fotoUrl = $foto->storeAs("image/event", "{$slug}.{$foto->extension()}");
        $attr['foto'] = $fotoUrl;

        Event::create($attr);

        $notification = array(
            'message' => 'Event Baru Berhasil Ditambah',
            'alert-type' => 'success'
        );

        return redirect()->to('/inkubator/event')->with($notification);
    }

    // public function storeMedia(Request $request)
    // {

    //     $path = storage_path('tmp/uploads');

    //     if (!file_exists($path)) {
    //         mkdir($path, 0777, true);
    //     }

    //     $file = $request->file('file')->getClientOriginalName();


    //     $file->move($path, $name);

    //     return response()->json([
    //         'name'          => $file,
    //         'original_name' => $file->getClientOriginalName(),
    //     ]);
    // }

    public function edit(Event $event)
    {
        $priority = Priority::all();
        return view('event.edit', compact('event', 'priority'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $attr = $request->all();
        $photo = $request->file('foto');

        if ($request->file('foto')) {
            \Storage::delete($event->foto);
            $foto = request()->file('foto');
            $fotoUrl = $foto->storeAs("image/event", "{$event->slug}.{$foto->extension()}");
            $attr['foto'] = $fotoUrl;
        } else {
            $foto = $event->foto;
        }
        // dd($request->all());
        $event->update($attr);
        $notification = array(
            'message' => 'Event Berhasil Diperbarui',
            'alert-type' => 'success'
        );
        return redirect()->to('/inkubator/event')->with($notification);
    }

    public function destroy(Event $event)
    {
        \Storage::delete($event->foto);
        $event->delete();
        $notification = array(
            'message' => 'Event telah Dihapus',
            'alert-type' => 'error'
        );
        return redirect()->to('/inkubator/event')->with($notification);
    }
}
