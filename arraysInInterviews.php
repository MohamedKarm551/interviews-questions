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
        <div>


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
        </div>
        <hr>
        <div class="">
            <h2>02-Finding the maximum or minimum value:</h2>
            <?php
            function findMaxValue($arr)
            {
                if (empty($arr)) {
                    return null; // Return null if the array is empty
                }

                $maxValue = $arr[0]; // Assume the first element is the maximum

                foreach ($arr as $value) {
                    if ($value > $maxValue) {
                        $maxValue = $value; // Update the maximum value if a larger value is found
                    }
                }

                return $maxValue;
            }

            function findMinValue($arr)
            {
                if (empty($arr)) {
                    return null; // Return null if the array is empty
                }

                $minValue = $arr[0]; // Assume the first element is the minimum

                foreach ($arr as $value) {
                    if ($value < $minValue) {
                        $minValue = $value; // Update the minimum value if a smaller value is found
                    }
                }

                return $minValue;
            }

            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56];
            echo '$numbers = [12, 45, 67, 23, 9, 56];<br>';
            $max = findMaxValue($numbers);
            $min = findMinValue($numbers);
            echo "The maximum value is: " . $max . "\n";
            echo "The minimum value is: " . $min . "\n";
            ?>

        </div>
        <hr>
        <div class="">
            <h2>03-Summing array elements:</h2>
            <?php
            function sumArray($arr)
            {
                $sum = 0;

                foreach ($arr as $value) {
                    $sum += $value; // Add each element to the sum
                }

                return $sum;
            }

            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56];
            echo '$numbers = [12, 45, 67, 23, 9, 56];';
            $total = sumArray($numbers);
            echo "The sum of the array elements is: " . $total;
            ?>
            <br>
        </div>

        <hr>
        <div class="">
            <h2>04-Filtering array elements (example: removing duplicates):</h2>
            <?php
            function removeDuplicates($arr)
            {
                // print_r(array_unique($arr));
                return array_values(array_unique($arr)); // Use array_unique to remove duplicates and array_values to re-index the array
            }

            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56, 45, 23];
            echo '$numbers = [12, 45, 67, 23, 9, 56, 45, 23]<br>';
            $filteredArray = removeDuplicates($numbers);
            echo "Array after removing duplicates: ";
            echo "<pre>";
            print_r($filteredArray);
            echo "</pre> <br>";

            function removeDuplicates2($arr)
            {
                $result = [];
                foreach ($arr as $value) {
                    if (!in_array($value, $result)) {
                        array_push($result, $value);
                    }
                }
                return $result;
            }
            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56, 45, 23];
            echo '$numbers2 = [12, 45, 67, 23, 9, 56, 45, 23]<br>';
            $filteredArray = removeDuplicates2($numbers);
            echo "Array after removing duplicates: ";
            echo "<pre>";
            print_r($filteredArray);
            echo "</pre>";
            ?>
        </div>
        <br>
        <hr>
        <div class="">
            <h2>05-Reversing an array:</h2>
            <?php
            function reverseArray($arr)
            {
                // return array_reverse($arr);
                // or :
                $result = [];
                for ($i = count($arr) - 1; $i >= 0; $i--) {
                    array_push($result, $arr[$i]);
                }
                return $result;
            }

            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56];
            echo '$numbers = [12, 45, 67, 23, 9, 56]<br>';
            $reversedArray = reverseArray($numbers);
            echo "Array after reversing: ";
            echo "<pre>";
            print_r($reversedArray);
            echo "<pre>";
            ?>
        </div>
        <br>
        <hr>
        <div class="">
            <h2>6-Searching for an element:</h2>
            <?php
            function searchElement($arr, $element)
            {
                $index = array_search($element, $arr);

                if ($index !== false) {
                    return $index; // Return the index if the element is found
                } else {
                    return -1; // Return -1 if the element is not found
                }
            }

            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56];
            $element = 23;
            echo '$numbers = [12, 45, 67, 23, 9, 56];
          $element = 23;<br>';
            $index = searchElement($numbers, $element);
            if ($index !== -1) {
                echo "The element " . $element . " is found at index " . $index;
            } else {
                echo "The element " . $element . " is not found in the array.";
            }
            ?>
        </div>
        <br>
        <hr>
        <div class="">
            <h2>7-Removing specific elements (example: removing all occurrences of a particular value):</h2>
            <?php
            function removeElement($arr, $element)
            {
                // return array_diff($arr, [$element]); // Use array_diff to remove all occurrences of the element
                // or :
                $offset = 0; // متغير لتعويض المؤشر بعد كل حذف
                foreach ($arr as $key => $value) {
                    if ($value == $element) {
                        array_splice($arr, $key - $offset, 1);
                        $offset++; // زيادة التعويض بعد كل عملية حذف
                    }
                }
                return $arr;
            }

            // Example usage
            $numbers = [12, 45, 67, 23, 9, 56, 45, 23, 45];
            $element = 45;
            echo '$numbers = [12, 45, 67, 23, 9, 56, 45, 23];
            $element = 45;';
            $filteredArray = removeElement($numbers, $element);
            echo "Array after removing element " . $element . ": ";
            echo '<pre>';
            print_r($filteredArray);
            echo '</pre>';
            ?>
        </div>
        <br>
        <hr>
        <div class="">
            <h2>8-Combining or merging arrays:</h2>
            <?php
            function mergeArrays($array1, $array2)
            {
                // return array_merge($arr1, $arr2); // Use array_merge to merge the arrays
                // or : 
                foreach ($array2 as $element) {
                    $array1[] = $element; // Append each element of array2 to array1
                }
                return $array1;
            }

            // Example usage
            $array1 = [12, 45, 67];
            $array2 = [23, 9, 56];
            echo '$array1 = [12, 45, 67];
                $array2 = [23, 9, 56];';
            $mergedArray = mergeArrays($array1, $array2);
            echo "Merged array: ";
            echo '<pre>';
            print_r($mergedArray);
            echo '</pre>';
            ?>
        </div>
        <br>
        <hr>
        <div class="">
            <h2>9-Rotating array elements:</h2>
            <?php
            function rotateArray($arr, $positions)
            {
                $length = count($arr);
                $positions %= $length; 
                // إذا كانت المقدار أكبر من طول المصفوفة، فسيتم اللف حولها

                if ($positions < 0) {
                    $positions += $length; 
                    // تحويل المقدار السلبي إلى موجب عن طريق إضافة طول المصفوفة
                }

                return array_merge(array_slice($arr, $positions), array_slice($arr, 0, $positions));
            }

            // مثال الاستخدام
            $numbers = [1, 2, 3, 4, 5];
            $rotatedArray = rotateArray($numbers, 2);
            echo ' $numbers = [1, 2, 3, 4, 5];
            $rotatedArray = rotateArray($numbers, 2);<br>';
            echo "المصفوفة بعد دوران العناصر: ";
            echo '<pre>'; print_r($rotatedArray);echo '</pre>';
            ?>
        </div>
        <br>
        <hr>


        <!-- end of container  -->
    </div>

</body>

</html>