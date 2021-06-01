<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit candidate') }}
    </h2>
</x-slot>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
	$('#currency').change(function() {	
		var newCurrency = $('#currency').val();
		var oldCurrency = $('#oldCurrency').val();
		var rate        = $('#rate').val();

		if(newCurrency == oldCurrency){
			return;
		}

		var data = "";
		$.ajax({
			type:"POST",
			url : "/convert",
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data : {
				oldCurrency : oldCurrency,
				newCurrency : newCurrency,
				rate : rate
			},		
			async: false,
			success : function(response) {
				rate = response;
				console.log(rate);
				$('#rate').val(rate);
				$('#oldCurrency').val(newCurrency);
				return response;
			},
			error: function() {
				alert('Error occured');
			}
		});
		
	});
});

</script>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        
            <form method="POST" action="/candidate/{{ $candidate->id }}">

                <div class="form-group">
					<label for="currency">Candidate:</label>
                    <input name="description" value="{{ $candidate->description }}" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>
				</div>          
				<div class="form-group">				
					<label for="oldCurrency">Current currency:</label>
					<select id="oldCurrency" name="oldCurrency" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>       
						<option value="EUR" {{ $candidate->currency == 'EUR' ? 'selected' : ''}}>
						EUR</option>
						<option value="GBP" {{ $candidate->currency == 'GBP' ? 'selected' : ''}}>
						GBP</option>
						<option value="USD" {{ $candidate->currency == 'USD' ? 'selected' : ''}}>
						USD</option>
					</select>
				</div>
				<div class="form-group">				
					<label for="currency">Convert to:</label>
					<select id="currency" name="currency" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>  
						<option value="" selected>new currency</option>					
						<option value="EUR">
						EUR</option>
						<option value="GBP">
						GBP</option>
						<option value="USD">
						USD</option>
					</select>
				</div>				
				<div class="form-group">
					<label for="rate" >Converted rate:</label>
					<input type="text" id="rate" name="rate" value="{{$candidate->rate}}" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" required>
				</div>

                <div class="form-group">
                    <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update stored candidate details</button>
                </div>
				{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</x-app-layout>