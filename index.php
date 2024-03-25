<!-- create chess table with php -->
<!-- لوب تطبع 8 صفوف 
في كل صف هعمل لوب تعمل 8 أعمدة واحد بلون والتاني بلون تاني -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>create chess table with php</h2>
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
    <h2>pass by reference :</h2>
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
    echo $x . "<br>";//11 
    //pass by reference not equal ((pointers))
    ?>
    <hr>
    <h2>array_count_values() : </h2><br>
    <?php
    function count_values_in_array($arr){
        $result= [ ]; 
        foreach($arr as $value){
            if(array_key_exists($value , $result)){
                $result[$value]++;
            }
            else{
                $result[$value]=1;
            }
        }
        return $result;
    }
    $input_array = [1, 8,2, 3, 2, 1, 3, 4, 5, 4 , 4, 4 ];
    echo "<pre>";
    print_r(count_values_in_array($input_array));echo "</pre>";
    ?>
</body>

</html>