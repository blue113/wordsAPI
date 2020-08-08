<!DOCTYPE html>
<head>
    <!-- SCSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Scripts for datatable -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <div class="container ">
        <h4 class="text-center mt-5">Previous searches list</h4>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link to search defintion form -->
                <a href="{{url('/')}}">Search new word</a>        
            </div>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-lg-7">
                <!-- Table for display data -->
                <table id="previous_searches" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Word</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- loop for display data in datatable -->
                        @foreach ($previous_searches as $searches)
                        <tr>
                            <td>{{ $searches['search_text'] }}</td>
                            <td>{{ date('d M, y h:i:s a', strtotime($searches['created_at'])) }}</td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    /*  Make datatable */
    $(document).ready(function() {
        $('#previous_searches').DataTable({
            "order": [[ 1, 'desc' ]]
        });
    });
</script>
</html>
