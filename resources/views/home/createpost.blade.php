<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        body {
            background-color: #f4f4f4; /* Assuming the home page has a light background */
            font-family: 'Arial', sans-serif; /* Ensuring font consistency */
            margin: 0; /* Removing default margin */
            padding: 0; /* Removing default padding */
        }
    
        .header_section, {
            text-align: center; 
        }
    
        .post_title {
            font-size: 24px;
            color: #004d99; /* Styling title color to match header */
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
    
        .form_container {
            background: white;
            width: 50%; /* Adjust width as necessary for better form presentation */
            margin: 20px auto; /* Centering the form on page */
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 8px; /* Adding rounded corners */
        }
    
        label {
            display: block;
            margin-bottom: 10px;
            color: #333; /* Ensuring labels are clearly visible */
            font-size: 16px; /* Increasing label font size for readability */
        }
    
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    
        textarea {
            height: 100px; /* Providing sufficient space for text input */
        }
    
        input[type="submit"] {
            background-color: #28a745; /* Utilizing a green color indicating a positive action */
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
    
        input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover for better user feedback */
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    @include('home.header')
    <!-- header section start -->
    <div class="page-container">
        <div class="content-wrap">
            <div class="header_section">
                <h3 class="post_title">Add Post</h3>
            </div>
            <form action="{{ url('post/create-data') }}" method="POST" enctype="multipart/form-data" class="form_container">
                @csrf
                <div>
                    <label>Post title</label>
                    <input type="text" name="title" required>
                </div>
                <div>
                    <label>Post description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div>
                    <label>Add image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit" value="Submit Post">
                </div>
            </form>
        
            @include('home.footer')
        </div>
    </div>
</body>
</html>
