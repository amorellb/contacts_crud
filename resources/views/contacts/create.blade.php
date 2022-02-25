@include('layouts.plantilla')

<main class="mt-5">
    <div class="w-full max-w-xl mx-auto bg-white shadow-lg rounded border border-gray-200">
        <h2 class="text-xl m-5">{{ __("Add new contacts to your Contacts list") }}</h2>
        @if ($errors->any())
            <div class="mx-auto max-w-md border-2 border-solid border-red-600 bg-red-300 rounded text-center">
                <strong>Whoops! </strong>{{ __("There were some problems with your input.") }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="m-5" method="POST" enctype="multipart/form-data" action="{{ route('contacts.store') }}">
            @csrf
            <label for="name"> {{ __("Contact name") }}:
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="text" name="name"
                       value="{{old('name')}}" placeholder="Bernat Smith"/>
            </label>
            @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="birth_date"> {{ __("Birth date") }}:
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="date" name="birth_date"
                       value="{{old('birth_date')}}"/>
            </label>
            <br>
            <br>
            <label for="email"> {{ __("Contact email") }}:
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="email" name="email"
                       value="{{old('email')}}"
                       placeholder="bernat@email.com"/>
            </label>
            @error('email')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="phone"> {{ __("Contact phone") }}:
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="number" name="phone"
                       value="{{old('phone')}}"
                       placeholder="654321234"/>
            </label>
            @error('phone')
            <br>
            <small>*{{$message}}</small>
            <br>
            @enderror
            <br>
            <br>
            <label for="country">{{ __("Country") }}: </label>
            <select class="border-2 border-solid border-gray-100 rounded-full px-2" name="country" id="country">
                <option value="England" @if (old('country') === 'England') selected @endif>{{ __("England") }}</option>
                <option value="Spain" @if (old('country') === 'Spain') selected @endif>{{ __("Spain") }}</option>
                <option value="Italy" @if (old('country') === 'Italy') selected @endif>{{ __("Italy") }}</option>
                <option value="Germany" @if (old('country') === 'Germany') selected @endif>{{ __("Germany") }}</option>
                <option value="France" @if (old('country') === 'France') selected @endif>{{ __("France") }}</option>
            </select>
            <br>
            <br>
            <label for="address"> {{ __("Contact address") }}:
                <br>
                <textarea class="border-2 border-solid border-gray-100 rounded px-2" name="address"
                          placeholder="Address 123, street">{{old('address')}}</textarea>
            </label>
            <br>
            <br>
            <label for="job_contact"> @lang("Job contact")?:<br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="job_contact"
                       value="yes" {{ old('job_contact') === 'yes' ? 'checked='.'"checked"' : '' }}/> @lang("Yes")
                <br>
                <input class="border-2 border-solid border-gray-100 rounded-full px-2" type="radio"
                       name="job_contact"
                       value="no" {{ old('job_contact') === 'no' ? 'checked='.'"checked"' : '' }}/> @lang("No")
            </label>
            <br>
            <br>
            <label for="file">
                <input type="file" name="file"/>
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
            <button
                class="text-green-400 no-underline border-solid border-2 border-green-400 rounded p-1 px-5 ml-5 mt-5 hover:bg-green-400 hover:text-white"
                type="submit" name="add">➕ {{ __("Add Contact") }}
            </button>
        </form>
    </div>
</main>
{{--<label><strong>@lang("Category") :</strong></label><br>--}}
{{--<label><input type="checkbox" name="category[]" value="Laravel"--}}
{{--              @if(is_array(old('category')) && in_array("Laravel", old('category'))) checked @endif> Laravel</label>--}}
{{--<label><input type="checkbox" name="category[]" value="JQuery"--}}
{{--              @if(is_array(old('category')) && in_array("JQuery", old('category'))) checked @endif> JQuery</label>--}}
{{--<label><input type="checkbox" name="category[]" value="Bootstrap"--}}
{{--              @if(is_array(old('category')) && in_array("Bootstrap", old('category'))) checked @endif> Bootstrap</label>--}}
{{--<label><input type="checkbox" name="category[]" value="Codeigniter"--}}
{{--              @if(is_array(old('category')) && in_array("Codeigniter", old('category'))) checked @endif>--}}
{{--    Codeigniter</label>--}}
{{--<label><input type="checkbox" name="category[]" value="JQuery UI"--}}
{{--              @if(is_array(old('category')) && in_array("JQuery UI", old('category'))) checked @endif> JQuery UI</label>--}}
