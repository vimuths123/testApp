<!DOCTYPE html>
<html>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .error {
        color: red;
        padding: 0px;
    }
</style>

<body>

    <h3>Enter the URL for shorten.</h3>

    <div>
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <form action="/" method="POST">

            {!! csrf_field() !!}

            <label for="fname">URL</label>
            @if($errors->has('url'))
            <div class="error">{{ $errors->first('url') }}</div>
            @endif
            <input type="text" id="url" name="url" placeholder="URL..">
            <label>{{ $outputurl }}</label>


            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>