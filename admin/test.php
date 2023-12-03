<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP Select Dropdown Example</title>
    <style>
        .container {
            max-width: 400px;
            margin: 60px auto;
            text-align: center;
        }

        input[type="submit"] {
            margin-bottom: 25px;
        }

        .select-block {
            width: 350px;
            margin: 100px auto 40px;
            position: relative;
        }

        select {
            width: 100%;
            height: 50px;
            font-size: 100%;
            font-weight: bold;
            cursor: pointer;
            border-radius: 0;
            background-color: #1A33FF;
            border: none;
            border: 2px solid #1A33FF;
            border-radius: 4px;
            color: white;
            appearance: none;
            padding: 8px 38px 10px 18px;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
        }

        /* For IE <= 11 */
        select::-ms-expand {
            display: none;
        }

        .selectIcon {
            top: 7px;
            right: 15px;
            width: 30px;
            height: 36px;
            padding-left: 5px;
            pointer-events: none;
            position: absolute;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .selectIcon svg.icon {
            transition: fill 0.3s ease;
            fill: white;
        }

        select:hover,
        select:focus {
            color: #000000;
            background-color: white;
        }

        select:hover~.selectIcon,
        select:focus~.selectIcon {
            background-color: white;
        }

        select:hover~.selectIcon svg.icon,
        select:focus~.selectIcon svg.icon {
            fill: #1A33FF;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <form action="" method="post">
            <select name="Movies">
                <option value="" disabled selected>Select option</option>
                <option value="seven_samurai">The Seven Samurai</option>
                <option value="bonnie_clyde">Bonnie and Clyde</option>
                <option value="reservoir_dogs">Reservoir Dogs</option>
                <option value="airplane">Airplane</option>
                <option value="deer_hunter">The Deer Hunter</option>
            </select>

            <div class="selectIcon">
                <svg focusable="false" viewBox="0 0 104 128" width="25" height="35" class="icon">
                    <path d="m2e1 95a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm0-3e1a9 9 0 0 1 -9 9 9 9 0 0 1 -9 -9 9 9 0 0 1 9 -9 9 9 0 0 1 9 9zm14 55h68v1e1h-68zm0-3e1h68v1e1h-68zm0-3e1h68v1e1h-68z">
                    </path>
                </svg>
            </div>

            <input type="submit" name="submit" vlaue="Select Movie">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (!empty($_POST['Movies'])) {
                $selected = $_POST['Movies'];
                echo 'You have chosen: ' . $selected;
            } else {
                echo 'Please select.';
            }
        }
        ?>
    </div>

</body>

</html>