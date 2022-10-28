<?php

/**
 * Verify if phone number is on a valid format.
 * Valid format: (123) 456-7890
 * 
 * >>> isPhoneNumberValid("(014) 123-4567")
 * >>> True
 * 
 * @param string $phone
 * @return bool
 */
function isPhoneNumberValid(string $phone): bool
{
    $validPhoneFormatRegex = "/([(0-9)]{5} [0-9]{3}-[0-9]{4})/";
    $SUCCESS = 1;

    return preg_match($validPhoneFormatRegex, $phone) == $SUCCESS;
}

/**
 * Remove special characters from given string.
 * 
 * >>> removeSpecialCharacters("The# qui!ck brown fox jumps@ over the lazy dog!")
 * >>> The quick brown fox jumps over the lazy dog
 * 
 * @param string $string
 * @return string
 */
function removeSpecialCharacters(string $string): string
{
    $specialCharsRegex = "/[^a-z0-9_ -]/i";

    return preg_replace($specialCharsRegex, "", $string);
}

/**
 * Calculates players scores giving an string containing the chars that represents the players.
 * For each letter A, B or C on given string, 1 point is added to the player whose this letter represents.
 * 
 * >>> calculateScore("AAABBC")
 * >>> ["A" => 3, "B" => 2, "C" => 1]
 * 
 * @param string $scoreString
 * @return array
 */
function calculateScore(string $scoreString): array
{
    $scoreString = strtoupper($scoreString);

    $PLAYERS_NAME_INITIALS = ['A', 'B', 'C'];
    $score = [];

    foreach ($PLAYERS_NAME_INITIALS as $playerNameInitial) {
        $score[$playerNameInitial] = substr_count($scoreString, $playerNameInitial);
    }
    return $score;
}

/**
 * Splits repeated characters into a string and groups them into an array.
 * 
 * >>> splitRepeatedCharacters("aaabbbcc")
 * >>> ["AAA", "BBB", "CC"]
 * 
 * @param string $input
 * @return array
 */
function splitRepeatedCharacters(string $input): array
{
    $input = strtoupper($input);

    $chars = str_split($input);

    $unique_chars = array_unique($chars);

    $return = [];

    foreach ($unique_chars as $char) {
        $sorted_chars_count = array_count_values($chars);

        $temp_str = str_repeat($char, $sorted_chars_count[$char]); // Change to a more meaningful name.

        array_push($return, $temp_str);
    }

    return $return;
}

/**
 * Do the factorial of the number.
 * 
 * >>> factorial(5)
 * >>> 120
 * 
 * @param int $number
 * @return int
 */
function factorial(int $number): int
{
    if ($number == 1) {
        return $number;
    }

    return $number * factorial($number - 1);
}

print_r(splitRepeatedCharacters("aacacbbb"));
