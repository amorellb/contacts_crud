@include('layouts.plantilla')

<main class="mt-5">
    <div class="w-full max-w-xl mx-auto bg-white shadow-lg rounded border border-gray-200">
        <h2 class="text-xl m-5">@lang("Update $contact->name's contact info")</h2>
        @if ($errors->any())
            <div class="mx-auto max-w-md border-2 border-solid border-red-600 bg-red-300 rounded text-center">
                <strong>Whoops! </strong>@lang("There were some problems with your input.")<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-5" method="POST" enctype="multipart/form-data"
              action="{{ route('contacts.update', $contact) }}">

            @csrf
            @method('PUT')

            <label for="name"> @lang("Contact name"):
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="text" name="name"
                       value="{{old('name', $contact->name)}}" placeholder="Bernat Smith"/>
            </label>
            @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="birth_date"> @lang("Birth date"):
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="date" name="birth_date"
                       value="{{old('birth_date', $contact->birth_date)}}"/>
            </label>
            <br>
            <br>
            <label for="email"> @lang("Contact email"):
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="email" name="email"
                       value="{{old('email', $contact->email)}}" placeholder="bernat@email.com"/>
            </label>
            @error('email')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="phone"> @lang("Contact phone"):
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="number" name="phone"
                       value="{{old('phone', $contact->phone)}}" placeholder="654321234"/>
            </label>
            @error('phone')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="country">@lang("Country"):</label>
            <select class="border-2 border-solid border-gray-100 rounded-full px-2" name="country" id="country">
                <option value="England" @if (old('country') === 'England') selected @endif>@lang("England")</option>
                <option value="Spain" @if (old('country') === 'Spain') selected @endif>@lang("Spain")</option>
                <option value="Italy" @if (old('country') === 'Italy') selected @endif>@lang("Italy")</option>
                <option value="Germany" @if (old('country') === 'Germany') selected @endif>@lang("Germany")</option>
                <option value="France" @if (old('country') === 'France') selected @endif>@lang("France")</option>
            </select>
            <br>
            <br>
            <label for="address"> @lang("Contact address"): <br>
                <textarea class="border-2 border-solid border-gray-100 rounded px-2" name="address"
                          placeholder="Address 123, street">
                {{old('address', $contact->address)}}
            </textarea>
            </label>
            <br>
            <br>
            <label for="job_contact"> @lang("Job contact")?:<br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="job_contact" value="yes" {{ old('job_contact') === 'yes' ? 'checked='.'"checked"' : '' }}/> @lang("Yes")
                <br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="job_contact" value="no" {{ old('job_contact') === 'no' ? 'checked='.'"checked"' : '' }}/> @lang("No")
            </label>
            <br>
            <br>
            <label> @lang("Relation"):<br>
                <input type="checkbox" name="relation[]" value="Family"
                       @if(is_array(old('relation')) && in_array("Family", old('relation'))) checked @endif> {{ __("Family") }}

                <input type="checkbox" name="relation[]" value="Friend"
                       @if(is_array(old('relation')) && in_array("Friend", old('relation'))) checked @endif> {{ __("Friend") }}

                <input type="checkbox" name="relation[]" value="Colleague"
                       @if(is_array(old('relation')) && in_array("Colleague", old('relation'))) checked @endif> {{ __("Colleague") }}
            </label>
            <br>
            <br>
            <button
                class="text-orange-400 no-underline border-solid border-2 border-orange-400 rounded p-1 px-5 ml-5 mt-5 hover:bg-orange-400 hover:text-white"
                type="submit" name="add">📝 @lang("Edit")
            </button>
        </form>
    </div>
</main>
