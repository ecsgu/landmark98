<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Demo Upload File</title>
</head>
<body>

	<img src="{{ asset('upload\a40aeff2d729cd25808ac2d41721e32e.jpg') }}" width="40px">
    <form action="{{ url('file') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="image" required="true">
        <br/>
        <input type="submit" value="upload">
    </form>
</body>
</html>