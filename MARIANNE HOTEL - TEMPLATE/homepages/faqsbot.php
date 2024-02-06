<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #faqs-bot {
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
        }

        #faqs-bot img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 15px;
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
            animation: scaleIn 0.5s ease-in-out forwards;
            animation-delay: 1s;

        }

        #faqs-bot img:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        #faqs-container {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
            border-radius: 8px;
            animation-fill-mode: forwards;
            animation-duration: 2s;
            scroll-behavior: smooth;
            overflow-y: auto;
            max-height: 80vh;
            /* adjust this value as needed */
        }

        #faqs-container.open {
            animation: openContainer 2s ease-in-out;
        }

        #faqs-container.close {
            animation: closeContainer 2s ease-in-out;
        }

        .faqs-group h3 {
            color: #333;
            font-size: 1.5em;
            text-align: left;
            /* Add this line */
        }

        .faqs-group p {
            color: #333;
            font-size: 1em;
        }



        .faqs-group {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
        }

        .back-button {
            cursor: pointer;
            color: #3498db;
            text-decoration: underline;
            background-color: #86654B;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #2980b9;
        }

        h3 {
            color: #333;
            font-size: 1.2em;
            margin-bottom: 15px;
        }

        h4 {
            color: #333333;
            font-size: 1em;
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            width: 100%;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        li:hover {
            background-color: #e9ecef;
        }

        @keyframes openContainer {
            0% {
                transform: translateY(100%) scale(0.5);
                opacity: 0;
            }

            50% {
                transform: translateY(-10%) scale(1.05);
                opacity: 0.5;
            }

            100% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        @keyframes closeContainer {
            0% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }

            50% {
                transform: translateY(-10%) scale(0.95);
                opacity: 0.5;
            }

            100% {
                transform: translateY(100%) scale(0.5);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            #faqs-container {
                width: 100%;
                height: 100%;
                bottom: 0;
                right: 0;
                padding: 15px;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }

        #faqs-content {
            text-align: justify;
            color: #333;
        }
    </style>
</head>

<body>

    <div id="faqs-bot">
        <img src="/pictures/logoyata.svg" alt="FAQs Bot Logo" onclick="toggleFaqsContainer()">
    </div>

    <div id="faqs-container">
        <div id="faqs-content">
            <!-- Initial content -->
            <div class="faqs-group">
                <div class="back-button" onclick="toggleFaqsContainer()">Back</div>


            </div>
            <div class="faqs-group">
                <h3>Group 1: Lorem Ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
            </div>

            <!-- Group 2: Terms and Agreement -->
            <div class="faqs-group" id="group2">
                <h3>Group 2: Lorem Ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
            </div>

            <!-- Group 3: Rules and Regulations -->
            <div class="faqs-group" id="group3">
                <h3>Group 3: Lorem Ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleFaqsContainer() {
            var faqsContainer = document.getElementById('faqs-container');
            faqsContainer.style.display = (faqsContainer.style.display === 'block') ? 'none' : 'block';
        }

        function showGroup(group) {
            var groups = document.querySelectorAll('.faqs-group');
            for (var i = 0; i < groups.length; i++) {
                groups[i].style.display = 'none';
            }

            var selectedGroup = document.getElementById(group);
            if (selectedGroup) {
                selectedGroup.style.display = 'block';
            }
        }

        function showGroupList() {
            var groups = document.querySelectorAll('.faqs-group');
            for (var i = 0; i < groups.length; i++) {
                groups[i].style.display = 'none';
            }

            var faqsGroup = document.querySelector('.faqs-group');
            if (faqsGroup) {
                faqsGroup.style.display = 'block';
            }
        }

        function toggleVisibility(id) {
            var element = document.getElementById(id);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>

</body>

</html>