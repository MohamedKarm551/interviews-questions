<?php
//  STRING  أهم اسئلة  interview   
// 10  Questions in String : 
// ===================
// 1- echo reverseString("Hello World"); // Outputs: dlroW olleH
// 2- echo isPalindrome("A man, a plan, a canal, Panama"); // Outputs: true
// 3- echo isAnagram("listen", "silent"); // Outputs: true
// 4- echo compressString("aaabbbccc"); // Outputs: a3b3c3
// 5- print_r(permuteString("abc")); // Outputs: ['abc', 'acb', 'bac', 'bca', 'cab', 'cba']
// 6- echo substringSearch("hello world", "world"); // Outputs: 6
// 7- echo longestSubstringWithoutRepeating("abcabcbb"); // Outputs: 3 (for "abc")
//  8- String Rotation :For example, if s = "abcde", then it will be "bcdea" after one shift.
// 9- print_r(countVowelsAndConsonants("Hello World")); // Outputs: ['vowels' => 3, 'consonants' => 7]
// 10- echo concatenateStrings("Hello", "World"); // Outputs: HelloWorld
// 10- echo concatenateStringsImplode(["Hello", "World"]); // Outputs: HelloWorld
// ===================

// 1. Reverse a String:- echo reverseString("Hello World"); // Outputs: dlroW olleH
// Implement a function to reverse a given string. In PHP, you might be asked to do this both with built-in functions and without.
// in Built-in functions :
// function reverseString($str) {return strrev($str);}
// Manual :
function reverseString($str)
{
    $reversedStr = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversedStr .= $str[$i];
    }
    return   $reversedStr;
}
echo reverseString("Hello World"); // Outputs: dlroW olleH
echo "<br>";
// ===================
// 2. Palindrome Check: Write a function to check if a given string is a palindrome (reads the same forwards and backwards), ignoring spaces, punctuation, and capitalization.
// - echo isPalindrome("A man, a plan, a canal, Panama"); // Outputs: true
// in functions :
// function isPalindrome($str) {
//     $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
//     return $str === strrev($str);
// }
function isPalindrome($str)
{
    $strCleared = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
    $length = strlen($strCleared);
    for ($i = 0; $i <= ($length - 1) / 2; $i++) {
        if ($strCleared[$i] !== $strCleared[($length - 1) - $i]) {
            return false;
        }
    }
    return true;
}
echo isPalindrome("A man, a plan, a canal, Panama");
echo "<br>"; // Outputs: true
// ===================

// 3. Anagram Detection: Implement a function to check if two strings are anagrams of each other (contain the same characters with the same frequency).
// echo isAnagram("listen", "silent"); // Outputs: true
// function isAnagram($str1, $str2) {
//     $str1 = str_replace(' ', '', strtolower($str1));
//     $str2 = str_replace(' ', '', strtolower($str2));
//     if (strlen($str1) !== strlen($str2)) {
//         return false;
//     }
//     $freq1 = array_count_values(str_split($str1));
//     $freq2 = array_count_values(str_split($str2));
//     return $freq1 === $freq2;
// }
function isAnagram($str1, $str2)
{
    $str1 = str_replace(' ', '', strtolower($str1));
    $str2 = str_replace(' ', '', strtolower($str2));
    // print_r(count_chars($str1,1));
    return (count_chars($str1, 1)) === (count_chars($str2, 1));
}
echo isAnagram("listen", "silent");
echo "<br>"; //T 
echo isAnagram('card', 'cart');
echo "<br>"; //false
echo isAnagram("listen", "silent");
echo "<br>"; //T
// ===================

// 4. String Compression: Write a function to perform basic string compression by replacing consecutive repeated characters with their count. For example, "aabcccccaaa" would become "a2b1c5a3".
// - echo compressString("aaabbbccc"); // Outputs: a3b3c3
// function compressString($str) {
    //     $compressed = '';
    //     $count = 1;
    //     for ($i = 0; $i < strlen($str); $i++) {
    //         if ($i !== 0 && $str[$i] !== $str[$i - 1]) {
    //             $compressed .= $str[$i - 1] . $count;
    //             $count = 1;
    //         } else {
    //             $count++;
    //         }
    //     }
    //     $compressed .= $str[strlen($str) - 1] . $count;
    //     return strlen($compressed) < strlen($str) ? $compressed : $str;
// }
function compressString($str)
{
    $compressedStr = "";
    $count = 1;
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        if ($str[$i] == $str[$i + 1]) {
            $count++;
        } else {
            $compressedStr .= $str[$i] . $count;
            $count = 1;
        }
    }
    $compressedStr .= $str[strlen($str) - 1] . $count;//the last char
    return $compressedStr;
}
echo compressString("abbbccabn"). "<br>";  // Outputs: a1b3c2a1b1n1
// ===================

// 5. String Permutations: Write a function to generate all permutations of a given string.
// print_r(permuteString("abc")); // Outputs: ['abc', 'acb', 'bac', 'bca', 'cab', 'cba']
function permuteString($str) {
        if (strlen($str) <= 1) {
            return [$str];
        }
        $perms = [];
        $tail = substr($str, 1);//bc
        foreach (permuteString($tail) as $perm) {

            for ($i = 0; $i <= strlen($perm); $i++) {
                $perms[] = substr($perm, 0, $i) . $str[0] . substr($perm, $i);
            }

        }
        return $perms;
    }
    echo("<pre>");
    print_r(permuteString("abcd")); echo("</pre>");
// Array(
    //     [0] => abcd
    //     [1] => bacd
    //     [2] => bcad
    //     [3] => bcda
    //     [4] => acbd
    //     [5] => cabd
    //     [6] => cbad
    //     [7] => cbda
    //     [8] => acdb
    //     [9] => cadb
    //     [10] => cdab
    //     [11] => cdba
    //     [12] => abdc
    //     [13] => badc
    //     [14] => bdac
    //     [15] => bdca
    //     [16] => adbc
    //     [17] => dabc
    //     [18] => dbac
    //     [19] => dbca
    //     [20] => adcb
    //     [21] => dacb
    //     [22] => dcab
    //     [23] => dcba
    // )


// ===================

// 6. Substring Search: Implement a function to check if a given substring exists within a larger string, and if so, return its starting index.
// echo substringSearch("hello world", "world"); // Outputs: 6
// in functions : 
// function substringSearch($haystack, $needle) {
    //     return strpos($haystack, $needle) !== false;
    // }
    function substringSearch($haystack, $needle) {
        $haystackLen = strlen($haystack);
        $needleLen = strlen($needle);
        for ($i = 0; $i <= $haystackLen - $needleLen; $i++) {
            // $i <= $haystackLen - $needleLen because: 
        //  عشان مندورش في باقي النص وهو مش هينفع يكون فيه 
        // يعني لو هو طوله 11 زي ما هو معانا كده والكلمة اللي ببحث عنها طولها 5 يبقا همشي خمسة بخمسة جمب بعض فهلاقي نفسي وصلت للنهاية لما مشيت ست خطوات 
            $found = true;
            for ($j = 0; $j < $needleLen; $j++) {
                // كل مرة هبحث من الحرف للي انا واقف عنده لحد آخر طول النييد 
                if ($haystack[$i + $j] !== $needle[$j]) {
                    // لو هو أصلا أول حرف مش بيساوي الحرف اللي عليه الدور يبقا عديه لحد ما تلاقي أول حرف في البحث هو الحرف اللي عليه الدور ساعتها اتأكد بطوله
                    $found = false;
                    break;
                }
            }
            if ($found) {
                return $i;
            }
        }
        return -1;
    }   
    echo substringSearch("hello world", "world"). "<br>"; ; // Outputs: 6
// ===================

// 7. Longest Substring Without Repeating Characters: Find the length of the longest substring without repeating characters within a given string.
// - echo longestSubstringWithoutRepeating("abcabcbb"); // Outputs: 3 (for "abc")
// function lengthOfLongestSubstring($s) {
    //     $mp = [];
    //     $mx = 0;
    // $l = 0; //left

    //     for ($i = 0; $i < strlen($s); $i++) {
    //         while ($mp[$s[$i]] != 0) {
    //             $mp[$s[$l]] = 0;
    //             $l++;
    //         }
    //         $mp[$s[$i]]++;
    //         $mx = max($mx, ($i - $l + 1));
    //     }

    //     return $mx;
    // }

 function longestSubstringWithoutRepeating($s) {
    $maxLen = 0;
    $start = 0;
    $charIndexMap = [];

    for ($end = 0; $end < strlen($s); $end++) {
        if (array_key_exists($s[$end], $charIndexMap)) {
            // Update the start position to the next character after the repeated character
            $start = max($start, $charIndexMap[$s[$end]] + 1);
        }
        // Update the index of the current character
        $charIndexMap[$s[$end]] = $end;
        // Calculate the current substring length
        $maxLen = max($maxLen, $end - $start + 1);
    }

    return $maxLen;
}

    echo longestSubstringWithoutRepeating("abcabcbbcccccddabcddccc"). "<br>";  // Outputs: 3 (for "abc")
// ===================

// 8. String Rotation: Write a function to check if one string is a rotation of another string. For example, "waterbottle" is a rotation of "waterbottle".
//For example, if s = "abcde", then it will be "bcdea" after one shift.
function isStringRotation($str1, $str2) {
    if (strlen($str1) !== strlen($str2)) {
        return false;
    }
    return strpos($str1 . $str1, $str2) !== false;
}
echo isStringRotation("waterbottle", "waterbottle") . "<br>" ;
// ===================

// 9. Count Vowels and Consonants: Write a function to count the number of vowels and consonants in a given string.
// aeiou
// print_r(countVowelsAndConsonants("Hello World")); // Outputs: ['vowels' => 3, 'consonants' => 7]
// function countVowelsAndConsonants($str) {
    //     $vowels = preg_match_all('/[aeiou]/i', $str);
    //     $consonants = preg_match_all('/[bcdfghjklmnpqrstvwxyz]/i', $str);
    //     return ["vowels" => $vowels, "consonants" => $consonants];
    // }
function countVowelsAndConsonants($str) {
    $vowels = 0;
    $consonants = 0;
    $str = strtolower($str);
    for ($i = 0; $i < strlen($str); $i++) {
        if (preg_match('/[aeiou]/', $str[$i])) {
            $vowels++;
        } elseif (preg_match('/[a-z]/', $str[$i])) {
            $consonants++;
        }
    }
    return ["vowels" => $vowels, "consonants" => $consonants];
}
 print_r(countVowelsAndConsonants("Hello World")) ;
 echo "<br>"; 
 // Outputs: ['vowels' => 3, 'consonants' => 7]

// ===================

// 10. String Concatenation: Discuss the differences between using the . operator and implode() function for string concatenation in PHP, including performance considerations.
// - echo concatenateStrings("Hello", "World"); // Outputs: HelloWorld
// - echo concatenateStringsImplode(["Hello", "World"]); // Outputs: HelloWorld
// Using the . operator
// function concatenateStrings($str1, $str2) {
//     return $str1 . $str2;
// }
function concatenateStrings($str1, $str2) {
    $result = '';
    for ($i = 0; $i < strlen($str1); $i++) {
        $result .= $str1[$i];
    }
    for ($i = 0; $i < strlen($str2); $i++) {
        $result .= $str2[$i];
    }
    return $result;
}
 echo concatenateStrings("Hello", "World")."<br>"; // Outputs: HelloWorld

// Using implode()
// function concatenateStringsImplode($strArray) {
//     return implode('', $strArray);
// }
// explode by me : https://github.com/MohamedKarm551/trying-To-Create-function-explode

function concatenateStringsImplode($strArray) {
    $result = '';
    foreach ($strArray as $str) {
        for ($i = 0; $i < strlen($str); $i++) {
            $result .= $str[$i];
        }
    }
    return $result;
}
echo concatenateStringsImplode(["Hello", "World"])."<br>"; // Outputs: HelloWorld