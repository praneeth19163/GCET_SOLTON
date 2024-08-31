<!DOCTYPE html>
<html>
<head>
    <title>Faculty Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }

        select,
        input[type="text"],
        input[type="password"] {
            width: 300px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .action-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .action-container label {
            margin-right: 20px;
        }

        .action-container input[type="text"],
        .action-container input[type="password"] {
            margin-right: 10px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .button-container button {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Faculty Details</h2>
        <form action="update_info.php" method="post">
            <label for="block_number">Select Block:</label>
            <select id="block_number" name="block_number">
                <option value="block1">Block 1</option>
                <option value="block2">Block 2</option>
                <option value="block3">Block 3</option>
                <option value="block4">Block 4</option>
                <option value="block5">Block 5</option>
            </select>

            <label for="lab_name">Select Lab:</label>
            <select id="lab_name" name="lab_name">
                
            </select>

            <label for="faculty_id">Faculty Id:</label>
            <input type="text" id="faculty_id" name="faculty_id">

            <div class="action-container">
                <label for="new_mobile">New Mobile Number:</label>
                <input type="text" id="new_mobile" name="new_mobile">

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password">
            </div>
            <input type="submit" value="Update">
        </form>
        <div class="button-container">
            <button class="home-button" onclick="window.location.href='lab_incharge.php'">Home</button>
        </div>
    </div>

    <script>
        const blockLabs = {
            block1: ["lab1", "lab2", "lab3", "lab4", "lab5"],
            block2: ["lab1", "lab2", "lab3", "lab4", "lab5"],
            block3: ["chem", "phy"],
            block4: ["lab5", "lab6"],
            block5: ["lab7"],
           
        };

        function populateLabDropdown() {
            const blockSelect = document.getElementById("block_number");
            const labSelect = document.getElementById("lab_name");
            const selectedBlock = blockSelect.options[blockSelect.selectedIndex].value;
            labSelect.innerHTML = ""; 
            blockLabs[selectedBlock].forEach(function(lab) {
                const option = document.createElement("option");
                option.value = lab;
                option.textContent = lab;
                labSelect.appendChild(option);
            });
        }

        document.getElementById("block_number").addEventListener("change", populateLabDropdown);

        populateLabDropdown();
    </script>
</body>
</html>