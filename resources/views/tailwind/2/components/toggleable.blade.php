@if($column->toggleable['enabled'] === true)
    <div class="items-center" x-data="{ toggle_{{ $row->id }}: {{ $row->$field }} }">
        <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
             :class="[toggle_{{ $row->id }} === 1 ? 'bg-green-400' : 'bg-gray-400']">
            <label for="toggle_{{ $row->id }}"
                   class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                   :class="[toggle_{{ $row->id }} === 1 ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>
            <input type="checkbox" id="toggle_{{ $row->id }}" name="toggle_{{ $row->id }}"
                   class="appearance-none w-full h-full active:outline-none focus:outline-none"
                   @click="saveToggleableInput({{ $row->id }}, '{{ $field }}', (toggle_{{ $row->id }} === 0 ? toggle_{{ $row->id }} = 1 : toggle_{{ $row->id }} = 0))">
        </div>
</div>
@else
    <div class="flex flex-row">
        @if($row->$field === 0)
            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-xs px-3 text-center w-8/12 bg-red-200 text-red-800 rounded-full">
                {{ $column->toggleable['default'][1] }}
            </div>
            @else
            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-xs px-3 text-center w-8/12 bg-blue-200 text-blue-800 rounded-full">
                {{ $column->toggleable['default'][0] }}
            </div>
            @endif
    </div>
@endif
