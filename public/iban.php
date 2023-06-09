<?php

function generateIban()
{

    $bankAccountNumber = sprintf('%014d', mt_rand(0, 99999999999999));
    $countryCode = 'LT';
    $iban = $countryCode . '00' . $bankAccountNumber;
    $ibanDigits = str_split($iban);
    $checksum = 0;
    foreach ($ibanDigits as $digit) {
        $checksum = ($checksum * 10 + intval($digit)) % 97;
    }
    $checksumDigits = sprintf('%02d', 98 - $checksum);
    $iban = substr_replace($iban, $checksumDigits, 2, 2);

    return $iban;
}
