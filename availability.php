<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Types & Availability</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .search-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .search-button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .pitch-list {
            list-style-type: none;
            padding: 0;
        }

        .pitch-item {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pitch-item img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pitch Types & Availability</h1>
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Search by pitch type or location">
            <button class="search-button">Search</button>
        </div>
        <ul class="pitch-list">
            <li class="pitch-item">
                <img src="pitch1.jpg" alt="Pitch 1">
                <div>
                    <h2>Pitch Type 1</h2>
                    <p>Location: Location 1</p>
                    <p>Availability: Available</p>
                </div>
            </li>
            <li class="pitch-item">
                <img src="pitch2.jpg" alt="Pitch 2">
                <div>
                    <h2>Pitch Type 2</h2>
                    <p>Location: Location 2</p>
                    <p>Availability: Not Available</p>
                </div>
            </li>
            <!-- Add more pitch items as needed -->
        </ul>
    </div>
</body>
</html>
