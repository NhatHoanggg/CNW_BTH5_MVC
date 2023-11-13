<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTH3-MVC</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body{
    padding: 0;
    margin: 0;
    overflow: hidden;
    }

    .frame-container{
        display: flex;
        flex-direction: column;
    }

    .sub-container{
        display: flex;
        flex-direction: row;
    }
</style>
<body>
    <div class="frame-container">
        <iframe src="./View/Frame/t1.html" frameborder="0" style="height:20vh ;width:100vw; "></iframe>

        <div class="sub-container">
            <!-- before login -->
            <iframe src="./View/Frame/t2.html" frameborder="0" name = "t2"
                style="height:80vh ;width:15vw; "></iframe>
            <!-- after login -->
            <!-- <iframe src="./View/Frame/t2_login.html" frameborder="0" name = "t2"
                style="height:80vh ;width:15vw; "></iframe> -->
            <iframe src="./View/Frame/t3.html" frameborder="0" name = "t3"
                style="height:80vh ;width:75vw; "></iframe>
            <iframe src="./View/Frame/t4.html" frameborder="0" 
                style="height:80vh ;width:10vw; "></iframe>
        </div>

    </div>
    
</body>
</html>