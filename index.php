<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="center">
        <div class="log-form-container">
            <div class="log-form-title">Log Form</div>
            <form action="" class="log-form-forms" method="post">
                <div class="basic-information-section">
                    <div class="basic-info-container">
                        <label for="firstName">First Name:</label>
                        <input type="text" name="first_name" id="firstName">
                        <p class="error">* This field is required</p>
                    </div>
                    <div class="basic-info-container">
                        <label for="middleName">Middle Name:</label>
                        <input type="text" name="middle_name" id="middleName">
                    </div>
                    <div class="basic-info-container">
                        <label for="lastName">Last Name:</label>
                        <input type="text" name="last_name" id="lastName">
                        <p class="error">* This field is required</p>
                    </div>
                </div>
                <div class="transaction-section">
                    <label for="">Transaction Type: </label>
                    <label for="">In</label>
                    <input type="checkbox" name="enum_trans_type[]" id="">
                    <label for="">Out</label>
                    <input type="checkbox" name="enum_trans_type[]" id="">
                </div>
                <div class="php-actions">
                    <button>Submit Data</button>
                    <a href="#">View Data</a>
                </div>
            </form>
        </div>
    </div>
    <script src="./assets/js/index.js"></script>
</body>
</html>