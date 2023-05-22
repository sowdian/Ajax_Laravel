<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Creation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <h1>Add student</h1>
    <form id="my-form">
        @csrf
        <input type="text" name=name placeholder="Enter name" required>
        <br><br>
        <input type="email" name=email placeholder="Enter email" required>
        <br><br>
        <input type="file" name=file required>
        <br><br>
        <input type="submit" value="Add student" id="btnSubmit">
    </form>
    <span id="output"></span>

    <script>
        $(document).ready(function(){
            $('#my-form').submit(function(event){
                event.preventDefault(); 

                var form = $(this)[0];
                var data = new FormData(form);

                $('#btnSubmit').prop('disabled',true);

                $.ajax({
                    type:"POST",
                    url:"{{ route('addStudent') }}",
                    data:data,
                    dataType:'json',
                    processData:false,
                    contentType:false,
                    success:function(data){
                        $('#output').text(data.res)
                        $('#btnSubmit').prop('disabled',false);
                    },
                    error:function(e){
                        $('#output').text(e.responseText)
                        $('#btnSubmit').prop('disabled',false);
                    }
                })
            })
        })
    </script>

</body>
</html>