<!DOCTYPE html>
<html>
<head>
	<!-- SCSS -->
	<link rel="stylesheet" href="{{ asset('css/app.css')  }}">
  	<!-- jquery -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h4 class="text-center mt-5">Search Definition</h4>
        <div class="row">
            <div class="col-lg-12">
            	<!-- Link to previous searches -->
                <a href="{{url('previous_searches')}}" class="pull-right">View previours serches</a>        
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ url('savesearch') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="email">Enter Word:</label>
                      <input type="email" class="form-control search_text" name="search_text" placeholder="Enter Word here...">
                      <span class="text-danger empty-textbox"></span>
                    </div>
                    
                    <button type="button" class="btn btn-primary submit">Search Definition</button>
              </form>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-7">
                <div class="form-group">
                  <label>Result <span class="searched-word"></span>: </label>
                </div>
                <ul class="list-group definition_list"></ul>
            </div>
        </div>
    </div>
     
    <script type="text/javascript">

     	$('input').on("keypress", function(e) {
            /* ENTER PRESSED*/
            if (e.keyCode == 13) {
            	e.preventDefault();
            	getDefinition();
            }
        });

     	/* Button click and get API call */
        $('.submit').on('click',function(event){
        		getDefinition();
        });

        /* function  to connect API call */
     	function getDefinition(){
	        var text = $('.search_text').val();
	        if(text == ''){	
	        	$('.empty-textbox').text('Please enter a word');
	        } else {
	        		$('.empty-textbox').text('');
		        	$('.searched-word').html('For <b class="text-success">'+ text +'</b>');
		        	$.ajax({
		            type: "POST",
		            url : "search_definition",
		            data: { "_token": "{{ csrf_token() }}", text : text },
		            success: function(data) {
		                if(data != 0){
		                    $('.definition_list').html('');
		                    var data = JSON.parse(data);
		                    for(var i = 0; i < data.length; i++){
		                        $('.definition_list').append('<li class="list-group-item">'+data[i].definition+'</li>');
		                    }
		                    
		                } else {
		                    $('.definition_list').html('<span>Oops... No data found</span>');
		                }
		            }
	        	})
	        }
      	}
    </script>
</body>

</html>
