@include('layouts.plantilla')

<main class="mt-5">
    <div class="w-full max-w-xl mx-auto bg-white shadow-lg rounded border border-gray-200">
        <div>
            @if($contact->image)
                <img src=" {{ asset('storage/'. $contact->image)}}" alt="{{$contact->name}}">
            @endif
        </div>
        <div class="text-center">
            <ul class="list-none m-5">
                <li class="font-bold">
                    <div class="flex">
                        {{$contact->name}}
                        <a class="pl-1 no-underline" href="{{ route('contacts.edit', $contact) }}">📝</a>
                        <form class="w-1" action="{{ route('contacts.destroy', $contact) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="b-0 pl-1 background-none">💥</button>
                        </form>
                    </div>
                </li>
                <ul class="ml-5">
                    <li>{{$contact->birth_date}}</li>
                    <li>{{$contact->email}}</li>
                    <li>{{$contact->phone}}</li>
                    <li>{{$contact->country}}</li>
                    <li>{{$contact->address}}</li>
                    <li>Job contact: {{$contact->job_contact}}</li>
                    <li>{{$contact->relation}}</li>
                </ul>
            </ul>
        </div>
    </div>
</main>
