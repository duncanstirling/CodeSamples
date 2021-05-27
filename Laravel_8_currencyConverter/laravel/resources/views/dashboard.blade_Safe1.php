<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Candidate Rates') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4">Person List</div>
                
                <div class="flex-auto text-right mt-2">
                    <a href="/candidate" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new candidate</a>
                </div>
            </div>
            <table class="w-full text-md rounded mb-4">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Person</th>
                    <th class="text-left p-3 px-5">Currency</th>
                    <th class="text-left p-3 px-5">Rate</th>					
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth()->user()->candidates as $candidate)
                    <tr class="border-b hover:bg-orange-100">
                        <td class="p-3 px-5">
                            {{$candidate->description}}
                        </td>
                        <td class="p-3 px-5">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function hello(){
	alert('hello');
}


//$(document).ready(function () {
$('.xcurrency').change(function() {	
//e.stopPropagation(),e.preventDefault();
	var newcurrency = $(this).val();
	var oldcurrency = $(this).parent().find("#oldcurrency").val();
	var rate        = $(this).closest('td').siblings('#rate').text();



if(newcurrency == oldcurrency){
//	return;
}

    var data = "";
    $.ajax({
        type:"POST",
        url : "/convert",
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		data : {
			oldcurrency : oldcurrency,
			newcurrency : newcurrency,
			rate : rate
		},		
        async: false,
        success : function(response) {
            //data = response;
			
			console.log(response);
	$(this).closest('td').siblings('#rate').text('hello');

            return response;
        },
        error: function() {
            alert('Error occured');
        }
    });
	
});
});

</script>

<script>

function myFunction(selectObject) {
	var value = selectObject.value;  
  alert("new input value: " + value);
	//var newcurrency = $(this).val();
	//var oldcurrency = $(this).parent().find("#oldcurrency").val();
	//var rate        = $(this).closest('td').siblings('#rate').text();

  //alert(rate);
  
}

</script>


						
							<select class="currency" id="currency" name="currency">       
								<option value="EUR" {{ $candidate->currency == 'EUR' ? 'selected' : ''}}>
								EUR</option>
								<option value="GBP" {{ $candidate->currency == 'GBP' ? 'selected' : ''}}>
								GBP</option>
								<option value="USD" {{ $candidate->currency == 'USD' ? 'selected' : ''}}>
								USD</option>
							</select>	
							<input type="hidden" id="oldcurrency" value="{{$candidate->currency}}">
                        </td>						
						
                        <td class="p-3 px-5" id="rate">
                            {{$candidate->rate}}
                        </td>						
						
                        <td class="p-3 px-5">
                            
                            <a href="/candidate/{{$candidate->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Convert currency</a>
                            <form action="/candidate/{{$candidate->id}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</x-app-layout>