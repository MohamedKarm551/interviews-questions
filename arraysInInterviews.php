<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ARRAY in Interviews </title>
</head>

<body>
    <div class="container">

        <h2> 01- array_count_values() : </h2><br>
        <?php
        function count_values_in_array($arr)
        {
            $result = [];
            foreach ($arr as $value) {
                if (array_key_exists($value, $result)) {
                    $result[$value]++;
                } else {
                    $result[$value] = 1;
                }
            }
            return $result;
        }
        $input_array = [1, 8, 2, 3, 2, 1, 3, 4, 5, 4, 4, 4];
        echo "<pre>";
        print_r(count_values_in_array($input_array));
        echo "</pre>";
        ?>
        <hr>  
        <!-- end of container  -->
    </div> 

</body>

</html>