<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .container {
            background-color: rgba(10, 10, 40, 0.9);
            padding: 30px 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            margin: 2em auto; /* Center the container and add space from the top */
            text-align: center;
            margin-top: 10em;
        }

        .container h1 {
            color: #fff;
            margin-top: 0;
        }

        .container p {
            text-align: justify;
            line-height: 1.6;
            color: #fff;
        }
        
        label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"], textarea {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 15px;
        padding: 8px;
        font-size: 1rem;
    }

    textarea {
        height: 250px;
        resize: vertical;
        text-align: justify;
    }

    .buttons {
        margin-top: 20px;
    }

    button {
        padding: 10px;
        background-color: #3a3d99;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .error {
        color: red;
        font-weight: bold;
        margin-bottom: 10px;
        display: none;
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.html">Homepage</a> |
            <a href="educator_home.html">Educator Homepage</a> |
            <a href="admin_home.html">Administrator Homepage</a> |
            <a href="about_drivewise.html">About DriveWise</a> |
            <a href="logout.php">Log Out</a>
        </nav>
    </header>
    <div class="container">
    <h1>Edit Article</Article></h1>
    <p>Use the fields below to update the title and content. You must have at least three words in each field before you can save.</p>

        <div class="error" id="errorMessage">Please ensure both the title and the content have at least 3 words each before saving.</div>

            <label for="postTitle">Title:</label>
            <input type="text" id="postTitle" value="Traffic Rules Malaysia">

            <label for="postContent">Content:</label>
            <textarea id="postContent">Malaysian traffic laws and regulations are all-embracing, with minute details that pay attention to safety on the road and orderly traffic flow. Governed by the Road Transport Act 1987, these laws aim at protecting road users from accidents and ensuring a safe driving environment. These rules are to be strictly followed by all the drivers and road users of Malaysia, enforced by the Royal Malaysia Police (PDRM) and the Road Transport Department (JPJ). In Malaysia, one of the important factors of traffic regulation is the focus given to licensing and registration. Every motorist is to possess a valid driving license appropriate for the class of vehicle being operated. They have to first issue a Learner's Driving License, followed by a Probationary Driving License, before they graduate to a Competent Driving License. It is a serious offense, and huge fines and penalties will be imposed for driving without a license.</textarea>

        <div class="buttons">
            <button type="button" id="resetBtn">Reset</button>
            <button type="button" id="saveBtn">Save</but>
        </div>


    </div>
<script>
    // Initial sample data
    const initialTitle = "Traffic Rules Malaysia";
    const initialContent = "Malaysian traffic laws and regulations are all-embracing, with minute details that pay attention to safety on the road and orderly traffic flow. Governed by the Road Transport Act 1987, these laws aim at protecting road users from accidents and ensuring a safe driving environment. These rules are to be strictly followed by all the drivers and road users of Malaysia, enforced by the Royal Malaysia Police (PDRM) and the Road Transport Department (JPJ). In Malaysia, one of the important factors of traffic regulation is the focus given to licensing and registration. Every motorist is to possess a valid driving license appropriate for the class of vehicle being operated. They have to first issue a Learner's Driving License, followed by a Probationary Driving License, before they graduate to a Competent Driving License. It is a serious offense, and huge fines and penalties will be imposed for driving without a license.";

    const titleField = document.getElementById('postTitle');
    const contentField = document.getElementById('postContent');
    const errorMessage = document.getElementById('errorMessage');

    const resetBtn = document.getElementById('resetBtn');
    const saveBtn = document.getElementById('saveBtn');

    // Reset button click event - restore to initial sample data
    resetBtn.addEventListener('click', function(){
        titleField.value = initialTitle;
        contentField.value = initialContent;
        errorMessage.style.display = 'none';
    });

    // Save button click event - validate minimum word count before "saving"
    saveBtn.addEventListener('click', function(){
        const titleText = titleField.value.trim();
        const contentText = contentField.value.trim();

        const titleWords = titleText.split(/\s+/).filter(word => word.length > 0);
        const contentWords = contentText.split(/\s+/).filter(word => word.length > 0);

        if (titleWords.length < 3 || contentWords.length < 3) {
            // Show error message if validation fails
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
            // Here you would handle the "save" action, e.g., send data to server.
            // For demonstration, we'll just log to console and alert.
            console.log("Saved Title: ", titleText);
            console.log("Saved Content: ", contentText);
            alert("Your changes have been saved!");
        }
    });
</script>
</body>
</html>