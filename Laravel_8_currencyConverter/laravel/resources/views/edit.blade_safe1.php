<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit candidate') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        
            <form method="POST" action="/candidate/{{ $candidate->id }}">

                <div class="form-group">
					<label for="currency">Candidate:</label>
                    <input name="description" value="{{ $candidate->description }}" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>
					@if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
				</div>          
				<div class="form-group">				
					<label for="currency">Currency:</label>
					<select id="currency" name="currency" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>       
						<option value="EUR" {{ $candidate->currency == 'EUR' ? 'selected' : ''}}>
						EUR</option>
						<option value="GBP" {{ $candidate->currency == 'GBP' ? 'selected' : ''}}>
						GBP</option>
						<option value="USD" {{ $candidate->currency == 'USD' ? 'selected' : ''}}>
						USD</option>
					</select>
				</div>
				<div class="form-group">
					<label for="rate" >Rate:</label>
					<input type="text" id="rate" name="rate" value="{{$candidate->rate}}" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>
				</div>

                <div class="form-group">
                    <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update candidate</button>
                </div>
				{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</x-app-layout>