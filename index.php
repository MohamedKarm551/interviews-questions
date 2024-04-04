<!-- create chess table with php -->
<!-- لوب تطبع 8 صفوف 
في كل صف هعمل لوب تعمل 8 أعمدة واحد بلون والتاني بلون تاني -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>General </title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col">
                <a href="StringsInInterviews.php" class="btn btn-primary btn-block m-1">StringsInInterviews</a>
            </div>
            <div class="col">
                <a href="arraysInInterviews.php" class="btn btn-secondary btn-block m-1">arraysInInterviews</a>
            </div>
            <div class="col">
                <a href="variablesInInterviews.php" class="btn btn-success btn-block m-1">variablesInInterviews</a>
            </div>
            <div class="col">
                <a href="variablesInInterviews.php" class="btn btn-info btn-block m-1">variablesInInterviews</a>
            </div>
            <div class="col">
                <a href="other.php" class="btn btn-dark btn-block m-1">other</a>
            </div>

            <div class="col">
                <a href="StringsInInterviews.php" class="btn btn-primary btn-block m-1">StringsInInterviews</a>
            </div>
            <div class="col">
                <a href="arraysInInterviews.php" class="btn btn-secondary btn-block m-1">arraysInInterviews</a>
            </div>
            <div class="col">
                <a href="variablesInInterviews.php" class="btn btn-success btn-block m-1">variablesInInterviews</a>
            </div>
            <div class="col">
                <a href="variablesInInterviews.php" class="btn btn-info btn-block m-1">variablesInInterviews</a>
            </div>
            <div class="col">
                <a href="other.php" class="btn btn-dark btn-block m-1">other</a>
            </div>

        </div>

        <hr>
        <h2>01 create chess table with php</h2>
        <table border="1" width="500px" height="500px">
            <!--
                 <?php
                    for ($row = 0; $row < 8; $row++) {
                        echo "<tr>"; //rows
                        $value = $row; //to change at every step
                        for ($col = 0; $col < 8; $col++) {
                            if ($value % 2 == 0) {
                                echo "<td bgcolor='black'></td>";
                                $value++;
                            } else {
                                echo "<td bgcolor='white'></td>";
                                $value++;
                            }
                        }
                        echo "</tr>"; //rows
                    }
                    ?> 
            -->
            <?php
            for ($row = 0; $row < 8; $row++) {
                echo "<tr>"; //rows
                for ($col = 0; $col < 8; $col++) {
                    $color = $row + $col; //to change at every step
                    if ($color % 2 == 0) {
                        echo "<td bgcolor='black'></td>";
                    } else {
                        echo "<td bgcolor='white'></td>";
                    }
                }
                echo "</tr>"; //rows
            }
            ?>
        </table>
        <?= "<hr>" ?>

        <h2>02 pass by reference :</h2>
        <h3>what is the output of :<br>
            <code>
                function increment(&$n){echo ++$n;}
                $x=10;
                increment($x);
                echo $x;
            </code>
        </h3>
        <?php
        function increment(&$n)
        {
            echo ++$n . "<br>";
        }
        $x = 10;
        increment($x); //11
        echo $x . "<br>"; //11 
        //pass by reference not equal ((pointers))
        ?>
        <hr>
        <h2>03 array_count_values() : </h2><br>
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
        <div>
            <p>Vodafone interview question: What will today be after this number of days?
                <br> If today, for example, is Monday, then after 63 days, for example, what is today?
            </p>

            <?php
            function what_is_the_day_after($day, $number)
            {
                $weekDays = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                $indexOfTheDay = array_search($day, $weekDays);
                $targetIndex = ($indexOfTheDay + $number) % 7;
                echo "$day + $number days = <br>";
                echo $weekDays[$targetIndex];
            }
            
            what_is_the_day_after("Thursday", 100);
            echo "<br>";
            // حلها باستخدام دوال جاهزة
            function what_is_the_day_afterWithFunction($number)
            {
                // الحصول على التاريخ الحالي
                $today = date('Y-m-d');

                // إضافة عدد يوم إلى التاريخ الحالي
                $future_date = date('Y-m-d <br>
                 D', strtotime($today . " + $number days"));

                echo " $today <br> 
                 بعد $number يوم  :<br>
                  " . $future_date . "<br>";
            }
            echo "what_is_the_day_afterWithFunction : " . what_is_the_day_afterWithFunction(100);
            ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>